        <!-- jQuery and jQuery UI (REQUIRED) -->
        <link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css" />
        <?php if(!isset ($jquery) || (isset($jquery) && $jquery == true)): ?>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <?php endif; ?>
        <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>

        <!-- elFinder JS (REQUIRED) -->
        <script src="<?php echo e(asset($dir.'/js/elfinder.min.js')); ?>"></script>

        <?php if($locale): ?>
            <!-- elFinder translation (OPTIONAL) -->
            <script src="<?php echo e(asset($dir."/js/i18n/elfinder.$locale.js")); ?>"></script>
        <?php endif; ?><?php /**PATH /var/www/sequelone/data/www/s01.one/resources/views/vendor/elfinder/common_scripts.blade.php ENDPATH**/ ?>