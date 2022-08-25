<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>
<li class="nav-title">{{ trans('admin.packages') }}</li>
<!-- Pages, Menu -->
<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-pencil-square-o"></i> {{ trans('admin.content') }}</a>
    <ul class="nav-dropdown-items">
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('context') }}'><i class='nav-icon la la-globe'></i> <span>{{ trans('admin.contexts') }}</span></a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('page') }}'><i class='nav-icon la la-file-o'></i> <span>{{ trans('admin.pages') }}</span></a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('menu-item') }}'><i class='nav-icon la la-list'></i> <span>{{ trans('admin.menu') }}</span></a></li>
    </ul>
</li>
<li class="nav-title">{{ trans('admin.users') }}</li>
<!-- Users, Roles, Permissions -->
<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-users"></i> {{ trans('admin.authentication') }}</a>
    <ul class="nav-dropdown-items">
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('user') }}"><i class="nav-icon la la-user"></i> <span>{{ trans('admin.users') }}</span></a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('role') }}"><i class="nav-icon la la-id-badge"></i> <span>{{ trans('admin.roles') }}</span></a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('permission') }}"><i class="nav-icon la la-key"></i> <span>{{ trans('admin.permissions') }}</span></a></li>
    </ul>
</li>
<li class="nav-title">{{ trans('admin.settings') }}</li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('elfinder') }}"><i class="nav-icon la la-files-o"></i> <span>{{ trans('backpack::crud.file_manager') }}</span></a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('setting') }}'><i class='nav-icon la la-cog'></i> <span>{{ trans('admin.settings') }}</span></a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('backup') }}'><i class='nav-icon la la-hdd-o'></i> {{ trans('admin.backups') }}</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('log') }}'><i class='nav-icon la la-terminal'></i> {{ trans('admin.logs') }}</a></li>
<li class='nav-item'><a class='btn btn-outline-warning btn-block' role="button" href='{{ backpack_url('purge') }}'><i class="nav-icon la la-trash"></i> <span>{{ trans('admin.clearCache') }}</span></a></li>
