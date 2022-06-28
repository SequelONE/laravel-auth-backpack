
<?php
    $column['value'] = $column['value'] ?? data_get($entry, $column['name']);
    $column['escaped'] = $column['escaped'] ?? true;
    $column['limit'] = $column['limit'] ?? 32;
    $column['prefix'] = $column['prefix'] ?? '';
    $column['suffix'] = $column['suffix'] ?? '';
    $column['text'] = $column['default'] ?? '-';

    if($column['value'] instanceof \Closure) {
        $column['value'] = $column['value']($entry);
    }

    if(is_array($column['value'])) {
        $column['value'] = json_encode($column['value']);
    }

    if(!empty($column['value'])) {
        $column['text'] = $column['prefix'].Str::limit($column['value'], $column['limit'], '…').$column['suffix'];
    }
?>

<span>
    <?php echo $__env->renderWhen(!empty($column['wrapper']), 'crud::columns.inc.wrapper_start', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>
        <?php if($column['escaped']): ?>
            <?php echo e($column['text']); ?>

        <?php else: ?>
            <?php echo $column['text']; ?>

        <?php endif; ?>
    <?php echo $__env->renderWhen(!empty($column['wrapper']), 'crud::columns.inc.wrapper_end', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>
</span>
<?php /**PATH /var/www/sequelone/data/www/s01.one/vendor/backpack/crud/src/resources/views/crud/columns/text.blade.php ENDPATH**/ ?>