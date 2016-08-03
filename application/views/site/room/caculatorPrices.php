<div class="prices">
    <table class="price-details" style="width: 100%;"> 
        <tbody> 
            <?php if (isset($price['numberNormarDay']) && isset($price['moneyNormarDay'])): ?>
                <tr><td>Ngày bình thường</td></tr>
                <tr>
                    <?php if($price['type']==1){?>
                        <th>VND <span class="nightly-price"><?php echo $price['numberNormarDay'] ?></span> × <?php echo numberFormatToCurrency($price['moneyNormarDay'])?> Đêm</th> 
                        <td>VND <span><?php echo numberFormatToCurrency($price['numberNormarDay'] * $price['moneyNormarDay']);?></span></td> 
                    <?php }elseif($price['type']==2){ ?>
                        <th>VND <span class="nightly-price"><?php echo $price['numberNormarDay'] ?></span> × <?php echo numberFormatToCurrency($price['moneyNormarDay']/7)?> Đêm</th> 
                        <td>VND <span><?php echo numberFormatToCurrency($price['numberNormarDay'] * $price['moneyNormarDay']/7);?></span></td>
                    <?php }else{?>
                        <th>VND <span class="nightly-price"><?php echo $price['numberNormarDay'] ?></span> × <?php echo numberFormatToCurrency($price['moneyNormarDay']/30)?> Đêm</th> 
                        <td>VND <span><?php echo numberFormatToCurrency($price['numberNormarDay'] * $price['moneyNormarDay']/30);?></span></td>   
                       <?php }?>
                </tr>
            <?php endif; ?>

            <?php if (isset($price['numberWeekend']) && isset($price['moneyWeekend'])): ?>
                <tr><td>Ngày cuối tuần</td></tr>
                <tr> 
                    <th>VND <span class="nightly-price"><?php echo $price['numberWeekend'] ?></span> × <?php echo numberFormatToCurrency($price['moneyWeekend']); ?> Đêm</th> 
                    <td>VND <span><?php echo numberFormatToCurrency(($price['numberWeekend'] * $price['moneyWeekend'])) ?></span></td> 
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
                    <td style="a"><?php echo $price['guestExcess'] . 'x' . numberFormatToCurrency($price['moneyGuestExcess']); ?></td>
                </tr>
            <?php endif; ?>
            <?php if (isset($price['clearning_fee']) && $price['clearning_fee'] > 0): ?>
                <tr class="cleaning-fee"> 
                    <th>Phí dọn dẹp</th> 
                    <td>VND <span><?php echo numberFormatToCurrency($price['clearning_fee']); ?></span></td> 
                </tr>
            <?php endif; ?>
            <?php if (isset($price['tax'])): ?>
                <tr class="total"> 
                    <th>Thuế: </th> 
                    <td>VND <span><?php echo numberFormatToCurrency($price['tax']); ?></span></td> 
                </tr>
            <?php endif; ?>
            <?php if (isset($price['money'])): ?>
                <tr class="total"> 
                    <th>Tổng:  </th> 
                    <td>VND <span><?php echo numberFormatToCurrency($price['money']); ?></span></td> 
                </tr>
            <?php endif; ?>
        </tbody> 
    </table>
</div>