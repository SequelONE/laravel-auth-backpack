<!-- Select template field. Used in Backpack/PageManager to redirect to a form with different fields if the template changes. A fork of the select_from_array field with an extra ID and an extra javascript file. -->
<?php echo $__env->make('crud::fields.inc.wrapper_start', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <label><?php echo e($field['label']); ?></label>
    <select
    	class="form-control"
        id="select_template"

    	<?php $__currentLoopData = $field; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(!is_array($value)): ?>
    		<?php echo e($attribute); ?>="<?php echo e($value); ?>"
            <?php endif; ?>
    	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    	>

        <?php if(isset($field['allows_null']) && $field['allows_null']==true): ?>
            <option value="">-</option>
        <?php endif; ?>

    	<?php if(count($field['options'])): ?>
    		<?php $__currentLoopData = $field['options']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    			<option value="<?php echo e($key); ?>"
					<?php if(isset($field['value']) && $key==$field['value']): ?>
						 selected
					<?php endif; ?>
    			><?php echo e($value); ?></option>
    		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    	<?php endif; ?>
	</select>

    <?php if(isset($field['hint'])): ?>
        <p class="help-block"><?php echo $field['hint']; ?></p>
    <?php endif; ?>
<?php echo $__env->make('crud::fields.inc.wrapper_end', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>





<?php if($crud->checkIfFieldIsFirstOfItsType($field, $fields)): ?>

    
    <?php $__env->startPush('crud_fields_scripts'); ?>
        <!-- select_template crud field JS -->
        <script>
            function redirect_to_new_page_with_template_parameter() {
                var new_template = $("#select_template").val();
                var current_url = "<?php echo e(Request::url()); ?>";

                window.location.href = strip_last_template_parameter(current_url)+'?template='+new_template;
            }

            function strip_last_template_parameter(url) {
                // if it's a create or edit link with a template parameter
                if (url.indexOf("/create/") > -1 || url.indexOf("/edit/") > -1)
                {
                    // remove the last parameter of the url
                    var url_array = url.split('/');
                    url_array = url_array.slice(0, -1);
                    var clean_url = url_array.join('/');

                    return clean_url;
                }

                return url;
            }

            jQuery(document).ready(function($) {
                $('#select_template').data('current', $('#select_template').val());

                $("#select_template").change(function(e) {
                    var select_template_confirmation = confirm("<?php echo app('translator')->get('backpack::pagemanager.change_template_confirmation'); ?>");
                    if (select_template_confirmation == true) {
                        redirect_to_new_page_with_template_parameter();
                    } else {
                        // txt = "You pressed Cancel!";
                        $('#select_template').val($('#select_template').data('current'));
                    }
                });

            });
        </script>
    <?php $__env->stopPush(); ?>

<?php endif; ?>


<?php /**PATH /var/www/sequelone/data/www/s01.one/resources/views/vendor/backpack/crud/fields/select_page_template.blade.php ENDPATH**/ ?>