<div class="wrapper" style="margin-top: 72px;">
    <div class="container">
        <div id="breadcrumbs">
            <a href="<?php echo base_url().'help/'?>">Home</a>
            <?php if (!empty($help_article)): ?>
            › <a href="<?php echo base_url().'help/topic/'.  convertUrl($help_article->topic_title_en, $help_article->topic_id)?>"><?php echo (empty($language) || $language === 'vietnamese') ? $help_article->topic_title : $help_article->topic_title_en; ?></a> › <?php echo (empty($language) || $language === 'vietnamese') ? $help_article->title : $help_article->title_en; ?>
            <?php endif;?>
        </div>
        <div id="support-main">
            <div class="support-body">
                <div class="content article">
                    <?php if (!empty($help_article)): ?>
                        <div class="title">
                            <h3><?php echo (empty($language) || $language === 'vietnamese') ? $help_article->title : $help_article->title_en; ?></h3>
                            <div class="meta">Last Updated: Apr 16, 2015</div>
                        </div>
                        <div class="article-content">
                            <?php echo (empty($language) || $language === 'vietnamese') ? $help_article->content : $help_article->content_en; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>