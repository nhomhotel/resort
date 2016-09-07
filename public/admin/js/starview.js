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
