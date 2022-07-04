<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class DashboardCrudController extends Controller {

    public function usersCount() {
        return User::count();
    }

}
