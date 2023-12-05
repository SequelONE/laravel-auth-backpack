<?php

namespace App\Http\Controllers\Admin;

use Backpack\PermissionManager\app\Http\Controllers\UserCrudController as OriginalUserCrudController;

class UserCrudController extends OriginalUserCrudController
{
    use \Backpack\ActivityLog\Http\Controllers\Operations\ModelActivityOperation;
    use \Backpack\ActivityLog\Http\Controllers\Operations\EntryActivityOperation;
}
