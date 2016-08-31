<div class="titleArea clearfix">
    <div class="wrapper clearfix col-md-12">
        <div class="pageTitle">
            <h5>Tùy chọn</h5>
            <span><?php echo $title; ?></span>
        </div>
        <div class="horControlB menu_action">
            <ul>
                <li>
                    <a href="<?php echo base_url('admin/area'); ?>">
                        <img src="<?php echo base_url(); ?>public/admin/images/icons/control/16/list.png" />
                        <span>Danh sách</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>

<div class="line"></div>
<div class="wrapper col-md-12  clearfix content">
    <?php if (isset($message) && $message) {
        $this->load->view('admin/message', $message);
    } ?>
    <form class="form" id="form" method="post">
        <fieldset>
            <?php if(isset($info)):?>
            <div class="widget">
                <div class="title">
                    <img src="<?php echo base_url(); ?>public/admin/images/icons/dark/add.png" class="titleIcon" />
                    <h6><?php echo $title; ?></h6>
                </div>								
                <div class="tab_container tab-content">
                    <div id='tab1' class="tab_content pd0 tab-pane active" role="tabpanel">
                        <div class="formRow">
                            <label class="formLeft" for="param_name">Tên tag:<span class="req">*</span></label>
                            <div class="formRight">
                                <span class="oneTwo">
                                    <input type="text" name="nameTag" id="param_name" _autocheck="true" value="<?php echo!(set_value('nameTag')) ? ($info->name) : (set_value('nameTag')); ?>" />
                                </span>
                                <span name="name_autocheck" class="autocheck"></span>
                                <div name="name_error" class="clear error"><?php echo form_error('nameTag'); ?></div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="formRow hide"></div>
                    </div> 
                </div><!-- End tab_container-->
                <div class="formSubmit">
                    <input type="submit" name="submit" value="Cập nhật" class="redB" />
                    <input type="reset" onclick="if (confirm('Bạn muốn hủy cập nhật và quay lại trang danh sách')) {
                                window.location = '<?php echo admin_url('helps/tag'); ?>';
                            }" value="Hủy bỏ" class="basic" />
                </div>
                <div class="clear"></div>
            </div>
            <?php endif;?>
        </fieldset>
    </form>
</div>