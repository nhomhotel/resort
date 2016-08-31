<div class="titleArea clearfix">
    <div class="wrapper clearfix col-md-12">
        <div class="pageTitle">
            <h5>Tùy chọn</h5>
            <span><?php echo $title; ?></span>
        </div>
        <div class="horControlB menu_action">
            <ul>
                <li>
                    <a href="<?php echo base_url('admin/help/postGuide'); ?>">
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
                                    <input type="text" name="titlePostGuide" id="param_name" _autocheck="true" value="<?php echo set_value('titlePostGuide'); ?>" />
                                </span>
                                <span name="name_autocheck" class="autocheck"></span>
                                <div name="name_error" class="clear error"><?php echo form_error('titlePostGuide'); ?></div>
                            </div>
                            <div class="clear"></div>
                        </div>

                        <div class="formRow">
                            <label class="formLeft" for="param_name">Tiêu đề(EN):<span class="req">*</span></label>
                            <div class="formRight">
                                <span class="oneTwo">
                                    <input type="text" name="titlePostGuide_en" id="param_name" _autocheck="true" value="<?php echo set_value('titlePostGuide_en'); ?>" />
                                </span>
                                <span name="name_autocheck" class="autocheck"></span>
                                <div name="name_error" class="clear error"><?php echo form_error('titlePostGuide_en'); ?></div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        
                        <div class="formRow">
                            <label class="formLeft" for="param_name">Nội dung:<span class="req">*</span></label>
                            <div class="formRight">
                                <span class="oneTwo">
                                    <input type="text" name="contentPostGuide" id="param_name" _autocheck="true" value="<?php echo set_value('contentPostGuide'); ?>" />
                                </span>
                                <span name="name_autocheck" class="autocheck"></span>
                                <div name="name_error" class="clear error"><?php echo form_error('contentPostGuide'); ?></div>
                            </div>
                            <div class="clear"></div>
                        </div>

                        <div class="formRow">
                            <label class="formLeft" for="param_name">Nội dung(EN):<span class="req">*</span></label>
                            <div class="formRight">
                                <span class="oneTwo">
                                    <input type="text" name="contentPostGuide_en" id="param_name" _autocheck="true" value="<?php echo set_value('contentPostGuide_en'); ?>" />
                                </span>
                                <span name="name_autocheck" class="autocheck"></span>
                                <div name="name_error" class="clear error"><?php echo form_error('contentPostGuide_en'); ?></div>
                            </div>
                            <div class="clear"></div>
                        </div>

                        <div class="formRow">
                            <label class="formLeft" for="position_area">Trạng thái:</label>
                            <div class="formRight">
                                <select name="statusPostGuide" class="form-control">
                                    <option value="1">Hiện</option>
                                    <option value="0">Ẩn</option>
                                </select>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="formRow">
                            <label class="formLeft" for="tag">Tag:</label>
                            <div class="formRight">
                                <span class="oneTwo">
                                    <input type="text" class="form-control" id="tagsPostGuide" name="tagsPostGuide">
                                    <input type="hidden" class="form-control" id="tagsPostGuide" name="tags" value="">
                                </span>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="formRow">
                            <span class="oneTwo">Tag được phân cách bằng dấu phẩy, và</span>
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
<script>
$(function () {
        $("#tagsPostGuide").autocomplete({
            source: "<?php echo site_url('admin/helps/suggest_tag'); ?>",
            dataType: "json",
            minLength: 1,
            open: function(event) {
                $('.ui-autocomplete').css('height', 'auto');
                var $input = $(event.target),
                inputTop = $input.offset().top,
                inputHeight = $input.height(),
                autocompleteHeight = $('.ui-autocomplete').height(),
                windowHeight = $(window).height();
                if ((inputHeight + inputTop+ autocompleteHeight) > windowHeight) {
                    $('.ui-autocomplete').css('height', (windowHeight - inputHeight - inputTop - 20) + 'px');
                }
            },
            select: function (event, ui) {
                event.preventDefault();
                if ( ui.item.user_name != undefined) {
                    $("#tagsPostGuide").val(ui.item.user_name);
                    var url = "<?php echo admin_url('Order_room/index?user_name=');?>"+encodeURI(ui.item.user_name);
                    if($('#post_room_name').val()!='') url+="&post_room_name="+encodeURI($('#post_room_name').val());
                    window.location.href = url;
                }
            }
        })
                .data("uiAutocomplete")._renderItem = function (ul, item) {
            return $("<li class='user-name-item'>").append("<a>" + item.user_name + "</a>").appendTo(ul);
        };
        ;
    });
</script>