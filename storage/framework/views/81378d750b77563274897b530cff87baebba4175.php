


<?php
    $field['allows_null'] = $field['allows_null'] ?? false;

    $field['name']['type'] = $field['name']['type'] ?? $field['name'][0] ?? 'type';
    $field['name']['link'] = $field['name']['link'] ?? $field['name'][1] ?? 'link';
    $field['name']['page_id'] = $field['name']['page_id'] ?? $field['name'][2] ?? 'page_id';

    $field['options']['page_link'] = $field['options']['page_link'] ?? trans('backpack::crud.page_link');
    $field['options']['internal_link'] = $field['options']['internal_link'] ?? trans('backpack::crud.internal_link');
    $field['options']['external_link'] = $field['options']['external_link'] ?? trans('backpack::crud.external_link');

    $field['pages'] = $field['pages'] ?? ($field['page_model'] ?? config('backpack.pagemanager.page_model_class'))::all();
?>

<?php echo $__env->make('crud::fields.inc.wrapper_start', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <label><?php echo $field['label']; ?></label>
    <?php echo $__env->make('crud::fields.inc.translatable_icon', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="row" data-init-function="bpFieldInitPageOrLinkElement">
        
        <input type="hidden" value="<?php echo e($entry->{$field['name']['page_id']} ?? ''); ?>" name="<?php echo e($field['name']['page_id']); ?>" />
        <input type="hidden" value="<?php echo e($entry->{$field['name']['link']} ?? ''); ?>" name="<?php echo e($field['name']['link']); ?>" />

        <div class="col-sm-3">
            
            <select
                data-identifier="page_or_link_select"
                name="<?php echo $field['name']['type']; ?>"
                <?php echo $__env->make('crud::fields.inc.attributes', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                >

                <?php if($field['allows_null']): ?>
                    <option value="">-</option>
                <?php endif; ?>

                <?php $__currentLoopData = $field['options']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($key); ?>"
                        <?php if(isset($entry) && $key === $entry->{$field['name']['type']}): ?>
                            selected
                        <?php endif; ?>
                    ><?php echo e($value); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div class="col-sm-9">
            
            <div class="page_or_link_value page_link <?php echo e((isset($entry) && $entry->{$field['name']['type']} === 'page_link') || (isset($entry) && !$entry->{$field['name']['type']} && !$field['allows_null']) || (!isset($entry) && !$field['allows_null']) ? '' : 'd-none'); ?>">
                <select
                    class="form-control"
                    for="<?php echo e($field['name']['page_id']); ?>"
                    required
                    >
                    <?php $__currentLoopData = $field['pages']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($page->id); ?>"
                            <?php if(isset($entry) && $page->id === $entry->{$field['name']['page_id']}): ?>
                                selected
                            <?php endif; ?>
                        ><?php echo e($page->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            
            <div class="page_or_link_value internal_link <?php echo e(isset($entry) && $entry->{$field['name']['type']} === 'internal_link' ? '' : 'd-none'); ?>">
                <input
                    type="text"
                    class="form-control"
                    placeholder="<?php echo e(trans('backpack::crud.internal_link_placeholder', ['url', url(config('backpack.base.route_prefix').'/page')])); ?>"
                    for="<?php echo e($field['name']['link']); ?>"
                    required

                    <?php if(isset($entry) && $entry->{$field['name']['type']} !== 'internal_link'): ?>
                        disabled="disabled"
                    <?php endif; ?>

                    <?php if(isset($entry) && $entry->{$field['name']['type']} === 'internal_link' && $entry->{$field['name']['link']}): ?>
                        value="<?php echo e($entry->{$field['name']['link']}); ?>"
                    <?php endif; ?>
                    >
            </div>

            
            <div class="page_or_link_value external_link <?php echo e(isset($entry) && $entry->{$field['name']['type']} === 'external_link' ? '' : 'd-none'); ?>">
                <input
                    type="url"
                    class="form-control"
                    placeholder="<?php echo e(trans('backpack::crud.page_link_placeholder')); ?>"
                    for="<?php echo e($field['name']['link']); ?>"
                    required

                    <?php if(isset($entry) && $entry->{$field['name']['type']} !== 'external_link'): ?>
                        disabled="disabled"
                    <?php endif; ?>

                    <?php if(isset($entry) && $entry->{$field['name']['type']} === 'external_link' && $entry->{$field['name']['link']}): ?>
                        value="<?php echo e($entry->{$field['name']['link']}); ?>"
                    <?php endif; ?>
                    >
            </div>
        </div>
    </div>

    
    <?php if(isset($field['hint'])): ?>
        <p class="help-block"><?php echo $field['hint']; ?></p>
    <?php endif; ?>

<?php echo $__env->make('crud::fields.inc.wrapper_end', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>





<?php if($crud->fieldTypeNotLoaded($field)): ?>
    <?php
        $crud->markFieldTypeAsLoaded($field);
    ?>

    
    <?php $__env->startPush('crud_fields_scripts'); ?>
    <script>
        function bpFieldInitPageOrLinkElement(element) {
            element = element[0]; // jQuery > Vanilla

            const select = element.querySelector('select[data-identifier=page_or_link_select]');
            const values = element.querySelectorAll('.page_or_link_value');

            // updates hidden fields
            const updateHidden = () => {
                let selectedInput = select.value && element.querySelector(`.${select.value}`).firstElementChild;
                element.querySelectorAll(`input[type="hidden"]`).forEach(hidden => {
                    hidden.value = selectedInput && hidden.getAttribute('name') === selectedInput.getAttribute('for') ? selectedInput.value : '';
                });
            }

            // save input changes to hidden placeholders
            values.forEach(value => value.firstElementChild.addEventListener('input', updateHidden));

            // main select change
            select.addEventListener('change', () => {
                values.forEach(value => {
                    let isSelected = value.classList.contains(select.value);

                    // toggle visibility and disabled
                    value.classList.toggle('d-none', !isSelected);
                    value.firstElementChild.toggleAttribute('disabled', !isSelected);
                });

                // updates hidden fields
                updateHidden();
            });
        }
    </script>
    <?php $__env->stopPush(); ?>

<?php endif; ?>

<?php /**PATH /var/www/sequelone/data/www/s01.one/resources/views/vendor/backpack/crud/fields/page_or_link.blade.php ENDPATH**/ ?>