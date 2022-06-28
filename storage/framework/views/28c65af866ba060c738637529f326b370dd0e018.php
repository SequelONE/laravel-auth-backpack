<?php
    $field['attributes'] = $field['attributes'] ?? [];
    $field['attributes']['class'] = $field['attributes']['class'] ?? $default_class ?? 'form-control';
?>

<?php $__currentLoopData = $field['attributes']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<?php if(is_string($attribute)): ?>
    <?php echo e($attribute); ?>="<?php echo e($value); ?>"
    <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH /var/www/sequelone/data/www/s01.one/vendor/backpack/crud/src/resources/views/crud/fields/inc/attributes.blade.php ENDPATH**/ ?>