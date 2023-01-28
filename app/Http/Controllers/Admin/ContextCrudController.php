<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

class ContextCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;

    public function setup()
    {
        $this->crud->setModel("App\Models\Context");
        $this->crud->setRoute(config('backpack.base.route_prefix').'/context');
        $this->crud->setEntityNameStrings('context', 'contexts');

        $this->crud->enableReorder('name', 3);

        $this->crud->operation('list', function () {
            $this->crud->addColumn([
                'name' => 'name',
                'label' => 'Name',
            ]);
            $this->crud->addColumn([
                'name' => 'subdomain',
                'label' => 'Subdomain',
            ]);

            $this->crud->addColumn([   // select_multiple: n-n relationship (with pivot table)
                'label'     => 'Menu Items', // Table column heading
                'type'      => 'relationship_count',
                'name'      => 'items', // the method that defines the relationship in your Model
                'wrapper'   => [
                    'href' => function ($crud, $column, $entry, $related_key) {
                        return backpack_url('menu-item?context_id='.$entry->getKey());
                    },
                ],
            ]);

            $this->crud->addColumn([   // select_multiple: n-n relationship (with pivot table)
                'label'     => 'Pages', // Table column heading
                'type'      => 'relationship_count',
                'name'      => 'pages', // the method that defines the relationship in your Model
                'wrapper'   => [
                    'href' => function ($crud, $column, $entry, $related_key) {
                        return backpack_url('page?context_id='.$entry->getKey());
                    },
                ],
            ]);

            $this->crud->addColumn([
                'type' => 'check',
                'name' => 'active',
                'label' => 'Active'
            ]);
        });

        $this->crud->operation(['create', 'update'], function () {
            $this->crud->addField([
                'name' => 'name',
                'label' => 'Name',
            ]);
            $this->crud->addField([
                'name' => 'subdomain',
                'label' => 'Subdomain',
                'type' => 'text',
            ]);
            $this->crud->addField([
                'label' => 'Active',
                'type' => 'checkbox',
                'name' => 'active',
                'default'    => 1,
            ]);
        });
    }
}
