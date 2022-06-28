<?php
  $defaultBreadcrumbs = [
    trans('backpack::crud.admin') => url(config('backpack.base.route_prefix'), 'dashboard'),
    $crud->entity_name_plural => url($crud->route),
    trans('backpack::crud.add') => false,
  ];

  // if breadcrumbs aren't defined in the CrudController, use the default breadcrumbs
  $breadcrumbs = $breadcrumbs ?? $defaultBreadcrumbs;
?>

<?php $__env->startSection('header'); ?>
	<section class="container-fluid">
	  <h2>
        <span class="text-capitalize"><?php echo $crud->getHeading() ?? $crud->entity_name_plural; ?></span>
        <small><?php echo $crud->getSubheading() ?? trans('backpack::crud.add').' '.$crud->entity_name; ?>.</small>

        <?php if($crud->hasAccess('list')): ?>
          <small><a href="<?php echo e(url($crud->route)); ?>" class="d-print-none font-sm"><i class="la la-angle-double-<?php echo e(config('backpack.base.html_direction') == 'rtl' ? 'right' : 'left'); ?>"></i> <?php echo e(trans('backpack::crud.back_to_all')); ?> <span><?php echo e($crud->entity_name_plural); ?></span></a></small>
        <?php endif; ?>
	  </h2>
	</section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="row">
	<div class="<?php echo e($crud->getCreateContentClass()); ?>">
		<!-- Default box -->

		<?php echo $__env->make('crud::inc.grouped_errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

		  <form method="post"
		  		action="<?php echo e(url($crud->route)); ?>"
				<?php if($crud->hasUploadFields('create')): ?>
				enctype="multipart/form-data"
				<?php endif; ?>
		  		>
			  <?php echo csrf_field(); ?>

		      <!-- load the view from the application if it exists, otherwise load the one in the package -->
		      <?php if(view()->exists('vendor.backpack.crud.form_content')): ?>
		      	<?php echo $__env->make('vendor.backpack.crud.form_content', [ 'fields' => $crud->fields(), 'action' => 'create' ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		      <?php else: ?>
		      	<?php echo $__env->make('crud::form_content', [ 'fields' => $crud->fields(), 'action' => 'create' ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		      <?php endif; ?>
                <!-- This makes sure that all field assets are loaded. -->
                <div class="d-none" id="parentLoadedAssets"><?php echo e(json_encode(Assets::loaded())); ?></div>
	          <?php echo $__env->make('crud::inc.form_save_buttons', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		  </form>
	</div>
</div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make(backpack_view('blank'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/sequelone/data/www/s01.one/vendor/backpack/crud/src/resources/views/crud/create.blade.php ENDPATH**/ ?>