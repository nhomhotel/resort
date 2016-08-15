<!-- Main content -->
<!-- Title area -->
<link rel="stylesheet" type="text/css" href="/public/admin/css/print-table.css" media="print,screen"/>
<script type="text/javascript" src="<?php echo base_url()?>public/admin/js/jquery.toaster.js"></script>
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
        <div class="table-responsive" style="width: 100%">
            <table class="table sTable mTable myTable">
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
                                            <td class="label-tit">
                                                <label for="user_name">Tên đối tác</label>
                                            </td>
                                            <td class="item">
                                                <input name="user_name" value="<?php echo $this->input->get('user_name'); ?>" id="user_name" type="text"/>
                                            </td>
                                            <td class="label-tit">
                                                <label for="status">Trạng thái</label>
                                            </td>
                                            <td class="item">
                                                <select name="status">
                                                    <option value="">--</option>
                                                    <option value="paid" <?php if(convert_accented_characters($this->input->get('status'))=='paid') echo ' selected'?>>Đã thanh toán</option>
                                                    <option value="unpaid" <?php if(convert_accented_characters($this->input->get('status'))=='unpaid') echo ' selected'?>>chưa thanh toán</option>
                                                </select>
                                            </td>
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
                        
                        <?php if ($user->role_id == 1): ?>
                        <td colspan="2">
                    <button type="button" class="button blueB"  id="btn-do-bill" data-toggle="modal" data-target="#myModalBill">Xuất hóa đơn</button>
                    <div id="content-bill"></div>
                        </td><td>
                    <button type="button" id="btn-do-payment" class="button blueB"  data-toggle="modal" data-target="#myModalPayment">Thanh toán</button>
                     <div id="content-payment"></div>
                    </td>
                <?php endif; ?>
                    </tr>
                </thead>
                <thead class="title_order_room">
                    <tr>
                        <td class="hidden-print"><input type="checkbox" id="titleCheck" name="titleCheck" /></td>
                        <td>STT</td>
                        <td colspan="2" class="hidden-print" >Tên căn/phòng</td>
                        <td colspan="1" class="hidden-screen">Tên căn/phòng</td>
                        <td>Giá nhập</td>
                        <td>Giá bán</td>
                        <td>Lợi nhuận</td>
                        <td>Người thuê phòng</td>
                        <?php if ($user->role_id == 1): ?><td>Đối tác</td><?php endif; ?>
                        <td>Ngày nhận phòng</td>
                        <td>Ngày trả phòng</td>
                        <td>Số người ở</td>
                        <td>Trạng thái</td>
                        <td>Xác nhận</td>
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
                <?php if(isset($table_body_order)) echo $table_body_order?>
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
                <p style="color:red;font-size: 13px;padding: 0px;"><span class="glyphicon glyphicon-trash"></span> Bạn có muốn xóa tên căn/phòng này ?</p>
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
//            var title_order_room = document.getElementsByClassName('title_order_room');
//            var list_item = document.getElementsByClassName('list_item');
//            var css = '<?php echo '<link rel="stylesheet" type="text/css" media="print" href="/public/admin/css/print-table.css"/>' ?>';
//            var html = '<html>';
//
//            html += '<head>';
//            html += css;
//            html += '</head>';
//            html += '<body>';
//            html += '<table>';
//            html += title_order_room[0].outerHTML;
//            html += list_item[0].outerHTML;
//            html += '</table>';
//            html += '</body>';
//            html += '</html>';
//            newWin = window.open("");
//            newWin.document.write(html);
//            newWin.print();
            var url = window.location.href;
            var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
            if(hashes==url){
                hashes=[];
            }
            window.location.href = '<?php echo base_url().'admin/Report/do_pdf?'?>'+hashes.join('&');
//            
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
//        return false;
        $.ajax({
            url: "<?php echo admin_url('order_room/do_bill')?>",
            type: 'POST',
            data: {'arrId': arrId},
            success: function () {
                $(arrId).each(function (id, val) {
                    $('tr.row_' + val).fadeOut();
                });
            },
            dataType: "json",
        });
        return false;
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
        $('#content-payment').html('');
        $.ajax({
            url: "<?php echo admin_url('order_room/do_payment')?>",
            type: 'POST',
            data: {'arrId': arrId},
            success: function (data) {
                if(!data.success){
                     $.toaster({priority:'danger', title:"Cảnh báo",message:data.message,display:50000});
                }else{
                    $('#content-payment').html(data.message.payment);
                    $("#myModalPayment").modal()
                }
            },
            dataType: "json",
        });
        return true;
        })
        
        $('#btn-do-bill').on('click',function(){
            var arrId = new Array();
        $('[name="id[]"]:checked').each(function () {
            arrId.push($(this).val());
        });

        if (!arrId.length) {
            alert('Không có đơn hàng được lựa chọn!')
            return false;
        }
        
//        if (arrId.length>1) {
//            alert('Chỉ có thể xuất hóa đơn cho 1 đơn hàng !')
//            return false;
//        }
        $('#content-bill').html('');
        $.ajax({
            url: "<?php echo admin_url('order_room/do_bill')?>",
            type: 'POST',
            data: {'arrId': arrId},
            success: function (data) {
                if(!data.success){
                     $.toaster({priority:'danger', title:"Cảnh báo",message:data.message,display:50000});
                }else{
                    $('#content-bill').html(data.message.bill);
                    $("#myModalBill").modal()
                }
            },
            dataType: "json",
        });
        return true;
        })
        
    })
</script>