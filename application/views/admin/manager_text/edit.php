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
                            <label class="formLeft" for="title">Tiêu đề :</label>
                            <div class="formRight">
                                <span class="oneTwo">
                                    <input type="text" class="form-control" id="usr" name="title" value="<?php echo isset($info)? $info->title:'';?>">
                                </span>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="formRow">
                            <label class="formLeft" for="title_en">Tiêu đề(en) :</label>
                            <div class="formRight">
                                <span class="oneTwo">
                                    <input type="text" class="form-control" id="usr" name="title_en" value="<?php echo isset($info)? $info->title_en:'';?>">
                                </span>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="formRow">
                            <label class="formLeft" for="content">Nội dung:</label>
                            <div class="formRight">
                                <span class="oneTwo">
                                    <input type="text" class="form-control" id="usr" name="content" value="<?php echo isset($info)? $info->content:'';?>">
                                </span>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="formRow">
                            <label class="formLeft" for="content_en">Nội dung(en):</label>
                            <div class="formRight">
                                <span class="oneTwo">
                                    <input type="text" class="form-control" id="usr" name="content_en" value="<?php echo isset($info)? $info->content_en:'';?>">
                                </span>
                            </div>
                            <div class="clear"></div>
                        </div>
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