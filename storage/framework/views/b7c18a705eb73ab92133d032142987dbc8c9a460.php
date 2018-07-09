<?php $__env->startSection('content'); ?>

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Manage Products - Edit</div>

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

                                    <form role="form" method="POST" action="<?php echo e(action('ProductsController@update',$id_product)); ?>">
                                        <?php echo e(csrf_field()); ?>

                                        <input type="hidden" name="id_product" value="<?php echo e($id_product); ?>">

                                        <div class="form-group">

                                            <label for="product_name">
                                                Product Name
                                            </label>
                                            <input type="text" class="form-control" name="product_name" id="product_name" value="<?php echo e($product->product_name); ?>"/>
                                        </div>
                                        <div class="form-group">

                                            <label for="product_price">
                                                Price
                                            </label>
                                            <input type="text" class="form-control" name="product_price" id="product_price" value="<?php echo e($product->product_price); ?>" />
                                        </div>
                                        <div class="checkbox">

                                            <label>
                                                <input type="checkbox"  checked /> Active
                                            </label>
                                        </div>
                                        <button type="submit" class="btn btn-primary">
                                            Submit
                                        </button>
                                    </form>

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