<script type="text/javascript">
    var id = '<?php echo $id_encode; ?>';
</script>
<script type="text/javascript" src="<?php echo base_url() ?>public/site/js/jquery.validate.js"></script>
<div id="view" style="margin-left: 15px;margin-top: 85px;">
    <form accept-charset="UTF-8" action="<?php echo base_url(); ?>payments/book/<?php echo $id_encode . '?checkin=' . $checkin->format('d-m-Y') . '&checkout=' . $checkout->format('d-m-Y') . '&guests=' . $guests; ?>" data-action-book="/payments/book/<?php echo $id_encode; ?>" data-action-contact="/users/update/7aea1cf9188e998f86c9d921fc0e8f21" data-action-finalize="/payments/finalize/1BPHJ-B6BB-VRMV" id="payment-form" method="post" name="book" novalidate="novalidate"><div style="margin:0;padding:0;display:inline"><input name="utf8" value="✓" type="hidden"><input name="authenticity_token" value="7WoaKA9ACSC1KEJYL4+vfP+euhiO0gES5PeSi6PIbH4=" type="hidden"></div>
        <input name="oid" value="1BPHJ-B6BB-VRMV" type="hidden">
        <div class="row">
            <div id="booking" class="col-sm-4 col-sm-push-8">
                <a href="<?php echo base_url() . 'room/room_detail/' . $id_encode; ?>" target="_blank" class="space row">
                    <div class="photo col-xs-4 col-sm-5"><img alt="<?php echo $name_room; ?>" src="<?php if (isset($image_room)) echo $image_room; ?>"></div>
                    <div class="data col-xs-8 col-sm-7">
                        <h3><?php echo $name_room; ?></h3>
                        <p class="location">Hanoi, Hà Nội, Vietnam</p>
                        <p class="stars"> 
                            <span class="stars"><span class="star-on"></span><span class="star-on"></span><span class="star-on"></span><span class="star-half"></span><span class="star-off"></span></span>
                        </p>
                    </div>
                </a>
                <table class="details">
                    <tbody>
                        <tr>
                            <th>Ngày đến</th>
                            <td><?php if (isset($checkin)) echo $checkin->format('d-m-Y'); ?> <span class="info">2:00 CH</span></td>
                        </tr>
                        <tr>
                            <th>Ngày đi</th>
                            <td><?php if (isset($checkout)) echo $checkout->format('d-m-Y'); ?> <span class="info">12:00 CH</span></td>
                        </tr>
                        <tr>
                            <th>Khách</th>
                            <td><?php if (isset($guests)) echo $guests; ?></td>
                        </tr>
                    </tbody>
                </table>
                <?php if (isset($prices)) echo $prices; ?>
                <div id="why-book" class="bg-box bg-info">
                    <h4 class="shield-blue">Tại sao đặt chỗ qua chúng tôi?</h4>
                    <ul class="checklist">
                        <li>Hệ thống thanh toán an toàn</li>
                        <li>Nhận hỗ trợ cả ngày lẫn đêm</li>
                        <li>Bảo vệ khỏi gian lận hoặc lừa đảo</li>
                    </ul>
                </div>
                <div class="desk-widgets">
                    <h4>Cần giúp đỡ để đặt phòng?</h4>
                    <span class="assistly-widget" id="assistly-widget-1"></span>             
                </div>
            </div>
            <div id="form" class="col-sm-8 col-sm-pull-4">
                <div class="encrypt">Chúng tôi mã hóa thông tin thanh toán của bạn để việc xử lý được bảo mật</div>
                <div class="row">
                    <div class="form-group col-xs-6">
                        <label for="method">Phương thức thanh toán</label>
                        <div class="dropdown ready method_payment">
                            <button class="dropdown-toggle form-control" type="button" id="method" data-toggle="dropdown">
                                <span class="placeholder">Chọn phương thức thanh toán</span>
                                <input type="hidden" name="method" />
                            </button>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="method" style="margin-right: -60px; max-width: 1243px;">
                                <li role="presentation"><a role="menuitem" tabindex="-1"  data-value="visa" data-key="1" >Visa</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" data-value="mastercard" data-key="2" >MasterCard</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" data-value="paypal" data-key="3" >PayPal</a></li>
                            </ul>
                            <div class="dropdown-menu-chevron" style="left: 185px;"></div>
                            <input type="hidden" name="payment_type" id="payment-type" class="validate" value="" required="">
                        </div>
                    </div>
                    <div class="payment-icons no-label form-group col-xs-6">
                        <ul class="list-inline">
                            <li class="payment-visa"><img alt="Visa" width="52px" src="<?php echo base_url() . 'public/site/images/Visa.png'; ?>"/></li>
                            <li class="payment-mastercard"><img alt="MasterCard" width="52px" src="<?php echo base_url() . 'public/site/images/MasterCard.png'; ?>"/></li>
                            <li class="payment-paypal"><img alt="PayPal" width="52px" src="<?php echo base_url() . 'public/site/images/PayPal.png'; ?>"/></li>
                        </ul>
                    </div>
                </div>
                <div id="paypal-details" class="payment-details row" style="display: none;">
                    <div class="col-xs-12">Bạn sẽ thanh toán bẳng <strong>USD</strong>. Tổng số tiền: <strong>USD 1.008</strong>.</div>
                </div>
                <div id="visa-details" class="payment-details row" style="display: none;">
                    <div class="col-xs-12">Bạn sẽ thanh toán bẳng <strong>USD</strong>. Tổng số tiền: <strong>USD 1.008</strong>.</div>
                </div>
                <div id="mastercard-details" class="payment-details row" style="display: none;">
                    <div class="col-xs-12">Bạn sẽ thanh toán bẳng <strong>USD</strong>. Tổng số tiền: <strong>USD 1.008</strong>.</div>
                </div>
                <div id="amex-details" class="payment-details row" style="display: none;">
                    <div class="col-xs-12">Bạn sẽ thanh toán bẳng <strong>USD</strong>. Tổng số tiền: <strong>USD 1.008</strong>.</div>
                </div>
                <div id="jcb-details" class="payment-details row" style="display: none;">
                    <div class="col-xs-12">Bạn sẽ thanh toán bẳng <strong>USD</strong>. Tổng số tiền: <strong>USD 1.008</strong>.</div>
                </div>
                <h2>Thông tin về khách</h2>
                <div class="row">
                    <div class="contact form-group col-sm-6">
                        <label for="phno">Số điện thoại</label>
                        <div class="inline-fields">
                            <div class="dropdown selected ready">
                                <button class="dropdown-toggle form-control" type="button" id="country-code" data-toggle="dropdown"><span class="value">+84</span></button>
                                <ul class="dropdown-menu dropdown-menu-items-8" role="menu" aria-labelledby="country-code">
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url() ?>payments/book/fOgPD6I8iZB?utf8=%E2%9C%93&amp;checkin=06%2F21%2F2016&amp;checkout=06%2F30%2F2016&amp;people=10&amp;_stk=151b806bd4c301c48baa80388fb57bca#" class="wref" data-references="{&quot;iso&quot;:&quot;SA&quot;}" data-value="+966">Việt nam (+84)</a></li>
                                </ul>
                                <div class="dropdown-menu-chevron"></div>
                                <input name="country_code" class="validate" data-references="{&quot;iso&quot;:&quot;&quot;}" data-current="+84" value="+84" type="hidden">
                            </div>
                            <div>
                                <input name="phno" id="phno" class="form-control" maxlength="30" data-current="" value="<?php if (isset($user->phone) && $user->phone != '') echo $user->phone; ?>" required="" aria-required="true" type="tel">
                            </div>
                        </div>
                    </div>
                    <div class="info no-label col-sm-6 hidden-xs">Đây sẽ là số điện thoại mặc định của bạn</div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="email">Địa chỉ Email</label>
                        <input name="email" id="email" class="form-control" maxlength="50" value="<?php if (isset($user->email) && $user->email != '') echo $user->email; ?>" disabled="" type="email">
                    </div>
                    <div class="info no-label col-sm-6 hidden-xs">
                        Chúng tôi chỉ chia sẻ thông tin liên lạc của bạn với chủ nhà Luan khi yêu cầu đặt chỗ được chấp nhận.
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="message">Nhắn tin cho Chủ nhà <span class="optional">(không bắt buộc)</span></label>
                        <textarea name="message" id="message" class="form-control" rows="5"></textarea>
                    </div>
                    <div class="info no-label col-sm-6 hidden-xs">
                        Cung cấp thêm thông tin cho Chủ nhà giúp yêu cầu đặt chỗ của bạn dễ được chấp nhận hơn.
                    </div>
                </div>
                <p class="terms info">Bằng việc nhấn vào “Thanh toán”, bạn đồng ý với <a href="<?php echo base_url() ?>vacation-rentals/vietnam/h%C3%A0-n%E1%BB%99i/hanoi/tm-fOgPD6I8iZB#house-rules" target="_blank">Quy định</a> và <a href="<?php echo base_url() ?>pages/cancellation_policies" data-remote="false" data-target="#cancellation-modal" data-toggle="modal" target="_blank">Chính sách hủy bỏ</a>.</p>
                <div class="row">
                    <div class="col-sm-6">
                        <button class="btn btn-lg btn-block btn-primary">Thanh toán</button>
                    </div>
                </div>
                <p class="bg-box bg-warning">
                    Bạn sẽ chỉ phải thanh toán khi Chủ nhà chấp nhận yêu cầu đặt chỗ của bạn. Nếu Chủ nhà từ chối hoặc không trả lời trong vòng 48 giờ, bạn sẽ không phải trả phí gì.
                </p>
            </div>
        </div>
    </form>
    <div id="cancellation-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="cancellation-modal-title">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Đóng"><span aria-hidden="true">×</span></button>
                    <h4 id="cancellation-modal-title" class="modal-title">Linh hoạt</h4>
                </div>
                <div class="modal-body">
                    <h5>Hoàn trả toàn bộ tiền nếu hủy bỏ 1 ngày trước khi nhận phòng, ngoại trừ phí</h5>
                    <dl>
                        <dt>Một ngày trước khi nhận phòng</dt>
                        <dd>Việc hủy đặt phòng phải được thực hiện 24 giờ trước khi nhận phòng. Ví dụ, nếu thời gian nhận phòng là 2 giờ chiều giờ địa phương, bạn cần phải hủy đặt phòng trước 2 giờ chiều ngày hôm trước.</dd>
                        <dt>Trong thời gian đặt chỗ</dt>
                        <dd>Nếu khách quyết định không muốn sử dụng đến hết thời gian đã đặt chỗ, việc hủy đặt phòng phải được thực hiện trong vòng 24 giờ trước khi thời gian trả phòng mới để được hoàn đủ tiền cho các đêm còn lại</dd>
                        <dt>Trong thời hạn 24 giờ trước khi nhận phòng</dt>
                        <dd>Nếu khách hủy đặt phòng ít hơn 24 giờ trước khi nhận phòng, đêm đầu tiên sẽ không được hoàn lại</dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $("#payment-form").validate({
            rules: {
                method: {
                    required: true,
                },
                email: {
                    required: true,
                    email: true
                },
                phno: {
                    required: true,
                    PhoneCheck: true,
                }
            },
            messages: {
                method: {
                    required: 'Chưa chọn phương thức thanh toán',
                },
                email: {
                    required: "email không được để trống",
                    email: "Email không đúng"
                },
                phno: {
                    required: 'Số điện thoại không được để trống.',
                    PhoneCheck: 'Số điện thoại không đúng định dạng đó'
                }
            },
            submitHandler: function (form) {
                if ($('.method_payment #method input[name="method"]').val() !== "1" || $('.method_payment #method input[name="method"]').val() == "2" || $('.method_payment #method input[name="method"]').val() == "3") {
                    form.submit();
                } else {
                    alert('chưa chọn hình thưc thanh toán');
                    return false;
                }
            }
        });
    })
</script>