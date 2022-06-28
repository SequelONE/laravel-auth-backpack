<?php
  $breadcrumbs = [
    trans('backpack::crud.admin') => backpack_url('dashboard'),
    trans('backpack::logmanager.log_manager') => backpack_url('log'),
    trans('backpack::logmanager.existing_logs') => false,
  ];
?>

<?php $__env->startSection('header'); ?>
    <section class="container-fluid">
      <h2>
        <?php echo e(trans('backpack::logmanager.log_manager')); ?><small><?php echo e(trans('backpack::logmanager.log_manager_description')); ?></small>
      </h2>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!-- Default box -->
  <div class="card">
    <div class="card-body p-0">
      <table class="table table-hover table-condensed pb-0 mb-0">
        <thead>
          <tr>
            <th>#</th>
            <th><?php echo e(trans('backpack::logmanager.file_name')); ?></th>
            <th><?php echo e(trans('backpack::logmanager.date')); ?></th>
            <th><?php echo e(trans('backpack::logmanager.last_modified')); ?></th>
            <th class="text-right"><?php echo e(trans('backpack::logmanager.file_size')); ?></th>
            <th><?php echo e(trans('backpack::logmanager.actions')); ?></th>
          </tr>
        </thead>
        <tbody>
          <?php $__currentLoopData = $files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <th scope="row"><?php echo e($key + 1); ?></th>
            <td><?php echo e($file['file_name']); ?></td>
            <td><?php echo e(\Carbon\Carbon::createFromTimeStamp($file['last_modified'])->formatLocalized('%d %B %Y')); ?></td>
            <td><?php echo e(\Carbon\Carbon::createFromTimeStamp($file['last_modified'])->formatLocalized('%H:%M')); ?></td>
            <td class="text-right"><?php echo e(round((int)$file['file_size']/1048576, 2).' MB'); ?></td>
            <td>
                <a class="btn btn-sm btn-link" href="<?php echo e(url(config('backpack.base.route_prefix', 'admin').'/log/preview/'. encrypt($file['file_name']))); ?>"><i class="la la-eye"></i> <?php echo e(trans('backpack::logmanager.preview')); ?></a>
                <a class="btn btn-sm btn-link" href="<?php echo e(url(config('backpack.base.route_prefix', 'admin').'/log/download/'.encrypt($file['file_name']))); ?>"><i class="la la-cloud-download"></i> <?php echo e(trans('backpack::logmanager.download')); ?></a>
                <?php if(config('backpack.logmanager.allow_delete')): ?>
                    <a class="btn btn-sm btn-link" data-button-type="delete" href="<?php echo e(url(config('backpack.base.route_prefix', 'admin').'/log/delete/'.encrypt($file['file_name']))); ?>"><i class="la la-trash-o"></i> <?php echo e(trans('backpack::logmanager.delete')); ?></a>
                <?php endif; ?>
            </td>
          </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
      </table>

    </div><!-- /.box-body -->
  </div><!-- /.box -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('after_scripts'); ?>
<script>
  jQuery(document).ready(function($) {

    // capture the delete button
    $("[data-button-type=delete]").click(function(e) {
        e.preventDefault();
        var delete_button = $(this);
        var delete_url = $(this).attr('href');

        if (confirm("<?php echo e(trans('backpack::logmanager.delete_confirm')); ?>") == true) {
            $.ajax({
                url: delete_url,
                type: 'DELETE',
                data: {
                  _token: "<?php echo csrf_token(); ?>"
                },
                success: function(result) {
                    // delete the row from the table
                    delete_button.parentsUntil('tr').parent().remove();

                    // Show an alert with the result
                    new Noty({
                        text: "<strong><?php echo e(trans('backpack::logmanager.delete_confirmation_title')); ?></strong><br><?php echo e(trans('backpack::logmanager.delete_confirmation_message')); ?>",
                        type: "success"
                    }).show();
                },
                error: function(result) {
                    // Show an alert with the result
                    new Noty({
                        text: "<strong><?php echo e(trans('backpack::logmanager.delete_error_title')); ?></strong><br><?php echo e(trans('backpack::logmanager.delete_error_message')); ?>",
                        type: "warning"
                    }).show();
                }
            });
        } else {
            new Noty({
                text: "<strong><?php echo e(trans('backpack::logmanager.delete_cancel_title')); ?></strong><br><?php echo e(trans('backpack::logmanager.delete_cancel_message')); ?>",
                type: "info"
            }).show();
        }
      });

  });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make(backpack_view('layouts.top_left'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/sequelone/data/www/s01.one/vendor/backpack/logmanager/src/resources/views/logs.blade.php ENDPATH**/ ?>