<div class="container">
    <div id="desk-external-variables-email_new" class="desk-external-variables" style="display: none;">
        <div id="system-snippets-name_required">Name is required.</div>
        <div id="system-snippets-email_required">Email address is required.</div>
        <div id="system-snippets-invalid_email">Invalid email address</div>
        <div id="system-snippets-subject_required">Subject is required</div>
        <div id="system-snippets-question_required">Question is required.</div>
        <div id="system-snippets-exceeding_max_chars">Exceeding max length of 5KB</div>
        <div id="max_number_attachments">5</div>
        <div id="system-snippets-add_attachment">Add Another Attachment</div>
    </div>
    <div id="breadcrumbs">
        <a href="/"><?php echo lang('comm_home') ?></a> › <?php echo lang('contact_email') ?>
    </div>
    <div id="contact-main">
        <div class="contact-body">
            <div class="content">
                <div id="form">
                    <div class="row">
                        <div class="col-xs-12 col-md-9">
                            <h3><?php echo lang('contact_email') ?></h3>
                            <form enctype="multipart/form-data" class="new_email" id="new_email" method="post" novalidate="novalidate">
                                <div class="input-block form-group">
                                    <div class="form-label"><?php echo lang('contact_your_name') ?> <span>(<?php echo lang('contact_required') ?>)</span></div>
                                    <input class="form-control" value="" id="interaction_name" maxlength="100" name="user_name" type="text">
                                    <div name="name_error" class="clear error"><?php echo form_error('user_name')?></div>
                                </div>
                                <div class="input-block form-group">
                                    <div class="form-label"><?php echo lang('contact_email') ?> <span>(<?php echo lang('contact_required') ?>)</span></div>
                                    <input class="form-control" value="" id="interaction_name" maxlength="100" name="user_email" type="email">
                                    <div name="name_error" class="clear error"><?php echo form_error('user_email')?></div>
                                </div>          
                                <div class="input-block">
                                    <div class="form-label">
                                        <?php echo lang('contact_subject') ?> <span>(<?php echo lang('contact_required') ?>)</span>
                                    </div>
                                    <div>
                                        <input class="form-control" id="email_subject" maxlength="100" name="user_subject" type="text" value="">
                                        <div name="name_error" class="clear error"><?php echo form_error('user_subject')?></div>
                                    </div>
                                </div>
                                <div class="input-block">
                                    <div class="form-label">
                                        <?php echo lang('contact_message') ?> <span>(<?php echo lang('contact_required') ?>)</span>
                                    </div>
                                    <div>
                                        <textarea class="form-control" id="email_body" name="user_body"></textarea>
                                        <div name="name_error" class="clear error"><?php echo form_error('user_body')?></div>
                                    </div>
                                </div>
                                <div class="input-block">
                                    <span class="form-labellabel">
                                        File Attachment
                                    </span>
                                    <div class="desk_file_upload">
                                        <input name="file_attachment" size="84" type="file">
                                        <div class="faux-file-field">
                                            <input disabled="disabled" type="text">
                                        </div>
                                    </div>
                                    <div name="name_error" class="clear error"><?php echo !empty($error_image)?$error_image:''?></div>
                                </div>
                                <div class="input-block">
                                    <?php echo!empty($captcha) ? $captcha : ''; ?>
                                    <div name="name_error" class="clear error"><?php echo !empty($captcha_error)?$captcha_error:''?></div>
                                </div>
                                <div>
                                    <div class="input-button" style="margin-top: 12px;">
                                        <input id="email_submit" class="btn btn-primary" name="commit" type="submit" value="<?php echo lang('contact_send') ?>">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-xs-12 col-md-3">
                            <div id="support-side">
                                <div class="content">
                                    <h3>Contact Us</h3>
                                    <ul>
                                        <li>
                                            <a href="<?php echo base_url() . 'help' ?>">Support</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>