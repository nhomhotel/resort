<style>
    .selectize-input{
        color: #333333;
        font-family: inherit;
        font-size: inherit;
        line-height: 20px;
        -webkit-font-smoothing: inherit;
        background: #ffffff;
        cursor: text;
        display: inline-block;
        padding: 6px 12px;
        display: inline-block;
        width: 100%;
        overflow: hidden;
        position: relative;
        z-index: 1;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        -webkit-box-shadow: none;
        box-shadow: none;
        -webkit-border-radius: 0px !important;
        -moz-border-radius: 0px !important;
        border-radius: 0px !important;
        min-height: 34px;
        padding: 6px 8px 3px;
        padding: 5px 12px 2px;
        padding-left: 9px;
        padding-right: 9px;
    }
    .selectize-input .item{
        vertical-align: baseline;
        display: -moz-inline-stack;
        display: inline-block;
        zoom: 1;
        vertical-align: baseline;
        display: -moz-inline-stack;
        margin: 0 3px 3px 0;
        padding: 2px 6px;
        background: #f2f2f2;
        border: 0 solid #d0d0d0;
        margin: 0 3px 3px 0;
        padding: 1px 3px;
        background: #efefef;
        color: #333333;
        border: 0 solid rgba(0, 0, 0, 0);
        cursor: pointer;
    }
    .selectize-input .item.active{
        background: #428bca;
        color: #ffffff;
        border: 0 solid rgba(0, 0, 0, 0);
    }
</style>
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
                                <div class="oneTwo">
                                    <input type="hidden" class="form-control" name="tags" value="">
                                    <div class="selectize-input">
                                        <input class="" name="tagsPostGuide" id="tagsPostGuide" autocomplete="off" type="text" >
                                    </div>
                                </div>
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
            open: function (event) {
                $('.ui-autocomplete').css('height', 'auto');
                var $input = $(event.target),
                        inputTop = $input.offset().top,
                        inputHeight = $input.height(),
                        autocompleteHeight = $('.ui-autocomplete').height(),
                        windowHeight = $(window).height();
                if ((inputHeight + inputTop + autocompleteHeight) > windowHeight) {
                    $('.ui-autocomplete').css('height', (windowHeight - inputHeight - inputTop - 20) + 'px');
                }
            },
            select: function (event, ui) {
                event.preventDefault();
                if (ui.item.name != undefined && ui.item.tag_id != undefined) {
//                    $("#tagsPostGuide").val(ui.item.name);
                    $(".selectize-input").append("<div data-value='" + ui.item.tag_id + "' class='item' >" + ui.item.name + "</div>");
                    $('.selectize-input .item').on('click',function(){
                        $(this).addClass('active');
                    })
                    $('.selectize-input .item').each(function(){
                        $(this).addClass('active');
                    })
                    $('#tagsPostGuide').val('');
                    $('#tagsPostGuide').focus();
                }
            }
        })
                .data("uiAutocomplete")._renderItem = function (ul, item) {
            return $("<li class='name-item'>").append("<a>" + item.name + "</a>").appendTo(ul);
        };
    });
</script>