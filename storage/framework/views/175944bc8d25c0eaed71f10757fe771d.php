<!-- JAVASCRIPT -->
<script src="<?php echo e(URL::asset('assets/libs/jquery/jquery.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/libs/metismenu/metisMenu.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/libs/simplebar/simplebar.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/libs/node-waves/waves.min.js')); ?>"></script>
<script>
    $('#change-password').on('submit',function(event){
        event.preventDefault();
        var Id = $('#data_id').val();
        var current_password = $('#current-password').val();
        var password = $('#password').val();
        var password_confirm = $('#password-confirm').val();
        $('#current_passwordError').text('');
        $('#passwordError').text('');
        $('#password_confirmError').text('');
        $.ajax({
            url: "<?php echo e(url('update-password')); ?>" + "/" + Id,
            type:"POST",
            data:{
                "current_password": current_password,
                "password": password,
                "password_confirmation": password_confirm,
                "_token": "<?php echo e(csrf_token()); ?>",
            },
            success:function(response){
                $('#current_passwordError').text('');
                $('#passwordError').text('');
                $('#password_confirmError').text('');
                if(response.isSuccess == false){ 
                    $('#current_passwordError').text(response.Message);
                }else if(response.isSuccess == true){
                    setTimeout(function () {   
                        window.location.href = "<?php echo e(route('root')); ?>"; 
                    }, 1000);
                }
            },
            error: function(response) {
                $('#current_passwordError').text(response.responseJSON.errors.current_password);
                $('#passwordError').text(response.responseJSON.errors.password);
                $('#password_confirmError').text(response.responseJSON.errors.password_confirmation);
            }
        });
    });
</script>

<?php echo $__env->yieldContent('script'); ?>

<!-- App js -->
<script src="<?php echo e(URL::asset('assets/js/app.js')); ?>"></script>

<<<<<<<< HEAD:storage/framework/views/7ff93452c1028d007d21cb728a6f59ac.php
<?php echo $__env->yieldContent('script-bottom'); ?><?php /**PATH C:\Users\CEYTECH\Documents\Projects\isuru\eltracmo\resources\views/layouts/vendor-scripts.blade.php ENDPATH**/ ?>
========
<?php echo $__env->yieldContent('script-bottom'); ?><?php /**PATH C:\projects\eltracmo\resources\views/layouts/vendor-scripts.blade.php ENDPATH**/ ?>
>>>>>>>> 91269df7989fe49b0b5182f0c8a061cd5dfd648d:storage/framework/views/175944bc8d25c0eaed71f10757fe771d.php
