<section>
    <div id="view">
        <div class="modal-auth modal-inline modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><?php echo lang('home_login')?></h4>
                </div>
                <div class="modal-body">
                    <form accept-charset="UTF-8" action="<?php echo base_url().'home/login'?>" method="post" name="signin"><div style="margin:0;padding:0;display:inline"><input name="utf8" type="hidden" value="&#x2713;" /><input name="authenticity_token" type="hidden" value="OqrtQgtHo5HUCnGv0mUTtoB4KKQ26LmXC+AVh5kdpcU=" /></div>
                        <div class="form-group">
                            <input autocapitalize="none" autofocus="autofocus" class="form-control" id="email" name="email" placeholder="Email" type="email" /><?php echo form_error('email');?>
                        </div>
                        <div class="form-group">
                            <input class="form-control" id="password" name="password" placeholder="<?php echo lang('comm_password')?>" type="password" value="" /><?php echo form_error('password');?>
                        </div>
                        <div class="form-group">
                            <a href="#" id="forgot-password" data-toggle="modal" data-target="#forgot-password-modal"><?php echo lang('comm_forgot')?></a>
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg btn-block "><?php echo lang('home_login')?></button>
                    </form></div>
                <div class="modal-footer">
                    <p class="tip"><?php echo lang('comm_is_account');?><a id="signin-signup" class="tclick" href="#" data-tkey="Sign Up" data-tloc="Register Page"><?php echo lang('home_register');?></a></p>
                </div>
            </div>
        </div>
        <div id="forgot-password-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="forgot-password-modal-title"><div class="modal-dialog" role="document"><div class="modal-content"></div></div></div>
    </div>
</section>