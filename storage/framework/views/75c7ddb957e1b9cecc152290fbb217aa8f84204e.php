<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        <?php if(session('status')): ?>
                            <div class="alert alert-success">
                                <?php echo e(session('status')); ?>

                            </div>
                        <?php endif; ?>
                        <?php if(Auth::guest()): ?>
                            Please login to proceed
                        <?php else: ?>

                            <form role="form" method="POST" action="<?php echo e(url('topup')); ?>">
                                <?php echo e(csrf_field()); ?>



                                <div class="form-group">

                                    <label for="top_up_amount">
                                        Topup Amount
                                    </label>
                                    <select name="topup_amount">
                                        <option value="50">R50</option>
                                        <option value="100" selected>R100</option>
                                        <option value="500">R500</option>
                                    </select>

                                </div>
                                <input type="hidden" value="Account Top-up" name="trans_description">
                                <input type="hidden" value="1" name="trans_type">
                                <button type="submit" class="btn btn-primary">
                                    Topup my Account
                                </button>
                            </form>

                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>