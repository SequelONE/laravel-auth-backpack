<?php
    // this is made available by columns like select and select_multiple
    $related_key = $related_key ?? null;

    // each wrapper attribute can be a callback or a string
    // for those that are callbacks, run the callbacks to get the final string to use
    foreach($column['wrapper'] as $attribute => $value) {
        $column['wrapper'][$attribute] = !is_string($value) && $value instanceof \Closure ? $value($crud, $column, $entry, $related_key) : $value ?? '';
    }
?>

<<?php echo e($column['wrapper']['element'] ?? 'a'); ?>

<?php $__currentLoopData = Arr::except($column['wrapper'], 'element'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php echo e($element); ?>="<?php echo e($value); ?>"
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
><?php /**PATH /var/www/sequelone/data/www/s01.one/vendor/backpack/crud/src/resources/views/crud/columns/inc/wrapper_start.blade.php ENDPATH**/ ?>