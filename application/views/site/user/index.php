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
<section id="user-main">
    <div class="container">
        <div class="row">
            <div class="block clearfix" style="margin-top: 47px;">
                <?php if ($this->session->flashdata('message')): ?>
                    <div class="alert alert-success info">
                        <strong>Success!</strong><br><?php echo $this->session->flashdata('message'); ?> 
                    </div>
                <?php endif;?>
                <div class="manage-content bz-border sround nobg p20 fright border nooverflow fxl m10">
                    <form name="editprofile" id="edit_profile" method="post" class="form-horizontal" action="/users/update_profile">
                                <div id="part_details" class="sround border ashadow m10">
                                  <div class="grey-header p10 tround bborder nooverflow">
                                    <h3 class="inline-m"><b>Thông tin cá nhân</b></h3><a href="/users/show/677e764eb8f1b28fdae067cc1d0fedbc" target="_blank" class="inline-m fright fl p5 sround border ashadow c-lgrey"><b>Xem trang thông tin cá nhân</b></a>
                                  </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-2" for="first_name">Tên:</label>
                                        <div class="col-sm-10">
                                            <input name="first_name" id="first_name" type="text" value="Hai" class="form-control finput validate[required]">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label col-sm-2" for='last_name'>Họ:</label>
                                        <div class="col-sm-10">
                                            <input name="last_name" id="last_name" type="text" size="50" value="Le" class="form-control finput validate[required]">
                                        </div>
                                      
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label col-sm-2" for='email'>Email:</label>
                                        <div class="col-sm-10"><input name="email" class="form-control  finput validate[required]" id="email" value="lehai_1991@yahoo.com.vn" type="text" readonly="readonly"></div>
                                      
                                        <img alt="Verified" class="inline-m ml10" height="20" src="http://static0.homeaway.com.vn/assets/verified-88eab92b048344fdb576aebf2ad6ad2f.png" width="20"><span class="inline-m verified fs">Đã xác nhận</span>
                                      <div class="desc m10 fs">
                                        <span class="tm-sprite lock inline w10">&nbsp;</span>
                                        <span class="forange inline w80">Thông tin này chỉ được chia sẻ khi bạn có một đặt chỗ với một thành viên HomeAway khác.</span>
                                      </div>
                                    </div>

                                    <div class="m10 form-group">
                                        <label class="form-label col-sm-2" for='phone'>Số điện thoại:</label>
                                      <div class="col-sm-10" name='phone' >
                                          <div class="row">
                                                <div class="col-sm-2">
                                                    <input class="form-control" type="hidden" id="country_iso" name="country_iso" value="">
                                                    <select class="form-control fselect fwselect hide" id="country_name_" name="country_name[]"><option value="" selected="selected">Chọn địa điểm</option>
                                                      <option value="+84" data-iso="ZW">Việt nam (+84)</option>
                                                      <option value="+263" data-iso="ZW">Zimbabwe (+263)</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-10">
                                                    <input name="country_code" id="country_code" value="" size="4" type="text" readonly="readonly" class="validate[required] finput">
                                                    <input name="phone" id="phone" value="" type="text" class="form-control input_style validate[required,custom[phoneWithoutCC]] finput">
                                                </div>
                                          </div>
                                      </div>
                                    </div>

                                    <div class="m10">
                                      <label>Mô tả về bạn:</label>
                                      <textarea class="ftextarea validate[required] w40" name="about_me" id="about_me" rows="10" cols="30"></textarea>
                                      <span class="inline c-lgrey fs w30">Giúp người khác biết về bạn<br>Chia sẻ về bạn: thói quen, điểm đến du lịch ưa thích, sách, phim ảnh, thức ăn, vv</span>
                                    </div>
                                    <div class="m10">
                                      <label>Quốc gia cư trú:</label>
                                      <div class="inline w80">
                                        <select class="validate[required] fselect w50" id="country_of_residence_" name="country_of_residence[]"><option value="" disabled="true" selected="true">Chọn địa điểm</option>
                          
                                            <option value="ZM">Zambia</option>
                                            <option value="ZW">Zimbabwe</option></select>
                                          <span class="inline c-lgrey fs w40">Nhấn "Lưu" để xác nhận quốc gia bạn cư trú</span>
                                      </div>
                                      <div class="desc m10 fs">
                                        <span class="forange inline w80">Nội dung này sẽ được sử dụng cho pháp lý và thuế má.</span>
                                      </div>
                                    </div>

                                  </div>
                                </div>

                                <div id="part_optional" class="sround border ashadow m10">
                                  <div class="grey-header p10 tround bborder nooverflow">
                                    <h3 class="inline-m"><b>Thông tin tùy chọn</b></h3>
                                    <a id="import_facebook" href="#" data-href="/users/import_facebook" class="inline-m fright fl p5 sround border ashadow c-lgrey"><b>Nhập từ Facebook</b></a>
                                  </div>
                                  <div class="p20 nooverflow">
                                    <div>
                                      <label>giới Tính:</label>
                                      <select class="fselect" id="gender" name="gender"><option value="Male" selected="selected">Nam</option>
                          <option value="Female">Nữ</option></select>
                                      <div class="desc m10 fs">
                                        <span class="tm-sprite lock inline w10">&nbsp;</span>
                                        <span class="forange inline w80">Những dữ liệu này sẽ chỉ được sử dụng với mục đích phân tích và sẽ không có một thành viên nào khác biết.</span>
                                      </div>
                                    </div>

                                    <div class="m10">
                                      <label>Ngày sinh:</label>
                                      <select class="fselect" id="date_day" name="date[day]">
                          <option value=""></option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          <option value="6">6</option>
                          <option value="7">7</option>
                          <option value="8">8</option>
                          <option value="9">9</option>
                          <option value="10">10</option>
                          <option value="11">11</option>
                          <option value="12">12</option>
                          <option value="13">13</option>
                          <option value="14">14</option>
                          <option value="15">15</option>
                          <option value="16">16</option>
                          <option value="17">17</option>
                          <option value="18">18</option>
                          <option value="19">19</option>
                          <option value="20">20</option>
                          <option value="21">21</option>
                          <option value="22">22</option>
                          <option value="23">23</option>
                          <option value="24">24</option>
                          <option value="25">25</option>
                          <option value="26">26</option>
                          <option value="27">27</option>
                          <option value="28">28</option>
                          <option value="29">29</option>
                          <option value="30">30</option>
                          <option value="31">31</option>
                          </select>
                          <select class="fselect" id="date_month" name="date[month]">
                          <option value=""></option>
                          <option value="1">Tháng một</option>
                          <option value="2">Tháng hai</option>
                          <option value="3">Tháng ba</option>
                          <option value="4">Tháng tư</option>
                          <option value="5">Tháng năm</option>
                          <option value="6">Tháng sáu</option>
                          <option value="7">Tháng bảy</option>
                          <option value="8">Tháng tám</option>
                          <option value="9">Tháng chín</option>
                          <option value="10">Tháng mười</option>
                          <option value="11">Tháng mười một</option>
                          <option value="12">Tháng mười hai</option>
                          </select>
                          <select class="fselect" id="date_year" name="date[year]">
                          <option value=""></option>
                          <option value="1913">1913</option>
                          <option value="1914">1914</option>
                          <option value="1915">1915</option>
                          <option value="1916">1916</option>
                          <option value="1917">1917</option>
                          <option value="1918">1918</option>
                          <option value="1919">1919</option>
                          <option value="1920">1920</option>
                          <option value="1921">1921</option>
                          <option value="1922">1922</option>
                          <option value="1923">1923</option>
                          <option value="1924">1924</option>
                          <option value="1925">1925</option>
                          <option value="1926">1926</option>
                          <option value="1927">1927</option>
                          <option value="1928">1928</option>
                          <option value="1929">1929</option>
                          <option value="1930">1930</option>
                          <option value="1931">1931</option>
                          <option value="1932">1932</option>
                          <option value="1933">1933</option>
                          <option value="1934">1934</option>
                          <option value="1935">1935</option>
                          <option value="1936">1936</option>
                          <option value="1937">1937</option>
                          <option value="1938">1938</option>
                          <option value="1939">1939</option>
                          <option value="1940">1940</option>
                          <option value="1941">1941</option>
                          <option value="1942">1942</option>
                          <option value="1943">1943</option>
                          <option value="1944">1944</option>
                          <option value="1945">1945</option>
                          <option value="1946">1946</option>
                          <option value="1947">1947</option>
                          <option value="1948">1948</option>
                          <option value="1949">1949</option>
                          <option value="1950">1950</option>
                          <option value="1951">1951</option>
                          <option value="1952">1952</option>
                          <option value="1953">1953</option>
                          <option value="1954">1954</option>
                          <option value="1955">1955</option>
                          <option value="1956">1956</option>
                          <option value="1957">1957</option>
                          <option value="1958">1958</option>
                          <option value="1959">1959</option>
                          <option value="1960">1960</option>
                          <option value="1961">1961</option>
                          <option value="1962">1962</option>
                          <option value="1963">1963</option>
                          <option value="1964">1964</option>
                          <option value="1965">1965</option>
                          <option value="1966">1966</option>
                          <option value="1967">1967</option>
                          <option value="1968">1968</option>
                          <option value="1969">1969</option>
                          <option value="1970">1970</option>
                          <option value="1971">1971</option>
                          <option value="1972">1972</option>
                          <option value="1973">1973</option>
                          <option value="1974">1974</option>
                          <option value="1975">1975</option>
                          <option value="1976">1976</option>
                          <option value="1977">1977</option>
                          <option value="1978">1978</option>
                          <option value="1979">1979</option>
                          <option value="1980">1980</option>
                          <option value="1981">1981</option>
                          <option value="1982">1982</option>
                          <option value="1983">1983</option>
                          <option value="1984">1984</option>
                          <option value="1985">1985</option>
                          <option value="1986">1986</option>
                          <option value="1987">1987</option>
                          <option value="1988">1988</option>
                          <option value="1989">1989</option>
                          <option value="1990">1990</option>
                          <option value="1991">1991</option>
                          <option value="1992">1992</option>
                          <option value="1993">1993</option>
                          <option value="1994">1994</option>
                          <option value="1995">1995</option>
                          <option value="1996">1996</option>
                          <option value="1997">1997</option>
                          <option value="1998">1998</option>
                          </select>

                                      <div class="desc m10 fs">
                                        <span class="tm-sprite lock inline w10">&nbsp;</span>
                                        <span class="forange inline w80">Những dữ liệu này sẽ chỉ được sử dụng với mục đích phân tích và sẽ không có một thành viên nào khác biết..</span>
                                      </div>
                                    </div>

                                    <div class="m10">
                                      <label>Trường học:</label>
                                      <input name="school" id="school" value="" type="text" class="finput width_pormo">
                                    </div>
                                    <div class="m10">
                                      <label>Nơi ở:</label>
                                      <input name="location" id="location" value="" type="text" class="finput width_pormo">
                                    </div>
                                    <div class="m10">
                                      <label>Nơi làm việc:</label>
                                      <input name="work" id="work" value="" type="text" class="finput width_pormo">
                                    </div>
                                    <div class="m10">
                                      <label>Số điện thọai dự phòng:</label>
                                      <input name="phno2" id="bkp_ph" value="" type="text" class="finput width_pormo">
                                      <div class="desc m10 fs">
                                        <span class="tm-sprite lock inline w10">&nbsp;</span>
                                        <span class="forange inline w80">Số điện thoại này sẽ được dùng trong trường hợp khẩn cấp. Thông tin này chỉ được chia sẻ khi bạn có một đặt chỗ với một thành viên HomeAway khác.</span>
                                      </div>
                                    </div>

                                    <div class="m10">
                                      <label>Ngôn ngữ:</label>
                                      <div id="multiselectslan" class="multiselectslan inline">
                                      </div>
                                      <a class="multiselectslan-add-more forange" href="#" id="tm_lang_more">Thêm</a>
                                    </div>

                                  </div>
                                </div>

                                <div class="tright flgst">
                                  <input type="submit" value="Lưu lại" class=" button-glossy green">
                                </div>

      </form>

    </div>
            </div>
        </div>
    </div>
</section>
<style>
    .error_submit{
        text-align: center;
        color: red;
    }
    .manage-content{
        min-height: 300px;
        margin: 0 auto;
    }
</style>