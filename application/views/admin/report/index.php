<?php $lang = get_lang(); ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/site/css/bootstrap-datepicker3.min.css">
<script type="text/javascript" src="<?php echo base_url(); ?>public/site/js/bootstrap-datepicker.min.js"></script>
<div class="titleArea clearfix">
    <div class="wrapper col-md-12">
        <div class="pageTitle">
            <h4>
                <?php if (!empty($link)) : ?>
                <a href="<?php echo $link; ?>"><i style="position: relative; top:3px" class="glyphicon glyphicon-menu-left"></i>
                <?php endif; ?>
                <?php echo $title; ?>
                <?php if (!empty($link)) : ?></a><?php endif; ?>
            </h4>
            <p class="font-14"><?php echo $description; ?></p>
        </div>
        <div class="clear"></div>
        <form method="POST" action="<?php echo site_url('admin/report/result'); ?>">
            <div class="filter-block">
                <div class="row">
                    <?php if (!empty($range)): ?>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="label-control" for="filter-select-range">Chọn thời điểm</label>
                            <select name="filters[range]" id="filter-select-range" type="text" class="form-control">
                                <?php foreach ($range as $value => $label): ?>
                                <option <?php if (!empty($filters['range']) && $filters['range'] == $value): ?>selected="selected"<?php endif; ?> value="<?php echo $value; ?>"><?php echo $label; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <?php endif; ?>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="label-control" for="filter-from-day">Từ ngày</label>
                            <input name="filters[from_day]" <?php if (!empty($filters['from_day'])): ?>value="<?php echo $filters['from_day']; ?>"<?php endif; ?> id="filter-from-day" type="text" class="form-control date-picker"/>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="label-control" for="filter-to-day">Đến ngày</label>
                            <input name="filters[to_day]" <?php if (!empty($filters['to_day'])): ?>value="<?php echo $filters['to_day']; ?>"<?php endif; ?> id="filter-to-day" type="text" class="form-control date-picker"/>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Xem kết quả</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="line"></div>
<div class="wrapper col-md-12 content mt-10">
    <?php if (!empty($result)) :?>
    <div style="overflow-x: scroll">
    <table class="table table-striped table-hover table-bordered">
        <thead>
            <th>STT</th>
            <th>Căn hộ</th>
            <th>Phòng</th>
            <?php foreach ($days as $day): ?>
            <th><?php echo $day; ?></th>
            <?php endforeach; ?>
        </thead>
        <tbody>
            <?php $num_house = 1; foreach ($result as $row): ?>
            <tr>
                <td width="100px"><?php echo $num_house; ?></td>
                <td rowspan=""><?php if ($row->parent_id == 0): ?><?php echo $row->post_room_name; ?><?php endif; ?></td>
                <td><?php if ($row->parent_id > 0): ?><?php echo $row->post_room_name; ?><?php else: ?>Nguyên căn<?php endif; ?></td>
                <?php foreach ($days as $key => $day): ?>
                <?php if ($key == md5($row->checkin)): ?>
                <td class="selected">
                    1
                </td>
                <?php else: ?>
                <td></td>
                <?php endif; ?>
                <?php endforeach; ?>
            </tr>
            <?php $num_house++; endforeach; ?>
        </tbody>
    </table>
    </div>
    <?php endif; ?>
</div>
<script>
    $(function () {
        var time = new Date();
        var now = new Date(time.getFullYear(), time.getMonth(), time.getDate(), 0, 0, 0, 0);
        var filter_from_day = $('#filter-from-day');
        var filter_to_day = $('#filter-to-day');

        filter_from_day.datepicker({
            onRender: function (date) {
                return true;
            },
            endDate: now,
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
            endDate: now,
            locale: 'vi'
        }).on('changeDate',function (ev) {
            filter_to_day.datepicker('hide');
            var date = new Date(ev.date)
            date.setDate(date.getDate());
        }).data('datepicker');
    });
</script>
