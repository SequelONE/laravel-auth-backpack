<?php if($crud->hasAccess('update')): ?>
	<?php if(!$crud->model->translationEnabled()): ?>

	<!-- Single edit button -->
	<a href="<?php echo e(url($crud->route.'/'.$entry->getKey().'/edit')); ?>" class="btn btn-sm btn-link"><i class="la la-edit"></i> <?php echo e(trans('backpack::crud.edit')); ?></a>

	<?php else: ?>

	<!-- Edit button group -->
	<div class="btn-group">
	  <a href="<?php echo e(url($crud->route.'/'.$entry->getKey().'/edit')); ?>" class="btn btn-sm btn-link pr-0"><i class="la la-edit"></i> <?php echo e(trans('backpack::crud.edit')); ?></a>
	  <a class="btn btn-sm btn-link dropdown-toggle text-primary pl-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    <span class="caret"></span>
	  </a>
	  <ul class="dropdown-menu dropdown-menu-right">
  	    <li class="dropdown-header"><?php echo e(trans('backpack::crud.edit_translations')); ?>:</li>
	  	<?php $__currentLoopData = $crud->model->getAvailableLocales(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $locale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		  	<a class="dropdown-item" href="<?php echo e(url($crud->route.'/'.$entry->getKey().'/edit')); ?>?_locale=<?php echo e($key); ?>"><?php echo e($locale); ?></a>
	  	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	  </ul>
	</div>

	<?php endif; ?>
<?php endif; ?>
<?php /**PATH /var/www/sequelone/data/www/s01.one/vendor/backpack/crud/src/resources/views/crud/buttons/update.blade.php ENDPATH**/ ?>