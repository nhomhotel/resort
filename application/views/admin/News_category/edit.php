<div class="titleArea clearfix">
    <div class="wrapper clearfix col-md-12">
        <div class="pageTitle">
            <h5>Tùy chọn</h5>
            <span><?php echo $title; ?></span>
        </div>
        <div class="horControlB menu_action">
            <ul>
                <li>
                    <a href="<?php echo base_url('admin/News_category'); ?>">
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
                            <label class="formLeft" for="param_name">Mô tả:<span class="req">*</span></label>
                            <div class="formRight">
                                <span class="oneTwo">
                                   <textarea name="News_category_name"  _autocheck="true" ><?php echo!(set_value('News_category_description')) ? ($info->description) : (set_value('News_category_description')); ?></textarea>
                                </span>
                                <span name="name_autocheck" class="autocheck"></span>
                                <div name="name_error" class="clear error"><?php echo form_error('News_category_description'); ?></div>
                            </div>
                            <div class="clear"></div>
                        </div>

                        <div class="formRow">
                            <label class="formLeft" for="param_name">Mô tả (EN):<span class="req">*</span></label>
                            <div class="formRight">
                                <span class="oneTwo">
                                    <textarea name="News_category_name_en"  _autocheck="true" ><?php echo!(set_value('News_category_description_en')) ? ($info->description_en) : (set_value('News_category_name_en')); ?></textarea>
                                </span>
                                <span name="name_autocheck" class="autocheck"></span>
                                <div name="name_error" class="clear error"><?php echo form_error('News_category_description_en'); ?></div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="formRow">
                            <label class="formLeft" for="param_image">Ảnh đại diện:<span class="req">*</span></label>
                            <div class="formRight">
                                <input type="file" name="image_News_category"/>
                                <span name="name_autocheck" class="autocheck"></span>
                                <div name="image_News_category" class="clear error"><?php echo form_error('image_News_category'); ?></div>
                                <image src="<?php echo!(set_value('image')) ? ($info->image) : (set_value('image')); ?>" style="width: 145px"/>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="formRow">
                            <label class="formLeft" for="position_News_category">Trạng thái:</label>
                            <div class="formRight">
                                <select name="status_news_category" class="form-control">
                                    <option value="1" >Hiển thị</option>
                                    <option value="0" <?php if($info->status==0) echo ' selected';?>>Ẩn</option>
                                </select>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="formRow hide"></div>
                    </div> 
                </div><!-- End tab_container-->
                <div class="formSubmit">
                    <input type="submit" name="submit" value="Cập nhật" class="redB" />
                    <input type="reset" onclick="if (confirm('Bạn muốn hủy cập nhật và quay lại trang danh sách')) {
                                window.location = '<?php echo admin_url('News_category'); ?>';
                            }" value="Hủy bỏ" class="basic" />
                </div>
                <div class="clear"></div>
            </div>
        </fieldset>
    </form>
</div>