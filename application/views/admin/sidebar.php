<?php
    // Lay du lieu tu userLogin
    if($this->session->userdata('userLogin')){
        $userLogin = $this->session->userdata('userLogin');
        $role = $this->User_model->get_role($userLogin['user_id']);
    }
?>
<div class="sideProfile">
    <a href="#" title="" class="profileFace">
        <img width="40" src="<?php echo base_url();?>public/admin/images/user.png">
    </a>
    <span><?php echo lang('hello');?>: <strong><?php echo (isset($userLogin)) ? $userLogin['user_name'] : '' ;?></strong></span>
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
        <li class="product">
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
                <li>
                    <a href="<?php echo admin_url('user/index');?>"><?php echo 'Danh sách';?></a>
                </li>
                <li>
                    <a href="<?php echo admin_url('user/view_account');?>">Tài khoản của tôi</a>
                </li>
                <li>
                    <a href="<?php echo admin_url('user/edit_account');?>">Chỉnh sửa tài khoản</a>
                </li>
            </ul>
        </li>
        <li class="product">
            <a href="#collapse5" class="exp collapsed" data-toggle="collapse" aria-expanded="false">
                <span><?php echo 'Quản lý phòng';?></span>
                <strong>4</strong>
            </a>
            <ul class="sub collapse" id="collapse5" aria-expanded="false" style="height: 1px;">
                <li>
                    <?php if($role==1):?>
                    <a href="<?php echo  admin_url('calendar');?>">Lịch đặt phòng</a>
                    <a href="<?php echo  admin_url('area');?>">Danh sách khu vực</a>
                    <?php endif;?>
                    <a href="<?php echo  admin_url('post_room');?>">Danh sách phòng đăng</a>
                    <a href="<?php echo  admin_url('order_room');?>">Danh sách phòng đăng ký</a>
                </li>
                
            </ul>
        </li>
        <?php if($role==1):?>
        <li class="email">
            <a href="#collapse6" class="exp collapsed" data-toggle="collapse" aria-expanded="false">
                <span><?php echo "Quản lý email";?></span>
                <strong>2</strong>
            </a>
            <ul class="sub collapse" id="collapse6" aria-expanded="false" style="height: 1px;">
                <li>
                    <a href="<?php echo  admin_url('emails');?>">Danh sách loại email</a>
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
