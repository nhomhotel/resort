<?php
    // Lay du lieu tu userLogin
    if($this->session->userdata('userLogin')){
        $userLogin = $this->session->userdata('userLogin');
        $role = $this->User_model->get_role();
        $user = $this->User_model->get_logged_in_employee_info();
    }
?>
<div class="sideProfile">
    <a href="#" title="" class="profileFace">
        <img width="40" src="<?php if($user &&isset($user->avarta)&&$user->avarta!='')echo $user->avarta;else echo "/public/admin/images/user.png"?>">
    </a>
    <span><?php echo 'Xin chào';;?>: <strong><?php echo (isset($userLogin)) ? $userLogin['user_name'] : '' ;?></strong></span>
    <span><?php echo (isset($userLogin)) ? $userLogin['last_name'].' '.$userLogin['first_name'] : '' ;?> </span>

    <div class="clear"></div>
</div>
<div class="sidebarSep"></div>
<!-- Left navigation -->
<div id="menu">
    <ul class="nav">
        <li class="home">
            <a href="<?php echo admin_url('home');?>" class="<?php echo (isset($is_active) && $is_active == 'home')?"active":"";?>" id="current">
                <span><?php echo 'Bảng điều khiển';?></span>
                <strong></strong>
            </a>
        </li>
       <?php if($role==1):?>
        <li class="category">
            <a href="#collapse2" class="exp collapsed" data-toggle="collapse" aria-expanded="false">
                <span><?php echo 'Danh mục'; ?></span><strong>4</strong>
            </a>
            <ul class="sub collapse" id="collapse2" aria-expanded="false" style="height: 1px;">
                <li>
                    <a href="<?php echo admin_url('house_type');?>">Loại nhà ở</a>
                </li>
                <li>
                    <a href="<?php echo  admin_url('room_type');?>">Loại phòng</a>
                </li>
                <li>
                    <a href="<?php echo admin_url('amenities');?>">Tiện nghi</a>
                </li>
                <li>
                    <a href="<?php echo admin_url('experience');?>">Trải nghiệm</a>
                </li>
                
            </ul>
        </li>
        <?php endif;?>
        <li class="account">
            <a href="#collapse3" class="exp collapsed" data-toggle="collapse" aria-expanded="false">
                <span><?php echo 'Tài khoản';?></span>
                <strong>3</strong>
            </a>
            <ul class="sub collapse" id="collapse3" aria-expanded="false" style="height: 1px;">
                <?php if($role==1):?>
                <li>
                    <a href="<?php echo admin_url('user/index');?>"><?php echo 'Danh sách';?></a>
                </li>
                <?php endif;?>
                <li>
                    <a href="<?php echo admin_url('user/edit_account');?>">Chỉnh sửa tài khoản</a>
                </li>
            </ul>
        </li>
        <?php if($role==1):?>
        <li class="homeSlider">
            <a href="#collapse7" class="exp collapsed" data-toggle="collapse" aria-expanded="false">
                <span><?php echo 'Quản lý slider';?></span>
                <strong>4</strong>
            </a>
            <ul class="sub collapse" id="collapse7" aria-expanded="false" style="height: 1px;">
                <li>
                    <a href="<?php echo  admin_url('HomeSlider');?>">Danh sách home slider </a>
                </li>
                <li>
                    <a href="<?php echo  admin_url('IntroSlider');?>">Danh sách intro slider </a>
                </li>
                
            </ul>
        </li>
        <?php endif;?>
        <li class="room">
            <a href="#collapse5" class="exp collapsed" data-toggle="collapse" aria-expanded="false">
                <span><?php echo 'Quản lý phòng';?></span>
                <strong>4</strong>
            </a>
            <ul class="sub collapse" id="collapse5" aria-expanded="false" style="height: 1px;">
                <?php if($role==1):?>
                <li>
                    <a href="<?php echo  admin_url('calendar');?>">Lịch đặt phòng</a>
                </li>
                <li>
                    <a href="<?php echo  admin_url('Report');?>">Báo cáo</a>
                </li>
                <li>
                    <a href="<?php echo  admin_url('area');?>">Danh sách khu vực</a>
                </li>
                <?php endif;?>
                <li>
                    <a href="<?php echo  admin_url('post_room');?>">Danh sách Căn/Phòng </a>
                </li>
                <li>
                    <a href="<?php echo  admin_url('order_room');?>">Danh sách đơn đặt phòng</a>
                </li>
                
            </ul>
        </li>
        <?php if($role==1):?>
        <li class="managerText">
            <a href="#collapse8" class="exp collapsed" data-toggle="collapse" aria-expanded="false">
                <span><?php echo 'Quản lý nd trang home';?></span>
                <strong>4</strong>
            </a>
            <ul class="sub collapse" id="collapse8" aria-expanded="false" style="height: 1px;">
                <li>
                    <a href="<?php echo  admin_url('ManagerText');?>">Danh sách nd trang home </a>
                </li>
                <li>
                    <a href="<?php echo  admin_url('FollowSocial');?>">Danh sách mạng liên kết</a>
                </li>
            </ul>
        </li>
        <li class="ManagerNews">
            <a href="#collapse9" class="exp collapsed" data-toggle="collapse" aria-expanded="false">
                <span><?php echo 'Quản lý tin tức';?></span>
                <strong>4</strong>
            </a>
            <ul class="sub collapse" id="collapse9" aria-expanded="false" style="height: 1px;">
                <li>
                    <a href="<?php echo  admin_url('News_category');?>">Danh mục tin tức </a>
                </li>
                <li>
                    <a href="<?php echo  admin_url('About');?>">Bài viết tin tức </a>
                </li>
            </ul>
        </li>
        <li class="email">
            <a href="#collapse6" class="exp collapsed" data-toggle="collapse" aria-expanded="false">
                <span><?php echo "Quản lý email";?></span>
                <strong>2</strong>
            </a>
            <ul class="sub collapse" id="collapse6" aria-expanded="false" style="height: 1px;">
                <li>
                    <a href="<?php echo  admin_url('emails');?>">Danh sách loại email</a>
                </li>
                <li>
                    <a href="<?php echo  admin_url('emails/history');?>">Lịch sử gửi email</a>
                </li>
            </ul>
        </li>
        <li class="config">
            <a href="<?php echo  admin_url('config');?>" >
                <span><?php echo 'Cấu hình hệ thống';?></span>
            </a>
        </li>
        <?php endif;?>
    </ul>
</div>
<script>
$('.category').find('strong').html($('.category').find('ul li').length);
$('.account').find('strong').html($('.account').find('ul li').length);
$('.room').find('strong').html($('.room').find('ul li').length);
$('.email').find('strong').html($('.email').find('ul li').length);
$('.homeSlider').find('strong').html($('.homeSlider').find('ul li').length);
$('.managerText').find('strong').html($('.managerText').find('ul li').length);
$('.ManagerNews').find('strong').html($('.ManagerNews').find('ul li').length);

</script>
