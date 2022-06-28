
<?php
    $column['value'] = $column['value'] ?? data_get($entry, $column['name'], []);
    $column['escaped'] = $column['escaped'] ?? true;
    $column['prefix'] = $column['prefix'] ?? '';
    $column['suffix'] = $column['suffix'] ?? '';
    $column['limit'] = $column['limit'] ?? 32;
    $column['attribute'] = $column['attribute'] ?? (new $column['model'])->identifiableAttribute();

    if($column['value'] instanceof \Closure) {
        $column['value'] = $column['value']($entry);
    }

    if($column['value'] !== null && !$column['value']->isEmpty()) {
        $related_key = $column['value']->first()->getKeyName();
        $column['value'] = $column['value']->pluck($column['attribute'], $related_key);
    }

    $column['value'] = $column['value']
        ->each(function($value) use ($column) {
            $value = Str::limit($value, $column['limit'], '…');
        })
        ->toArray();
?>

<span>
    <?php if(!empty($column['value'])): ?>
        <?php echo e($column['prefix']); ?>

        <?php $__currentLoopData = $column['value']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $text): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $related_key = $key;
            ?>

            <span class="d-inline-flex">
                <?php echo $__env->renderWhen(!empty($column['wrapper']), 'crud::columns.inc.wrapper_start', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>
                    <?php if($column['escaped']): ?>
                        <?php echo e($text); ?>

                    <?php else: ?>
                        <?php echo $text; ?>

                    <?php endif; ?>
                <?php echo $__env->renderWhen(!empty($column['wrapper']), 'crud::columns.inc.wrapper_end', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>

                <?php if(!$loop->last): ?>, <?php endif; ?>
            </span>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php echo e($column['suffix']); ?>

    <?php else: ?>
        <?php echo e($column['default'] ?? '-'); ?>

    <?php endif; ?>
</span>
<?php /**PATH /var/www/sequelone/data/www/s01.one/vendor/backpack/crud/src/resources/views/crud/columns/select_multiple.blade.php ENDPATH**/ ?>