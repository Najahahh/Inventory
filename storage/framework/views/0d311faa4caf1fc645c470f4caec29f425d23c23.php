<?php if(session($key ?? 'status')): ?>
    <div class="alert alert-success" role="alert">
        <?php echo session($key ?? 'status'); ?>

    </div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\project najahah\laravel-inventory\resources\views/alerts/success.blade.php ENDPATH**/ ?>