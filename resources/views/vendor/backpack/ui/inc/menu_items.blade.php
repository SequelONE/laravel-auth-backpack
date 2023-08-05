<x-backpack::menu-item title="Dashboard" icon="la la-dashboard" :link="backpack_url('dashboard')" />
<x-backpack::menu-separator title="{{ trans('admin.packages') }}" />
<!-- Pages, Menu -->
<x-backpack::menu-dropdown title="{{ trans('admin.content') }}" icon="la la-pencil-square-o">
    <x-backpack::menu-dropdown-item title="{{ trans('admin.contexts') }}" icon="la la-pencil-square-o" :link="backpack_url('context')" />
    <x-backpack::menu-dropdown-item title="{{ trans('admin.pages') }}" icon="la la-list" :link="backpack_url('page')" />
    <x-backpack::menu-dropdown-item title="{{ trans('admin.menu') }}" icon="la la-tag" :link="backpack_url('menu-item')" />
</x-backpack::menu-dropdown>

<x-backpack::menu-separator title="{{ trans('admin.users') }}" />
<!-- Users, Roles, Permissions -->
<x-backpack::menu-dropdown title="{{ trans('admin.authentication') }}" icon="la la-users">
    <x-backpack::menu-dropdown-item title="{{ trans('admin.users') }}" icon="la la-user" :link="backpack_url('user')" />
    <x-backpack::menu-dropdown-item title="{{ trans('admin.roles') }}" icon="la la-id-badge" :link="backpack_url('role')" />
    <x-backpack::menu-dropdown-item title="{{ trans('admin.permissions') }}" icon="la la-key" :link="backpack_url('permission')" />
</x-backpack::menu-dropdown>
<x-backpack::menu-separator title="{{ trans('admin.settings') }}" />
<x-backpack::menu-item :title="trans('backpack::crud.file_manager')" icon="la la-files-o" :link="backpack_url('elfinder')" />
<x-backpack::menu-item title="{{ trans('admin.settings') }}" icon="la la la-cog" :link="backpack_url('setting')" />
<x-backpack::menu-item title="{{ trans('admin.backups') }}" icon="la la-hdd-o" :link="backpack_url('backup')" />
<x-backpack::menu-item title="{{ trans('admin.logs') }}" icon="la la-terminal" :link="backpack_url('log')" />
<li class='nav-item'><a class='btn btn-outline-warning btn-block' role="button" href='{{ backpack_url('purge') }}'><i class="nav-icon la la-trash"></i> <span>{{ trans('admin.clearCache') }}</span></a></li>
