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
                <div class="col-sm-4 col-xs-12 item-news">
                    <h3><?php echo lang('home_search_and_discovery') ?></h3>
                    <p><?php echo lang('home_find_suitable_budget_style') ?></p>
                    <div class="img-item">
                        <img src="<?php echo base_url(); ?>public/site/images/img-news1.png" class="img-responsive wow pulse" data-wow-duration = "1000ms" data-wow-delay = "600ms">
                    </div>
                </div>
                <div class="col-sm-4 col-xs-12 item-news">
                    <h3><?php echo lang('home_contact_and_booking') ?></h3>
                    <p><?php echo lang('home_contact_homeowners_travel_confirmation_booking') ?></p>
                    <div class="img-item">
                        <img src="<?php echo base_url(); ?>public/site/images/img-news2.png" class="img-responsive wow bounce" data-wow-duration = "600ms" data-wow-delay = "1200ms">
                    </div>
                </div>
                <div class="col-sm-4 col-xs-12 item-news">
                    <h3><?php echo lang('home_travel_and_enjoy') ?></h3>
                    <p><?php echo lang('home_live_local_any_place_world') ?></p>
                    <div class="img-item">
                        <img src="<?php echo base_url(); ?>public/site/images/img-news3.png" class="img-responsive wow swing" data-wow-duration = "600ms" data-wow-delay = "1800ms">
                    </div>
                </div>
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
            <div class="col-md-4 col-xs-12 tinh-nang-item">
                <div class="icon-item">
                    <span class="glyphicon glyphicon-usd wow zoomIn" data-wow-duration = "400ms" data-wow-delay = "500ms"></span>
                </div>
                <h3><?php echo lang('home_facilities_save_more') ?></h3>
                <p><?php echo lang('home_stay_home_instead_of_local') ?></p>
            </div>
            <div class="col-md-4 col-xs-12 tinh-nang-item">
                <div class="icon-item">
                    <span class="glyphicon glyphicon-resize-full wow zoomIn" data-wow-duration = "400ms" data-wow-delay = "700ms"></span>
                </div>
                <h3><?php echo lang('home_enjoy_more_space') ?></h3>
                <p><?php echo lang('home_cost_of_hotel_room_info') ?></p>
            </div>
            <div class="col-md-4 col-xs-12 tinh-nang-item">
                <div class="icon-item">
                    <span class="glyphicon glyphicon-check wow zoomIn" data-wow-duration = "400ms" data-wow-delay = "900ms"></span>
                </div>
                <h3><?php echo lang('home_experience_as_native_speaker') ?></h3>
                <p><?php echo lang('home_experience_life_with_trip') ?></p>
            </div>
            <div class="col-md-4 col-xs-12 tinh-nang-item">
                <div class="icon-item">
                    <span class="glyphicon glyphicon-lock wow zoomIn" data-wow-duration = "400ms" data-wow-delay = "1100ms"></span>
                </div>
                <h3><?php echo lang('home_absolute_safety') ?></h3>
                <p><?php echo lang('home_system_secure_online_payment_info') ?></p>
            </div>
            <div class="col-md-4 col-xs-12 tinh-nang-item">
                <div class="icon-item">
                    <span class="glyphicon glyphicon-home wow zoomIn" data-wow-duration = "400ms" data-wow-delay = "1300ms"></span>
                </div>
                <h3><?php echo lang('home_like_home') ?></h3>
                <p><?php echo lang('home_comfortable_living') ?></p>
            </div>
            <div class="col-md-4 col-xs-12 tinh-nang-item">
                <div class="icon-item">
                    <span class="glyphicon glyphicon-list-alt wow zoomIn" data-wow-duration = "400ms" data-wow-delay = "1500ms"></span>
                </div>
                <h3><?php echo lang('home_many_choose') ?></h3>
                <p><?php echo lang('home_list_room') ?></p>
            </div>
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
        margin:10,
        loop:<?php if(isset($is_loop_intro_slider)) echo $is_loop_intro_slider; else echo 'false';?>,
        autoplay:true,
        navigation:true,
         nav:true,
         navText:["<img src='/public/site/images/icon_left.png'/>","<img src='/public/site/images/icon_right.png'/>"],
        autoplayTimeout:10000,
        autoplayHoverPause:true,
        autoplaySpeed:1,
        dotsSpeed:1000,
        responsiveClass:true,
        responsive:{
            0:{
                items:1,
            },
            600:{
                items:2,
            },
            1280:{
                items:2,
            }
        }
    });
})</script>