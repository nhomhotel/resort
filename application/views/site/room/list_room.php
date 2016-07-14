<section id="search">
    <div class="home-search">
        <div class="container">
            <div class="row">
                <?php $this->load->view('site/home/block_search');?>
            </div>
        </div>
    </div>
</section>
<section id="breadcrum-wrap">
    <div class="container">
        <div class="row">
            <div class="col-md-12 block">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Library</a></li>
                    <li class="active">Data</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section id="btn-option">
    <div class="container">
        <div class="row">
            <div class="col-md-12 block">
                <div class="filter-btn">
                    <button type="button" id="filter-control" class="btn btn-default hidden-md hidden-lg"
                            data-toggle="button" aria-pressed="false" autocomplete="off">
                        <span class="show-filter">Bộ lọc</span>
                        <span class="hide-filter">Ẩn bộ lọc <<</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="main-list">
    <div class="container">
        <div class="row">
            <!-- <div  style="max-width: 1170px;margin: 0 auto;"> -->
            <div id="sidebar" class="col-md-4  visible-lg visible-md">
                <div class="map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d119175.98717794055!2d105.83696370000004!3d21.02269665!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab9bd9861ca1%3A0xe7887f7b72ca17a9!2zSGFub2ksIEhvw6BuIEtp4bq_bSwgSGFub2ksIFZpZXRuYW0!5e0!3m2!1sen!2s!4v1461656965356"
                            width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
                <div class="filter">
                    <form>
                        <!--room-type-->
                        <div id="room_type" name="room_type" class="panel panel-default fill-item room-type">
                            <div class="panel-heading room-type-heading clearfix" data-toggle="collapse"
                                 data-target="#room-type-body">
                                <h3>Loại phòng</h3>
                                <span class="glyphicon glyphicon-chevron-down"></span>
                            </div>
                            <div class="panel-body collapse in" id="room-type-body" role="group" aria-label="...">
                                <div class="wrap-fill btn-group" data-toggle="buttons">
                                    <label class="btn btn-default tclick" data-tloc="entire_home_or_apt"
                                           data-tkey="Room Type">
                                        <input type="checkbox" name="room_types" id="entry-home" autocomplete="off">
                                        <span class="icon icon-house"></span>
                                        <span class="icon-active icon-house-active"></span>
                                        Nguyên căn
                                    </label>
                                    <label class="btn btn-default tclick" data-tloc="private_room"
                                           data-tkey="Room Type">
                                        <input type="checkbox" name="room_types" id="private-room" autocomplete="off">
                                        <span class="icon icon-room"></span>
                                        <span class="icon-active icon-room-active"></span>
                                        Phòng riêng
                                    </label>
                                </div>
                            </div>
                        </div>
                        <!--size-->
                        <div id="size_type" class="panel panel-default fill-item size-type">
                            <div class="panel-heading size-type-heading clearfix" data-toggle="collapse"
                                 data-target="#size-type-body">
                                <h3>Diện tích</h3>
                                <span class="glyphicon glyphicon-chevron-down"></span>
                            </div>
                            <div class="panel-body collapse in" id="size-type-body" role="group" aria-label="...">
                                <div class="wrap-fill btn-group">
                                    <div class="form-group">
                                        <label for="bedrooms">Phòng tắm</label>
                                        <select name="bed" class="form-control" id="bedrooms" onchange="$('#search-button').trigger('click')">
                                            <option class="tclick" data-tloc="0" data-tkey="bedrooms" role="presentation">Bất kỳ</option>
                                            <?php for ($i = 1; $i <= 10; $i++) :?>
                                            <option value="<?php echo $i; ?>" <?php if (isset($bedrooms) && $bedrooms == $i) :?>selected="selected"<?php endif; ?> class="tclick" data-tloc="<?php echo $i;?>" data-tkey="bedrooms" role="presentation"><?php echo $i ?><?php if ($i == 10) :?>+<?php endif; ?></option>
                                            <?php endfor; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="bathrooms">Phòng tắm</label>
                                        <select name="bed" class="form-control" id="bathrooms" onchange="$('#search-button').trigger('click')">
                                            <option class="tclick" data-tloc="0" data-tkey="bathrooms" role="presentation">Bất kỳ</option>
                                            <?php for ($i = 1; $i <= 10; $i++) :?>
                                            <option value="<?php echo $i; ?>" <?php if (isset($bathrooms) && $bathrooms == $i) :?>selected="selected"<?php endif; ?> class="tclick" data-tloc="<?php echo $i;?>" data-tkey="bathrooms" role="presentation"><?php echo $i ?><?php if ($i == 10) :?>+<?php endif; ?></option>
                                            <?php endfor; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="beds">Giường</label>
                                        <select name="beds" class="form-control" id="beds" onchange="$('#search-button').trigger('click')">
                                            <option class="tclick" data-tloc="0" data-tkey="beds" role="presentation">Bất kỳ</option>
                                            <?php for ($i = 1; $i <= 10; $i++) :?>
                                            <option value="<?php echo $i; ?>" <?php if (isset($beds) && $beds == $i) :?>selected="selected"<?php endif; ?> class="tclick" data-tloc="<?php echo $i;?>" data-tkey="beds" role="presentation"><?php echo $i ?><?php if ($i == 10) :?>+<?php endif; ?></option>
                                            <?php endfor; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Amenities -->
                        <?php if (isset($amenities)) :?>
                        <?php $columns = array_chunk($amenities, 2); ?>
                        <div id="amenities-container" class="panel panel-default panel-accordion panel-checkbox panel-more">
                            <div class="panel-heading"><h3 class="panel-title">Tiện nghi</h3><span class="toggle chevron"></span></div>
                            <div class="panel-body">
                                <div class="row">
                                    <?php foreach ($columns as $rows) :?>
                                    <div class="col-xs-6">
                                        <?php foreach ($rows as $entity) :?>
                                        <div class="checkbox">
                                            <label <?php if (!empty($amenities_ids) && in_array($entity->amenities_id, $amenities_ids)) :?>class="checked"<?php endif; ?>>
                                                <span class="checked"></span>
                                                <input class="chk-amenities" <?php if (!empty($amenities_ids) && in_array($entity->amenities_id, $amenities_ids)) :?>checked="checked"<?php endif; ?> name="amenities[]" value="<?php echo $entity->amenities_id; ?>" type="checkbox" /> <span style="position: relative; top: -2px;"><?php echo $entity->name; ?> &nbsp;</span>
                                            </label>
                                        </div>
                                        <?php endforeach; ?>
                                    </div>
                                    <?php endforeach; ?>
                                    <div class="cl"></div>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                        <!-- Amenities -->

                        <!-- price-range -->
                        <div id="price_range" class="panel panel-default fill-item price-range">
                            <div class="panel-heading price-range-heading clearfix" data-toggle="collapse"
                                 data-target="#price-range-body">
                                <h3>Giá</h3>
                                <span class="glyphicon glyphicon-chevron-down"></span>
                            </div>
                            <div class="panel-body collapse in" id="price-range-body" role="group" aria-label="...">
                                <div class="wrap-fill btn-group">
                                    <div id="slider-range"></div>
                                    <div class="clearfix">
                                        <!-- <label for="amount">Price range:</label> -->
                                        <input class="tclick" type="text" name="min_amount" id="min-amount"
                                               class="w50 pull-left" readonly
                                               style="border:0; color:#398fd1; font-weight:bold;text-align:left; float: left; width: 49%">
                                        <input class="tclick" type="text" name="max_amount" id="max-amount"
                                               class="w50 pull-left" readonly
                                               style="border:0; color:#398fd1; font-weight:bold;text-align:right; float: right; width: 49%">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- experience -->
                        <?php if (isset($table_experiences) && $table_experiences != '') echo $table_experiences?>
                    </form>
                </div>
            </div>
            <div id="result-list" class="col-md-8 col-sm-12 col-xs-12">
                <div id="sort-pager" class="row">
                    <div id="sort" class="col-sm-6 form-group">
                        <label>Sắp xếp theo:</label>
                        <div class="btn-group" data-toggle="buttons">
                            <label class="btn btn-default active">
                                <input class="tclick" type="radio" name="options" id="option1" autocomplete="off" checked />
                                Phổ biến
                            </label>
                            <label class="btn btn-default" id="price-sort">
                                <input class="tclick" type="radio" name="options" id="option2" autocomplete="off">
                                Giá
                                <span class="glyphicon glyphicon-sort-by-attributes up"></span>
                                <span class="glyphicon glyphicon-sort-by-attributes-alt down"></span>
                            </label>
                        </div>
                    </div>
                    <div id="pager" class="col-sm-6">
                        <span> 1 - 4 trong số 4 Bài đăng</span>
                    </div>
                    <div id="filter-active">

                    </div>
                </div>
                <div id="list-room">
                    <?php
                    if (isset($list_room) && count($list_room) > 0) {
                        $query = "?";
                        if (isset ($checkin)) $query .= '&ch_in=' . $checkin;
                        if (isset ($checkout)) $query .= '&ch_out=' . $checkout;
                        if (isset ($guest)) $query .= '&guest=' . $guest;
                        if ($query == '?') $query = '';
                        foreach ($list_room as $key => $room) {
                            ?>
                            <div class="list-room-item clearfix">
                                <div class="photo col-sm-5 col-xs-12">
                                    <a href="<?php
                                        echo base_url('room/room_detail/' . $encode->encode($room->post_room_id) . $query);?>">
                                        <?php $arr_img = json_decode($room->image_list);?>
                                        <img src="<?php echo $arr_img[0];?>" class="img-responsive"/>
                                        <!-- <span class="label label-default tag sales">-15%</span> -->
                                    </a>
                                </div>
                                <div class="info-r col-sm-7 col-xs-12">
                                    <div class="info-data">
                                        <h3 class="title-r">
                                            <a href="<?php echo base_url('room/room_detail/' . $encode->encode($room->post_room_id) . $query);?>"><?php echo $room->post_room_name;?></a>
                                        </h3>

                                        <p class="type-location">
                                            <span class="type"><?php echo $room->house_type_name;?></span>
                                            <span class="location"> - <?php echo $room->address_detail;?></span>
                                        </p>

                                        <p class="type-r hidden-xs"><?php echo $room->room_type_name;?></p>

                                        <p class="bedr-numguest">
                                            <span>Phòng ngủ: <?php echo $room->num_bedroom?></span>
                                            <span>- Số khách tối đa: <?php echo $room->num_guest?></span>
                                        </p>
                                    </div>
                                    <div class="info-price more">
                                        <p class="price-currency">
                                            <span>VND</span>
                                        </p>
                                        <p class="price-r">
                                            <!-- <span class="price-old">30</span> -->
                                            <span class="price-cur"><?php echo number_format($room->price_night_vn);?></span>
                                        </p>
                                        <p class="per-night">Một đêm</p>
                                        <p class="type-sales">
                                            <!-- <span class="label label-default tag sales-text">Khuyến mãi phút cuối</span> -->
                                        </p>
                                        <a href="<?php echo base_url('room/room_detail/' . $room->post_room_id);?>"
                                           class="btn btn-default more-show">Hiển thị thêm</a>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    } else {
                        $this->load->view('site/error/search_no_result');
                    }
                    ?>
                </div>
                <nav id="pagination">
                    <?php echo $pagination_link;?>
                </nav>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    $(document).ready(function() {
        if (typeof(min_value) == "undefined") {
            var min_value = 0;
        }
        if (typeof(max_value) == "undefined") {
            var max_value = 1000;
        }
        <?php if (isset($min)) :?>
        min_value = <?php echo intval($min); ?>;
        <?php endif; ?>
        <?php if (isset($max)) :?>
        max_value = <?php echo intval($max); ?>;
        <?php endif; ?>
        $("#slider-range").slider({
            range: true,
            min: 0,
            max: 1000,
            values: [min_value, max_value],
            slide: function (event, ui) {
                $("#min-amount").val("$" + ui.values[ 0 ]);
                $("#max-amount").val("$" + ui.values[ 1 ]);
            },
            change: function (ev, ui) {
                $("#search-button").trigger("click");
            }
        });
        $("#min-amount").val("$" + $("#slider-range").slider("values", 0));
        $("#max-amount").val("$" + $("#slider-range").slider("values", 1));
        $("#search").sticky({topSpacing: -12});
    });
</script>