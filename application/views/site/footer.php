    <div class="info">
        <div class="container">
            <div class="row">
                <div class="block">
                    <div class="col-md-3 col-sm-3 col-xs-6 info-item">
                        <h5><?php echo lang('home_top_destinations');?></h5>
                        <ul>
                            <?php if(isset($view_footer)):?>
                            <?php foreach ($view_footer as $row):?>
                            <li><a href="<?php echo base_url().'room/search?location='. urldecode($row->name)?>"><?php echo $row->name?></a></li>
                            <?php endforeach;?>
                            <?php endif;?>
                        </ul>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-6 info-item">
                        <h5><?php echo lang('home_company_info');?></h5>
                        <ul>
                            <li><a href="#"><?php echo lang('home_about_us');?></a></li>
                            <li><a href="<?php echo base_url('tin-tuc/')?>"><?php echo lang('home_news');?></a></li>
                            <li><a href="#"><?php echo lang('home_contact');?></a></li>
                            <li><a href="#">Blog</a></li>
                            <li><a href="#"><?php echo lang('home_help');?></a></li>
                        </ul>
                    </div>

                    <div class="col-md-3 col-sm-3 col-xs-6 info-item">
                        <h5><?php echo lang('home_follow_us');?></h5>
                        <ul>
                            <?php if(isset($FollowSocial)):?>
                            <?php foreach ($FollowSocial as $row):?>
                            <li><a href="<?php echo $row->link?>"><?php echo $row->name?></a></li>
                            <?php endforeach;?>
                            <?php endif;?>
                        </ul>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-6 info-item payment">
                        <h5><?php echo lang('home_secure_payment');?></h5>
                        <ul>
                            <li><img src="<?php echo base_url();?>public/site/images/visa.svg"></li>
                            <li><img src="<?php echo base_url();?>public/site/images/visa.svg"></li>
                            <li><img src="<?php echo base_url();?>public/site/images/visa.svg"></li>
                            <li><img src="<?php echo base_url();?>public/site/images/visa.svg"></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="cpr clear">
        <div class="container">
            <div class="row">
                <div class="block">
                    <p><span class="glyphicon glyphicon-copyright-mark"></span> 2016 <?php echo lang('');?></p>
                </div>
            </div>
        </div>
    </div>