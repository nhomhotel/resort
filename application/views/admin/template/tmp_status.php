<?php
if(isset($index)):
    if($index==0):?>
        <a href="javascript:void(0)" onclick="status(<?php echo $id; ?>)" class="lightbox" title="block">
            <img src="<?php echo base_url(); ?>public/admin/images/icons/color/tick.png" />
        </a>
    <?php else:?>
        <a href="javascript:void(0)" onclick="status(<?php echo $id; ?>)" class="lightbox" title="active">
            <img src="<?php echo base_url(); ?>public/admin/images/icons/color/block.png" />
        </a>
    <?php endif;
endif;
?>
