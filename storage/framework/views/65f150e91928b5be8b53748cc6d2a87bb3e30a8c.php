<?php if(!empty($widgets)): ?>
	<?php $__currentLoopData = $widgets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currentWidget): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

		<?php if(is_array($currentWidget)): ?>
			<?php
				$currentWidget = \Backpack\CRUD\app\Library\Widget::add($currentWidget);
			?>
		<?php endif; ?>

		<?php echo $__env->make($currentWidget->getFinalViewPath(), ['widget' => $currentWidget->toArray()], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php /**PATH /var/www/sequelone/data/www/s01.one/vendor/backpack/crud/src/resources/views/base/inc/widgets.blade.php ENDPATH**/ ?>