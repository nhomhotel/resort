<div class="prices">
    <table class="price-details" style="width: 100%;"> 
        <tbody> 
            <?php if (isset($price['numberNormarDay']) && isset($price['moneyNormarDay'])): ?>
                <tr><td>Ngày bình thường</td></tr>
                <tr> 
                    <th>VND <span class="nightly-price"><?php echo $price['numberNormarDay'] ?></span> × <?php echo $price['moneyNormarDay']; ?> Đêm</th> 
                    <td>VND <span><?php echo ($price['numberNormarDay'] * $price['moneyNormarDay']) ?></span></td> 
                </tr>
            <?php endif; ?>

            <?php if (isset($price['numberWeekend']) && isset($price['moneyWeekend'])): ?>
                <tr><td>Ngày cuối tuần</td></tr>
                <tr> 
                    <th>VND <span class="nightly-price"><?php echo $price['numberWeekend'] ?></span> × <?php echo $price['moneyWeekend']; ?> Đêm</th> 
                    <td>VND <span><?php echo ($price['numberWeekend'] * $price['moneyWeekend']) ?></span></td> 
                </tr>
            <?php endif; ?>

            <?php if (isset($price['guest'])): ?>
                <tr>
                    <td><span>Số người: </span></td>
                    <td><?php echo $price['guest']; ?></td>
                </tr> 
            <?php endif; ?>
            <?php if (isset($price['guestExcess']) && isset($price['moneyGuestExcess'])): ?>
                <tr>
                    <td>Số người Vượt quá giới hạn</td>
                    <td style="a"><?php echo $price['guestExcess'] . 'x' . $price['moneyGuestExcess']; ?></td>
                </tr>
            <?php endif; ?>
            <?php if (isset($price['clearning_fee']) && $price['clearning_fee'] > 0): ?>
                <tr class="cleaning-fee"> 
                    <th>Phí dọn dẹp</th> 
                    <td>VND <span><?php echo $price['clearning_fee']; ?></span></td> 
                </tr>
            <?php endif; ?>
            <?php if (isset($price['tax'])): ?>
                <tr class="total"> 
                    <th>Thuế: </th> 
                    <td>VND <span><?php echo $price['tax']; ?></span></td> 
                </tr>
            <?php endif; ?>
            <?php if (isset($price['money'])): ?>
                <tr class="total"> 
                    <th>Tổng:  </th> 
                    <td>VND <span><?php echo $price['money']; ?></span></td> 
                </tr>
            <?php endif; ?>
        </tbody> 
    </table>
</div>