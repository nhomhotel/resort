<style>
    .price-item label span{
        font-size: 12px;
    }
    .table.myTable .room_name a{
        font-size: 12px;
    }
</style>
<tbody class="list_item">
    <?php
    if (isset($list)) {
        $i = 0;
        $sum_input_price_vn = $sum_input_price_en =0;
        $sum_output_price_vn = $sum_output_price_en = 0;
        $sum_profix_vn = $sum_profix_en = 0;
        foreach ($list as $line => $row) {
            $i++;
            $sum_input_price_vn += $row->payment_type - $row->payment_type * $profit[$line]->profit_rate / 100;
            $sum_input_price_en +=$row->price_night_en - $row->price_night_en * $profit[$line]->profit_rate / 100;
            $sum_output_price_vn +=$row->payment_type;
            $sum_output_price_en +=$row->price_night_en;
            $sum_profix_vn +=$row->payment_type * $profit[$line]->profit_rate / 100;
            $sum_profix_en +=$row->price_night_en * $profit[$line]->profit_rate / 100;
            ?>
            <tr class='row_20'>
                <?php if(!isset($history_active)||!isset($payment_active)):?>
                <td class="textC hidden-print">
                    <input type="checkbox" name="id[]" value="<?php echo $row->order_id; ?>" />
                </td>
                <?php endif;?>
                <td class="textC"><?php if (isset($start))
            echo ($i + $start);
        else
            echo $i;
        ?></td>
                <td class="textC img_room hidden-print" >
                    <a href="<?php echo base_url('admin/order_room/view_order/' . $row->order_id); ?>" target = "_blank">
        <?php
        $img = json_decode($row->image_list);
        ?>
                        <img src="<?php if ($img[0] != '') echo $img['0'] ?>" width = "120px" height = "90px"/>
                    </a>
                </td>
                <td class="textC" style="text-align: left;">
                    <p class="room_name">
                        <a href = "<?php echo base_url('admin/order_room/view_order/' . $row->order_id); ?>" target = "_blank"><?php echo $row->post_room_name; ?></a>
                    </p>
                </td>
                <td class="textC price">
                    <p class="price_vn price-item">
                        <label>VND: <span><?php echo numberFormatToCurrency($row->payment_type - $row->payment_type * $profit[$line]->profit_rate / 100); ?></span></label>
                    </p>
                    <p class="price_en price-item">
                        <label>USD: <span><?php echo numberFormatToCurrency($row->price_night_en - $row->price_night_en * $profit[$line]->profit_rate / 100); ?></span></label>
                    </p>
                </td>
                <td class="textC price">
                    <p class="price_vn price-item">
                        <label>VND: <span><?php echo numberFormatToCurrency($row->payment_type); ?></span></label>
                    </p>
                    <p class="price_en price-item">
                        <label>USD: <span><?php echo numberFormatToCurrency($row->price_night_en); ?></span></label>
                    </p>
                </td>
                <td class="textC price">
                    <p class="price_vn price-item">
                        <label>VND: <span><?php echo '(' . $profit[$line]->profit_rate . '%) ' . numberFormatToCurrency($row->payment_type * $profit[$line]->profit_rate / 100); ?></span></label>
                    </p>
                    <p class="price_en price-item">
                        <label>USD: <span><?php echo '(' . $profit[$line]->profit_rate . '%) ' . numberFormatToCurrency($row->price_night_en * $profit[$line]->profit_rate / 100); ?></span></label>
                    </p>
                </td>
                <td class="textC price">
                    <p style="font-size: 12px;"><?php echo $row->user_name; ?></p>
                </td>
        <?php if ($user->role_id == 1): ?>
                    <td class="textC price"><p style="font-size: 12px;font-weight: 600"><?php echo $profit[$line]->user_name ?></p></td>
        <?php endif; ?>
                <td class="textC" id="status">
                    <p style="font-size: 12px;font-weight: 600"><?php echo $row->checkin; ?></p>
                </td>
                <td class="textC" id="status">
                    <p style="font-size: 12px;font-weight: 600"><?php echo $row->checkout; ?></p>
                </td>
                <td class="textC" id="status">
                    <p style="font-size: 12px;font-weight: 600"><?php echo $row->guests; ?></p>
                </td>
                <?php if(!isset($payment_active)):?>
                <td class="textC" id="payments">
                    <p style="font-size: 12px;font-weight: 600"><?php echo $row->payment_status ? 'Đã thanh toán' : 'Chưa thanh toán'; ?></p>
                </td>
                <?php endif;?>
                 <?php if(!isset($history_active)):?>
                <td class="textC" id="feedback">
                    <p style="font-size: 12px;font-weight: 600;"> 
                        <?php if($row->payment_status): ?>
                        <a style="color: blue" href="<?php echo admin_url('BillHistory/index/'.$row->bill_history_ids);?>">lịch sử</a>
                        <?php else:?>
                        Không có log <?php endif;?></p>
                </td>
                <?php endif;?>
            </tr>
            <?php
        }
    }
    ?>
    <tr>
        <td colspan="<?php echo !isset($history_active)||!isset($payment_active)?'4':'3'?>">Tổng(VNĐ/USD)</td>
        <td colspan="1" style="font-weight: bold"><?php echo numberFormatToCurrency($sum_input_price_vn).'/'.numberFormatToCurrency($sum_input_price_en)?></td>
        <td colspan="1" style="font-weight: bold"><?php echo numberFormatToCurrency($sum_output_price_vn).'/'.numberFormatToCurrency($sum_output_price_en)?></td>
        <td colspan="1" style="font-weight: bold"><?php echo numberFormatToCurrency($sum_profix_vn).'/'.numberFormatToCurrency($sum_profix_en)?></td>
        <td colspan="<?php echo !isset($history_active)||!isset($payment_active)?'8':'7'?>"></td>
    </tr>
</tbody>