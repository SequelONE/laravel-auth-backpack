<?php if(config('backpack.base.scripts') && count(config('backpack.base.scripts'))): ?>
    <?php $__currentLoopData = config('backpack.base.scripts'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $path): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <script type="text/javascript" src="<?php echo e(asset($path).'?v='.config('backpack.base.cachebusting_string')); ?>"></script>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>

<?php if(config('backpack.base.mix_scripts') && count(config('backpack.base.mix_scripts'))): ?>
    <?php $__currentLoopData = config('backpack.base.mix_scripts'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $path => $manifest): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <script type="text/javascript" src="<?php echo e(mix($path, $manifest)); ?>"></script>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>

<?php echo $__env->make('backpack::inc.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- page script -->
<script type="text/javascript">
    // To make Pace works on Ajax calls
    $(document).ajaxStart(function() { Pace.restart(); });

    // polyfill for `startsWith` from https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/String/startsWith
    if (!String.prototype.startsWith) {
    Object.defineProperty(String.prototype, 'startsWith', {
        value: function(search, rawPos) {
            var pos = rawPos > 0 ? rawPos|0 : 0;
            return this.substring(pos, pos + search.length) === search;
        }
    });
    }



    // polyfill for entries and keys from https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Object/entries#polyfill
    if (!Object.keys) Object.keys = function(o) {
        if (o !== Object(o))
            throw new TypeError('Object.keys called on a non-object');
        var k=[],p;
        for (p in o) if (Object.prototype.hasOwnProperty.call(o,p)) k.push(p);
        return k;
    }

    if (!Object.entries) {
        Object.entries = function( obj ){
            var ownProps = Object.keys( obj ),
                i = ownProps.length,
                resArray = new Array(i); // preallocate the Array
            while (i--)
            resArray[i] = [ownProps[i], obj[ownProps[i]]];
            return resArray;
        };
    }

    // Ajax calls should always have the CSRF token attached to them, otherwise they won't work
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    
    var activeTab = $('[href="' + location.hash.replace("#", "#tab_") + '"]');
    location.hash && activeTab && activeTab.tab('show');
    $('.nav-tabs a').on('shown.bs.tab', function (e) {
        location.hash = e.target.hash.replace("#tab_", "#");
    });
</script>

<?php if(config('app.debug')): ?>
    <?php echo $__env->make('crud::inc.ajax_error_frame', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?><?php /**PATH /var/www/sequelone/data/www/s01.one/vendor/backpack/crud/src/resources/views/base/inc/scripts.blade.php ENDPATH**/ ?>