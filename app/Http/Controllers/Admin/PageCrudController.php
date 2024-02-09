<?php

namespace App\Http\Controllers\Admin;

use App\PageTemplates;
// VALIDATION: change the requests to match your own file names if you need form validation
use Backpack\CRUD\app\Http\Controllers\CrudController;
use App\Http\Requests\PageRequest;
use Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use ReflectionClass;

class PageCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation { CreateOperation::create as traitCreate; }
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation { UpdateOperation::edit as traitEdit; }
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
    use \Backpack\ReviseOperation\ReviseOperation;
    use PageTemplates;

    /**
     * @throws Exception
     */
    public function setup()
    {
        $this->crud->setModel(config('backpack.pagemanager.page_model_class', 'App\Models\Page'));
        $this->crud->setRoute(config('backpack.base.route_prefix').'/page');
        $this->crud->setEntityNameStrings(trans('backpack::pagemanager.page'), trans('backpack::pagemanager.pages'));
    }

    protected function setupListOperation()
    {
        $this->crud->addColumn([
            'name' => 'name',
            'label' => trans('backpack::pagemanager.name'),
        ]);
        $this->crud->addColumn([
            'name' => 'template',
            'label' => trans('backpack::pagemanager.template'),
            'type' => 'model_function',
            'function_name' => 'getTemplateName',
        ]);
        $this->crud->addColumn([
            'name' => 'slug',
            'label' => trans('backpack::pagemanager.slug'),
        ]);
        $this->crud->addColumn([
            'label' => 'Context',
            'type' => 'select',
            'name' => 'context_id',
            'entity' => 'context',
            'attribute' => 'subdomain',
            'wrapper'   => [
                'href' => function ($crud, $column, $entry, $related_key) {
                    return backpack_url('context/'.$related_key.'/edit');
                },
            ],
        ]);
        if(backpack_pro() === true) {
            $this->crud->addFilter([ // select2 filter
                'name' => 'context_id',
                'type' => 'select2',
                'label' => 'Context',
            ], function () {
                return \App\Models\Context::all()->keyBy('id')->pluck('subdomain', 'id')->toArray();
            }, function ($value) { // if the filter is active
                $this->crud->addClause('where', 'context_id', $value);
            });
        }
        $this->crud->addButtonFromModelFunction('line', 'open', 'getOpenButton', 'beginning');
    }

    // -----------------------------------------------
    // Overwrites of CrudController
    // -----------------------------------------------

    protected function setupCreateOperation()
    {
        // Note:
        // - default fields, that all templates are using, are set using $this->addDefaultPageFields();
        // - template-specific fields are set per-template, in the PageTemplates trait;

        $this->addDefaultPageFields((new \Illuminate\Http\Request)->input('template'));
        $this->useTemplate((new \Illuminate\Http\Request)->input('template'));

        $this->crud->setValidation(PageRequest::class);
    }

    protected function setupUpdateOperation()
    {
        // if the template in the GET parameter is missing, figure it out from the db
        $template = (new \Illuminate\Http\Request)->input('template') ?? $this->crud->getCurrentEntry()->template;

        $this->addDefaultPageFields($template);
        $this->useTemplate($template);

        $this->crud->setValidation(PageRequest::class);
    }

    // -----------------------------------------------
    // Methods that are particular to the PageManager.
    // -----------------------------------------------

    /**
     * Populate the create/update forms with basic fields, that all pages need.
     *
     * @param bool|string $template  The name of the template that should be used in the current form.
     */
    public function addDefaultPageFields(bool|string $template = false)
    {
        $this->crud->addField([
            'name' => 'template',
            'label' => trans('backpack::pagemanager.template'),
            'type' => 'select_page_template',
            'view_namespace' => file_exists(resource_path('views/vendor/backpack/crud/fields/select_page_template.blade.php')) ? null : 'pagemanager::fields',
            'options' => $this->getTemplatesArray(),
            'value' => $template,
            'allows_null' => false,
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6',
            ],
        ]);
        $this->crud->addField([
            'name' => 'name',
            'label' => trans('backpack::pagemanager.page_name'),
            'type' => 'text',
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6',
            ],
            // 'disabled' => 'disabled'
        ]);
        $this->crud->addField([
            'name' => 'title',
            'label' => trans('backpack::pagemanager.page_title'),
            'type' => 'text',
            // 'disabled' => 'disabled'
        ]);
        $this->crud->addField([
            'name' => 'slug',
            'label' => trans('backpack::pagemanager.page_slug'),
            'type' => 'text',
            'hint' => trans('backpack::pagemanager.page_slug_hint'),
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6',
            ],
            // 'disabled' => 'disabled'
        ]);
        $this->crud->addField([
            'label' => 'Context',
            'type' => 'select',
            'name' => 'context_id',
            'entity' => 'context',
            'attribute' => 'subdomain',
            'model' => "App\Models\Context",
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6',
            ],
        ]);
    }

    /**
     * Add the fields defined for a specific template.
     *
     * @param bool|string $template_name  The name of the template that should be used in the current form.
     */
    public function useTemplate(bool|string $template_name = false)
    {
        $templates = $this->getTemplates();

        // set the default template
        if ($template_name == false) {
            $template_name = $templates[0]->name;
        }

        // actually use the template
        if ($template_name) {
            $this->{$template_name}();
        }
    }

    /**
     * Get all defined templates.
     */
    public function getTemplates($template_name = false): array
    {
        $templates_array = [];

        $templates_trait = new ReflectionClass('App\PageTemplates');
        $templates = $templates_trait->getMethods(\ReflectionMethod::IS_PRIVATE);

        if (! count($templates)) {
            abort(503, trans('backpack::pagemanager.template_not_found'));
        }

        return $templates;
    }

    /**
     * Get all defined template as an array.
     *
     * Used to populate the template dropdown in the create/update forms.
     */
    public function getTemplatesArray(): array
    {
        $templates = $this->getTemplates();

        foreach ($templates as $template) {
            $templates_array[$template->name] = str_replace('_', ' ', Str::title($template->name));
        }

        return $templates_array;
    }
}
