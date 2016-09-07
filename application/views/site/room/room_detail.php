<script type="text/javascript"> 
var id='<?php echo $id_encode;?>';
</script>
<?php $user = $this->session->userdata('userLoginSite');?>
<script type="text/javascript" src="<?php echo base_url()?>public/site/js/jquery.validate.js"></script>
<section id="breadcrum-wrap">
    <div class="container">
        <div class="row">
            <div class="col-md-12 block">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">room</a></li>
                    <li class="active">room_detail</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section id="book-main">
    <div class="container">
        <div class="row">
            <div class="block clearfix" style="margin-top: 47px;">
                <?php if ($this->session->flashdata('message')): ?>
                    <div class="alert alert-success info">
                        <strong>Success!</strong><br><?php echo $this->session->flashdata('message'); ?> 
                    </div>
                <?php endif;?>
                <div id="book-left" class="col-sm-8 col-xs-12">
                    <div class="tit-room">
                        <h1><?php echo (isset($info))? $info->post_room_name : '';?></h1>
                        <p>
                            <?php echo (isset($info))? $info->house_type_name.' - '.$info->room_type_name.' - '.$info->address_detail : '';?>
                        </p>
                    </div>
                    <div class ="slider-img">
                        <div class="fotorama" data-nav="thumbs" data-allowfullscreen="native">
                            <?php
                            $arr_img= (isset($info))?json_decode($info->image_list): '';
                            if($arr_img && is_array($arr_img)){
                                foreach ($arr_img as $img) {?>
                                    <img src="<?php echo $img?>" data-caption="<?php echo ((isset($info))? $info->post_room_name : '');?>">
                                <?php }
                            }else{
                                    echo '<img src="'.base_url().'public/site/images/none.svg"  data-caption="NONE IMAGES">';
                            }?>
                        </div>
                    </div>
                        <div class="feature">
                            <ul class="wrap-fea clearfix">
                                <li class="inline fea-item" >
                                    <span style = "background:url(<?php echo base_url(); ?>public/site/images/icon/feature-type-apartment.svg) no-repeat 50% 50%;"></span>
                                    <?php echo (isset($info))? $info->house_type_name :'';?>
                                </li>
                                <li class="inline fea-item" >
                                    <span style = "background:url(<?php echo base_url(); ?>public/site/images/icon/feature-room-entire_home.svg) no-repeat 50% 50%;"></span>
                                    <?php echo (isset($info))? $info->room_type_name :'';?>
                                </li>
                                <li class="inline fea-item" >
                                    <span style = "background:url(<?php echo base_url(); ?>public/site/images/icon/feature-guests.png) no-repeat 50% 50%;"></span>
                                    <?php echo (isset($info))? $info->num_guest :'';?> Người
                                </li>
                                <li class="inline fea-item" >
                                    <span style = "background:url(<?php echo base_url(); ?>public/site/images/icon/feature-bedroom.png) no-repeat 50% 50%;"></span>
                                    <?php echo (isset($info))? $info->num_bedroom :'';?> Phòng ngủ
                                </li>
                                <li class="inline fea-item" >
                                    <span style = "background:url(<?php echo base_url(); ?>public/site/images/icon/feature-bed.png) no-repeat 50% 50%;"></span>
                                    <?php echo (isset($info))? $info->num_bed :''; ?> Giường
                                </li>
                                <li class="inline fea-item" >
                                    <span style = "background:url(<?php echo base_url(); ?>public/site/images/icon/feature-bathroom.png) no-repeat 50% 50%;"></span>
                                    <?php echo (isset($info))? $info->num_bathroom :'';?> Phòng tắm
                                </li>
                            </ul>
                        </div>
                        <div class="item-room description">
                                <h2>Mô tả</h2>
                                <p><?php echo (isset($info))? $info->description : '' ;?></p>
                        </div>
                        <div class="item-room amenities">
                                <h2>Tiện nghi</h2>
                                <ul class="clearfix">
                                <?php
                                    $str_amenities = (isset($info))? $info->amenities: '';
                                    if($str_amenities){
                                        $arr_amenities = explode(',', $str_amenities);
                                        foreach ($arr_amenities as $amenitie) {
                                            foreach ($list_amenities as $value) {
                                                if($amenitie == $value->amenities_id){?>
                                                    <li><span class="glyphicon glyphicon-ok">&nbsp;</span><?php echo $value->name?></li>
                                                    <?php
                                                }
                                            }
                                        }
                                    }?>
                                </ul>
                        </div>
                        <div class="item-room price">
                            <h2>Giá phòng</h2>
                            <div class="tb-price">
                                <table class="table table-striped">
                                    <tbody>
                                        <tr>
                                            <th>Phí dọn dẹp</th>
                                            <td><?php echo (isset($info) && $info->clearning_fee_vn) ? $info->clearning_fee_vn : 'Không có phí'?></td>
                                        </tr>
                                        <tr>
                                            <th>Phí cho mỗi khách thêm</th>
                                            <td><?php echo (isset($info) && $info->price_guest_more_vn) ? $info->price_guest_more_vn : 'Không có phí'?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="item-room location">
                                <h2>Địa điểm</h2>
                                <div class="map-wrap" id="map-wrap">
                                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d59587.962998060575!2d105.80194398283935!3d21.02277318570672!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab9bd9861ca1%3A0xe7887f7b72ca17a9!2zSGFub2ksIEhvw6BuIEtp4bq_bSwgSGFub2ksIFZpZXRuYW0!5e0!3m2!1sen!2s!4v1461318424156" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                                </div>
                        </div>
                        <div class="item-room house-rules">
                                <h2>Quy định</h2>
                                <p>Xin vui lòng: <br>* được trách nhiệm và ân cần <br>* tắt đèn và tất cả các thiết bị điện / ghi khi bạn đang không ở trong nhà. Nó giúp để ngăn chặn quá nóng và tiết kiệm môi trường.
                                <br>* Giữ giày / dép và tất cả các đồ đạc khác bên trong căn hộ.
                                <br>* Không có thuốc trong căn hộ hay tòa nhà (hút thuốc trên ban công được phép) </p>
                        </div>
                        <div class="item-room other-detail">
                            <h2>Chi tiết khác</h2>
                            <div class="tb-detail table-responsive">
                                <table class="table table-striped">
                                    <tbody>
                                        <tr><th>Nhận phòng</th><td>...</td></tr>
                                        <tr><th>Trả phòng</th><td>...</td></tr>
                                        <tr><th>Diện tích</th><td><?php echo (isset($info))? $info->acreage : '';?> m<sup>2</sup></td></tr>
                                        <tr><th>Số khách tối đa</th><td><?php echo (isset($info))? $info->num_guest : '';?> khách</td></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                </div>
                <div id="book-right" class="col-sm-4 col-xs-12">
                        <div id="book-now" class="">
                                <div class="book-prices">
                                        <div class="price-wrap clearfix">
                                                <!-- <span class="label label-default pull-right">Khuyến mãi: Giảm 10% !</span> -->
                                                <p class="price-num">
                                                        <span class="pr-curent"><?php echo number_format((isset($info))? $info->price_night_vn : 0);?></span>
                                                        <!-- <span class="pr-old">500.000</span> -->
                                                </p>
                                                <p class="currency">VND</p>
                                                <p class="price-method">Giá trung bình theo đêm</p>
                                        </div>
                                </div>
                                <div class="dates-guests">
                                    <div class="prices"></div>
                                    <?php $query = "";
                                        if(isset($checkin))$query.='&checkin='.$checkin;
                                        if(isset($checkout))$query.='&checkout='.$checkout;
                                        if(isset($guests))$query.='&guests='.$guests;

                                    ?>
                                    <div class="dates-guests">
                                        <form  id="frm-book" class="clearfix" method="POST" action="<?php echo base_url().'payments/book/'.$id_encode?>">
                                                <div class="form-group w30 pull-left book-wrap">
                                                    <label for="">Nhận phòng</label>
                                                    <input type="text" class="form-control bookin" id ="bookin-dpk" value="<?php echo isset($checkin)?$checkin:'';?>" placeholder="dd/mm/yyyy">
                                                </div>
                                                <div class="form-group w30 pull-left book-wrap middle">
                                                    <label for="">Trả phòng</label>
                                                    <input type="text" class="form-control bookout" id ="bookout-dpk" value="<?php echo isset($checkout)?$checkout:'';?>" placeholder="dd/mm/yyyy">
                                                </div>
                                                <div class="form-group w30 pull-left book-wrap">
                                                    <label for="">Khách</label>
                                                    <select name="" id="guests" class="form-control">
                                                        <?php for($i=1;$i<10;$i++){?>
                                                            <option <?php echo isset($guests)&&$guests==$i?'selected':'';?> ><?php echo $i?></option>
                                                        <?php }?>
                                                            <option <?php echo isset($guests)&&$guests>$i?'selected':'';?> ><?php echo $i.'+'?></option>
                                                    </select>
                                                </div>
                                                <div class="clearfix"></div>
                                        </form>
                                        <div class="fees alert alert-warning info-book"></div>
                                    </div>
                                    <div class="book-action">
                                        <button  class="btn btn-success order_room_btn tclick" data-toggle="modal" data-target="#myModal">
                                            <span class="glyphicon glyphicon-time"></span> Đặt phòng
                                        </button>
                                        <?php if(!empty($user))$user_id=$user['user_id'];if(!$user_id){?>
                                            <div class="modal fade" id="myModal" role="dialog">
                                                <form method="post" name="form-save-info" id="form-save-info">
                                                    <div class="modal-dialog">
                                                      <!-- Modal content-->
                                                      <div class="modal-content">
                                                        <div class="modal-header">
                                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                          <h4 class="modal-title">Thông tin đặt phòng</h4>
                                                          <p class="error_submit"></p>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                      <label for="input_name_customer" class="control-label ">Tên khách hàng</label>
                                                                      <div class="input-field">
                                                                          <input type="text" class="form-control " name = "name_customer" id="name_customer" required/>
                                                                      </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                      <label for="input_phone_number" class="control-label ">Số điện thoại</label>
                                                                      <div class="input-field">
                                                                          <input type="text" class="form-control" name="phone_number" id="phone_number"/>
                                                                      </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="input_email" class="control-label ">Địa chỉ email</label>
                                                                        <div class="input-field">
                                                                            <input type="email" class="form-control" name="email" id="email"/>
                                                                        </div>
                                                                      </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" data-dismiss="modal" class="btn btn-default">Đóng</button>
                                                            <button type="submit" class="btn btn-primary" id="save_info_customer">Lưu thông tin</button>
                                                        </div>
                                                      </div>
                                                    </div>
                                                </form>
                                              </div>
                                        <?php }?>
                                    </div>
                                </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="post-same">
</section>
<script type="text/javascript">
$(document).ready(function(){
    function validateDateTime(date){
        var date_regex = /^(0[1-9]|1\d|2\d|3[01])\/(0[1-9]|1[0-2])\/(19|20)\d{2}$/ ;
        if(!(date_regex.test(date)))return false;
        return true;
    }
    $(".book-action .order_room_btn").on("click",function(){
        if(typeof $('#bookin-dpk') == 'undefined'|| $('#bookin-dpk').val()==''||!validateDateTime($('#bookin-dpk').val())){
            $(".fees").html('Ngày nhận phòng không đúng!');
            return false;
        }
        if(typeof $('#bookout-dpk') == 'undefined'|| $('#bookout-dpk').val()==''||!validateDateTime($('#bookout-dpk').val())){
            $(".fees").html('Ngày trả phòng không đúng!');
            return false;
        }
        if(typeof $('#guests') == 'undefined'|| $('#guests').val()==''||isNaN(parseFloat($('#guests').val()))){
            $(".fees").html('Số lượng khách không đúng!');
            return false;
        }
    })
    $('#name_customer').keydown(function(){$('.error_submit').html('');});
    $('#phone_number').keydown(function(){$('.error_submit').html('');});
    $('#email').keydown(function(){$('.error_submit').html('');});
        var nowTemp = new Date();
        var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
        var checkin = $('#bookin-dpk');
        var checkout = $('#bookout-dpk')
        checkin.datepicker({
            onRender: function(date) {
                return date.valueOf() < now.valueOf() ? 'disabled' : '';
            },
                format: 'dd/mm/yyyy',
                startDate:now
          }).on('changeDate', function(ev) {
            var newDate;
            if (ev.date.valueOf() > checkout.val()) {
                newDate  = new Date(ev.date)
                newDate.setDate(newDate.getDate() );
            }
            checkout.datepicker('setStartDate',newDate);
            checkin.datepicker('hide');
            checkout[0].focus();
            if(checkout.val()!=''){
                $.ajax({
                    url:'<?php echo base_url().'spaces/prices/'.$id_encode?>',
                    type: 'POST',
                    dataType: 'json',
                    data: {checkin:$('#bookin-dpk').val(),checkout:$('#bookout-dpk').val(),guests:$('#guests').val()},
                    success: function (data) {
                        if((typeof data.error)!= 'undefined'){
                            $('.fees').html(data.error);
                            $('.prices').html('');
                        }else if((typeof data.prices)!= 'undefined'){
                            $('.fees').html('');
                            $('.prices').html(data.prices);
                        }
                    }
                })
            }

        }).data('datepicker');
        checkout.datepicker({
        onRender: function(date) {
            return date.valueOf() <= checkin.val() ? 'disabled' : '';
        },
        format: 'dd/mm/yyyy',
        startDate:now
        }).on('changeDate', function(ev) {
            checkout.datepicker('hide');
            var newDate = new Date(ev.date)
            newDate.setDate(newDate.getDate() );
            if(checkin.val()!=''){
                $.ajax({
                  url:'<?php echo base_url().'spaces/prices/'.$id_encode?>',
                  type: 'POST',
                  dataType: 'json',
                  data: {checkin:$('#bookin-dpk').val(),checkout:$('#bookout-dpk').val(),guests:$('#guests').val()},
                  success: function (data) {
                        if((typeof data.error)!= 'undefined'){
                            $('.fees').html(data.error);
                            $('.prices').html('');
                        }else if((typeof data.prices)!= 'undefined'){
                            $('.fees').html('');
                            $('.prices').html(data.prices);
                        }
                    }
                })
            }
        }).data('datepicker');
        $('#guests').on('change',function(){
        var checkin     = $('#bookin-dpk');
        var checkout    = $('#bookout-dpk');
            if(typeof checkin != undefined && checkin.val().trim() != '' && typeof checkout != undefined && checkout.val().trim() != ''){
                $.ajax({
                  url:'<?php echo base_url().'spaces/prices/'.$id_encode?>',
                  type: 'POST',
                  dataType: 'json',
                  data: {checkin:$('#bookin-dpk').val(),checkout:$('#bookout-dpk').val(),guests:$('#guests').val()},
                  success: function (data) {
                        if((typeof data.error)!= 'undefined'){
                            $('.fees').html(data.error);
                            $('.prices').html('');
                        }else if((typeof data.prices)!= 'undefined'){
                            $('.fees').html('');
                            $('.prices').html(data.prices);
                        }
                    }
                })
            }    
        })
        $('#frm-book').on('submit', function(ev) {
            var checkin = $('#bookin-dpk');
            var checkout = $('#bookout-dpk');
            var guest = $('#guests');
            <?php if(!empty($user))$user_id=$user['user_id'];if(!$user_id){?>
//            $('#myModal').modal('show');
            return false;
            <?php }?>
            var data = {checkin:checkin.val(),checkout:checkout.val(),guest:guest.val()};
            $.ajax({
                type : 'POST',
                url  : $(this).attr('action'),
                data : data,
                success :  function(data){
                    console.log(data);
                },
                dataType:'json',
            })
            ev.preventDefault();
        });
        $("#form-save-info").validate({
    rules: {
        name_customer: {
            required:true,
            NameCheck:true
        },
        email: {
            required: true,
            email: true
        },
        phone_number:{
            required: true,
            PhoneCheck:true,
        }
    },
    messages: {
        name_customer: {
            required:"Tên không được để trống"
        },
        email: {
            required:"email không được để trống",
            email:"Email không đúng"
        },
        phone_number:{
            required: 'Số điện thoại không được để trống.',
            PhoneCheck:'Số điện thoại không đúng định dạng đó'
        }
            
    },
    submitHandler: function(form) {
        var urlCurl = window.location.href;
        var check_in = $('#bookin-dpk');
        var check_out = $('#bookout-dpk');
        var guests = $('#guests');
        urlCurl = urlCurl.split(id)[0]+id+"?";
        if(typeof check_in != 'undefined'&& check_in.val()!=''&&validateDateTime(check_in.val())){
            urlCurl+="&checkin="+check_in.val();
        }
        if(typeof check_out != 'undefined'&& check_out.val()!=''&&validateDateTime(check_out.val())){
            urlCurl+="&checkout="+check_out.val();
        }
        if(typeof guests != 'undefined'&& guests.val()!=''&&!isNaN(parseFloat(guests.val()))){
            urlCurl+="&guests="+guests.val();
        }
        
        $.ajax({
                type : 'POST',
                url  : "<?php echo base_url().'user/createFast'?>",
                data : {nameCustomer:$('#name_customer').val(),phoneNumber:$('#phone_number').val(),email:$('#email').val()},
                success :  function(data){
                    if(!data.success){
                        $('.error_submit').html(data.message);
                        return false;
                    }
                    window.location.href = urlCurl;
                },
                dataType:'json',
            })
    }
});
})
</script>

<script type="text/javascript">
	var lat = <?php echo (isset($info))? $info->lat : 0 ?>;
    var lng = <?php echo (isset($info))? $info->lng : 0 ?>;
	function initMap(){
            var mapOption = {
            zoom: 16, 
            center: {lat: lat, lng: lng},
        }
            var map = new google.maps.Map(document.getElementById('map-wrap'), mapOption);
            setMarker(map);
	}

	function setMarker(map){
            var marker = new google.maps.Marker({
                position: {lat: lat, lng: lng},
                animation: google.maps.Animation.DROP,
            });
        marker.setMap(map);
	}

</script>
<style>
    .error_submit{
        text-align: center;
        color: red;
    }
</style>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBwl-pYart0L9n0XPX_V5AuFFPmk-o-rlM&libraries=places&callback=initMap"></script>