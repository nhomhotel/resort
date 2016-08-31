<div class="titleArea clearfix">
    <div class="wrapper clearfix col-md-12">
        <div class="pageTitle">
            <h5>Tùy chọn</h5>
            <span><?php echo $title; ?></span>
        </div>
        <div class="horControlB menu_action">
            <ul>
                <li>
                    <a href="<?php echo base_url('admin/help/topic'); ?>">
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
    <form class="form" id="form" method="post" enctype="multipart/form-data">
        <fieldset>
            <div class="widget">
                <div class="title">
                    <img src="<?php echo base_url(); ?>public/admin/images/icons/dark/add.png" class="titleIcon" />
                    <h6><?php echo isset($title)?$title:''; ?></h6>
                </div>								
                <div class="tab_container tab-content">
                    <?php if(isset($info)):?>
                    <div id='tab1' class="tab_content pd0 tab-pane active" role="tabpanel">
                        <div class="formRow">
                            <label class="formLeft" for="param_name">Tiêu đề:<span class="req">*</span></label>
                            <div class="formRight">
                                <span class="oneTwo">
                                    <input type="text" name="titleTopic" id="param_name" _autocheck="true" value="<?php echo!(set_value('titleTopic')) ? ($info->title) : (set_value('titleTopic')); ?>" />
                                </span>
                                <span name="name_autocheck" class="autocheck"></span>
                                <div name="name_error" class="clear error"><?php echo form_error('titleTopic'); ?></div>
                            </div>
                            <div class="clear"></div>
                        </div>

                        <div class="formRow">
                            <label class="formLeft" for="param_name">Tiêu đề(EN):<span class="req">*</span></label>
                            <div class="formRight">
                                <span class="oneTwo">
                                    <input type="text" name="titleTopic_en" id="param_name" _autocheck="true" value="<?php echo!(set_value('titleTopic_en')) ? ($info->title_en) : (set_value('titleTopic_en')); ?>" />
                                </span>
                                <span name="name_autocheck" class="autocheck"></span>
                                <div name="name_error" class="clear error"><?php echo form_error('titleTopic_en'); ?></div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        
                        <div class="formRow">
                            <label class="formLeft" for="position_area">Trạng thái hiển thị:</label>
                            <div class="formRight">
                                <select name="statusTopic" class="form-control">
                                    <option value="1">Hiện</option>
                                    <option value="0" <?php echo $info->status==0?'select':'';?>>Ẩn</option>
                                </select>
                            </div>
                            <div class="clear"></div>
                        </div>
                       
                        <div class="formRow hide"></div>
                    </div> 
                    <?php endif;?>
                </div><!-- End tab_container-->
                <div class="formSubmit">
                    <input type="submit" name="submit" value="Cập nhật" class="redB" />
                    <input type="reset" onclick="if (confirm('Bạn muốn hủy cập nhật và quay lại trang danh sách')) {
                                window.location = '<?php echo admin_url('help/topic'); ?>';
                            }" value="Hủy bỏ" class="basic" />
                </div>
                <div class="clear"></div>
            </div>
        </fieldset>
    </form>
</div>