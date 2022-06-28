<?php
	// preserve backwards compatibility with Widgets in Backpack 4.0
	if (isset($widget['wrapperClass'])) {
		$widget['wrapper']['class'] = $widget['wrapperClass'];
	}
?>

<?php echo $__env->renderWhen(!empty($widget['wrapper']), 'backpack::widgets.inc.wrapper_start', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>
	<div class="jumbotron mb-2">

	  <?php if(isset($widget['heading'])): ?>
	  <h1 class="display-3"><?php echo $widget['heading']; ?></h1>
	  <?php endif; ?>

	  <?php if(isset($widget['content'])): ?>
	  <p><?php echo $widget['content']; ?></p>
	  <?php endif; ?>

	  <?php if(isset($widget['button_link'])): ?>
	  <p class="lead">
	    <a class="btn btn-primary" href="<?php echo e($widget['button_link']); ?>" role="button"><?php echo e($widget['button_text']); ?></a>
	  </p>
	  <?php endif; ?>
	</div>
<?php echo $__env->renderWhen(!empty($widget['wrapper']), 'backpack::widgets.inc.wrapper_end', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?><?php /**PATH /var/www/sequelone/data/www/s01.one/vendor/backpack/crud/src/resources/views/base/widgets/jumbotron.blade.php ENDPATH**/ ?>