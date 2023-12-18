<?php if(session($key ?? 'error')): ?>
    <div class="alert alert-danger" role="alert">
        <?php echo session($key ?? 'error'); ?>

    </div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\project najahah\laravel-inventory\resources\views/alerts/error.blade.php ENDPATH**/ ?>