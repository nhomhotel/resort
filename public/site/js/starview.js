//--------------------------------Bookroom---------------------------------------

$(document).ready(function () {
    if ($(window).width() > 768) {
        $(function () {
            var offset = $("#book-right").offset();
            var bottom = $("#book-main").outerHeight(true);
            var topPadding = 0;
//                $(window).scroll(function() {
//                    alert($(window).scrollTop());
//                    if ($(window).scrollTop() >= offset.top & $(window).scrollTop() < bottom) {
//                        $("#book-right").stop().animate({
//                            marginTop: $(window).scrollTop() - offset.top + topPadding
//                        });
//                    } else if($(window).scrollTop() >= bottom){
//                        $("#book-right").stop().animate({
//                            marginTop: bottom - offset.top
//                        });
//
//                    }
//                    else{
//                        $("#book-right").stop().animate({
//                            marginTop: 0
//                        });
//                    };
//
//                });
        });
    }
});

//------------------------------------------Listroom------------------------------------------
if (typeof(min_value) == "undefined") {
    var min_value = 0;
}
if (typeof(max_value) == "undefined") {
    var max_value = 1000;
}
$.extend({
  getUrlVars: function(){
    var vars = [], hash;
    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
    for(var i = 0; i < hashes.length; i++)
    {
      hash = hashes[i].split('=');
      vars.push(hash[0]);
      vars[hash[0]] = hash[1];
    }
    return vars;
  },
  getUrlVar: function(name){
    return $.getUrlVars()[name];
  },
  setUrlVar:function(para,value){
    var vars = [], hash;
    var url = window.location.href;
    var urlNoPara = url.slice(0,url.indexOf('?'));
    var hashes = url.slice(url.indexOf('?') + 1).split('&');
    for(var i = 0; i < hashes.length; i++){
        if(hashes[i].search(para)) {
            console.log('trước');
            console.log(url);
            console.log('sau');
            console.log(hashes[i]);
            url = url.replace(hashes[i],para+"="+value)
            return url;
        };
    }
    return url;
  }
});
$(document).ready(function() {
    $(function () {
        if ($(".sort-by").size() > 0 && $("#search-button").size() > 0) {
            $(".sort-by").each(function() {
                $(this).click(function() {
                    var sort_by = $(this).attr("data-sort");
                    if (sort_by == "price_up") {
                        sort_by == "price_down";
                    } else {
                        sort_by == "price_up";
                    }
                    $("#sort-by").val(sort_by);
                    $("#search-button").trigger("click");
                });
            });
        }
    });
    $(function () {
        if ($("#rent-type").size() > 0 && $("#search-button").size() > 0) {
            $(".btn-filter-rent-type").click(function() {
                var type = $(this).attr("data-filter");
                $("#rent-type").val(type);
                $("#search-button").trigger("click");
            });
        }
    });

    $(function () {
        $("#filter-control").on("click", function () {
            $("#sidebar").toggleClass("show");
        });
    });

    $(function () {
        $("#price-sort").on("click", function () {
            $("#price-sort").toggleClass("sort-reverse");
        });
    });
    $(function () {
        $('.checkbox input[type="checkbox"]', '.checkbox-inline input[type="checkbox"]').each(function () {
            $(this).prop("checked") && $(this).parent("label").addClass("checked"), $(this).prop("disabled") && $(this).parent("label").addClass("disabled")
        }), $(document).on("change", '.checkbox input[type="checkbox"], .checkbox-inline input[type="checkbox"]', function () {
            $(this).prop("checked") ? $(this).parent("label").addClass("checked") : $(this).parent("label").removeClass("checked")
        })
    });
    $(function () {
        var room_type = [];
        var amenities = '';
        var experiences = '';
        var bedroom = $('#bedroom');
        var bathroom = $('#bathroom');
        var beds = $('#beds');
        var min = $('#min-amount');
        var max = $('#max-amount');
        var guest = $('#guests');
        var baseurl = url;
        $('.tclick').click(function () {
            var currentclick = $(this);
            if (currentclick.parent().hasClass('book-action')) {
                var checkin = $('#bookin-dpk');
                var checkout = $('#bookout-dpk');
                var guest = $('#guests');
                if (typeof $('#name_customer') == undefined || $('#name_customer').val() == '' || typeof $('#phone_number') == undefined || $('#phone_number').val() == '' || typeof $('#email') == undefined || $('#email').val() == '') {
//                    $('#myModal').modal('show');
                    return;
                }
                if (checkin.val() == '' || typeof checkin.val() == undefined) {
                    $('.info-book').html('nhập ngày nhận phòng');
                    return;
                }
                if (checkout.val() == '' || typeof checkout.val() == undefined) {
                    $('.info-book').html('nhập ngày trả phòng');
                    return;
                }
                if (guest.val() == '' || typeof guest.val() == undefined) {
                    $('.info-book').html('nhập số khách');
                    return;
                }
                $.ajax({
                    type : 'POST',
                url  : baseurl+'/spaces/prices/'+id,
                data : {checkin:checkin.val(),checkout:checkout.val(),guests:guest.val()},
                success :  function(data){
                    if((typeof data.error)!= 'undefined'){
                            $('.fees').html(data.error);
                            $('.prices').html('');
                        }else if((typeof data.prices)!= 'undefined'){
                            window.location.href = baseurl + 'room/order_room/' + id + '?checkin=' + checkin.val() + "&checkout=" + checkout.val() + "&guests=" + guest.val();
                            return true;
                        }                    
                },
                dataType:'json',
                })
//                var url = baseurl + 'room/order_room/' + id + '?checkin=' + checkin.val() + "&checkout=" + checkout.val() + "&guests=" + guest.val();
                
//                window.location.href = url;
            } else {
                var bathrooms = $('#bathrooms');
                var bedrooms = $('#bedrooms');
                var guest = $('#guest');
                var checkin = $('#checkin');
                var checkout = $('#checkout');
                var location = $('#location');
                var rent_type = $('#rent-type');
                var min = $('#min-amount');
                var max = $('#max-amount');
                var sort_by = $('#sort-by');
                var url = 'room/search?location=' + encodeURIComponent(location.val()) + '&checkin=' + checkin.val() + "&checkout=" + checkout.val();
                if (parseInt(guest.val()) > 0) {
                    url += "&guests=" + guest.val();
                }
                if (parseInt(beds.val()) > 0) {
                    url += "&beds=" + beds.val();
                }
                if (parseInt(bathrooms.val()) > 0) {
                    url += "&bathrooms=" + bathrooms.val();
                }
                if (parseInt(bedrooms.val()) > 0) {
                    url += "&bedrooms=" + bedrooms.val();
                }
                min = parseInt(min.val().toString().replace("$", ""));
                max = parseInt(max.val().toString().replace("$", ""));
                if (min >= 0) {
                    url += "&min=" + min;
                }
                if (max >= 0) {
                    url += "&max=" + max;
                }
                var amenities_ids = $(".chk-amenities:checked").map(function(){
                    return $(this).val();
                }).get();
                if (amenities_ids.length > 0) {
                    url += "&amenities_ids=" + amenities_ids.join(",");
                }
                var experiences_ids = $(".chk-experiences:checked").map(function(){
                    return $(this).val();
                }).get();
                if (experiences_ids.length > 0) {
                    url += "&experiences_ids=" + experiences_ids.join(",");
                }
                if (rent_type.val().toString().trim().length > 0) {
                    url += "&rent_type=" + rent_type.val();
                }
                if (sort_by.val().toString().trim().length > 0) {
                    url += "&sort_by=" + sort_by.val();
                }
                window.location.href = url;
                return false;
            }
        })
    });
    $(function () {
        $('#language li').click(function () {
            var language = $(this).find('a');
            var data = {language:language.data('value')};
            $('#language').find('.icon-language span').html(language.html());
            var urlCurrent = window.location.href;
            $.ajax({
                url:url + 'language',
                dataType:'json',
                success:function (data) {
                    window.location.href = urlCurrent;
                },
                data:data,
                type:'POST'
            });
        });
    });
    $(function(){
        $('.method_payment ul li').on('click',function(){
            data = $(this).find('a').data('value');
            $('.method_payment').find('button span').html($(this).find('a').html());
        })
    })
})

//----------------------------------------------------Index--------------------------------------------

$(document).ready(function () {
    //sticky navigation
    var nav = document.querySelector('#navigation');
    document.addEventListener('scroll', function () {
        if (window.scrollY >= 20) {
            nav.classList.add('sticky');
        } else {
            nav.classList.remove('sticky');
        }
    });

    //wow.js
    new WOW().init();


    //owl-caorousel
    var owl = $(".owl-carousel");
    owl.owlCarousel({
        margin:100,
        loop:true,
        autoplay:true,
        // nav:true,
        // navText:['<i class="glyphicon glyphicon-menu-left"></i>','<i class="glyphicon glyphicon-menu-right"></i>'],
        autoplayTimeout:1500,
        autoplayHoverPause:true,
        autoplaySpeed:1000,
        dotsSpeed:400,
        responsiveClass:true,
        responsive:{
            0:{
                items:1,
            },
            600:{
                items:3,
            },
            1000:{
                items:3,
            }
        }
    });
    
});