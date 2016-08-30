<div class="item-container">
    <h1><b><?php echo lang('news_releases');?></b> </h1>
    <ul>
        <?php if(isset($release)):?>
        <?php foreach ($release as $row):?>
        <li>
            <em><?php if(isset($row->update)) echo $row->update;?></em>
            <br>
            <a href="<?php echo base_url().'tin-tuc/'.strtolower(str_replace(' ', '-', onlyCharacter(vn_str_filter($row->title)))).'-'.$row->news_id;?>" class="forange"><?php echo $row->title?></a>
        </li>
        <?php endforeach;?>
        <?php endif;?>
    </ul>
</div>