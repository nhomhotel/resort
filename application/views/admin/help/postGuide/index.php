<!-- Main content -->			
<!-- Title helps -->
<div class="titleArea clearfix">
    <div class="wrapper col-md-12">
        <div class="pageTitle">
            <h5>Tùy chọn</h5>
            <span><?php echo $title; ?></span>
        </div>
        <div class="horControlB menu_action">
            <ul>
                <li>
                    <a href="<?php echo base_url('admin/helps/createPostGuide'); ?>">
                        <img src="<?php echo base_url(); ?>public/admin/images/icons/control/16/add.png">
                        <span>Thêm mới</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="clear"></div>
    </div>
</div>
<div class="line"></div>

<div class="wrapper col-md-12  clearfix content">

    <?php if (isset($message) && $message) {
        $this->load->view('admin/message', $message);
    } ?>
    <div class="widget">
        <div class="title clearfix">
            <span class="titleIcon"><img src="<?php echo base_url(); ?>public/admin/images/icons/tableArrows.png" /></span>
            <h6><?php echo $title; ?></h6>

            <div class="num f12">Tổng số: <b><?php echo $total; ?></b></div>
        </div>
        <div class="table-responsive">
            <table class="table sTable mTable myTable" id="checkAll">
                <thead>
                    <tr>
                        <td><input type="checkbox" id="titleCheck" name="titleCheck" /></td>
                        <td>STT</td>
                        <td>Tiêu đề</td>
                        <td>Tiêu đề(en)</td>
                        <td>Nội dung</td>
                        <td>Nội dung(en)</td>
                        <td>Trạng thái</td>
                        <td>Topic</td>
                        <td>Tag</td>
                        <td>Hành động</td>
                    </tr>
                </thead>
                <tfoot class="auto_check_pages">
                    <tr>
                        <td colspan="10">
                            <div class="list_action itemActions">
                                <a href="javascript:void(0)" onclick = "deleteAll()" id="submit" class="button blueB" url="<?php echo admin_url('helps/deleteListPostGuide'); ?>">
                                    <span class="glyphicon glyphicon-trash"></span>
                                    &nbsp;
                                    <span style='color:white;'>Xóa chọn</span>
                                </a>
                            </div>
                            <div class='pagination'>
                                <?php
                                echo $pagination_link;
                                ?>
                            </div>
                        </td>
                    </tr>
                </tfoot>
                <tbody class="list_item">
                    <?php
                    $i = 1;
                    foreach ($list as $line =>$row) {
                        ?>
                        <tr class='row_<?php echo $row->post_guide_id; ?>'>
                            <td class="textC">
                                <input type="checkbox" name="id[]" value="<?php echo $row->post_guide_id; ?>" />
                            </td>
                            <td class="textC"><?php if(isset($start))echo ($i+$start); else echo $i; ?></td>
                            <td class="textC">
                                <?php echo shortNews($row->title,100); ?>
                            </td>
                            <td class="textC">
                                <?php echo shortNews($row->title_en,100); ?>
                            </td>
                            <td class="textC">
                                <?php echo shortNews($row->content,100); ?>
                            </td>
                            <td class="textC">
                                <?php echo shortNews($row->content_en,100); ?>
                            </td>
                            <td class="textC">
                                <?php echo getStatus($row, $row->post_guide_id); ?>
                            </td>
                            <td class="textC">
                                <?php echo $row->topic_title; ?>
                            </td>
                            <td class="textC">
                                <?php if(!empty($tags)) echo $tags[$line]; ?>
                            </td>
                            <td class="textC">
                                <a href="<?php echo base_url('admin/helps/editPostGuide/' . $row->post_guide_id); ?>" class="lightbox" title="edit">
                                    <img src="<?php echo base_url(); ?>public/admin/images/icons/color/pencil.png" />
                                </a>
                                &nbsp;
                                <a href="<?php echo base_url('admin/helps/deletePostGuide/' . $row->post_guide_id); ?>" class="lightbox" title="delete" onclick="return confirm('Bạn có muốn xóa?');">
                                    <img src="<?php echo base_url(); ?>public/admin/images/icons/color/uninstall.png" />
                                </a>
                            </td>
                        </tr>	
                        <?php
                        $i++;
                    }
                    ?>								
                </tbody>								
            </table>
        </div>
    </div>
</div>

<script type="text/javascript">

    function status(id) {
        var admin_url = "<?php echo admin_url(); ?>";
        var curUrl = window.location.href;
        $.ajax({
            url: admin_url + '/helps/statusPostGuide',
            type: "post",
            dataType: "text",
            data: {
                'id': id,
            },
            success: function () {
                $('.myTable').load(curUrl + ' .myTable');
            }
        });
        $(document).ajaxComplete(function () {
            $("#titleCheck").change(function () {
                $("input:checkbox").prop('checked', $(this).prop("checked"));
            });
        });
    }

    //xóa nhiều dữ liệu
    function deleteAll() {

        var arrId = new Array();
        $('[name="id[]"]:checked').each(function () {
            arrId.push($(this).val());
        });

        if (!arrId.length) {
            alert('Không có bản ghi được lựa chọn!')
            return false;
        }

        if (!confirm('Xóa các bản ghi đã chọn!')) {
            return false;
        }

        var url = $('#submit').attr('url');

        $.ajax({
            url: url,
            type: 'POST',
            data: {'arrId': arrId},
            success: function () {
                $(arrId).each(function (id, val) {
                    $('tr.row_' + val).fadeOut();
                });
            }
        });
        return false;
    }
</script>