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
        <form id="frm-report" method="POST" action="<?php echo site_url('admin/report/result'); ?>">
            <input type="hidden" id="export-excel" name="export_excel" value="0" />
            <div class="filter-block">
                <div class="row">
                    <?php if (!empty($range)): ?>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="label-control" for="filter-select-range">Chọn thời điểm</label>
                            <select name="filters[range]" id="filter-select-range" onchange="module_report.select_range(this.value)" type="text" class="form-control">
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
                    <div class="col-md-12">
                        <div class="btn-group">
                            <button type="submit" class="btn btn-primary btn-square"><i class="fa fa-search"></i> Xem kết quả</button>
                            <button type="button" onclick="module_report.export_excel()" class="btn btn-success btn-square">Xuất báo cáo</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="line"></div>
<div class="wrapper col-md-12 content mt-10">
    <?php if (!empty($collection)) :?>
    <div style="overflow-x: scroll">
    <p align="center" class="font-14"><i>-- Kéo thanh cuộn (bên dưới bảng) từ trái qua phải <i class="glyphicon glyphicon-arrow-right"></i> để xem hết danh sách kết quả nếu quá dài --</i></p>
    <table class="table table-striped table-hover table-bordered mt-10">
        <thead>
            <th>STT</th>
            <th>Căn hộ</th>
            <th>Phòng</th>
            <?php foreach ($days as $day): ?>
            <th><?php echo $day['date']; ?></th>
            <?php endforeach; ?>
        </thead>
        <tbody>
            <?php $num_house = 1; $visible_room = array(); foreach ($collection as $row): ?>
            <?php $previous_row = $row; ?>
            <tr>
                <td width="100px">
                    <?php if (empty($row->parent_id)) :?>
                    <?php echo $num_house; ?>
                    <?php endif; ?>
                </td>
                <?php if (!isset($visible_room[$row->post_room_id])): ?>
                <td>
                    <?php if (empty($row->parent_id)): ?>
                        <a target="_blank" href="<?php echo site_url('admin/post_room/edit/' . $row->post_room_id); ?>"><strong><?php echo $row->post_room_name; ?></strong></a>
                    <?php endif; ?>
                </td>
                <?php endif; ?>
                <td>
                    <?php if (!empty($row->parent_id)) :?>
                    <a target="_blank" href="<?php echo site_url('admin/post_room/edit/' . $row->post_room_id); ?>"><strong><?php echo $row->post_room_name; ?></strong></a>
                    <?php else: ?>
                    Nguyên căn
                    <?php endif; ?>
                </td>
                <?php foreach ($days as $key => $day): ?>
                <?php if (isset($day['rooms'][$row->post_room_id])): ?>
                <td class="selected">
                    <?php echo $day['rooms'][$row->post_room_id]; ?>
                </td>
                <?php else: ?>
                <td></td>
                <?php endif; ?>
                <?php endforeach; ?>
            </tr>
            <?php $visible_room[$row->post_room_id] = $row->post_room_id; ?>
            <?php if (empty($row->parent_id)) $num_house++; endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3" align="right"><strong>Tổng số khách theo ngày</strong></td>
                <?php foreach ($days as $key => $day): ?>
                <td <?php if ($day['guests'] > 0): ?>class="selected"<?php endif; ?>><?php echo $day['guests']; ?></td>
                <?php endforeach; ?>
            </tr>
        </tfoot>
    </table>
    </div>
    <?php else: ?>
    <?php if (!empty($filters)) :?>
    <div class="clearfix">
        <p align="center" class="font-14"><i>-- Không tìm thấy kết quả nào ứng với khoảng thời điểm này --</i> <button onclick="$('#filter-select-range').focus().trigger('click')" type="button" class="btn btn-primary btn-square">Chọn lại</button></p>
    </div>
    <?php endif; ?>
    <?php endif; ?>
</div>
<script type="text/javascript" src="<?php echo site_url('public/admin/js/module/export.js'); ?>"></script>
