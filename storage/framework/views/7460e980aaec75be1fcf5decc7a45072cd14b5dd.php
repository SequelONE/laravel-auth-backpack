<input type="hidden" name="_http_referrer" value=<?php echo e(session('referrer_url_override') ?? old('_http_referrer') ?? \URL::previous() ?? url($crud->route)); ?>>


<?php if($crud->tabsEnabled() && count($crud->getTabs())): ?>
    <?php echo $__env->make('crud::inc.show_tabbed_fields', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <input type="hidden" name="_current_tab" value="<?php echo e(Str::slug($crud->getTabs()[0])); ?>" />
<?php else: ?>
  <div class="card">
    <div class="card-body row">
      <?php echo $__env->make('crud::inc.show_fields', ['fields' => $crud->fields()], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
  </div>
<?php endif; ?>




<?php $__env->startSection('after_styles'); ?>

    <!-- CRUD FORM CONTENT - crud_fields_styles stack -->
    <?php echo $__env->yieldPushContent('crud_fields_styles'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('after_scripts'); ?>

    <!-- CRUD FORM CONTENT - crud_fields_scripts stack -->
    <?php echo $__env->yieldPushContent('crud_fields_scripts'); ?>

    <script>
    function initializeFieldsWithJavascript(container) {
      var selector;
      if (container instanceof jQuery) {
        selector = container;
      } else {
        selector = $(container);
      }
      selector.find("[data-init-function]").not("[data-initialized=true]").each(function () {
        var element = $(this);
        var functionName = element.data('init-function');

        if (typeof window[functionName] === "function") {
          window[functionName](element);

          // mark the element as initialized, so that its function is never called again
          element.attr('data-initialized', 'true');
        }
      });
    }

    jQuery('document').ready(function($){

      // trigger the javascript for all fields that have their js defined in a separate method
      initializeFieldsWithJavascript('form');

      // Retrieves the current form data
      function getFormData() {
        return new URLSearchParams(new FormData(document.querySelector("main form"))).toString();
      }

      // Prevents unloading of page if form data was changed
      function preventUnload(event) {
        if (initData !== getFormData()) {
          // Cancel the event as stated by the standard.
          event.preventDefault();
          // Older browsers supported custom message
          event.returnValue = '';
        }
      }

      <?php if($crud->getOperationSetting('warnBeforeLeaving')): ?>
      const initData = getFormData();
      window.addEventListener('beforeunload', preventUnload);
      <?php endif; ?>

      // Save button has multiple actions: save and exit, save and edit, save and new
      var saveActions = $('#saveActions'),
      crudForm        = saveActions.parents('form'),
      saveActionField = $('[name="_save_action"]');

      saveActions.on('click', '.dropdown-menu a', function(){
          var saveAction = $(this).data('value');
          saveActionField.val( saveAction );
          crudForm.submit();
      });

      // Ctrl+S and Cmd+S trigger Save button click
      $(document).keydown(function(e) {
          if ((e.which == '115' || e.which == '83' ) && (e.ctrlKey || e.metaKey))
          {
              e.preventDefault();
              $("button[type=submit]").trigger('click');
              return false;
          }
          return true;
      });

      // prevent duplicate entries on double-clicking the submit form
      crudForm.submit(function (event) {
        window.removeEventListener('beforeunload', preventUnload);
        $("button[type=submit]").prop('disabled', true);
      });

      // Place the focus on the first element in the form
      <?php if( $crud->getAutoFocusOnFirstField() ): ?>
        <?php
          $focusField = Arr::first($fields, function($field) {
              return isset($field['auto_focus']) && $field['auto_focus'] == true;
          });
        ?>

        <?php if($focusField): ?>
          <?php
            $focusFieldName = isset($focusField['value']) && is_iterable($focusField['value']) ? $focusField['name'] . '[]' : $focusField['name'];
          ?>
          window.focusField = $('[name="<?php echo e($focusFieldName); ?>"]').eq(0),
        <?php else: ?>
          var focusField = $('form').find('input, textarea, select').not('[type="hidden"]').eq(0),
        <?php endif; ?>

        fieldOffset = focusField.offset().top,
        scrollTolerance = $(window).height() / 2;

        focusField.trigger('focus');

        if( fieldOffset > scrollTolerance ){
            $('html, body').animate({scrollTop: (fieldOffset - 30)});
        }
      <?php endif; ?>

      // Add inline errors to the DOM
      <?php if($crud->inlineErrorsEnabled() && $errors->any()): ?>

        window.errors = <?php echo json_encode($errors->messages()); ?>;

        $.each(errors, function(property, messages){

            var normalizedProperty = property.split('.').map(function(item, index){
                    return index === 0 ? item : '['+item+']';
                }).join('');

            var field = $('[name="' + normalizedProperty + '[]"]').length ?
                        $('[name="' + normalizedProperty + '[]"]') :
                        $('[name="' + normalizedProperty + '"]'),
                        container = field.parents('.form-group');
            
            // iterate the inputs to add invalid classes to fields and red text to the field container.
            container.children('input, textarea, select').each(function() {
                let containerField = $(this);
                // add the invalida class to the field.
                containerField.addClass('is-invalid');
                // get field container
                let container = containerField.parent('.form-group');
                
                // if container is a repeatable group we don't want to add red text to the whole group,
                // we only want to add it to the fields that have errors inside that repeatable.
                if(!container.hasClass('repeatable-group')){
                  container.addClass('text-danger');
                }
            });
            
            $.each(messages, function(key, msg){
                // highlight the input that errored
                var row = $('<div class="invalid-feedback d-block">' + msg + '</div>');
                row.appendTo(container);

                // highlight its parent tab
                <?php if($crud->tabsEnabled()): ?>
                var tab_id = $(container).closest('[role="tabpanel"]').attr('id');
                $("#form_tabs [aria-controls="+tab_id+"]").addClass('text-danger');
                <?php endif; ?>
            });
        });

      <?php endif; ?>

      $("a[data-toggle='tab']").click(function(){
          currentTabName = $(this).attr('tab_name');
          $("input[name='_current_tab']").val(currentTabName);
      });

      if (window.location.hash) {
          $("input[name='_current_tab']").val(window.location.hash.substr(1));
      }

      });
    </script>

    <?php echo $__env->make('crud::inc.form_fields_script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php /**PATH /var/www/sequelone/data/www/s01.one/vendor/backpack/crud/src/resources/views/crud/form_content.blade.php ENDPATH**/ ?>