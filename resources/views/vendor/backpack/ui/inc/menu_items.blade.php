<x-backpack::menu-item title="{{ trans('admin.dashboard') }}" icon="la la-dashboard" :link="backpack_url('dashboard')" />

<!-- Pages, Menu -->
<x-backpack::menu-dropdown title="{{ trans('admin.content') }}" icon="la la-pencil-square-o">
    <x-backpack::menu-dropdown-item title="{{ trans('admin.contexts') }}" icon="la la-pencil-square-o" :link="backpack_url('context')" />
    <x-backpack::menu-dropdown-item title="{{ trans('admin.pages') }}" icon="la la-list" :link="backpack_url('page')" />
    <x-backpack::menu-dropdown-item title="{{ trans('admin.menu') }}" icon="la la-tag" :link="backpack_url('menu-item')" />
</x-backpack::menu-dropdown>
<!-- News -->
<x-backpack::menu-dropdown title="{{ trans('admin.news') }}" icon="la la-newspaper-o">
    <x-backpack::menu-dropdown-item title="{{ trans('admin.articles') }}" icon="la la-newspaper-o" :link="backpack_url('article')" />
    <x-backpack::menu-dropdown-item title="{{ trans('admin.categories') }}" icon="la la-list" :link="backpack_url('category')" />
    <x-backpack::menu-dropdown-item title="{{ trans('admin.tags') }}" icon="la la-tag" :link="backpack_url('tag')" />
</x-backpack::menu-dropdown>

<!-- Users, Roles, Permissions -->
<x-backpack::menu-dropdown title="{{ trans('admin.authentication') }}" icon="la la-users">
    <x-backpack::menu-dropdown-item title="{{ trans('admin.users') }}" icon="la la-user" :link="backpack_url('user')" />
    <x-backpack::menu-dropdown-item title="{{ trans('admin.roles') }}" icon="la la-id-badge" :link="backpack_url('role')" />
    <x-backpack::menu-dropdown-item title="{{ trans('admin.permissions') }}" icon="la la-key" :link="backpack_url('permission')" />
</x-backpack::menu-dropdown>

{{-- FileManager --}}
<x-backpack::menu-item title="{{ trans('backpack::crud.file_manager') }}" icon="la la-files-o" :link="backpack_url('elfinder')" />

{{-- System --}}
<x-backpack::menu-dropdown title="{{ trans('admin.system') }}" icon="la la-server">
    <x-backpack::menu-dropdown-item title="{{ trans('admin.settings') }}" icon="la la la-cog" :link="backpack_url('setting')" />
    <x-backpack::menu-dropdown-item title="{{ trans('admin.backups') }}" icon="la la-hdd-o" :link="backpack_url('backup')" />
    <x-backpack::menu-dropdown-item title="{{ trans('admin.logs') }}" icon="la la-terminal" :link="backpack_url('log')" />
    <x-backpack::menu-dropdown-item title="{{ trans('admin.activity-logs') }}" icon="la la-stream" :link="backpack_url('activity-log')" />
</x-backpack::menu-dropdown>

{{-- Purge cache --}}
<x-backpack::menu-item title="{{ trans('admin.clearCache') }}" class="btn btn-outline-warning btn-block" icon="la la-trash" :link="backpack_url('purge')" />
