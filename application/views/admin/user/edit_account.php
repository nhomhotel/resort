<script type="text/javascript" src="http://hotel.git-dev.new.nhom/public/site/js/jquery.validate.js"></script>
<script type="text/javascript" src="http://hotel.git-dev.new.nhom/public/site/js/bootstrap-datepicker.min.js"></script>

<div class="titleArea clearfix">
    <div class="wrapper clearfix col-md-12">
        <div class="pageTitle">
            <h5>User</h5>
            <span><?php echo isset($title) ? $title : ''; ?></span>
        </div>
        <div class="horControlB menu_action">
            <ul>
                <li>
                    <a href="<?php echo admin_url('user/create'); ?>">
                        <img src="<?php echo base_url(); ?>/public/admin/images/icons/control/16/add.png"/>
                        <span>Thêm tài khoản</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url().'admin/user/edit_account'?>">
                        <img src="<?php echo base_url(); ?>/public/admin/images/icons/control/16/feature.png" />
                        <span>Tiêu biểu</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url().'admin/user/index'?>">
                        <img src="<?php echo base_url(); ?>/public/admin/images/icons/control/16/list.png" />
                        <span>Danh sách</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="line"></div>
<!-- Message -->
<!-- Main content wrapper -->
<div class="wrapper col-md-12  clearfix content">
    <div class="widget">
        <div class="title">
            <span class="titleIcon"><img src="<?php echo base_url(); ?>public/admin/images/icons/tableArrows.png"/></span>
            <h6><?php echo isset($title) ? $title : ''; ?></h6>
        </div>
        <div class="tab_container tab-content">
            <div id='tab1' class="tab_content pd0 tab-pane active" role="tabpanel">
                <form class="form" id="edit_account" name="edit_account" action="" method="post" enctype="multipart/form-data">
                    <div class="formRow">
                        <label class="formLeft" for="param_name">Ảnh đại diện:</label>
                        <div class="formRight">
                            <span class="oneTwo">
                                <img  src="<?php if(isset($user)&&isset($user->avarta))echo  base_url().'public/admin/images/'.$user->avarta; else echo base_url().'public/admin/images/no_avatar.jpg'; ?>" width = "100px" height = "100px">
                            </span>
                            <p class="oneTwo">
                                <input type="file" name="avarta" id="avarta" _autocheck="true" />
                            </p>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label class="formLeft" for="param_name">Họ:</label>
                        <div class="formRight">
                            <span class="oneTwo">
                                <input type="text" name="last_name" id="last_name" value="<?php echo isset($user)&&isset($user->last_name)?$user->last_name:'';?>" class="mw200" required/>
                            </span>
                            <span name="name_autocheck" class="autocheck"></span>
                            <div name="name_error" class="clear error"><?php echo form_error('last_name'); ?></div>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label class="formLeft" for="param_name">Tên:</label>
                        <div class="formRight">
                            <span class="oneTwo">
                                <input type="text" name="first_name" id="first_name" value="<?php echo isset($user)&&isset($user->first_name)?$user->first_name:'';?>" class="mw200"/>
                            </span>
                            <span name="name_autocheck" class="autocheck"></span>
                            <div name="name_error" class="clear error"><?php echo form_error('first_name'); ?></div>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label class="formLeft" for="param_name">Email:</label>
                        <div class="formRight">
                            <span class="oneTwo">
                                <input type="text" name="email" id="email" value="<?php echo isset($user)&&isset($user->email)?$user->email:'';?>" class="mw200"/>
                            </span>
                            <span name="name_autocheck" class="autocheck"></span>
                            <div name="name_error" class="clear error"><?php echo form_error('email'); ?></div>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label class="formLeft" for="param_name">Số điện thoại:</label>
                        <div class="formRight">
                            <span class="oneTwo">
                                <input type="text" name="phone" id="phone"  value="<?php echo isset($user)&&isset($user->phone)?$user->phone:'';?>" class="mw200"/>
                            </span>
                            <span name="name_autocheck" class="autocheck"></span>
                            <div name="name_error" class="clear error"><?php echo form_error('phone'); ?></div></div>
                            <div class="clear"></div>
                        </div>
                    <div class="formRow">
                        <label class="formLeft" for="param_name">Mô tả về bạn:</label>
                        <div class="formRight">
                            <span class="oneTwo">
                                <textarea rows="5" class="mw300" name="description" value="<?php echo isset($user)&&isset($user->description)?$user->description:'';?>" ></textarea>
                            </span>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label class="formLeft" for="param_name">Giới tính:</label>
                        <div class="formRight" id="gender-option">
                            <span class="oneTwo">
                                <?php $gender= isset($user)&&isset($user->gender)?$user->gender:'';?>
                                <label>
                                    <input type="radio" name="gender" <?php if($gender=='1') echo 'checked';?> value="1"> Nam
                                </label>
                                <label>
                                    <input type="radio" name="gender"  <?php if($gender=='2') echo 'checked';?> value="2"> Nữ
                                </label>
                                <label>
                                    <input type="radio" name="gender"  <?php if($gender=='0') echo 'checked';?> value=""> Khác
                                </label>
                            </span>
                            <span name="name_autocheck" class="autocheck"></span>
                            <div name="name_error" class="clear error"></div>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label class="formLeft" for="param_name">Ngày sinh:</label>
                        <div class="formRight">
                            <span class="oneTwo">
                                <input type="text" id="birthday" name="birthday" class="mw200" value="<?php echo isset($user)&&isset($user->birthday)?$user->birthday:'';?>" >
                            </span>
                            <span name="name_autocheck" class="autocheck"></span>
                            <div name="name_error" class="clear error"></div>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label class="formLeft" for="param_name">Địa chỉ:</label>
                        <div class="formRight">
                            <span class="oneTwo">
                                <textarea rows="3" class="mw300" name="address" value="<?php echo isset($user)&&isset($user->address)?$user->address:'';?>" ></textarea>
                            </span>
                            <span name="name_autocheck" class="autocheck"></span>
                            <div name="name_error" class="clear error"></div>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label class="formLeft" for="param_name">Nơi làm việc:</label>
                        <div class="formRight">
                            <span class="oneTwo">
                                <textarea rows="3" class="mw300" name="workplace" value="<?php echo isset($user)&&isset($user->address)?$user->address:'';?>" ></textarea>
                            </span>
                            <span name="name_autocheck" class="autocheck"></span>
                            <div name="name_error" class="clear error"></div>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label class="formLeft" for="param_name">Quốc gia:</label>
                        <div class="formRight">
                            <span class="oneTwo">
                                <select name="country" class="w150">
                                    <option>Việt Nam</option>
                                </select>
                            </span>
                            <span name="name_autocheck" class="autocheck"></span>
                            <div name="name_error" class="clear error"></div>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <div class="formRight">
                            <span class="oneTwo">
                                <input class="btn btn-primary" type="submit" value="Cập nhật" style="background-image:none "/></span>
                        </div>
                    </div>
                </form>
            </div>
        </div> 
    </div>
</div>
<script>
$(document).ready(function(){
    var nowTemp = new Date();
    var now = new Date('1980', '1', '1', 0, 0, 0, 0);
    $('#birthday').datepicker({format: 'dd/mm/yyyy',startDate:now});
     $("#edit_account").validate({
    rules: {
        last_name: {
            required:true,
            NameCheck:true
        },
        first_name: {
            required: true,
            NameCheck:true
        },
        email:{
            required: true,
            email: true
        },
        phone:{
            required: true,
            PhoneCheck:true
        }
    },
    messages: {
        last_name: {
            required:'Tên không được để trống',
            NameCheck:'Tên chỉ chứa ký tự và dấu cách'
        },
        first_name: {
            required: 'Tên không được để trống',
            NameCheck:'Tên chỉ chứa ký tự và dấu cách'
        },
        email: {
            required:"email không được để trống",
            email:"Email không đúng"
        },
        phone:{
            required: 'Số điện thoại không được để trống.',
            PhoneCheck:'Số điện thoại không đúng định dạng đó'
        }
            
    },
    submitHandler: function(form) {
        form.submit();
    }
});
})
</script>
