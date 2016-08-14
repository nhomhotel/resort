<?php  if(isset($home_slider_image) && (count($home_slider_image)>0)):?>
<div class="row owl-theme owl-loaded" id="home-slider">
    <?php foreach ($home_slider_image as $row):?>
    <div class="banner-bg" style = "background:url('<?php echo $row->image?>') no-repeat center center scroll;background-size:cover;"></div>
    <?php endforeach;?>
</div>
<?php else:?>
<div class="row owl-theme owl-loaded" id="home-slider">
    <div class="banner-bg" style = "background:url('public/site/images/hero2w.jpg') no-repeat center center scroll;background-size:cover;"></div>
</div>
<?php endif; ?>

