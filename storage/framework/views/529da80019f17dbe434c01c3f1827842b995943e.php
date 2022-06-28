<?php
  $breadcrumbs = [
    trans('backpack::crud.admin') => backpack_url('dashboard'),
    trans('backpack::logmanager.log_manager') => backpack_url('log'),
    trans('backpack::logmanager.preview') => false,
  ];
?>

<?php $__env->startSection('header'); ?>
    <section class="container-fluid">
      <h2>
        <?php echo e(trans('backpack::logmanager.log_manager')); ?><small><?php echo e(trans('backpack::logmanager.file_name')); ?>: <i><?php echo e($file_name); ?></i></small>
        <small><a href="<?php echo e(backpack_url('log')); ?>" class="hidden-print font-sm"><i class="la la-angle-double-left"></i> <?php echo e(trans('backpack::logmanager.back_to_all_logs')); ?></a></small>
      </h2>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  <div id="accordion" role="tablist" aria-multiselectable="true">
    <?php $__empty_1 = true; $__currentLoopData = $logs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
      <div class="card mb-0 pb-0">
        <div class="card-header bg-<?php echo e($log['level_class']); ?>" role="tab" id="heading<?php echo e($key); ?>">
            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo e($key); ?>" aria-expanded="true" aria-controls="collapse<?php echo e($key); ?>" class="text-white">
              <i class="la la-<?php echo e($log['level_img']); ?>"></i>
              <span>[<?php echo e($log['date']); ?>]</span>
              <?php echo e(Str::limit($log['text'], 150)); ?>

            </a>
        </div>
        <div id="collapse<?php echo e($key); ?>" class="panel-collapse collapse p-3" role="tabpanel" aria-labelledby="heading<?php echo e($key); ?>">
          <div class="panel-body">
            <p><?php echo e($log['text']); ?></p>
            <pre><code class="php"><?php echo e(trim($log['stack'])); ?></code></pre>
          </div>
        </div>
      </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
      <h3 class="text-center">No Logs to display.</h3>
    <?php endif; ?>
  </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('after_scripts'); ?>
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/8.6/styles/default.min.css">
  <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/8.6/highlight.min.js"></script>
  <script>hljs.initHighlightingOnLoad();</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make(backpack_view('layouts.top_left'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/sequelone/data/www/s01.one/vendor/backpack/logmanager/src/resources/views/log_item.blade.php ENDPATH**/ ?>