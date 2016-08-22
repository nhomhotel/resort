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
    <form class="form" id="form" method="post" enctype="multipart/form-data">
        <fieldset>
            <div class="widget">
                <div class="title">
                    <img src="<?php echo base_url(); ?>public/admin/images/icons/dark/add.png" class="titleIcon" />
                    <h6><?php echo $title; ?></h6>
                </div>								
                <div class="tab_container tab-content">
                    <div id='tab1' class="tab_content pd0 tab-pane active" role="tabpanel">
                        <div class="formRow">
                            <label class="formLeft" for="param_name">Tên khu vực:<span class="req">*</span></label>
                            <div class="formRight">
                                <span class="oneTwo">
                                    <input type="text" name="area_name" id="param_name" _autocheck="true" value="<?php echo!(set_value('name')) ? ($info->name) : (set_value('name')); ?>" />
                                </span>
                                <span name="name_autocheck" class="autocheck"></span>
                                <div name="name_error" class="clear error"><?php echo form_error('area_name'); ?></div>
                            </div>
                            <div class="clear"></div>
                        </div>

                        <div class="formRow">
                            <label class="formLeft" for="param_name">Tên khu vực (EN):<span class="req">*</span></label>
                            <div class="formRight">
                                <span class="oneTwo">
                                    <input type="text" name="area_name_en" id="param_name" _autocheck="true" value="<?php echo!(set_value('area_name_en')) ? ($info->name_en) : (set_value('area_name_en')); ?>" />
                                </span>
                                <span name="name_autocheck" class="autocheck"></span>
                                <div name="name_error" class="clear error"><?php echo form_error('area_name_en'); ?></div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="formRow">
                            <label class="formLeft" for="param_image">Ảnh đại diện:<span class="req">*</span></label>
                            <div class="formRight">
                                <input type="file" name="image_area"/>
                                <span name="name_autocheck" class="autocheck"></span>
                                <div name="image_area" class="clear error"><?php echo form_error('image_area'); ?></div>
                                <image src="<?php echo!(set_value('image')) ? ($info->image) : (set_value('image')); ?>" style="width: 145px"/>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="formRow">
                            <label class="formLeft" for="position_area">Vị trí hiển thị trên web:</label>
                            <div class="formRight">
                                <span class="oneTwo">
                                    <input type="text" class="form-control" id="usr" name="sort" value="<?php echo!(set_value('sort')) ? ($info->sort) : (set_value('sort')); ?>">
                                </span>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="formRow">
                            <label class="formLeft" for="view_footer">Vị trí hiển thị dưới footer:</label>
                            <div class="formRight">
                                <span class="oneTwo">
                                    <input type="text" class="form-control" id="usr" name="view_footer" value="<?php echo!(set_value('view_footer')) ? ($info->view_footer) : (set_value('view_footer')); ?>">
                                </span>
                            </div>
                            <div class="clear"></div>
                        </div>	
                        <div class="formRow hide"></div>
                    </div> 
                </div><!-- End tab_container-->
                <div class="formSubmit">
                    <input type="submit" name="submit" value="Cập nhật" class="redB" />
                    <input type="reset" onclick="if (confirm('Bạn muốn hủy cập nhật và quay lại trang danh sách')) {
                                window.location = '<?php echo admin_url('area'); ?>';
                            }" value="Hủy bỏ" class="basic" />
                </div>
                <div class="clear"></div>
            </div>
        </fieldset>
    </form>
</div>