<nav class="navbar navbar-default" id="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo base_url('home');?>"><?php echo strtoupper($this->config->item('name_website'))?></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                 <li id="language" style="padding-top: 19px; padding-right: 10px;">
                    <div class="dropdown dropdown-flat selected ready">
                      <button class="dropdown-toggle form-control form-control-icon icon-language" type="button" data-toggle="dropdown"><span class="display"><?php if($this->session->userdata('language')=='vietnamese') echo 'Tiếng việt';else echo 'English';?></span></button>
                      <ul class="dropdown-menu" role="menu" aria-labelledby="language" style="margin-right: -80px;">
                          <li role="presentation"><a role="menuitem" tabindex="-1" data-value="eng">English</a></li>
                          <li role="presentation"><a role="menuitem" tabindex="-1"  data-value="vie" class="active">Tiếng Việt</a></li>
                      </ul>
                      <div class="dropdown-menu-chevron" style="left: 57px;"></div>
                      <input type="hidden" name="language" value="vie">
                    </div>
                </li>
                <?php if(isset($_SESSION['user_name'])){?>
                <li class="account"  style="padding-top: 19px; padding-right: 10px;">
                    <div class="dropdown dropdown-flat ready">
                        <button class="dropdown-toggle form-control" type="button" data-toggle="dropdown"><span class="hi"><?php echo lang('block_hello').', ';echo $this->session->userdata('user_name');?></span></button>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="currency">
                          <li role="presentation"><a href="/reservations" data-href="follow" role="menuitem" tabindex="-1">Yêu cầu đặt chỗ</a></li>
                          <li role="presentation"><a href="/user/edit" data-href="follow" role="menuitem" tabindex="-1">Tài khoản của tôi</a></li>
                          <li role="presentation"><a href="/user/logout" data-href="follow" role="menuitem" tabindex="-1">Đăng xuất</a></li>
                        </ul>
                        <div class="dropdown-menu-chevron"></div>
                      </div>
                </li>
            <?php }else{?>
                <li><a href="<?php echo base_url();?>home/register"><?php echo lang('home_register');?></a></li>
                    <li><a href="<?php echo base_url();?>home/login"><?php echo lang('home_login');?></a></li>
                <?php }?>
                
            </ul>
        </div><!-- /.navbar-collapse -->
    </div>
</nav>