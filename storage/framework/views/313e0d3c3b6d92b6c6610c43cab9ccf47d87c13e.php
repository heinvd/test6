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
                            <?php if(Auth::user()->is_admin): ?>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <table class="table table-hover table-striped">
                                                    <thead>
                                                    <tr>
                                                        <th>
                                                            User Name
                                                        </th>
                                                        <th>
                                                            Email
                                                        </th>
                                                        <th>
                                                            Date Registered
                                                        </th>
                                                        <th>
                                                            Is Admin
                                                        </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                        <?php $__currentLoopData = $userss; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                                                        <tr>
                                                            <td>
                                                                <?php echo e($user->name); ?>

                                                            </td>
                                                            <td>
                                                                <?php echo e($user->email); ?>

                                                            </td>
                                                            <td>
                                                               <?php echo e($user->created_at); ?>

                                                            </td>
                                                            <td>
                                                                <?php if($user->is_admin) { echo 'Yes'; } else { echo 'No'; } ?>
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