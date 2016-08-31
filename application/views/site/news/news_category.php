<!-- start press-right-column -->
<div class="col-md-6 press-right-column inline">
    <h1><b><?php echo lang('newsCategory'); ?></b> </h1>
    <?php if (isset($newsCategory)): ?>
        <?php $n = count($newsCategory);
        if ($n < 2): ?>
        <?php foreach ($newsCategory as $row): ?>     
                <div class="coloumn-1 inline" style="float:left;">
                    <a class="white-container" href="<?php echo NewsUrl($row->description, $row->news_category_id) ?>" target="_blank">
                        <div class="press-sprite img-presss-3" style="width: 200px;height: 40px;margin: 0 auto;background: url('<?php echo!empty($row->image) ? $row->image : '' ?>') no-repeat scroll center center / cover"></div>
                        <p><?php echo!empty($row->description) ? shortNews($row->description) : ''; ?></p>
                    </a>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
                <?php $newsCategory_1 = array_slice($newsCategory, 0, ceil($n / 2));
                $newsCategory_2 = array_slice($newsCategory, ceil($n / 2)); ?>
            <div class="coloumn-1 inline" style="float:left;">
        <?php foreach ($newsCategory_1 as $line => $row): ?>
                    <a class="white-container" href="<?php echo NewsUrl($row->title, $row->news_category_id) ?>" target="_blank">
                        <div class="press-sprite img-presss-3" style="width: 200px;height: 40px;margin: 0 auto;background: url('<?php echo!empty($row->image) ? $row->image : '' ?>') no-repeat scroll center center / cover"></div>
                        <p><?php echo!empty($row->description) ? shortNews($row->description) : ''; ?></p>
                    </a>
                <?php endforeach; ?>
            </div>
            <div class="coloumn-2 inline">
        <?php foreach ($newsCategory_2 as $line => $row): ?>
                    <a class="white-container" href="<?php echo NewsUrl($row->title, $row->news_category_id) ?>" target="_blank">
                        <div class="press-sprite img-presss-3" style="width: 200px;height: 40px;margin: 0 auto;background: url('<?php echo!empty($row->image) ? $row->image : '' ?>') no-repeat scroll center center / cover"></div>
                        <p><?php echo!empty($row->description) ? shortNews($row->description) : ''; ?></p>
                    </a>
            <?php endforeach; ?>
            </div>
    <?php endif; ?>
<?php endif; ?>
</div>
<!-- End press-right-column -->