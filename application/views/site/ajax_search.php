<div class="info-r col-sm-7 col-xs-12">
    <?php if(isset($table_content)&& count($table_content)>0): $query='';
        foreach ($table_content as $key =>$value):?>
    <div class="info-data">
        <h3 class="title-r">
            <a href="<?php echo base_url('room/room_detail/'.$encode->encode($value->post_room_id).$query);?>"><?php echo $value->post_room_name;?></a>
        </h3>
        <p class="type-location">
            <span class="type"><?php echo $value->house_type_name;?></span>
            <span class="location"> - <?php echo $value->address_detail;?></span>
        </p>
        <p class="type-r hidden-xs"><?php echo $value->room_type_name;?></p>
        <p class="bedr-numguest">
            <span>Phòng ngủ: <?php echo $value->num_bedroom?></span>
            <span>- Số khách tối đa: <?php echo $value->num_guest?></span>
        </p>
                </div>
                <div class="info-price more">
                        <p class="price-currency">
                                <span>VND</span>
                        </p>
                        <p class="price-r">
                                <!-- <span class="price-old">30</span> -->
                                <span class="price-cur"><?php echo number_format($value->price_night_vn);?></span>
                        </p>
                        <p class="per-night">Một đêm</p>
                        <p class="type-sales">
                                <!-- <span class="label label-default tag sales-text">Khuyến mãi phút cuối</span> -->
                        </p>
                        <a href="<?php echo base_url('room/room_detail/'.$value->post_room_id);?>" class="btn btn-default more-show">Hiển thị thêm</a>
                </div>
    <?php endforeach;?>
    <?php endif;?>
        </div>