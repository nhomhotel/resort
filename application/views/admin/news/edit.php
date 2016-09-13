<script type="text/javascript" src="<?php echo base_url(); ?>public/ckeditor/ckeditor.js"></script>
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
                            <label class="formLeft" for="param_name">Tiêu đề tin:<span class="req">*</span></label>
                            <div class="formRight">
                                <span class="oneTwo">
                                    <input type="text" name="titleNews" id="param_name" _autocheck="true" value="<?php echo!(set_value('title')) ? ($info->title) : (set_value('title')); ?>" />
                                </span>
                                <span name="name_autocheck" class="autocheck"></span>
                                <div name="name_error" class="clear error"><?php echo form_error('titleNews'); ?></div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        
                        <div class="formRow">
                            <label class="formLeft" for="param_name">Nội dung tin :<span class="req">*</span></label>
                            <div class="formRight">
                                    <?php
                                        echo form_textarea(array(
                                            'name' => 'contentNews',
                                            'id' => 'contentNews',
                                            'class' => 'ckeditor form-control',
                                            'rows' => "5",
                                            'value' => $info->content)
                                        );
                                        ?>
                                <span name="name_autocheck" class="autocheck"></span>
                                <div name="name_error" class="clear error"><?php echo form_error('contentNews'); ?></div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <script type="text/javascript">
                            CKEDITOR.replace("contentNews");
                        </script>
                        
                        <div class="formRow">
                            <label class="formLeft" for="statusNews">Trạng thái:<span class="req">*</span></label>
                            <div class="formRight">
                                <select name="statusNews" class="form-control">
                                    <option value="1"> Hiện</option>
                                    <option value="0" <?php echo !empty($info->status)?' selected':'';?>> Ẩn</option>
                                </select>
                            </div>
                            <div class="clear"></div>
                        </div>
                        
                        <div class="formRow">
                            <label class="formLeft" for="newsCategory">Danh mục tin:</label>
                            <div class="formRight">
                                <select name="newsCategory" class="form-control">
                                    <?php if(!empty($news_category)):?>
                                        <?php foreach ($news_category as $row):?>
                                        <option value="<?php echo $row->news_category_id?>" <?php echo ($info->news_category_id==$row->news_category_id)?' selected':'';?>><?php echo $row->title;?></option>
                                        <?php endforeach;?>
                                    <?php endif;?>
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
                                window.location = '<?php echo admin_url('area'); ?>';
                            }" value="Hủy bỏ" class="basic" />
                </div>
                <div class="clear"></div>
            </div>
        </fieldset>
    </form>
</div>