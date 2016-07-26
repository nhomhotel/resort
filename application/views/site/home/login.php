<script type="text/javascript" src="<?php echo base_url()?>public/site/js/jquery.validate.js"></script>
<section>
    <div id="view">
        <div class="modal-auth modal-inline modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Đăng nhập</h4>
                    <p class="error info_result"><?php echo $this->session->flashdata("login_message"); ?></p>
                </div>
                <div class="modal-body">
                    <form accept-charset="UTF-8" action="<?php echo base_url().'home/login'?>" method="post" name="signin" id="signin-form"><div style="margin:0;padding:0;display:inline"><input name="utf8" type="hidden" value="&#x2713;" /><input name="authenticity_token" type="hidden" value="OqrtQgtHo5HUCnGv0mUTtoB4KKQ26LmXC+AVh5kdpcU=" /></div>
                        
                        <div class="form-group">
                            <input autocapitalize="none" autofocus="autofocus" class="form-control" id="email" name="email" placeholder="Email hoặc tài khoản đăng ký" type="email" required/>
                                <?php echo form_error('email');?>
                        </div>
                        <div class="form-group">
                            <input class="form-control" id="password" name="password" placeholder="Mật khẩu" type="password" required/>
                                <?php echo form_error('password');?>
                        </div>
                        <div class="form-group">
                            <a href="#" id="forgot-password" data-toggle="modal" data-target="#forgot-password-modal">Quên mật khẩu?</a>
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg btn-block ">Đăng nhập</button>
                    </form></div>
                <div class="modal-footer">
                    <p class="tip">Không có tài khoản? <a id="signin-signup" class="tclick" href="<?php echo base_url().'home/register'?>" data-tkey="Sign Up" data-tloc="Register Page">Đăng ký tại đây</a></p>
                </div>
            </div>
        </div>
        <div id="forgot-password-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="forgot-password-modal-title"><div class="modal-dialog" role="document"><div class="modal-content"></div></div></div>
    </div>
</section>
<script>
jQuery(function ($) {
    $("#signin-form").validate({
    rules: {
        email: {
            required: true,
            email: true
        },
        user_name:{
            required: true,
        },
        password: {
            required: true,
            minlength: 6
        }
    },
    messages: {
        password: {
            required: "Mật khẩu không được để trống",
            minlength: "Mật khẩu phải từ 6 ký tự trở lên"
        },
        email: {
            required:"email không được để trống",
            email:"email không đúng"
        }
    },

    submitHandler: function(form) {
        form.submit();
    }
});
    $('input').keyup(function(){
        $('.error.info_result').html('');
    })
})
</script>