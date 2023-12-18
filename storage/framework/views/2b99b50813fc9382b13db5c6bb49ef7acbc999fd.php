

<?php $__env->startSection('content'); ?>
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Add Product</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="<?php echo e(route('sales.show', [$sale->id])); ?>" class="btn btn-sm btn-primary">Back to List</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="<?php echo e(route('sales.product.store', $sale)); ?>" autocomplete="off">
                            <?php echo csrf_field(); ?>

                            <div class="pl-lg-4">
                                <input type="hidden" name="sale_id" value="<?php echo e($sale->id); ?>">
                                <div class="form-group<?php echo e($errors->has('product_id') ? ' has-danger' : ''); ?>">
                                    <label class="form-control-label" for="input-product">Product</label>
                                    <select name="product_id" id="input-product" class="form-select form-control-alternative<?php echo e($errors->has('product_id') ? ' is-invalid' : ''); ?>" required>
                                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($product['id'] == old('product_id')): ?>
                                                <option value="<?php echo e($product['id']); ?>" selected>[<?php echo e($product->category->name); ?>] <?php echo e($product->name); ?> - Base price: <?php echo e($product->price); ?>$</option>
                                            <?php else: ?>
                                                <option value="<?php echo e($product['id']); ?>">[<?php echo e($product->category->name); ?>] <?php echo e($product->name); ?> - Base price: <?php echo e($product->price); ?>$</option>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php echo $__env->make('alerts.feedback', ['field' => 'product_id'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>

                                <div class="form-group<?php echo e($errors->has('product_id') ? ' has-danger' : ''); ?>">
                                    <label class="form-control-label" for="input-price">Price per Unit</label>
                                    <input type="number" name="price" id="input-price" step=".01" class="form-control form-control-alternative<?php echo e($errors->has('product_id') ? ' is-invalid' : ''); ?>" value="0" required>
                                    <?php echo $__env->make('alerts.feedback', ['field' => 'product_id'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>

                                <div class="form-group<?php echo e($errors->has('product_id') ? ' has-danger' : ''); ?>">
                                    <label class="form-control-label" for="input-qty">Quantity</label>
                                    <input type="number" name="qty" id="input-qty" class="form-control form-control-alternative<?php echo e($errors->has('product_id') ? ' is-invalid' : ''); ?>" value="0" required>
                                    <?php echo $__env->make('alerts.feedback', ['field' => 'product_id'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>

                                <div class="form-group<?php echo e($errors->has('product_id') ? ' has-danger' : ''); ?>">
                                    <label class="form-control-label" for="input-total">Total Amount</label>
                                    <input type="text" name="total_amount" id="input-total" class="form-control form-control-alternative<?php echo e($errors->has('product_id') ? ' is-invalid' : ''); ?>" value="0$" disabled>
                                    <?php echo $__env->make('alerts.feedback', ['field' => 'product_id'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">Continue</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
    <script>
        new SlimSelect({
            select: '.form-select'
        });
    </script>
    <script>
        let input_qty = document.getElementById('input-qty');
        let input_price = document.getElementById('input-price');
        let input_total = document.getElementById('input-total');
        input_qty.addEventListener('input', updateTotal);
        input_price.addEventListener('input', updateTotal);
        function updateTotal () {
            input_total.value = (parseInt(input_qty.value) * parseFloat(input_price.value))+"$";
        }
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', ['page' => 'Add Product', 'pageSlug' => 'sales', 'section' => 'transactions'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\project najahah\laravel-inventory\resources\views/sales/addproduct.blade.php ENDPATH**/ ?>