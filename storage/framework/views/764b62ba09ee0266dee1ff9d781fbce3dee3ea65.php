<?php $__env->startSection('content'); ?>

    <div class="container-fluid">
    <div class="row">

        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="panel panel-default">
                            <div class="panel-heading">Are you sure you want to purchase this item?</div>

                            <div class="panel-body">
                         <h2>
                    <?php echo e($product->product_name); ?>

                </h2>
                <p>
                    R <?php echo e(number_format($product->product_price,2)); ?>  (discount)
                </p>
                <p>
                                <form role="form" method="POST" action="<?php echo e(action('TransactionsController@purchase',$product->id_product)); ?>">
                                    <?php echo e(csrf_field()); ?>


                                    <input type="hidden" class="form-control" name="trans_type" value="-1" />
                                    <input type="hidden" class="form-control" name="purchase_amount" value="<?php echo e($product->product_price); ?>"  />
                                    <input type="hidden" class="form-control" name="trans_description" value="Purchase of <?php echo e($product->product_name); ?>" />

                                    <button type="submit" class="btn btn-primary">
                                        Submit
                                    </button>
                                </form>                </p>
            </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>


    </div>
</div>
    </div>

    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>