<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

class MenuItemCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ReorderOperation;

    protected function setupReorderOperation()
    {
        // define which model attribute will be shown on draggable elements
        $this->crud->set('reorder.label', 'name');
        // define how deep the admin is allowed to nest the items
        // for infinite levels, set it to 0
        $this->crud->set('reorder.max_level', 2);
    }

    public function setup()
    {
        $this->crud->setModel("App\Models\MenuItem");
        $this->crud->setRoute(config('backpack.base.route_prefix').'/menu-item');
        $this->crud->setEntityNameStrings('menu item', 'menu items');

        $this->crud->enableReorder('name', 3);

        \Widget::add()->type('script')->content(asset('vendor/backpack/assets/js/admin/forms/menucrud.js'));

        $this->crud->operation('list', function () {
            $this->crud->addColumn([
                'name' => 'name',
                'label' => 'Label',
            ]);
            $this->crud->addColumn([
                'label' => 'Context',
                'type' => 'select',
                'name' => 'context_id',
                'entity' => 'context',
                'attribute' => 'subdomain',
                'model' => "App\Models\Context",
            ]);

            $this->crud->addColumn([
                'label' => 'Parent',
                'type' => 'select',
                'name' => 'parent_id',
                'entity' => 'parent',
                'attribute' => 'name',
                'model' => "App\Models\MenuItem",
            ]);

            if(backpack_pro() === true) {
                $this->crud->addFilter([ // select2 filter
                    'name' => 'context_id',
                    'type' => 'select2',
                    'label'=> 'Context',
                ], function () {
                    return \App\Models\Context::all()->keyBy('id')->pluck('subdomain', 'id')->toArray();
                }, function ($value) { // if the filter is active
                    $this->crud->addClause('where', 'context_id', $value);
                });
            }

        });

        $this->crud->operation(['create', 'update'], function () {

            $this->crud->addField([
                'name' => 'name',
                'label' => 'Label',
            ]);
            $this->crud->addField([
                'name' => 'title',
                'label' => 'Title',
                'type' => 'text',
            ]);
            $this->crud->addField([
                'label' => 'Context',
                'type' => 'select',
                'name' => 'context_id',
                'entity' => 'context',
                'attribute' => 'subdomain',
                'model' => "App\Models\Context",
            ]);
            $this->crud->addField([
                'label' => 'Parent',
                'type' => 'select',
                'name' => 'parent_id',
                'entity' => 'parent',
                'attribute' => 'name',
                'model' => "App\Models\MenuItem",
            ]);
            $this->crud->addField([
                'name' => 'type,link,page_id',
                'label' => 'Type',
                'type' => 'page_or_link',
                'page_model' => 'App\Models\Page',
                'view_namespace' => file_exists(resource_path('views/vendor/backpack/crud/fields/page_or_link.blade.php')) ? null : 'menucrud::fields',
            ]);
            $this->crud->addField([
                'label' => 'Status',
                'type' => 'checkbox',
                'name' => 'status',
                'default'    => 1,
            ]);
        });
    }

    /**
     *  Reorder the items in the database using the Nested Set pattern.
     *
     *  Database columns needed: id, parent_id, lft, rgt, depth, name/title
     *
     *  @return Response
     */
    public function reorder()
    {

        $this->crud->hasAccessOrFail('reorder');

        if (! $this->crud->isReorderEnabled()) {
            abort(403, 'Reorder is disabled.');
        }

        // get all results for that entity
        $this->crud->addClause('where', 'context_id', request()->get('context_id'));

        $this->data['entries'] = $this->crud->getEntries();
        $this->data['crud'] = $this->crud;
        $this->data['title'] = $this->crud->getTitle() ?? trans('backpack::crud.reorder').' '.$this->crud->entity_name;

        // load the view from /resources/views/vendor/backpack/crud/ if it exists, otherwise load the one in the package
        return view($this->crud->getReorderView(), $this->data);
    }

    /**
     * Respond to AJAX calls from the select2 with entries from the Category model.
     *
     * @return JSON
     */
    public function fetchContext()
    {
        return $this->fetch(\App\Models\Context::class);
    }
}
