<!-- Main content -->
<!-- Title area -->
<div class="titleArea clearfix">
    <div class="wrapper clearfix col-md-12">
        <div class="pageTitle">
            <h5>Quản lý email</h5>
            <span><?php echo isset($title) ? $title : ''; ?></span>
        </div>
        <div class="horControlB menu_action">
            <ul><li></li></ul>
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
                                                <label for="post_room_name">Tên email</label>
                                            </td>
                                            <td class="item">
                                                <input name="post_room_name" value="<?php echo $this->input->get('post_room_name'); ?>" type="text"/>
                                            </td>

                                            <td colspan='2'>
                                                <input type="submit" class="button blueB" value="Lọc"/>
                                                <input type="reset" class="basic" value="Reset"
                                                       onclick="window.location.href = '<?php echo admin_url('emails'); ?>';">
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
                        <td >Tên Người gửi</td>
                        <td>Địa chỉ email</td>
                        <td>Chủ đề</td>
                        <td>Nội dung</td>
                        <td>Ngày Tạo</td>
                        <td>Trạng thái</td>
                        <td>file đính kèm</td>
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
                     if(!empty($list)):?>
                        <?php $i = 0;?>
                        <?php foreach ($list as $row):
                            $i++;
                            ?>
                            <tr class='row_20'>
                                <td class="textC"><?php if(isset($start))echo ($i+$start); else echo $i; ?></td>
                                <td class="textC img_room" >
                                    <?php echo $row->user_name ?>
                                </td>
                                <td class="textC img_room" >
                                    <?php echo ($row->email);?>
                                </td>
                                <td class="textC"><?php echo $row->subject; ?></td>
                                <td class="textC"><?php echo $row->message; ?></td>
                                <td class="textC"><?php echo $row->create; ?></td>
                                <td class="textC"><?php echo $row->isAnswer?'Đã trả lời':'Chưa trả lời'; ?></td>
                                <td class="textC">
                                    <?php if($row->file_attachment): ?>
                                    <img alt="file_attachment_"<?php echo $row->contact_id?> src="<?php echo $row->file_attachment?>" width="100px" height="100px"/>
                                    <?php else:?>
                                    <?php echo 'Không'?>
                                    <?php endif;?></td>
                                <td class="textC">
                                    <button class="btn btn-success order_room_btn tclick" data-toggle="modal" data-target="#modal_MessageAnswer">
                                        <img src="<?php echo base_url(); ?>public/admin/images/icons/color/answer-emai.png"/>
                                    </button>
                                </td>
                            </tr>
                            <?php endforeach;?>
                    <?php endif;?>
                </tbody>
            </table>
            <?php $this->load->view('admin/contact/answerEmail')?>
        </div>
    </div>
    <div class="clear mt30"></div>
</div>
<script>
    $('#frm-contenttMessage').on('submit',function(form){
        console.log($(form).serialize());
        return false;
    });
</script>