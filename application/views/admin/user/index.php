<!-- Main content -->
<!-- Title area -->
<div class="titleArea clearfix">
    <div class="wrapper clearfix col-md-12">
        <div class="pageTitle">
            <h5>User</h5>
            <span><?php echo isset($title) ? $title : ''; ?></span>
        </div>
        <?php $role_permisson = $this->User_model->get_role();if($role_permisson==1):?>
        <div class="horControlB menu_action">
            <ul>
                <li>
                    <a href="<?php echo admin_url('user/create'); ?>">
                        <img src="<?php echo base_url(); ?>public/admin/images/icons/control/16/add.png"/>
                        <span>Thêm tài khoản</span>
                    </a>
                </li>
            </ul>
        </div>
        <?php endif;?>
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
                                                <label for="user_name">Tên đăng nhập</label>
                                            </td>
                                            <td class="item">
                                                <input name="user_name" id="user_name"  autocomplete="off" value="<?php echo $this->input->get('user_name'); ?>" type="text"/>
                                            </td>
                                            <td class="label-tit">
                                                <label for="ozganzation">Tổ chức</label>
                                            </td>
                                            <td class="item">
                                                <input name="ozganzation" value="<?php echo $this->input->get('ozganzation'); ?>" id="ozganzation" type="text"/>
                                            </td>
                                            <td class="label-tit">
                                                <label for="role">Vai trò</label>
                                            </td>
                                            <td class="item">
                                                <select name="role">
                                                    <option value="">--</option>
                                                    <?php
                                                    if (isset($list_role) && is_array($list_role)) {
                                                        $selected = '';
                                                        foreach ($list_role as $role) {
                                                            $selected = ($this->input->get('role') == $role->role_id) ? 'selected' : '';
                                                            echo '<option value="' . $role->role_id . '" ' . $selected . '>' . $role->role_name . '</option>';
                                                        }
                                                    }
                                                    ?>

                                                </select>
                                            </td>
                                            <td colspan='2'>
                                                <input type="submit" class="button blueB" value="Lọc"/>
                                                <input type="reset" class="basic" value="Reset"
                                                       onclick="window.location.href = '<?php echo admin_url('user/index'); ?>';">
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
                        <td>Tên đăng nhập</td>
                        <td>Email</td>
                        <td>Số điện thoại</td>
                        <td>Tổ chức</td>
                        <td>Vai trò</td>
                        <td>Trạng thái</td>
                        <td>Lợi nhuận</td>
                        <td>Ngày tạo</td>
                        <td>Hành động</td>
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
                    if (isset($list) && is_array($list)) {
                        $i = 0;
                        foreach ($list as $row) {
                            $i++;
                            ?>
                            <tr class='row_20 <?php echo 'class'; ?>'>
                                <td class="textC"><?php if(isset($start))echo ($i+$start); else echo $i; ?></td>
                                <td class="textC" >
                                    <a href="#" title="<?php echo $row->last_name . ' ' . $row->first_name; ?>"><?php echo $row->user_name; ?></a>
                                </td>
                                <td class="textC"><?php echo $row->email; ?></td>
                                <td class="textC"><?php echo $row->phone; ?></td>
                                <td class="textC" style="border-right: 3px solid #ddd !important;"><?php echo $row->ozganzation!=''?$row->ozganzation:'----'; ?></td>
                                <td class="textC"><?php echo $row->role_name ?></td>
                                <?php if($role_permisson ==1):?>
                                <td class="textC" id="status">
                                    <?php
                                    if ($row->status == 1) {
                                        ?>
                                        <a href="javascript:void(0)" onclick="status(<?php echo $row->user_id; ?>)" class="lightbox" title="block">
                                            <img src="<?php echo base_url(); ?>public/admin/images/icons/color/tick.png" />
                                        </a>
                                        <?php
                                    } else {
                                        ?>
                                        <a href="javascript:void(0)" onclick="status(<?php echo $row->user_id; ?>)" class="lightbox" title="active">
                                            <img src="<?php echo base_url(); ?>public/admin/images/icons/color/block.png" />
                                        </a>
                                        <?php
                                    }
                                    ?>
                                </td>
                                <td class="textC" id="profit"><?php echo $row->profit_rate >0?$row->profit_rate:'----';?></td>
                                <?php endif;?>
                                <td class="textC"><?php echo date('d-m-Y - H:i:s', strtotime($row->created)); ?></td>
                                <?php if($role_permisson==1):?>
                                <td class="textC">
                                    <a href="<?php echo admin_url('user/edit/' . $row->user_id); ?>" class="lightbox" title="edit">
                                        <img src="<?php echo base_url(); ?>public/admin/images/icons/color/pencil.png" />
                                    </a>
                                    &nbsp;
                                    <a href="javascript:void(0)" class="lightbox" title="delete" onclick="del(<?php echo $row->user_id; ?>)">
                                        <img src="<?php echo base_url(); ?>public/admin/images/icons/color/uninstall.png" />
                                    </a>
                                </td>
                                <?php endif;?>
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
                <p style="color:red;font-size: 14px;padding: 0px;"><span class="glyphicon glyphicon-trash"></span> Bạn có muốn xóa tài khoản này ?</p>
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
        var url = '<?php echo admin_url('user/status'); ?>';
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
        var urlDel = url + '/user/delete/' + id;
        $('#allow-Del').attr('href', urlDel);
        $("#modal_del").modal("show");
    }
    
    $(function () {
        $("#user_name").autocomplete({
            source: "<?php echo site_url('admin/user/suggest_user'); ?>",
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
                if (ui.item.user_id != undefined && ui.item.user_name != undefined) {
                    $("#user_name").val(ui.item.user_name);
                    var url = "<?php echo admin_url('user/index?user_name=');?>"+ui.item.user_name;
                    if($('#ozganzation').val()!='') url+="&ozganzation="+$('#ozganzation').val();
                    if($('select[name="role"]').val()>1) url+="&role="+$('select[name="role"]').val();
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