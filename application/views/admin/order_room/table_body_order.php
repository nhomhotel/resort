<tbody class="list_item">
    <?php
    if (isset($list)) {
        $i = 0;
        foreach ($list as $line => $row) {
            $i++;
            ?>
            <tr class='row_20'>
                <td class="textC hidden-print">
                    <input type="checkbox" name="id[]" value="<?php echo $row->order_id; ?>" />
                </td>
                <td class="textC"><?php if (isset($start))
            echo ($i + $start);
        else
            echo $i;
        ?></td>
                <td class="textC img_room hidden-print" >
                    <a href="<?php echo base_url('room/room_detail/' . $row->post_room_id); ?>" target = "_blank">
        <?php
        $img = json_decode($row->image_list);
        ?>
                        <img src="<?php if ($img[0] != '') echo $img['0'] ?>" width = "120px" height = "90px"/>
                    </a>
                </td>
                <td class="textC" style="text-align: left;">
                    <p class="room_name">
                        <a href = "<?php echo base_url('room/room_detail/' . $row->post_room_id); ?>" target = "_blank"><?php echo $row->post_room_name; ?></a>
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
                <td class="textC">
                    <p style="font-size: 13px;font-weight: 600"><?php echo $row->user_name; ?></p>
                </td>
        <?php if ($user->role_id == 1): ?>
                    <td class="textC price"><p style="font-size: 13px;font-weight: 600"><?php echo $profit[$line]->user_name ?></p></td>
        <?php endif; ?>
                <td class="textC" id="status">
                    <p style="font-size: 13px;font-weight: 600"><?php echo $row->checkin; ?></p>
                </td>
                <td class="textC" id="status">
                    <p style="font-size: 13px;font-weight: 600"><?php echo $row->checkout; ?></p>
                </td>
                <td class="textC" id="status">
                    <p style="font-size: 13px;font-weight: 600"><?php echo $row->guests; ?></p>
                </td>
                <td class="textC" id="payments">
                    <p style="font-size: 13px;font-weight: 600"><?php echo $row->payment_status ? 'Đã thanh toán' : 'Chưa thanh toán'; ?></p>
                </td>
                <td class="textC" id="feedback">
                    <p style="font-size: 13px;font-weight: 600"><?php echo $row->payment_status ? 'Có log' : 'Không có log'; ?></p>
                </td>
            </tr>
            <?php
        }
    }
    ?>
    <tr>
        <td colspan="4"></td>
        <td colspan="1"></td>
        <td colspan="1"></td>
        <td colspan="1"></td>
    </tr>
</tbody>