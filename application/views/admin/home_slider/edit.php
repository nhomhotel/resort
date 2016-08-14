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
                            <label class="formLeft" for="image_home_slider">Hình ảnh:</label>
                            <div class="formRight">
                                <input type="file" name="image_home_slider"/>
                                <span name="name_autocheck" class="autocheck"></span>
                                <img src="<?php echo isset($info)&&isset($info->image)?$info->image:''?>" style="width: 145px"/>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="formRow">
                            <label class="formLeft" for="link_home_slider">Link :</label>
                            <div class="formRight">
                                <span class="oneTwo">
                                    <input type="text" class="form-control" id="usr" name="link_home_slider">
                                </span>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="formRow">
                            <label class="formLeft" for="view_home_slider">hiển thị trên web:</label>
                            <div class="formRight">
                                <select name="view_home" class="form-control">
                                    <option value="1" <?php echo $info->view_home?' selected':'';?>>Hiển thị</option>
                                    <option value="0" <?php echo !$info->view_home?' selected':'';?>>Ẩn</option>
                                </select>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div style="margin-top: 10px">Ảnh không được nặng quá 4MB với kích thước chuẩn là 1920pixels x 1080 pixels</div>
                        <div class="formRow hide"></div>
                    </div> 
                </div><!-- End tab_container-->
                <div class="formSubmit">
                    <input type="submit" value="Thay đổi" class="redB" />
                    <input type="reset" value="Hủy bỏ" class="basic" />
                </div>
                <div class="clear"></div>
            </div>
        </fieldset>
    </form>
</div>