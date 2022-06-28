<?php if(isset($saveAction['active']) && !is_null($saveAction['active']['value'])): ?>
    <div id="saveActions" class="form-group">

        <input type="hidden" name="_save_action" value="<?php echo e($saveAction['active']['value']); ?>">
        <?php if(!empty($saveAction['options'])): ?>
            <div class="btn-group" role="group">
        <?php endif; ?>

        <button type="submit" class="btn btn-success">
            <span class="la la-save" role="presentation" aria-hidden="true"></span> &nbsp;
            <span data-value="<?php echo e($saveAction['active']['value']); ?>"><?php echo e($saveAction['active']['label']); ?></span>
        </button>

        <div class="btn-group" role="group">
            <?php if(!empty($saveAction['options'])): ?>
                <button id="btnGroupDrop1" type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="caret"></span><span class="sr-only">&#x25BC;</span></button>
                <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                    <?php $__currentLoopData = $saveAction['options']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a class="dropdown-item" href="javascript:void(0);" data-value="<?php echo e($value); ?>"><?php echo e($label); ?></a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>
        </div>

        <?php if(!empty($saveAction['options'])): ?>
            </div>
        <?php endif; ?>

        <?php if(!$crud->hasOperationSetting('showCancelButton') || $crud->getOperationSetting('showCancelButton') == true): ?>
            <a href="<?php echo e($crud->hasAccess('list') ? url($crud->route) : url()->previous()); ?>" class="btn btn-default"><span class="la la-ban"></span> &nbsp;<?php echo e(trans('backpack::crud.cancel')); ?></a>
        <?php endif; ?>

    </div>
<?php endif; ?>

<?php /**PATH /var/www/sequelone/data/www/s01.one/vendor/backpack/crud/src/resources/views/crud/inc/form_save_buttons.blade.php ENDPATH**/ ?>