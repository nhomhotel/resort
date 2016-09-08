//-------------------------------------index--------------------------------------
$(document).ready(function () {
    $(function () {
        $("#toggle-sidebar").on("click", function () {
            $("#wrapper").toggleClass("show-sidebar");
        })
    });
});
(function ($) {
    $.fn.extend({
        tagAddActive: function () {
            var node = this;
            return this.each(function () {
                var obj = $(this);
                obj.on('click', function () {
                    node.removeClass('active');
                    $(this).addClass('active');
                })
            });
        }
    });
})(jQuery);
(function ($) {
    $.fn.extend({
        tagDelete: function (options) {
            var defaults = {
                    tags:$("#tags"),
                    itemActive :$('.selectize-input .item.active')
            }
            var options = $.extend(defaults, options);
            var node = options['itemActive'];
            return this.each(function () {
                var opts =options;
                $(document).on('keyup',function (e) {
                    if (e.which  == 46) {
                        if (typeof node != 'undefined') {
                            if (opts['tags'].val() != '') {
                                var elemt = opts['tags'].val().split(',');
                                var position = elemt.indexOf(node.data('value').toString());
                                if (position > -1) {
                                    elemt.splice(position, 1);
                                    opts['tags'].val(elemt.toString());
                                }
                            }
                        }
                        node.remove();
                    }
                })
            });
        }
    });
})(jQuery);

