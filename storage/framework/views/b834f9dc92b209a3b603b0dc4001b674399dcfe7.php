
<?php if($crud->groupedErrorsEnabled() && $errors->any()): ?>
    <div class="alert alert-danger pb-0">
        <ul class="list-unstyled">
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><i class="la la-info-circle"></i> <?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?><?php /**PATH /var/www/sequelone/data/www/s01.one/vendor/backpack/crud/src/resources/views/crud/inc/grouped_errors.blade.php ENDPATH**/ ?>