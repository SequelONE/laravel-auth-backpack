<?php
	// Merge widgets that were fluently declared with widgets declared without the fluent syntax: 
	// - $data['widgets']['before_content']
	// - $data['widgets']['after_content']
	if (isset($widgets)) {
		foreach ($widgets as $section => $widgetSection) {
			foreach ($widgetSection as $key => $widget) {
				\Backpack\CRUD\app\Library\Widget::add($widget)->section($section);
			}
		}
	}
?>

<?php $__env->startSection('before_breadcrumbs_widgets'); ?>
	<?php echo $__env->make(backpack_view('inc.widgets'), [ 'widgets' => app('widgets')->where('section', 'before_breadcrumbs')->toArray() ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('after_breadcrumbs_widgets'); ?>
	<?php echo $__env->make(backpack_view('inc.widgets'), [ 'widgets' => app('widgets')->where('section', 'after_breadcrumbs')->toArray() ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('before_content_widgets'); ?>
	<?php echo $__env->make(backpack_view('inc.widgets'), [ 'widgets' => app('widgets')->where('section', 'before_content')->toArray() ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('after_content_widgets'); ?>
	<?php echo $__env->make(backpack_view('inc.widgets'), [ 'widgets' => app('widgets')->where('section', 'after_content')->toArray() ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make(backpack_view('layouts.top_left'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/sequelone/data/www/s01.one/vendor/backpack/crud/src/resources/views/base/blank.blade.php ENDPATH**/ ?>