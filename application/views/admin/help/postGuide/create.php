<style>
    .selector{
        z-index: 1000;
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
                                    <input type="hidden" class="form-control" name="tags" id="tags" value="">
                                    <div class="selectize-input">
                                        <input class="" name="tagsPostGuide" id="tagsPostGuide" autocomplete="off" type="text" >
                                    </div>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="formRow">
                            <label class="formLeft" for="param_name">thuộc topic:<span class="req">*</span></label>
                            <div class="formRight">
                                <select name="topicPostGuide" class="form-control">
                                    <option value="-1">--Chọn topic--</option>
                                    <?php if (isset($topics)): ?>
                                        <?php foreach ($topics as $row): ?>
                                            <option value="<?php echo $row->topic_id ?>"><?php echo $row->title ?></option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                                <span name="name_autocheck" class="autocheck"></span>
                                <div name="name_error" class="clear error"><?php echo form_error('topic'); ?></div>
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
<script>
    $(function () {
        $(document).keyup(function (e) {
            if (e.keyCode == 46) {
                var itemActive = $('.selectize-input .item.active');
                var tags = $("#tags");
                if (typeof itemActive != 'undefined') {
                    if (tags.val() != '') {
                        var elemt = tags.val().split(',');
                        console.log(elemt)
                        console.log(itemActive.data('value'));
                        console.log(elemt.indexOf(itemActive.data('value')));
                        //return;
                        var position = elemt.indexOf(itemActive.data('value').toString());
                        if (position > -1) {
                            elemt.splice(position, 1);
                            tags.val(elemt.toString());
                        }
                    }
                }
                $('.selectize-input .item.active').remove();
            }
        });
        $("#tagsPostGuide").autocomplete({
            source: function (request, response) {
                if ($('#tags') != undefined && $('#tags').val().trim() != '') {
                    var TagsID = $('#tags').val().trim();
                }
                var TagsID = $('#tags').val().trim();
                $.ajax({
                    url: '<?php echo site_url('admin/helps/suggest_tag'); ?>',
                    data: {term: request.term, Tags: TagsID},
                    dataType: "json",
                    type: "get",
                    success: function (data) {
                        response($.map(data, function (item) {
                            return {
                                name: item.name,
                                tag_id: item.tag_id
                            }
                        }));
                    },
                    error: function (response) {
                        alert(response.responseText);
                    },
                    failure: function (response) {
                        alert(response.responseText);
                    }
                });
            },
            dataType: "json",
            minLength: 1,
            messages: {
                noResults: '',
                results: function () {}
            },
            error: function (e, v) {
                alert(e);
                alert(v)
            },
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
                    $(".selectize-input").append("<div data-value='" + ui.item.tag_id + "' class='item' >" + ui.item.name + "</div>");
                    var tags = $("#tags");
                    if (tags.val() != '') {
                        var elemt = tags.val().split(',');
                        if (elemt.indexOf(ui.item.tag_id) == -1) {
                            elemt.push(ui.item.tag_id);
                            tags.val(elemt.toString());
                        }
                    } else
                        tags.val(ui.item.tag_id);

                    $('.selectize-input .item').tagAddActive();
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