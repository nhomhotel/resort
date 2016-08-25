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
                            <label class="formLeft" for="param_name">Tiêu đề:<span class="req">*</span></label>
                            <div class="formRight">
                                <span class="oneTwo">
                                    <input  class="form-control" name="News_category_title" value="<?php echo set_value('News_category_title'); ?>"  _autocheck="true" />
                                </span>
                                <span name="name_autocheck" class="autocheck"></span>
                                <div name="name_error" class="clear error"><?php echo form_error('News_category_title'); ?></div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="formRow">
                            <label class="formLeft" for="param_name">Tiêu đề(en):<span class="req">*</span></label>
                            <div class="formRight">
                                <span class="oneTwo">
                                    <input class="form-control" name="News_category_title_en" value="<?php echo set_value('News_category_title_en'); ?>"  _autocheck="true" />
                                </span>
                                <span name="name_autocheck" class="autocheck"></span>
                                <div name="name_error" class="clear error"><?php echo form_error('News_category_title_en'); ?></div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="formRow">
                            <label class="formLeft" for="param_name">Mô tả:<span class="req">*</span></label>
                            <div class="formRight">
                                <span class="oneTwo">
                                    <textarea name="News_category_description" value="<?php echo set_value('News_category_description_en'); ?>"  _autocheck="true" ></textarea>
                                </span>
                                <span name="name_autocheck" class="autocheck"></span>
                                <div name="name_error" class="clear error"><?php echo form_error('News_category_description_en'); ?></div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="formRow">
                            <label class="formLeft" for="param_name">Mô tả (EN):<span class="req">*</span></label>
                            <div class="formRight">
                                <span class="oneTwo">
                                    <span class="oneTwo">
                                    <textarea name="News_category_description_en" value="<?php echo set_value('News_category_description_en'); ?>"  _autocheck="true" ></textarea>
                                </span>
                                </span>
                                <span name="name_autocheck" class="autocheck"></span>
                                <div name="name_error" class="clear error"><?php echo form_error('News_category_description_en'); ?></div>
                            </div>
                            <div class="clear"></div>
                        </div>

                        <div class="formRow">
                            <label class="formLeft" for="status_News_category">trạng thái:</label>
                            <div class="formRight">
                                <select name="status_news_category" class="form-control">
                                <option value="1">Hiển thị</option>
                                <option value="">Ẩn</option>
                                </select>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="formRow">
                            <label class="formLeft" for="image_News_category">Hình ảnh:</label>
                            <div class="formRight">
                                <input type="file" name="image_News_category"/>
                                <span name="name_autocheck" class="autocheck"></span>
                                <div name="image_News_category" class="clear error"><?php echo form_error('image_News_category'); ?></div>
                            </div>
                            <div class="clear"></div>
                        </div>	

                        <div class="formRow hide"></div>
                    </div> 
                </div><!-- End tab_container-->
                <div class="formSubmit">
                    <input type="submit" value="Thêm mới" class="redB" />
                    <input type="reset" value="Hủy bỏ" class="basic" />
                </div>
                <div class="clear"></div>
            </div>
        </fieldset>
    </form>
</div>