
<?php
    $column['value'] = $column['value'] ?? data_get($entry, $column['name']);
    $column['escaped'] = $column['escaped'] ?? true;
    $column['prefix'] = $column['prefix'] ?? '';
    $column['suffix'] = $column['suffix'] ?? '';
    $column['limit'] = $column['limit'] ?? 32;
    $column['text'] = $column['default'] ?? '-';

    if($column['value'] instanceof \Closure) {
        $column['value'] = $column['value']($entry);
    }

    if(!empty($column['value'])) {
        $column['text'] = $column['prefix'].Str::limit(strip_tags($column['value']), $column['limit'], "…").$column['suffix'];
    }

    $column['wrapper']['element'] = $column['wrapper']['element'] ?? 'a';
    $column['wrapper']['href'] = $column['wrapper']['href'] ?? 'mailto:'.$column['value'];
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
<?php /**PATH /var/www/sequelone/data/www/s01.one/vendor/backpack/crud/src/resources/views/crud/columns/email.blade.php ENDPATH**/ ?>