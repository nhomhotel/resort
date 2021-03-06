<script type="text/javascript" src="<?php echo base_url() . 'public/admin/js/jquery.toaster.js' ?>"></script>

<div class="titleArea clearfix">
    <div class="wrapper clearfix col-md-12">
        <div class="pageTitle">
            <h5>Cấu hình hệ thống</h5>
            <span><?php echo isset($title) ? $title : ''; ?></span>
        </div>
        <div id="message"></div>
        <div class="horControlB menu_action">
            <ul>
                <li>
                </li>
            </ul>
        </div>
    </div>
</div>
<!--<div id="toaster"></div>-->
<div class="wrapper col-md-12  clearfix content">
    <div class="row">
        <div class="col-md-12">
            <form id="form_save_config" class="form-horizontal" role="form" action="<?php echo base_url() . 'admin/config/save' ?>" method="post">
                <div class="panel ">
                    <div class="panel-heading panel-piluku">
                        <h3 class="panel-title"><?php echo lang('config_info_resort'); ?></h3>
                    </div>
                    <div class="panel-body">
                        <!--<form class="form-horizontal" role="form">-->
                        <div class="form-group">
                            <label for="logo_company" class="col-sm-3 col-md-3 col-lg-2 control-label "><?php echo lang('config_logo_company'); ?></label>
                            <div class="col-sm-9 col-md-9 col-lg-10 input-field">
                                <input type="file" class="form-control" name="logo_company" id="logo_company"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="input_name_website" class="col-sm-3 col-md-3 col-lg-2 control-label "><?php echo lang('config_name_website'); ?></label>
                            <div class="col-sm-9 col-md-9 col-lg-10 input-field">
                                <input type="text" class="form-control" name="name_website" id="name_website" value="<?php echo $this->config->item('name_website'); ?>"/>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="panel">
                    <div class="panel-heading panel-piluku">
                        <h3 class="panel-title"><?php echo lang('config_system'); ?></h3>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="language" class="col-sm-3 col-md-3 col-lg-2 control-label "><?php echo lang('config_language'); ?></label>
                            <div class="col-sm-9 col-md-9 col-lg-10 input-field">
                                <select class="form-control" name="language">
                                    <?php
                                    if ($this->config->item('language') == 'vietnamese') {
                                        $languageViet = ' selected ';
                                        $languageEng = '';
                                    } else {
                                        $languageEng = ' selected ';
                                        $languageViet = '';
                                    }
                                    ?>
                                    <option value="vietnamese" <?php echo $languageViet; ?>><?php echo lang('config_lang_vn'); ?></option>
                                    <option value="english" <?php echo $languageEng; ?>><?php echo lang('config_lang_eng'); ?></option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="panel">
                    <div class="panel-heading panel-piluku">
                        <h3 class="panel-title"><?php echo 'Số đơn hàng hiển thị trên 1 trang'; ?></h3>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="item_per_page_site" class="col-sm-3 col-md-3 col-lg-2 control-label "><?php echo 'Ngoài website'; ?></label>
                            <div class="col-sm-9 col-md-9 col-lg-10 input-field">
                                <input type="text" name="item_per_page_site" class="form-control" value="<?php echo $this->config->item('item_per_page_site'); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="item_per_page_system" class="col-sm-3 col-md-3 col-lg-2 control-label "><?php echo 'Trong hệ thống'; ?></label>
                            <div class="col-sm-9 col-md-9 col-lg-10 input-field">
                                <input type="text" name="item_per_page_system" class="form-control" value="<?php echo $this->config->item('item_per_page_system'); ?>">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="panel">
                    <div class="panel-heading panel-piluku">
                        <h3 class="panel-title"><?php echo 'Thuế và ngoại tệ'; ?></h3>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="item_per_page_site" class="col-sm-3 col-md-3 col-lg-2 control-label "><?php echo 'Giá đã bao gôm thuế'; ?></label>
                            <div class="col-sm-9 col-md-9 col-lg-10 input-field">
                                <!--<input type="text" name="item_per_page_site" class="form-control" value="<?php // echo $this->config->item('item_per_page_site'); ?>">-->
                                <label><input type="checkbox" name="tax" value="1" <?php echo ($this->config->item('tax')==1)?"checked":'';?>></label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="thousands_separator" class="col-sm-3 col-md-3 col-lg-2 control-label "><?php echo 'Dấu phân cách đơn vị nghìn'; ?></label>
                            <div class="col-sm-9 col-md-9 col-lg-10 input-field">
                                <input type="text" name="thousands_separator" class="form-control" style="font-size: 25px !important;" value="<?php echo $this->config->item('thousands_separator'); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="decimal_point" class="col-sm-3 col-md-3 col-lg-2 control-label "><?php echo 'Dấu thập phân'; ?></label>
                            <div class="col-sm-9 col-md-9 col-lg-10 input-field">
                                <input type="text" name="decimal_point" class="form-control" style="font-size: 25px !important;" value="<?php echo $this->config->item('decimal_point'); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="decimal_point" class="col-sm-3 col-md-3 col-lg-2 control-label "><?php echo 'Làm tròn sau dấu phẩy'; ?></label>
                            <div class="col-sm-9 col-md-9 col-lg-10 input-field">
                                <input type="text" name="number_of_decimals" class="form-control" value="<?php echo $this->config->item('number_of_decimals'); ?>">
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="panel">
                    <div class="panel-heading panel-piluku">
                        <h3 class="panel-title"><?php echo lang('config_email_support'); ?></h3>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="language" class="col-sm-3 col-md-3 col-lg-2 control-label "><?php echo lang('config_address_email'); ?></label>
                            <div class="col-sm-9 col-md-9 col-lg-10 input-field">
                                <input type="text" name="address_email" class="form-control" value="<?php echo $this->config->item('address_email'); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="language" class="col-sm-3 col-md-3 col-lg-2 control-label "><?php echo lang('config_pass_email'); ?></label>
                            <div class="col-sm-9 col-md-9 col-lg-10 input-field">
                                <input type="password" name="pass_email" class="form-control" value=" <?php echo $this->config->item('pass_email'); ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <div >
                </div>
                <div class="form-actions">
                    <button type="submit" name="submitf" value="Thực hiện" id="submitf" class="submit_button floating-button btn btn-primary pull-right"><?php echo lang('config_submit_button') ?></button>
                </div>
                <div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $(document).on('submit', '#form_save_config', function () {
            var data = $(this).serialize();
            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: data,
                success: function (data) {
                    $.toaster('', data.message, data.title);
                },
                dataType: 'JSON',
            });
            return false;
        });
    })
</script>
<style>
</style>
