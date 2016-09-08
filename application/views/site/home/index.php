<style>
ul[class^="ui-autocomplete"] {
    z-index: 99999;
}
</style>
<section id="banner-search">
    <div class="block-banner">
        <div class="container-fluid">
            <?php if ($this->session->flashdata('message_register')): ?>
                <div class="alert alert-success info">
                    <strong>Success!</strong><br><?php echo $this->session->flashdata('message_register'); ?> 
                </div>
            <?php endif;
            ?>
            <?php if ($this->session->flashdata('message_confirm')): ?>
                <div class="alert alert-success info">
                    <strong>Success!</strong><br><?php echo $this->session->flashdata('message_confirm'); ?> 
                </div>
            <?php endif;
            if(isset($home_slider_image)) echo $home_slider_image;
            ?>
        </div>
    </div>
    <div class="home-search" style="z-index: 9999">
        <div class="container">
            <div class="row">
                <h2><?php echo lang('home_discover_the_best_travel_accommodation') ?></h2>
                <?php $this->load->view('site/home/block_search'); ?>
            </div>
        </div>
    </div>
</section>
<section id="home-news">
    <div class="container">
        <div class="row">
            <div class="block">
                <?php if(!empty($manageText)):?>
                <?php $index = -1;?>
                <div class="col-sm-4 col-xs-12 item-news">
                    <?php $index++;if(!empty($manageText[$index])):?>
                    <h3><?php echo (empty($language)||$language==='vietnamese')?$manageText[$index]->title:$manageText[$index]->title_en;?></h3>
                    <p><?php echo (empty($language)||$language==='vietnamese')?$manageText[$index]->content:$manageText[$index]->content_en;?></p>
                    <div class="img-item">
                        <img src="<?php echo base_url(); ?>public/site/images/img-news1.png" class="img-responsive wow pulse" data-wow-duration = "1000ms" data-wow-delay = "600ms">
                    </div>
                    <?php endif;?>
                </div>
                <div class="col-sm-4 col-xs-12 item-news">
                    <?php $index++;if(!empty($manageText[$index])): ?>
                    <h3><?php echo (empty($language)||$language==='vietnamese')?$manageText[$index]->title:$manageText[$index]->title_en;?></h3>
                    <p><?php echo (empty($language)||$language==='vietnamese')?$manageText[$index]->content:$manageText[$index]->content_en;?></p>
                    <div class="img-item">
                        <img src="<?php echo base_url(); ?>public/site/images/img-news2.png" class="img-responsive wow bounce" data-wow-duration = "600ms" data-wow-delay = "1200ms">
                    </div>
                    <?php endif;?>
                </div>
                <div class="col-sm-4 col-xs-12 item-news">
                    <?php $index++;if(!empty($manageText[$index])): ?>
                    <h3><?php echo (empty($language)||$language==='vietnamese')?$manageText[$index]->title:$manageText[$index]->title_en;?></h3>
                    <p><?php echo (empty($language)||$language==='vietnamese')?$manageText[$index]->content:$manageText[$index]->content_en;?></p>
                    <div class="img-item">
                        <img src="<?php echo base_url(); ?>public/site/images/img-news3.png" class="img-responsive wow swing" data-wow-duration = "600ms" data-wow-delay = "1800ms">
                    </div>
                    <?php endif;?>
                </div>
                <?php endif;?>
            </div>
        </div>
    </div>
</section>
<section id="location-to">
    <div class="container">
        <div class="row">
            <div class="block">
                <h3><?php echo lang('home_popular_destination'); ?></h3>
                <?php if (isset($popular)) echo $popular; ?>
            </div>
        </div>
    </div>
</section>
<section id="tinh-nang">
    <div class="container">
        <div class="row">
            <?php if(!empty($manageText)):?>
            <div class="col-md-4 col-xs-12 tinh-nang-item">
                <?php $index++;if(!empty($manageText[$index])): ?>
                <div class="icon-item">
                    <span class="glyphicon glyphicon-usd wow zoomIn" data-wow-duration = "400ms" data-wow-delay = "500ms"></span>
                </div>
                <h3><?php echo (empty($language)||$language==='vietnamese')?$manageText[$index]->title:$manageText[$index]->title_en;?></h3>
                <p><?php echo (empty($language)||$language==='vietnamese')?$manageText[$index]->content:$manageText[$index]->content_en;?></p>
                <?php endif;?>
            </div>
            <div class="col-md-4 col-xs-12 tinh-nang-item">
                <?php $index++;if(!empty($manageText[$index])): ?>
                <div class="icon-item">
                    <span class="glyphicon glyphicon-resize-full wow zoomIn" data-wow-duration = "400ms" data-wow-delay = "700ms"></span>
                </div>
                <h3><?php echo (empty($language)||$language==='vietnamese')?$manageText[$index]->title:$manageText[$index]->title_en;?></h3>
                <p><?php echo (empty($language)||$language==='vietnamese')?$manageText[$index]->content:$manageText[$index]->content_en;?></p>
                <?php endif;?>
            </div>
            <div class="col-md-4 col-xs-12 tinh-nang-item">
                <?php $index++;if(!empty($manageText[$index])): ?>
                <div class="icon-item">
                    <span class="glyphicon glyphicon-check wow zoomIn" data-wow-duration = "400ms" data-wow-delay = "900ms"></span>
                </div>
                <h3><?php echo (empty($language)||$language==='vietnamese')?$manageText[$index]->title:$manageText[$index]->title_en;?></h3>
                <p><?php echo (empty($language)||$language==='vietnamese')?$manageText[$index]->content:$manageText[$index]->content_en;?></p>
                <?php endif;?>
            </div>
            <div class="col-md-4 col-xs-12 tinh-nang-item">
                <?php $index++;if(!empty($manageText[$index])): ?>
                <div class="icon-item">
                    <span class="glyphicon glyphicon-lock wow zoomIn" data-wow-duration = "400ms" data-wow-delay = "1100ms"></span>
                </div>
                <h3><?php echo (empty($language)||$language==='vietnamese')?$manageText[$index]->title:$manageText[$index]->title_en;?></h3>
                <p><?php echo (empty($language)||$language==='vietnamese')?$manageText[$index]->content:$manageText[$index]->content_en;?></p>
                <?php endif;?>
            </div>
            <div class="col-md-4 col-xs-12 tinh-nang-item">
                <?php $index++;if(!empty($manageText[$index])): ?>
                <div class="icon-item">
                    <span class="glyphicon glyphicon-home wow zoomIn" data-wow-duration = "400ms" data-wow-delay = "1300ms"></span>
                </div>
                <h3><?php echo (empty($language)||$language==='vietnamese')?$manageText[$index]->title:$manageText[$index]->title_en;?></h3>
                <p><?php echo (empty($language)||$language==='vietnamese')?$manageText[$index]->content:$manageText[$index]->content_en;?></p>
                <?php endif;?>
            </div>
            <div class="col-md-4 col-xs-12 tinh-nang-item">
                <?php $index++;if(!empty($manageText[$index])): ?>
                <div class="icon-item">
                    <span class="glyphicon glyphicon-list-alt wow zoomIn" data-wow-duration = "400ms" data-wow-delay = "1500ms"></span>
                </div>
                <h3><?php echo (empty($language)||$language==='vietnamese')?$manageText[$index]->title:$manageText[$index]->title_en;?></h3>
                <p><?php echo (empty($language)||$language==='vietnamese')?$manageText[$index]->content:$manageText[$index]->content_en;?></p>
                <?php endif;?>
            </div>
            <?php endif;?>
        </div>
    </div>
</section>
<section id="partner">
    <div class="container">
        <div class="row">
            <div class="block col-md-8 col-md-offset-2">
                <h3><?php echo lang('home_introduced_on'); ?></h3>
                <?php echo isset($intro_slider_image)?$intro_slider_image:'';?>
            </div>
        </div>
    </div>
</section>
<script>
$(document).ready(function(){
    $('#home-slider').owlCarousel({
        margin:0,
        loop:<?php if(isset($is_loop_home_slider)) echo $is_loop_home_slider; else echo 'false';?>,
        autoplay:true,
        navigation:true,
         nav:true,
         navText:["<img src='/public/site/images/icon_left.png'/>","<img src='/public/site/images/icon_right.png'/>"],
        autoplayTimeout:150000,
        autoplayHoverPause:true,
        autoplaySpeed:100,
        dotsSpeed:1000,
        responsiveClass:true,
        responsive:{
            0:{
                items:1,
            },
            600:{
                items:1,
            },
            1280:{
                items:1,
            }
        }
    });
    $('#intro-slider').owlCarousel({
        margin:50,
        loop:<?php if(isset($is_loop_intro_slider)) echo $is_loop_intro_slider; else echo 'false';?>,
        autoplay:true,
        navigation:true,
         nav:true,
         navText:["<img src='/public/site/images/icon_left.png'/>","<img src='/public/site/images/icon_right.png'/>"],
        autoplayTimeout:1000,
        autoplayHoverPause:true,
        autoplaySpeed:1000,
        dotsSpeed:1000,
        responsiveClass:true,
        responsive:{
            0:{
                items:1,
            },
            600:{
                items:3,
            },
            1280:{
                items:3,
            }
        }
    });
})
</script>