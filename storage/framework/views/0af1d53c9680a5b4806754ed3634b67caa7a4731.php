<div class="container-fluid">
    <div class="row">


            <?php  $products = DB::table('products')->get(); ?>

        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-4">
            <div class="jumbotron">
                <h2>
                    <?php echo e($product->product_name); ?>

                </h2>
                <p>
                    R <?php echo e(number_format($product->product_price,2)); ?>

                </p>
                <p>
                    <a class="btn btn-primary btn-large" href="<?php echo e(action('TransactionsController@buynow',$product->id_product)); ?>">Buy Now</a>
                </p>
            </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


    </div>
</div>