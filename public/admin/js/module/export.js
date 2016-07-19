var module_report = {};

module_report.select_range = function(value) {
    if (value == 'custom') {
        $('#filter-from-day').focus();
    } else {
        if (value.length > 0) {
            $('#frm-report').submit();
            return false;
        }
    }
};

module_report.get_result = function() {
    $('#export-excel').val(0);
    $('#frm-report').submit();
};

module_report.export_excel = function() {
    $('#export-excel').val(1);
    $('#frm-report').submit();
    $('#export-excel').val(0);
};

$(function () {

    var time = new Date();
    var now = new Date(time.getFullYear(), time.getMonth(), time.getDate(), 0, 0, 0, 0);
    var filter_from_day = $('#filter-from-day');
    var filter_to_day = $('#filter-to-day');

    filter_from_day.datepicker({
        onRender: function (date) {
            return true;
        },
        format: 'dd/mm/yyyy',
        locale: 'vi'
    }).on('changeDate',function (ev) {
        var date;
        if (ev.date.valueOf() > filter_to_day.val()) {
            date = new Date(ev.date)
            date.setDate(date.getDate());
        }
        filter_to_day.datepicker('setStartDate', date);
        filter_from_day.datepicker('hide');
        $('#filter_to_day')[0].focus();
    }).data('datepicker');

    filter_to_day.datepicker({
        onRender:function (date) {
            return date.valueOf() <= filter_from_day.val() ? 'disabled' : '';
        },
        format: 'dd/mm/yyyy',
        locale: 'vi'
    }).on('changeDate',function (ev) {
        filter_to_day.datepicker('hide');
        var date = new Date(ev.date)
        date.setDate(date.getDate());
    }).data('datepicker');

});