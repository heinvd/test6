<?php $__env->startSection('content'); ?>

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Manage Users</div>

                    <div class="panel-body">
                        <?php if(session('status')): ?>
                            <div class="alert alert-success">
                                <?php echo e(session('status')); ?>

                            </div>
                        <?php endif; ?>
                        <?php if(Auth::guest()): ?>
                            Please login to proceed
                        <?php else: ?>
                            <?php if(Auth::user()): ?>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <table class="table table-hover table-striped">
                                                    <thead>
                                                    <tr>
                                                        <th>
                                                            Transaction Date
                                                        </th>
                                                        <th>
                                                            Transaction Description
                                                        </th>
                                                        <th align="right">
                                                            Transaction Value
                                                        </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                        <?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                                                        <tr>
                                                            <td>
                                                                <?php echo e($transaction->created_at); ?>

                                                            </td>
                                                            <td>
                                                                <?php echo e($transaction->trans_description); ?>

                                                            </td>
                                                            <td align="right">
                                                               R <?php echo e(number_format($transaction->trans_value,2)); ?>

                                                            </td>
                                                        </tr>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </tbody>
                                                </table>
                                            </div>
                                        </div>



                            <?php else: ?>
                                You are not authorised to view this page
                            <?php endif; ?>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>