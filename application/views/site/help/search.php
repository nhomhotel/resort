<div class="wrapper" style="margin-top: 72px">
    <div class="container">
        <div id="desk-external-variables-page_search_result" class="desk-external-variables" style="display: none;">
            <div id="search_term">account</div>
        </div>
        <div style="display:none" id="search_term">account</div>
        <div id="breadcrumbs">
            <a href="<?php echo base_url().'help'?>">Home</a> › Search
        </div>
        <div id="support-main">
            <div class="support-body">
                <div class="content articles">
                    <h3>17 results found for "<?php echo !empty($question)?$question:''?>"</h3>
                    <ul id="search-results">
                        <?php if(!empty($listArticle)):?>
                        <?php foreach ($listArticle as $row):?>
                        <li class="article">
                            <h4>
                                <a href="<?php echo base_url().'help/article/'.  convertUrl($row->title_en, $row->post_guide_id)?>"><?php echo (empty($language)||$language==='vietnamese')?$row->title:$row->title_en;?></a>
                            </h4>
                            <p><?php echo (empty($language)||$language==='vietnamese')?shortNews($row->content):shortNews($row->content_en);?></p>
                            <div class="meta">
                                Apr 21, 2015 04:00PM SGT
                            </div>
                        </li>
                        <?php endforeach;?>
                        <?php endif;?>
                    </ul>
                    <div id="pagination"><?php echo !empty($pagination)?$pagination:''?></div>
                </div>
            </div>
            <div id="footer">
            </div>
        </div>
    </div>
</div>