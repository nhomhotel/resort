<!-- start press-right-column -->
<div class="col-md-6 press-right-column inline">
    <h1><b><?php echo lang('newsCategory'); ?></b> </h1>
    <?php if (isset($newsCategory)): ?>
        <?php foreach ($newsCategory as $line => $row): ?>
            <?php if ($line % 2 == 0): ?>        
                <div class="coloumn-1 inline">
                    <a class="white-container" href="<?php echo NewsUrl($row->description,$row->news_category_id)?>" target="_blank">
                        <div class="press-sprite img-presss-3"><img src="<?php echo !empty($row->image)?$row->image:''?>"/></div>
                        <p><?php echo !empty($row->fdf)?shortNews($row->description):'';?>“旅遊住宿網站travelmob剛於本月啟用。travelmob為亞太區業主和尋找短期住宿旅客的平台... 網站現時登記了香港、新加坡、馬來西亞、印尼、泰國、日本、越南、印度等地數以千計的住宿”</p>
                    </a>
                </div>
            <?php else: ?>
                <!--end coloumn-1 -->
                <div class="coloumn-2 inline">
                    <a class="white-container" href="<?php echo NewsUrl($row->description,$row->news_category_id)?>" target="_blank">
                        <div class="press-sprite img-presss-17"><img src="<?php echo !empty($row->image)?$row->image:''?>"/></div>
                        <p>“Are you bored of traveling to the same ‘exotic’ locales and living the way all other travelers do? Do want a change? You might want to  consider travelmob as your partner in traveling ‘crime’.”</p>
                        <p><?php echo !empty($row->fdf)?shortNews($row->description):'';?></p>
                    </a>
                </div>
            <?php endif; ?>
            <!--end coloumn-2 -->
        <?php endforeach; ?>
    <?php endif; ?>
</div>
<!-- End press-right-column -->