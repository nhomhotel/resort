<!-- Main content -->
<!-- Title area -->
<link rel="stylesheet" type="text/css" href="/public/admin/css/print-table.css" media="print,screen"/>
<div class="titleArea clearfix">
    <div class="wrapper clearfix col-md-12">
        <div class="pageTitle">
            <h5>Dánh sách phòng đã được đăng ký</h5>
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
    <?php
    if (isset($message) && $message) {
        $this->load->view('admin/message', $message);
    }
    ?>
    <div class="widget">
        <div class="title">
            <span class="titleIcon"><img src="<?php echo base_url(); ?>public/admin/images/icons/tableArrows.png"/></span>
            <h6><?php echo isset($title) ? $title : ''; ?></h6>

            <div class="num f12">Tổng số: <b><?php echo isset($total) ? $total : 0; ?></b></div>
        </div>
        <div class="table-responsive">
            <table>
<tr>
	<form>
		<td>
			<label for="post_room_name">Tên phòng</label></td><td>
			<input name="post_room_name" id="post_room_name" class="form-control"  autocomplete="off" value="<?php echo $this->input->get('post_room_name'); ?>" type="text"/>
		</td>
		<td>
			<label for="post_room_name">Tên phòng</label></td><td>
			<input name="post_room_name" id="post_room_name" class="form-control"  autocomplete="off" value="<?php echo $this->input->get('post_room_name'); ?>" type="text"/>
		</td>
		<td>
			<label for="post_room_name">Tên phòng</label></td><td>
			<input name="post_room_name" id="post_room_name" class="form-control"  autocomplete="off" value="<?php echo $this->input->get('post_room_name'); ?>" type="text"/>
		</td>
		<td>
			<input name="post_room_name" id="post_room_name" class="form-control"  autocomplete="off" value="<?php echo $this->input->get('post_room_name'); ?>" type="text"/>
			<input name="post_room_name" id="post_room_name" class="form-control"  autocomplete="off" value="<?php echo $this->input->get('post_room_name'); ?>" type="text"/>
		</td>
	</form>
	<td>
		<input name="post_room_name" id="post_room_name" class="form-control"  autocomplete="off" value="<?php echo $this->input->get('post_room_name'); ?>" type="text"/>
			<input name="post_room_name" id="post_room_name" class="form-control"  autocomplete="off" value="<?php echo $this->input->get('post_room_name'); ?>" type="text"/>
	</td>
</tr>
</table>
            
<?php if ($user->role_id == 1): ?>
<div class="">
<div id="do-excel" >
	<button type="button" class="button blueB"  data-toggle="modal" data-target="#myModalBill">Xuất hóa đơn</button>
	<?php $this->load->view('admin/order_room/phieu-chi', isset($phieu_chi) ? $phieu_chi : null); ?>
</div>
</div>
<div class="">
<div id="do-payment" >
	<button type="button" id="btn-do-payment" class="button blueB"  data-toggle="modal" data-target="#myModalPayment">Thanh toán</button>
	<?php $this->load->view('admin/order_room/paymentConfirmation', isset($phieu_chi) ? $phieu_chi : null); ?>
</div>
</div>
<?php endif; ?>
            <table class="table sTable mTable myTable">
                <thead class="title_order_room">
                    <tr>
                        <td class="hidden-print"><input type="checkbox" id="titleCheck" name="titleCheck" /></td>
                        <td>STT</td>
                        <td colspan="2" class="hidden-print" >Bài đăng</td>
                        <td colspan="1" class="hidden-screen">Bài đăng</td>
                        <td>Giá nhập</td>
                        <td>Giá bán</td>
                        <td>Lợi nhuận</td>
                        <td>Người thuê phòng</td>
                        <?php if ($user->role_id == 1): ?><td>Đối tác</td><?php endif; ?>
                        <td>Ngày nhận phòng</td>
                        <td>Ngày trả phòng</td>
                        <td>Số người ở</td>
                    </tr>
                </thead>
                <tfoot class="auto_check_pages">
                    <tr>
                        <td colspan="3"><button class="btn btn-primary print_order">In Danh sách</button></td>
                        <td colspan="14">
                            <div class='pagination'>
<?php echo isset($pagination_link) ? $pagination_link : ''; ?>
                            </div>
                        </td>
                    </tr>
                </tfoot>
                <tbody class="list_item">
                    <?php
                    if (isset($list)) {
                        $i = 0;
                        foreach ($list as $line => $row) {
                            $i++;
                            ?>
                            <tr class='row_20'>
                                <td class="textC hidden-print">
                                    <input type="checkbox" name="id[]" value="<?php echo $row->post_room_id; ?>" />
                                </td>
                                <td class="textC"><?php if (isset($start)) echo ($i + $start);
                            else echo $i; ?></td>
                                <td class="textC img_room hidden-print" >
                                    <a href="<?php echo base_url('room/room_detail/' . $row->post_room_id); ?>" target = "_blank">
        <?php
        $img = json_decode($row->image_list);
        ?>
                                        <img src="<?php if ($img[0] != '') echo $img['0'] ?>" width = "120px" height = "90px"/>
                                    </a>
                                </td>
                                <td class="textC" style="text-align: left;">
                                    <p class="room_name">
                                        <a href = "<?php echo base_url('room/room_detail/' . $row->post_room_id); ?>" target = "_blank"><?php echo $row->post_room_name; ?></a>
                                    </p>
                                </td>
                                <td class="textC price">
                                    <p class="price_vn price-item">
                                        <label>VND: <span><?php echo numberFormatToCurrency($row->payment_type - $row->payment_type * $profit[$line]->profit_rate / 100); ?></span></label>
                                    </p>
                                    <p class="price_en price-item">
                                        <label>USD: <span><?php echo numberFormatToCurrency($row->price_night_en - $row->price_night_en * $profit[$line]->profit_rate / 100); ?></span></label>
                                    </p>
                                </td>
                                <td class="textC price">
                                    <p class="price_vn price-item">
                                        <label>VND: <span><?php echo numberFormatToCurrency($row->payment_type); ?></span></label>
                                    </p>
                                    <p class="price_en price-item">
                                        <label>USD: <span><?php echo numberFormatToCurrency($row->price_night_en); ?></span></label>
                                    </p>
                                </td>
                                <td class="textC price">
                                    <p class="price_vn price-item">
                                        <label>VND: <span><?php echo '(' . $profit[$line]->profit_rate . '%) ' . numberFormatToCurrency($row->payment_type * $profit[$line]->profit_rate / 100); ?></span></label>
                                    </p>
                                    <p class="price_en price-item">
                                        <label>USD: <span><?php echo '(' . $profit[$line]->profit_rate . '%) ' . numberFormatToCurrency($row->price_night_en * $profit[$line]->profit_rate / 100); ?></span></label>
                                    </p>
                                </td>
                                <td class="textC">
                                    <p style="font-size: 14px;font-weight: 600"><?php echo $row->user_name; ?></p>
                                </td>
        <?php if ($user->role_id == 1): ?>
                                    <td class="textC price"><p style="font-size: 14px;font-weight: 600"><?php echo $profit[$line]->user_name ?></p></td>
        <?php endif; ?>
                                <td class="textC" id="status">
                                    <p style="font-size: 14px;font-weight: 600"><?php echo $row->checkin; ?></p>
                                </td>
                                <td class="textC" id="status">
                                    <p style="font-size: 14px;font-weight: 600"><?php echo $row->checkout; ?></p>
                                </td>
                                <td class="textC" id="status">
                                    <p style="font-size: 14px;font-weight: 600"><?php echo $row->guests; ?></p>
                                </td>
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
                <p style="color:red;font-size: 14px;padding: 0px;"><span class="glyphicon glyphicon-trash"></span> Bạn có muốn xóa bài đăng này ?</p>
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

    $('#paymented').on('click', function () {
        var url = '<?php echo admin_url('order_room/paymentStatus'); ?>';
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
    })
    
    $(function () {
        $("#post_room_name").autocomplete({
            source: "<?php echo site_url('admin/Order_room/suggest_name_room'); ?>",
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
                    var url = "<?php echo admin_url('Order_room/index?post_room_name=');?>"+encodeURI(ui.item.post_room_name);
                    if($('#user_name').val()!='') url+="&user_name="+encodeURI($('#user_name').val());
                    window.location.href = url;
                }
            }
        })
        .data("uiAutocomplete")._renderItem = function (ul, item) {
            return $("<li class='order-room-name-item'>").append("<a>" + item.post_room_name + "</a>").appendTo(ul);
        };
        ;
    });
    
    $(function () {
        $("#user_name").autocomplete({
            source: "<?php echo site_url('admin/Order_room/suggest_user_name'); ?>",
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
    function del(id) {
        var url = '<?php echo admin_url(); ?>';
        var urlDel = url + '/post_room/delete/' + id;
        $('#allow-Del').attr('href', urlDel);
        $("#modal_del").modal("show");
    }
    $(function () {
        $('.print_order').on('click', function () {
            var title_order_room = document.getElementsByClassName('title_order_room');
            var list_item = document.getElementsByClassName('list_item');
            var css = '<?php echo '<link rel="stylesheet" type="text/css" media="print" href="/public/admin/css/print-table.css"/>' ?>';
            var html = '<html>';

            html += '<head>';
            html += css;
            html += '</head>';
            html += '<body>';
            html += '<table>';
            html += title_order_room[0].outerHTML;
            html += list_item[0].outerHTML;
            html += '</table>';
            html += '</body>';
            html += '</html>';
            newWin = window.open("");
            newWin.document.write(html);
            newWin.print();
        })
    })
    
    $(function(){
        $("#btn-do-payment1").click(function(){
            var arrId = new Array();
        $('[name = "id[]"]:checked').each(function () {
            arrId.push($(this).val());
        });

        if (!arrId.length) {
            confirm('Không có phòng được lựa chọn!');
            return false;
        }

        if (!confirm('Thanh toán các phòng đã chọn!')) {
            return false;
        }
        var url = $('#submit').attr('url');
        console.log(arrId);
//        return false;
//        $.ajax({
//            url: url,
//            type: 'POST',
//            data: {'arrId': arrId},
//            success: function () {
//                $(arrId).each(function (id, val) {
//                    $('tr.row_' + val).fadeOut();
//                });
//            }
//        });
//        return false;
        })
    })
    
    $(function(){
        $('#btn-do-payment').on('click',function(){
            var arrId = new Array();
        $('[name="id[]"]:checked').each(function () {
            arrId.push($(this).val());
        });

        if (!arrId.length) {
            alert('Không có đơn hàng được lựa chọn!')
            return false;
        }

        if (!confirm('Thanh toán các đơn hàng đã chọn!')) {
            return false;
        }

        var url = $('#submit').attr('url');
        console.log(arrId);
        return true;
        })
    })
</script>