<!-- text input -->

<?php echo $__env->make('crud::fields.inc.wrapper_start', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <label><?php echo $field['label']; ?></label>
    <?php echo $__env->make('crud::fields.inc.translatable_icon', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php if(isset($field['prefix']) || isset($field['suffix'])): ?> <div class="input-group"> <?php endif; ?>
        <?php if(isset($field['prefix'])): ?> <div class="input-group-prepend"><span class="input-group-text"><?php echo $field['prefix']; ?></span></div> <?php endif; ?>
        <input
            type="text"
            name="<?php echo e($field['name']); ?>"
            value="<?php echo e(old_empty_or_null($field['name'], '') ??  $field['value'] ?? $field['default'] ?? ''); ?>"
            <?php echo $__env->make('crud::fields.inc.attributes', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        >
        <?php if(isset($field['suffix'])): ?> <div class="input-group-append"><span class="input-group-text"><?php echo $field['suffix']; ?></span></div> <?php endif; ?>
    <?php if(isset($field['prefix']) || isset($field['suffix'])): ?> </div> <?php endif; ?>

    
    <?php if(isset($field['hint'])): ?>
        <p class="help-block"><?php echo $field['hint']; ?></p>
    <?php endif; ?>
<?php echo $__env->make('crud::fields.inc.wrapper_end', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH /var/www/sequelone/data/www/s01.one/vendor/backpack/crud/src/resources/views/crud/fields/text.blade.php ENDPATH**/ ?>