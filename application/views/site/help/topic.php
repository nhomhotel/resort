<div class="wrapper" style="margin-top: 72px">
    <div class="container">
        <div id="breadcrumbs">
            <a href="<?php echo base_url().'help'?>">Home</a>› <?php 
            if(!empty($help_topic)) echo (empty($language) || $language === 'vietnamese')?$help_topic[0]->topic_title:$help_topic[0]->topic_title_en;else echo 'error';?>
        </div>
        <div id="support-main">
            <div class="support-body">
                <div class="content articles">
                    <div id="toggle">
                        <h3><?php if(!empty($help_topic)) echo (empty($language) || $language === 'vietnamese')?$help_topic[0]->topic_title:$help_topic[0]->topic_title_en;else echo ' ';?></h3>
                    </div>
                    <ul>
                        <?php if(!empty($help_topic)):?>
                        <?php foreach ($help_topic as $row):?>
                        <li class="article">
                        <h4><a href="<?php echo base_url().'/help/article/'.  convertUrl($row->title_en, $row->post_guide_id)?>"><?php echo (empty($language)||$language==='vietnamese')?$row->title:$row->title_en;?></a></h4>
                            <p><?php echo (empty($language)||$language==='vietnamese')?shortNews( $row->content):shortNews($row->content_en);?></p>
                            <div class="meta">
                                Apr 16, 2015
                            </div>
                            <li>
                        <?php endforeach;?>
                        <?php endif;?>
                    </ul>
                    <div id="pagination">
                        <?php echo !empty($pagination)?$pagination:'';?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>