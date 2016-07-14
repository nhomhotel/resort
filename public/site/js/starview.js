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
$(document).ready(function() {
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
        $('.tclick').click(function () {
            var currentclick = $(this);
            if (currentclick.parent().hasClass('book-action')) {
                var checkin = $('#bookin-dpk');
                var checkout = $('#bookout-dpk');
                console.log(typeof $('#name_customer'));
                if (typeof $('#name_customer') == undefined || $('#name_customer').val() == '' || typeof $('#phone_number') == undefined || $('#phone_number').val() == '' || typeof $('#email') == undefined || $('#email').val() == '') {
                    $('#myModal').modal('show');
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
                var url = url + 'room/order_room/' + id + '?checkin=' + checkin.val() + "&checkout=" + checkout.val() + "&guests=" + guest.val();
                if (parseInt(min.val().toString().replace("$", "")) > 0) {
                    url += "&min=" + min;
                }
                if (parseInt(max.val().toString().replace("$", "")) > 0) {
                    url += "&max=" + max;
                }
                window.location.href = url;
            } else {
                /*
                 var amenities = '';
                 var experiences = '';
                 $('[name="amenities"]:checked').each(function(){
                 amenities +=$(this).data('tloc')+',';
                 })
                 $('[name="experiences"]:checked').each(function(){
                 experiences +=$(this).data('tloc')+',';
                 })

                 $("#room_type label.tclick ").each(function(index){
                 var cur = $(this);
                 data_tloc = cur.data('tloc');
                 if(room_type.length==0){room_type.push(data_tloc);}
                 else{
                 var index = room_type.indexOf(data_tloc);
                 if(index==-1){
                 room_type.push(data_tloc);
                 }else{
                 room_type.splice(index,1);
                 }
                 }
                 })
                 console.log(amenities);
                 console.log(experiences);
                 console.log(bedroom);
                 console.log(bathroom);
                 console.log(beds);
                 console.log($('input#location,input#checkin,input#checkout,input#guest,input#option1,input#price-sort,input#entry-home'));
                 var currentthis = $(this);
                 var room_types = '';
                 $('#room_type .tclick').each(function(){
                 if(currentthis.data('tloc')==$(this).data('tloc')){
                 var xxx = $(this).attr("class").split(' ');
                 $.each(xxx, function(a,v){
                 if(v==='active'){
                 console.log('da active truoc day');
                 }
                 })

                 }
                 console.log(currentthis.data('tloc'));
                 console.log($(this).data('tloc'));
                 });
                 return false;
                 var data = {};
                 if(typeof amenities !==undefined && amenities !='')data['amenities'] = amenities;
                 if(typeof experiences !==undefined && experiences !='')data['experiences'] = experiences;
                 if(typeof bedroom !==undefined && $.isNumeric(bedroom.val()))data['bedroom'] = bedroom.val();
                 if(typeof bathroom !==undefined && $.isNumeric(bathroom.val()))data['bathroom'] = bathroom.val();
                 if(typeof beds !==undefined && $.isNumeric(beds.val()))data['beds'] = beds.val();
                 if(typeof amenities !==undefined && amenities !='')data['amenities'] = amenities;
                 if(typeof amenities !==undefined && amenities !='')data['amenities'] = amenities;
                 var xhr = $.ajax({
                 url:url+'room/search',
                 data:data,
                 type:'GET',
                 success:function(data){
                 console.log(data);
                 },
                 error:'',
                 dataType: 'json',
                 })
                 */
                var bathrooms = $('#bathrooms');
                var bedrooms = $('#bedrooms');
                var guest = $('#guest');
                var checkin = $('#checkin');
                var checkout = $('#checkout');
                var location = $('#location');
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