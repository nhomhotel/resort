<script type="text/javascript" src="<?php echo base_url()?>public/site/js/jquery.validate.js"></script>
<section>
    <div id="view">
        <div class="modal-auth modal-inline modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><?php echo lang('home_login');?></h4>
                    <p class="error info_result"><?php echo $this->session->flashdata("login_message"); ?></p>
                </div>
                <div class="modal-body">
                    <form accept-charset="UTF-8" action="<?php echo base_url().'home/login'?>" method="post" name="signin" id="signin-form"><div style="margin:0;padding:0;display:inline"><input name="utf8" type="hidden" value="&#x2713;" /><input name="authenticity_token" type="hidden" value="OqrtQgtHo5HUCnGv0mUTtoB4KKQ26LmXC+AVh5kdpcU=" /></div>
                        
                        <div class="form-group">
                            <input autocapitalize="none" autofocus="autofocus" class="form-control" id="email" name="email" placeholder="Email" type="email" required/>
                                <?php echo form_error('email');?>
                        </div>
                        <div class="form-group">
                            <input class="form-control" id="password" name="password" placeholder="<?php echo lang('register_password')?>" type="password" required/>
                                <?php echo form_error('password');?>
                        </div>
                        <div class="form-group">
                            <a href="#" id="forgot-password" data-toggle="modal" data-target="#forgot-password-modal"><?php echo lang('home_fogot_password')?>?</a>
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg btn-block "><?php echo lang('home_login')?></button>
                    </form></div>
                <div class="modal-footer">
                    <p class="tip"><?php echo lang('login_have_not_account')?> <a id="signin-signup" class="tclick" href="<?php echo base_url().'home/register'?>" data-tkey="Sign Up" data-tloc="Register Page"><?php echo lang('home_register').' '.lang('register_here')?> </a></p>
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
            required: "<?php echo lang('register_password').' '.lang('register_not_empty');?>",
            minlength: "<?php echo lang('register_password').' '.lang('register_validate_minlength').' 6 '.lang('register_validate_character');?>"
        },
        email: {
            required:"Email <?php echo lang('register_not_empty')?>",
            email:"Email <?php echo lang('register_not_validate')?>"
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