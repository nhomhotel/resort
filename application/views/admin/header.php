<?php
// Lay du lieu tu userLogin
if ($this->session->userdata('userLogin')) {
    $userLogin = $this->session->userdata('userLogin');
}
?>
<div class="wrapper clearfix col-md-12">
    <div id="toggle-sidebar" class="visible-xs pull-left">
        <button class="btn btn-default ">
            <span class="glyphicon glyphicon-menu-hamburger"></span>
        </button>
    </div>
    <div class="userNav">
        <ul>
            <li>
                <a href="<?php echo admin_url('post_room/post'); ?>">
                    <img style="margin-top: 7px;" src="<?php echo base_url(); ?>public/admin/images/icons/light/create.png"/>
                    <span><?php echo 'Đăng phòng'; ?></span>
                </a>
            </li>
            <li>
                <a href="<?php echo base_url().'admin/home'?>" target="_blank">
                    <img style="margin-top:7px;" src="<?php echo base_url(); ?>public/admin/images/icons/light/home.png"/>
                    <span><?php echo 'Trang chủ'; ?></span>
                </a>
            </li>
            <!-- Logout -->
            <li>
                <a href="<?php echo admin_url('user/logout'); ?>">
                    <img src="<?php echo base_url(); ?>public/admin/images/icons/topnav/logout.png"/>
                    <span><?php echo 'Đăng xuất'; ?></span>
                </a>
            </li>
        </ul>
    </div>
</div>




