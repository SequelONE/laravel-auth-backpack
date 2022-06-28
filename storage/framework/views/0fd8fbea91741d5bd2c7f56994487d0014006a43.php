<!-- =================================================== -->
<!-- ========== Top menu items (ordered left) ========== -->
<!-- =================================================== -->
<ul class="nav navbar-nav d-md-down-none">

    <?php if(backpack_auth()->check()): ?>
        <!-- Topbar. Contains the left part -->
        <?php echo $__env->make(backpack_view('inc.topbar_left_content'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

</ul>
<!-- ========== End of top menu left items ========== -->



<!-- ========================================================= -->
<!-- ========= Top menu right items (ordered right) ========== -->
<!-- ========================================================= -->
<ul class="nav navbar-nav ml-auto <?php if(config('backpack.base.html_direction') == 'rtl'): ?> mr-0 <?php endif; ?>">
    <?php if(backpack_auth()->guest()): ?>
        <li class="nav-item"><a class="nav-link" href="<?php echo e(route('backpack.auth.login')); ?>"><?php echo e(trans('backpack::base.login')); ?></a>
        </li>
        <?php if(config('backpack.base.registration_open')): ?>
            <li class="nav-item"><a class="nav-link" href="<?php echo e(route('backpack.auth.register')); ?>"><?php echo e(trans('backpack::base.register')); ?></a></li>
        <?php endif; ?>
    <?php else: ?>
        <!-- Topbar. Contains the right part -->
        <?php echo $__env->make(backpack_view('inc.topbar_right_content'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make(backpack_view('inc.menu_user_dropdown'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
</ul>
<!-- ========== End of top menu right items ========== -->
<?php /**PATH /var/www/sequelone/data/www/s01.one/vendor/backpack/crud/src/resources/views/base/inc/menu.blade.php ENDPATH**/ ?>