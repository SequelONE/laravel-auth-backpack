<?php
    $widgets['before_content'][] = [
        'type'        => 'jumbotron',
        'heading'     => trans('backpack::base.welcome'),
        'content'     => trans('backpack::base.use_sidebar'),
        'button_link' => backpack_url('logout'),
        'button_text' => trans('backpack::base.logout'),
    ];
?>

<?php $__env->startSection('content'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make(backpack_view('blank'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/sequelone/data/www/s01.one/vendor/backpack/crud/src/resources/views/base/dashboard.blade.php ENDPATH**/ ?>