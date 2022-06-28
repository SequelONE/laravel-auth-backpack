<!-- summernote editor -->
<?php
    // make sure that the options array is defined
    // and at the very least, dialogsInBody is true;
    // that's needed for modals to show above the overlay in Bootstrap 4
    $field['options'] = array_merge(['dialogsInBody' => true, 'tooltip' => false], $field['options'] ?? []);
?>

<?php echo $__env->make('crud::fields.inc.wrapper_start', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <label><?php echo $field['label']; ?></label>
    <?php echo $__env->make('crud::fields.inc.translatable_icon', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <textarea
        name="<?php echo e($field['name']); ?>"
        data-init-function="bpFieldInitSummernoteElement"
        data-options="<?php echo e(json_encode($field['options'])); ?>"
        bp-field-main-input
        <?php echo $__env->make('crud::fields.inc.attributes', ['default_class' =>  'form-control summernote'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        ><?php echo e(old_empty_or_null($field['name'], '') ??  $field['value'] ?? $field['default'] ?? ''); ?></textarea>

    
    <?php if(isset($field['hint'])): ?>
        <p class="help-block"><?php echo $field['hint']; ?></p>
    <?php endif; ?>
<?php echo $__env->make('crud::fields.inc.wrapper_end', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>






    
<?php $__env->startPush('crud_fields_styles'); ?>
    <!-- include summernote css-->
    <?php Assets::echoCss('packages/summernote/dist/summernote-bs4.css'); ?>
    <?php if(! Assets::isLoaded('summernoteCss')) { Assets::markAsLoaded('summernoteCss');  ?>
    <style type="text/css">
        .note-editor.note-frame .note-status-output, .note-editor.note-airframe .note-status-output {
                height: auto;
        }
    </style>
    <?php } ?>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('crud_fields_scripts'); ?>
    <!-- include summernote js-->
    <?php Assets::echoJs('packages/summernote/dist/summernote-bs4.min.js'); ?>
    <?php if(! Assets::isLoaded('bpFieldInitSummernoteElement')) { Assets::markAsLoaded('bpFieldInitSummernoteElement');  ?>
    <script>
        function bpFieldInitSummernoteElement(element) {
             var summernoteOptions = element.data('options');

            let summernotCallbacks = { 
                onChange: function(contents, $editable) {
                    element.val(contents).trigger('change');
                }
            }

            element.on('CrudField:disable', function(e) {
                element.summernote('disable');
            });

            element.on('CrudField:enable', function(e) {
                element.summernote('enable');
            });
            
            summernoteOptions['callbacks'] = summernotCallbacks;
            
            element.summernote(summernoteOptions); 
        }
    </script>
    <?php } ?>
<?php $__env->stopPush(); ?>



<?php /**PATH /var/www/sequelone/data/www/s01.one/vendor/backpack/crud/src/resources/views/crud/fields/summernote.blade.php ENDPATH**/ ?>