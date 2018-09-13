<?php $__env->startSection('title', __('views.admin.users.show.title', ['name' => $doctor->name])); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <table class="table table-striped table-hover">
            <tbody>
            <tr>
                <th><?php echo e(__('views.admin.users.show.table_header_0')); ?></th>
                <td><img src="https://png.icons8.com/ios/1600/user-male-circle-filled.png"  alt="Pic" height="90" width="90" class="user-profile-image"></td>
                
            </tr>

            <tr>
                <th><?php echo e(__('views.admin.users.show.table_header_1')); ?></th>
                <td><?php echo e($doctor->name); ?></td>
            </tr>

            <tr>
                <th>Doctor Email</th>
                <td>
                    
                    <?php echo e($doctor->email); ?>

                    
                </td>
            </tr>

            <tr>
                <th>Hospital</th>
                <td>
                    <?php echo e($doctor->hospital); ?>

                </td>
            </tr>

            <tr>
                <th>Mobile</th>
                <td>
                    <?php echo e($doctor->mobile); ?>

                </td>
            </tr>



            <tr>
                <th></th>
                <td><a href="<?php echo e(URL::previous()); ?>" class="btn btn-light"><i class="fa fa-arrow-left"></i> Go Back</a></td>
                
            </tr>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>