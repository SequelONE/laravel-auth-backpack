<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<li class="nav-item"><a class="nav-link" href="<?php echo e(backpack_url('dashboard')); ?>"><i class="la la-home nav-icon"></i> <?php echo e(trans('backpack::base.dashboard')); ?></a></li>
<!-- Users, Roles, Permissions -->
<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-users"></i> Authentication</a>
    <ul class="nav-dropdown-items">
        <li class="nav-item"><a class="nav-link" href="<?php echo e(backpack_url('user')); ?>"><i class="nav-icon la la-user"></i> <span>Users</span></a></li>
        <li class="nav-item"><a class="nav-link" href="<?php echo e(backpack_url('role')); ?>"><i class="nav-icon la la-id-badge"></i> <span>Roles</span></a></li>
        <li class="nav-item"><a class="nav-link" href="<?php echo e(backpack_url('permission')); ?>"><i class="nav-icon la la-key"></i> <span>Permissions</span></a></li>
    </ul>
</li>
<li class='nav-item'><a class='nav-link' href='<?php echo e(backpack_url('setting')); ?>'><i class='nav-icon la la-cog'></i> <span>Settings</span></a></li>
<li class='nav-item'><a class='nav-link' href='<?php echo e(backpack_url('page')); ?>'><i class='nav-icon la la-file-o'></i> <span>Pages</span></a></li>
<li class='nav-item'><a class='nav-link' href='<?php echo e(backpack_url('menu-item')); ?>'><i class='nav-icon la la-list'></i> <span>Menu</span></a></li>
<li class="nav-item"><a class="nav-link" href="<?php echo e(backpack_url('elfinder')); ?>"><i class="nav-icon la la-files-o"></i> <span><?php echo e(trans('backpack::crud.file_manager')); ?></span></a></li>
<li class='nav-item'><a class='nav-link' href='<?php echo e(backpack_url('log')); ?>'><i class='nav-icon la la-terminal'></i> Logs</a></li>
<li class='nav-item'><a class='nav-link' href='<?php echo e(backpack_url('backup')); ?>'><i class='nav-icon la la-hdd-o'></i> Backups</a></li><?php /**PATH /var/www/sequelone/data/www/s01.one/resources/views/vendor/backpack/base/inc/sidebar_content.blade.php ENDPATH**/ ?>