<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;
use Illuminate\Support\Facades\Artisan;

class CacheCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function cachePurge()
    {
        \Alert::add('success', '<i class="nav-icon la la-trash"></i> ' . trans('admin.cacheCleared'))->flash();
        Artisan::call('optimize:clear');

        return redirect()->back();
    }

}
