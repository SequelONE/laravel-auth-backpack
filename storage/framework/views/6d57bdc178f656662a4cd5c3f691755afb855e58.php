<?php $__env->startSection('after_scripts'); ?>
        <?php echo $__env->make('vendor.elfinder.common_scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('vendor.elfinder.common_styles', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!-- elFinder initialization (REQUIRED) -->
        <script type="text/javascript" charset="utf-8">
            // Documentation for client options:
            // https://github.com/Studio-42/elFinder/wiki/Client-configuration-options
            $().ready(function() {
                $('#elfinder').elfinder({
                    // set your elFinder options here
                    <?php if($locale): ?>
                        lang: '<?php echo e($locale); ?>', // locale
                    <?php endif; ?>
                    customData: { 
                        _token: '<?php echo e(csrf_token()); ?>'
                    },
                    url : '<?php echo e(route("elfinder.connector")); ?>',  // connector URL
                    soundPath: '<?php echo e(asset($dir.'/sounds')); ?>'
                });
            });
        </script>
<?php $__env->stopSection(); ?>

<?php
  $breadcrumbs = [
    trans('backpack::crud.admin') => url(config('backpack.base.route_prefix'), 'dashboard'),
    trans('backpack::crud.file_manager') => false,
  ];
?>

<?php $__env->startSection('header'); ?>
    <section class="container-fluid">
      <h2><?php echo e(trans('backpack::crud.file_manager')); ?></h2>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

        <!-- Element where elFinder will be created (REQUIRED) -->
        <div id="elfinder"></div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backpack::layouts.top_left', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/sequelone/data/www/s01.one/resources/views/vendor/elfinder/elfinder.blade.php ENDPATH**/ ?>