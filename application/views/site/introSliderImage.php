<div class="row owl-theme owl-loaded" id="intro-slider" >
    <?php if(isset($intro_slider_image)&&(count($intro_slider_image)>0)):?>
        <?php foreach ($intro_slider_image as $row):?>
        <a href="<?php echo $row->link?>"><img src="<?php echo base_url().$row->image; ?>" alt ="" class="img-resposive"/></a>
    <?php endforeach;?>
    <?php else:?>
        <img src="<?php echo base_url(); ?>public/site/images/featured-cosmo.png" alt ="" class="img-resposive"/>
        <img src="<?php echo base_url(); ?>public/site/images/featured-bbc.png" alt ="" class="img-resposive"/>
        <img src="<?php echo base_url(); ?>public/site/images/featured-techcrunch.png" alt ="" class="img-resposive"/>
    <?php endif;?>
</div>