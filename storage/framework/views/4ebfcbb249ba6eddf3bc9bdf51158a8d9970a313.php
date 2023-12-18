

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('alerts.error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Client Information</h4>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Document</th>
                            <th>Telephone</th>
                            <th>Email</th>
                            <th>Balance</th>
                            <th>Purchases</th>
                            <th>Total Payment</th>
                            <th>Last purchase</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo e($client->id); ?></td>
                                <td><?php echo e($client->name); ?></td>
                                <td><?php echo e($client->document_type); ?>-<?php echo e($client->document_id); ?></td>
                                <td><?php echo e($client->phone); ?></td>
                                <td><?php echo e($client->email); ?></td>
                                <td>
                                    <?php if($client->balance > 0): ?>
                                        <span class="text-success"><?php echo e(format_money($client->balance)); ?></span>
                                    <?php elseif($client->balance < 0.00): ?>
                                        <span class="text-danger"><?php echo e(format_money($client->balance)); ?></span>
                                    <?php else: ?>
                                        <?php echo e(format_money($client->balance)); ?>

                                    <?php endif; ?>
                                </td>
                                <td><?php echo e($client->sales->count()); ?></td>
                                <td><?php echo e(format_money($client->transactions->sum('amount'))); ?></td>
                                <td><?php echo e((empty($client->sales)) ? date('d-m-y', strtotime($client->sales->reverse()->first()->created_at)) : 'N/A'); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
    <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">Latest Transactions</h4>
                        </div>
                        <div class="col-4 text-right">
                            <a href="<?php echo e(route('clients.transactions.add', $client)); ?>" class="btn btn-sm btn-primary">New Transaction</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <th>ID</th>
                            <th>Date</th>
                            <th>Method</th>
                            <th>Amount</th>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $client->transactions->reverse()->take(25); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($transaction->id); ?></td>
                                    <td><?php echo e(date('d-m-y', strtotime($transaction->created_at))); ?></td>
                                    <td><a href="<?php echo e(route('methods.show', $transaction->method)); ?>"><?php echo e($transaction->method->name); ?></a></td>
                                    <td><?php echo e(format_money($transaction->amount)); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">Latest Purchases</h4>
                        </div>
                        <div class="col-4 text-right">
                            <form method="post" action="<?php echo e(route('sales.store')); ?>">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="user_id" value="<?php echo e(Auth::id()); ?>">
                                <input type="hidden" name="client_id" value="<?php echo e($client->id); ?>">
                                <button type="submit" class="btn btn-sm btn-primary">New Purchase</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <th>ID</th>
                            <th>Date</th>
                            <th>products</th>
                            <th>Stock</th>
                            <th>Total Amount</th>
                            <th>State</th>
                            <th></th>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $client->sales->reverse()->take(25); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><a href="<?php echo e(route('sales.show', $sale)); ?>"><?php echo e($sale->id); ?></a></td>
                                    <td><?php echo e(date('d-m-y', strtotime($sale->created_at))); ?></td>
                                    <td><?php echo e($sale->products->count()); ?></td>
                                    <td><?php echo e($sale->products->sum('qty')); ?></td>
                                    <td><?php echo e(format_money($sale->products->sum('total_amount'))); ?></td>
                                    <td><?php echo e(($sale->finalized_at) ? 'FINISHED' : 'ON HOLD'); ?></td>
                                    <td class="td-actions text-right">
                                        <a href="<?php echo e(route('sales.show', $sale)); ?>" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="More Details">
                                            <i class="tim-icons icon-zoom-split"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', ['page' => 'Client Information', 'pageSlug' => 'clients', 'section' => 'clients'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\project najahah\laravel-inventory\resources\views/clients/show.blade.php ENDPATH**/ ?>