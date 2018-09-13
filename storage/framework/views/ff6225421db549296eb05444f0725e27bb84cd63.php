<?php $__env->startSection('body_class','login'); ?>

<?php $__env->startSection('content'); ?>
    <div>
        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">
                    <?php echo e(Form::open(['route' => 'login'])); ?>

                        <h1><?php echo e(__('views.auth.login.header')); ?></h1>

                        <div>
                            <input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>"
                                   placeholder="<?php echo e(__('views.auth.login.input_0')); ?>" required autofocus>
                        </div>
                        <div>
                            <input id="password" type="password" class="form-control" name="password"
                                   placeholder="<?php echo e(__('views.auth.login.input_1')); ?>" required>
                        </div>
                        <div class="checkbox al_left">
                            <label>
                                <input type="checkbox"
                                       name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>> <?php echo e(__('views.auth.login.input_2')); ?>

                            </label>
                        </div>

                        <?php if(session('status')): ?>
                            <div class="alert alert-success">
                                <?php echo e(session('status')); ?>

                            </div>
                        <?php endif; ?>

                        <?php if(!$errors->isEmpty()): ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $errors->first(); ?>

                            </div>
                        <?php endif; ?>

                        <div>
                            <button class="btn btn-default submit" type="submit"><?php echo e(__('views.auth.login.action_0')); ?></button>
                            <a class="reset_pass" href="<?php echo e(route('password.request')); ?>">
                                <?php echo e(__('views.auth.login.action_1')); ?>

                            </a>
                        </div>

                        

                        
                    <?php echo e(Form::close()); ?>

                </section>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
    ##parent-placeholder-bf62280f159b1468fff0c96540f3989d41279669##

    <?php echo e(Html::style(mix('assets/auth/css/login.css'))); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('auth.layouts.auth', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>