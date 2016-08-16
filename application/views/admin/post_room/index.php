<!-- Main content -->
<!-- Title area -->
<div class="titleArea clearfix">
    <div class="wrapper clearfix col-md-12">
        <div class="pageTitle">
            <h5>Quản lý phòng</h5>
            <span><?php echo isset($title) ? $title : ''; ?></span>
        </div>
        <div class="horControlB menu_action">
            <ul>
                <li>
                    <a href="<?php echo admin_url('post_room/post'); ?>">
                        <img src="<?php echo base_url(); ?>public/admin/images/icons/control/16/add.png"/>
                        <span>Đăng phòng</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="line"></div>
<!-- Message -->
<!-- Main content wrapper -->
<div class="wrapper col-md-12  clearfix content">
    <?php if (isset($message) && $message) {
        $this->load->view('admin/message', $message);
    } ?>
    <div class="widget">
        <div class="title">
            <span class="titleIcon"><img src="<?php echo base_url(); ?>public/admin/images/icons/tableArrows.png"/></span>
            <h6><?php echo isset($title) ? $title : ''; ?></h6>

            <div class="num f12">Tổng số: <b><?php echo isset($total) ? $total : 0; ?></b></div>
        </div>
        <div class="table-responsive">
            <table class="table sTable mTable myTable" id="checkAll">
                <thead class="filter">
                    <tr>
                        <td colspan="17">
                            <form class="form-inline form_filter form" method="get">

                                <table class="table-filter" cellpadding="0" cellspacing="0">
                                    <tbody>
                                        <tr>
                                            <td class="label-tit">
                                                <label for="post_room_name">Tên phòng</label>
                                            </td>
                                            <td class="item">
                                                <input name="post_room_name" id="post_room_name"  autocomplete="off" value="<?php echo $this->input->get('post_room_name'); ?>" type="text"/>
                                            </td>
                                            <?php if($user->role_id==1):?>
                                            <td class="label-tit">
                                                <label for="user_name">Tài khoản đăng</label>
                                            </td>
                                            <td class="item">
                                                <input name="user_name" value="<?php echo $this->input->get('user_name'); ?>" id="user_name" type="text"/>
                                            </td>
                                            <?php endif;?>
                                            <td colspan='2'>
                                                <input type="submit" class="button blueB" value="Lọc"/>
                                                <input type="reset" class="basic" value="Reset"
                                                       onclick="window.location.href = '<?php echo admin_url('post_room'); ?>';">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>
                        </td>
                    </tr>
                </thead>
                <thead>
                    <tr>
                        <td>STT</td>
                        <td colspan="2">Tên căn/phòng</td>
                        <td>Giá phòng</td>
                        <td>Người đăng</td>
                        <td>trạng thái</td>
                        <td>Created</td>
                        <?php if($user->role_id==1):?>
                        <td>Hành động</td>
                        <?php endif;?>
                        <td>ID</td>
                    </tr>
                </thead>
                <tfoot class="auto_check_pages">
                    <tr>
                        <td colspan="17">
                            <div class='pagination'>
<?php echo isset($pagination_link) ? $pagination_link : ''; ?>
                            </div>
                        </td>
                    </tr>
                </tfoot>
                <tbody class="list_item">
                    <?php
                    if (isset($list_room)) {
                        $i = 0;
                        foreach ($list_room as $row) {
                            $i++;
                            ?>
                            <tr class='row_20'>
                                <td class="textC"><?php if(isset($start))echo ($i+$start); else echo $i; ?></td>
                                <td class="textC img_room" >
                                    <a href="<?php echo base_url('admin/post_room/edit/' . $row->post_room_id); ?>" >
        <?php $img = json_decode($row->image_list); ?>
                                        <img src="<?php echo $img['0'] ?>" width = "120px" height = "90px"/>
                                    </a>
                                </td>
                                <td class="textC" style="text-align: left;">
                                    <p class="room_name">
                                        <a href = "<?php echo base_url('admin/post_room/edit/' . $row->post_room_id); ?>" ><?php echo $row->post_room_name; ?></a>
                                    </p>
                                    <p class="address"><?php echo $row->address_detail ?></p>
                                    <p class="info_room">
        <?php echo '<span>' . $row->house_type_name . '</span>'; ?>
                                    <p>
                                        <span class="num_bed">Phòng ngủ: <?php echo $row->num_bed; ?></span>
                                        -
                                        <span class="num_bed">Số khách tối đa: <?php echo $row->num_guest; ?></span>
                                    </p>
                                    </p>
                                    <p><a class="btn btn-default lowercase" href="<?php echo base_url('admin/post_room/calendar/'.$row->post_room_id); ?>"><strong>Lịch đặt phòng trong tháng</strong></a></p>
                                </td>
                                <td class="textC price">
                                    <p class="price_vn price-item">
                                        <label>VND: <span><?php echo number_format($row->price_night_vn, 0, ",", "."); ?></span></label>
                                    </p>
                                    <p class="price_en price-item">
                                        <label>USD: <span><?php echo number_format($row->price_night_en, 0, ",", "."); ?></span></label>
                                    </p>
                                </td>
                                <td class="textC">
                                    <p style="font-size: 14px;font-weight: 600"><?php echo $row->user_name; ?></p>
                                    <p><?php echo $row->role_name; ?></p>
                                </td>
                                <td class="textC" id="status">
        <?php if ($row->status == 1) { ?>
                                        <a href="javascript:void(0)" onclick="status(<?php echo $row->post_room_id; ?>)" class="lightbox" title="block">
                                            <img src="<?php echo base_url(); ?>public/admin/images/icons/color/tick.png" />
                                        </a>
                                        <?php } else {
                                        ?>
                                        <a href="javascript:void(0)" onclick="status(<?php echo $row->post_room_id; ?>)" class="lightbox" title="active">
                                            <img src="<?php echo base_url(); ?>public/admin/images/icons/color/block.png" />
                                        </a>
                                        <?php }
                                    ?>
                                </td>
                                <td class="textC"><?php echo date('d-m-Y - H:i:s', strtotime($row->created)); ?></td>
                                <?php if($user->role_id==1):?>
                                <td class="textC">
                                    <a href="javascript:void(0)" class="lightbox" title="delete" onclick="del(<?php echo $row->post_room_id; ?>)">
                                        <img src="<?php echo base_url(); ?>public/admin/images/icons/color/uninstall.png" />
                                    </a>
                                </td>
                                <?php endif;?>
                                <td class="textC"><?php echo $row->post_room_id; ?></td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="clear mt30"></div>
</div>
<div class="modal fade bs-example-modal-sm" id="modal_del" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Xóa</h4>
            </div>
            <div class="modal-body">
                <p style="color:red;font-size: 14px;padding: 0px;"><span class="glyphicon glyphicon-trash"></span> Bạn có muốn xóa tên căn/phòng này ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">hủy</button>
                <a href="#" id="allow-Del" class="btn btn-primary">Xóa</a>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function status(id) {
        var url = '<?php echo admin_url('post_room/status'); ?>';
        var urlCurrent = window.location.href;
        $.ajax({
            url: url,
            type: "POST",
            data: {'id': id},
            dataType: 'text',
            success: function (result) {
                $(".myTable").load(urlCurrent + " .myTable");
            }
        });
    }

    function del(id) {
        var url = '<?php echo admin_url(); ?>';
        var urlDel = url + '/post_room/delete/' + id;
        $('#allow-Del').attr('href', urlDel);
        $("#modal_del").modal("show");
    }
    
    $(function () {
        $("#post_room_name").autocomplete({
            source: "<?php echo site_url('admin/Post_room/suggest_name_room'); ?>",
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
                if (ui.item.post_room_id != undefined && ui.item.post_room_name != undefined) {
                    $("#post_room_name").val(ui.item.post_room_name);
                    var url = "<?php echo admin_url('Post_room/index?post_room_name=');?>"+ui.item.post_room_name;
                    <?php if($user->role_id==1):?>
                    if($('#user_name').val()!='') url+="&user_name="+$('#user_name').val();
                    <?php endif;?>
                    window.location.href = url;
                }
            }
        })
                .data("uiAutocomplete")._renderItem = function (ul, item) {
            return $("<li class='post-room-name-item'>").append("<a>" + item.post_room_name + "</a>").appendTo(ul);
        };
        ;
    });
    <?php if($user->role_id==1):?>
    $(function () {
        $("#user_name").autocomplete({
            source: "<?php echo site_url('admin/Post_room/suggest_user_name'); ?>",
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
                    $("#user_name").val(ui.item.user_name);
                    var url = "<?php echo admin_url('Post_room/index?user_name=');?>"+ui.item.user_name;
                    if($('#post_room_name').val()!='') url+="&post_room_name="+$('#post_room_name').val();
                    window.location.href = url;
                }
            }
        })
                .data("uiAutocomplete")._renderItem = function (ul, item) {
            return $("<li class='user-name-item'>").append("<a>" + item.user_name + "</a>").appendTo(ul);
        };
        ;
    });
    <?php endif;?>
</script>