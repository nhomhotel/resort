<!-- Main content -->			
<!-- Title area -->
<div class="titleArea clearfix">
    <div class="wrapper col-md-12">
        <div class="pageTitle">
            <h5>Tùy chọn</h5>
            <span><?php echo $title; ?></span>
        </div>
        <div class="horControlB menu_action">
            <ul>
                <li>
                    <a href="<?php echo base_url('admin/ManagerText/create'); ?>">
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
                        <td>STT</td>
                        <td>Tiêu đề</td>
                        <td>Tiêu đề(en)</td>
                        <td>Nội dung</td>
                        <td>Nội dung(en)</td>
                    </tr>
                </thead>
                <tfoot class="auto_check_pages">
                    <tr>
                        <td colspan="9">
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
                    foreach ($list as $row) {
                        ?>
                        <tr class='row_<?php echo $row->manager_text_id; ?>'>
                            <td class="textC"><?php if(isset($start))echo ($i+$start); else echo $i; ?></td>
                            <td class="textC"><?php echo $row->title?></td>
                            <td class="textC"><?php echo $row->title_en?></td>
                            <td class="textC"><?php echo $row->content?></td>
                            <td class="textC"><?php echo $row->content_en?></td>
                            <td class="textC">
                                <a href="<?php echo base_url('admin/ManagerText/edit/' . $row->manager_text_id); ?>" class="lightbox" title="edit">
                                    <img src="<?php echo base_url(); ?>public/admin/images/icons/color/pencil.png" />
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

</script>