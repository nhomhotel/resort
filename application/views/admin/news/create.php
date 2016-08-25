<script type="text/javascript" src="<?php echo base_url(); ?>public/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?php echo base_url() . 'public/admin/js/jquery.toaster.js' ?>"></script>

<div class="titleArea clearfix">
    <div class="wrapper clearfix col-md-12">
        <div class="pageTitle">
            <h5>Thêm mới nội dung tin</h5>
            <span><?php echo isset($title) ? $title : ''; ?></span>
        </div>
        <div id="message"></div>
        <div class="horControlB menu_action">
            <ul>
                <li>
                </li>
            </ul>
        </div>
    </div>
</div>

<div class="wrapper col-md-12  clearfix content">
    <form id="form_news" method="post" class="form-horizontal" action="" role = "form">
        <div class="panel ">
            <div class="panel-heading panel-piluku">
                <h3 class="panel-title"><?php  ?></h3>
            </div>
            <div class="panel-body">      
                <div class="form-group">
                    <label for="sel1">Tiêu đề tin: </label>
                    <input name="news_title" id="sel1" value="<?php echo isset($info)?$info->title:''; ?>" type="text" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="content_news">Nội dung Tin</label>
                    <?php
                    echo form_textarea(array(
                        'name' => 'content_news',
                        'id' => 'content_news',
                        'class' => 'ckeditor form-control',
                        'rows' => "5",)
                    );
                    ?>
                </div>
                <div class="form-group">
                    <select name ="news_category" style="width: 97%" class="form-control">
                        <option value="0">--Chọn danh mục tin--</option>
                        <?php if(isset($news_category)):?>
                        <?php foreach ($news_category as $row):?>
                        <option value="<?php echo $row->news_category_id?>"><?php echo $row->title;?></option>
                        <?php endforeach;?>
                        <?php endif;?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="status">Trạng thái</label>
                    <select name ="status" style="width: 97%" class="form-control">
                        <option value="1">Hiện</option>
                        <option value="0">Ẩn</option>
                    </select>
                </div>
            </div>
            <div class="panel-footer">
                <div class="form-group">
                    <button type="submit" class="btn btn-primary pull-right" value="submit">Thực hiện</button>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            CKEDITOR.replace("content_news");
        </script>

    </form>
</div>
<script type="text/javascript">
//    $(document).ready(function () {
//        $(document).on('submit', '#form_news', function () {
//            var data = $(this).serialize();
//            $.ajax({
//                type: 'POST',
//                url: $(this).attr('action'),
//                data: data,
//                success: function (data) {
//                    $.toaster('', data.message, data.title);
//                    setTimeout(function () {
//                        window.location.href = "<?php echo base_url() . 'admin/news' ?>";
//                    }, 2500)
//                },
//                dataType: 'JSON',
//            });
//            return false;
//        });
//    })
</script>
