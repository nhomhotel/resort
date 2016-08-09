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
            <table class="table sTable mTable myTable" id="order_room_table">
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
                                                <input name="post_room_name" value="<?php echo $this->input->get('post_room_name'); ?>" type="text"/>
                                            </td>
                                            <td class="label-tit">
                                                <label for="user_name">Tài khoản đăng</label>
                                            </td>
                                            <td class="item">
                                                <input name="user_name" value="<?php echo $this->input->get('user_name'); ?>" id="user_name" type="text"/>
                                            </td>
                                            <td colspan='2'>
                                                <input type="submit" class="button blueB" value="Lọc"/>
                                                <input type="reset" class="basic" value="Reset"
                                                       onclick="window.location.href = '<?php echo admin_url('post_room'); ?>';">
                                            </td>
                                            <td>
                                                <?php if ($user->role_id == 1): ?>
                                                    <button type="button" class="button blueB"  data-toggle="modal" data-target="#myModal">Xuất hóa đơn</button>
    <?php $this->load->view('admin/order_room/phieu-chi', isset($phieu_chi) ? $phieu_chi : null); ?>
<?php endif; ?>
                                            </td>
                                        </tr>
                                        <tr><td>
                                                <button type="button" class="btn btn-default" aria-label="Left ">
                                                    <span class="glyphicon glyphicon-align-left" aria-hidden="true" style="display: inline">Hiển thị thêm</span>
                                                    <span class="glyphicon glyphicon-align-left" aria-hidden="true" style="display: none">Hiển thị bớt</span>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>
                        </td>
                    </tr>
                </thead>
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
                        <?php if ($user->role_id == 1): ?>
                            <td>Đối tác</td>
<?php endif; ?>
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
                                    <p class="price_en price-item hidden-print">
        <?php if ($user->role_id == 1): ?>
                                        <div class="row"><!-- panel-footer -->
                                            <div class="col-md-6 text-left hidden-xs hidden-print">
                                                <button type="button" class="btn btn-primary" id="paymented">
                                                    <span style="font-size: 11px"><?php echo $row->payment_status == 1 ? 'Đã thanh toán' : 'chưa thanh toán'; ?></span>
                                                </button>
                                            </div>
                                            <div class="col-md-6 hidden-xs hidden-print" style="padding-left: 6px;">
                                                <button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#myModal">
                                                    <span style="font-size: 11px">Xuất hóa đơn</span>
                                                </button>
                                        <?php $this->load->view('admin/order_room/phieu-chi', isset($phieu_chi) ? $phieu_chi : null); ?>
                                            </div>
                                        </div>
                                    <?php elseif ($user->role_id == 2): ?>
                                        <label><span><?php echo $row->payment_status == 1 ? 'Đã thanh toán' : 'chưa thanh toán'; ?></span></label>
        <?php endif;
        ?>
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
</script>