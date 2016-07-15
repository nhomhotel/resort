<?php if (isset($current_language)) :?>
<div id="search_no_result" class="spr-error-container">
    <?php if ($current_language == 'vietnamese') :?>
    <h3 class="forange mb20"><b>Có lỗi!</b></h3>
    <p>Chúng tôi không có kết quả nào cho tìm kiếm của bạn<br>
        Bạn có thể thay đổi tìm kiếm của mình thông qua:</p>
    <br>
    <p>- Bỏ một số điều kiện trong nhóm tìm kiếm.  <a href="<?php echo site_url('room/search'); ?>" class="forange reset-filters" data-type="rst">Nhấn vào đây để chọn lại nhóm tìm kiếm</a> <br>
        - Tìm kiếm cho một thành phố hoặc địa chỉ tại điểm đến của bạn</p>
    <?php elseif ($current_language == 'english') :?>
    <h3 class="forange mb20"><b>Not found result</b></h3>
    <p>You can try again with different keywords in <a href="<?php echo site_url('room/search'); ?>">here</a></p>
    <?php endif; ?>
</div>
<?php else :?>
<h3 class="forange mb20"><b>Có lỗi!</b></h3>
<p>Chúng tôi không có kết quả nào cho tìm kiếm của bạn<br>
    Bạn có thể thay đổi tìm kiếm của mình thông qua:</p>
<br>
<p>- Bỏ một số điều kiện trong nhóm tìm kiếm.  <a href="#" class="forange reset-filters" data-type="rst">Nhấn vào đây để chọn lại nhóm tìm kiếm</a> <br>
    - Tìm kiếm cho một thành phố hoặc địa chỉ tại điểm đến của bạn</p>
<?php endif; ?>