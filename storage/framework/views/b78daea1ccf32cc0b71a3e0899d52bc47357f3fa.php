<?php
  $defaultBreadcrumbs = [
    trans('backpack::crud.admin') => url(config('backpack.base.route_prefix'), 'dashboard'),
    $crud->entity_name_plural => url($crud->route),
    trans('backpack::crud.list') => false,
  ];

  // if breadcrumbs aren't defined in the CrudController, use the default breadcrumbs
  $breadcrumbs = $breadcrumbs ?? $defaultBreadcrumbs;
?>

<?php $__env->startSection('header'); ?>
  <div class="container-fluid">
    <h2>
      <span class="text-capitalize"><?php echo $crud->getHeading() ?? $crud->entity_name_plural; ?></span>
      <small id="datatable_info_stack"><?php echo $crud->getSubheading() ?? ''; ?></small>
    </h2>
  </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  <!-- Default box -->
  <div class="row">

    <!-- THE ACTUAL CONTENT -->
    <div class="<?php echo e($crud->getListContentClass()); ?>">

        <div class="row mb-0">
          <div class="col-sm-6">
            <?php if( $crud->buttons()->where('stack', 'top')->count() ||  $crud->exportButtons()): ?>
              <div class="d-print-none <?php echo e($crud->hasAccess('create')?'with-border':''); ?>">

                <?php echo $__env->make('crud::inc.button_stack', ['stack' => 'top'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

              </div>
            <?php endif; ?>
          </div>
          <div class="col-sm-6">
            <div id="datatable_search_stack" class="mt-sm-0 mt-2 d-print-none"></div>
          </div>
        </div>

        
        <?php if($crud->filtersEnabled()): ?>
          <?php echo $__env->make('crud::inc.filters_navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>

        <table
          id="crudTable"
          class="bg-white table table-striped table-hover nowrap rounded shadow-xs border-xs mt-2"
          data-responsive-table="<?php echo e((int) $crud->getOperationSetting('responsiveTable')); ?>"
          data-has-details-row="<?php echo e((int) $crud->getOperationSetting('detailsRow')); ?>"
          data-has-bulk-actions="<?php echo e((int) $crud->getOperationSetting('bulkActions')); ?>"
          cellspacing="0">
            <thead>
              <tr>
                
                <?php $__currentLoopData = $crud->columns(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $column): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <th
                    data-orderable="<?php echo e(var_export($column['orderable'], true)); ?>"
                    data-priority="<?php echo e($column['priority']); ?>"
                    

                    
                    <?php if(isset($column['exportOnlyField']) && $column['exportOnlyField'] === true): ?>
                      data-visible="false"
                      data-visible-in-table="false"
                      data-can-be-visible-in-table="false"
                      data-visible-in-modal="false"
                      data-visible-in-export="true"
                      data-force-export="true"
                    <?php else: ?>
                      data-visible-in-table="<?php echo e(var_export($column['visibleInTable'] ?? false)); ?>"
                      data-visible="<?php echo e(var_export($column['visibleInTable'] ?? true)); ?>"
                      data-can-be-visible-in-table="true"
                      data-visible-in-modal="<?php echo e(var_export($column['visibleInModal'] ?? true)); ?>"
                      <?php if(isset($column['visibleInExport'])): ?>
                         <?php if($column['visibleInExport'] === false): ?>
                           data-visible-in-export="false"
                           data-force-export="false"
                         <?php else: ?>
                           data-visible-in-export="true"
                           data-force-export="true"
                         <?php endif; ?>
                       <?php else: ?>
                         data-visible-in-export="true"
                         data-force-export="false"
                       <?php endif; ?>
                    <?php endif; ?>
                  >
                    
                    <?php if($loop->first && $crud->getOperationSetting('bulkActions')): ?>
                      <?php echo View::make('crud::columns.inc.bulk_actions_checkbox')->render(); ?>

                    <?php endif; ?>
                    <?php echo $column['label']; ?>

                  </th>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php if( $crud->buttons()->where('stack', 'line')->count() ): ?>
                  <th data-orderable="false"
                      data-priority="<?php echo e($crud->getActionsColumnPriority()); ?>"
                      data-visible-in-export="false"
                      ><?php echo e(trans('backpack::crud.actions')); ?></th>
                <?php endif; ?>
              </tr>
            </thead>
            <tbody>
            </tbody>
            <tfoot>
              <tr>
                
                <?php $__currentLoopData = $crud->columns(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $column): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <th>
                    
                    <?php if($loop->first && $crud->getOperationSetting('bulkActions')): ?>
                      <?php echo View::make('crud::columns.inc.bulk_actions_checkbox')->render(); ?>

                    <?php endif; ?>
                    <?php echo $column['label']; ?>

                  </th>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php if( $crud->buttons()->where('stack', 'line')->count() ): ?>
                  <th><?php echo e(trans('backpack::crud.actions')); ?></th>
                <?php endif; ?>
              </tr>
            </tfoot>
          </table>

          <?php if( $crud->buttons()->where('stack', 'bottom')->count() ): ?>
          <div id="bottom_buttons" class="d-print-none text-center text-sm-left">
            <?php echo $__env->make('crud::inc.button_stack', ['stack' => 'bottom'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <div id="datatable_button_stack" class="float-right text-right hidden-xs"></div>
          </div>
          <?php endif; ?>

    </div>

  </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('after_styles'); ?>
  <!-- DATA TABLES -->
  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('packages/datatables.net-bs4/css/dataTables.bootstrap4.min.css')); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('packages/datatables.net-fixedheader-bs4/css/fixedHeader.bootstrap4.min.css')); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('packages/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')); ?>">

  <!-- CRUD LIST CONTENT - crud_list_styles stack -->
  <?php echo $__env->yieldPushContent('crud_list_styles'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('after_scripts'); ?>
  <?php echo $__env->make('crud::inc.datatables_logic', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <!-- CRUD LIST CONTENT - crud_list_scripts stack -->
  <?php echo $__env->yieldPushContent('crud_list_scripts'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make(backpack_view('blank'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/sequelone/data/www/s01.one/vendor/backpack/crud/src/resources/views/crud/list.blade.php ENDPATH**/ ?>