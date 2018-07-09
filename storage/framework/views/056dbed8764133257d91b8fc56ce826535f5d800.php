<?php $__env->startSection('content'); ?>

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Manage Products</div>

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
                                                            Product Name
                                                        </th>
                                                        <th>
                                                            Product Price
                                                        </th>
                                                        <th>
                                                            Date Registered
                                                        </th>
                                                        <th>
                                                            Is Active
                                                        </th>
                                                        <th>
                                                            Action
                                                        </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                                                        <tr>
                                                            <td>
                                                                <?php echo e($product->product_name); ?>

                                                            </td>
                                                            <td>
                                                                <?php echo e($product->product_price); ?>

                                                            </td>
                                                            <td>
                                                               <?php echo e($product->created_at); ?>

                                                            </td>
                                                            <td>
                                                                <?php if($product->valid) { echo 'Yes'; } else { echo 'No'; } ?>
                                                            </td>
                                                            <td>
                                                                <a href="<?php echo e(action('ProductsController@edit',$product->id_product)); ?>" class="btn btn-primary">Edit</a>
                                                            </td>
                                                        </tr>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    <ul class="nav nav-tabs">
                                        <li class="nav-item">
                                            <a class="nav-link" href="adminProductsCreate">Add New</a>
                                        </li>
                                    </ul>

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