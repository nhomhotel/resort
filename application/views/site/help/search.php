<style>
    .article{
        border: 0;
        font-size: 100%;
        font-family: inherit;
        vertical-align: baseline;
        outline: none;
        margin: 0 0 30px;
        background: url('https://cdn.desk.com/images/portal/icon-types.png') 0 -276px no-repeat;
        padding: 0 0 0 40px;
    }
    h4 {
        font-size: 18px;
        color: #434343 !important;
        font-family: Arial,Arial,Helvetica,sans-serif !important;
        margin: 0 0 5px;
        font-weight: normal;
    }
    a:visited {
        color: #254689;
    }
    a:link {
        color: #254689;
    }
    a {
        color: #398FD1 !important;
    }

    a {
        color: #254689;
        text-decoration: none;
    }
    #support-main .articles li p {
        margin: 0 0 5px;
        color: #777;
    }
    p {
        font: 12pt Arial,Arial,Helvetica,sans-serif !important;
        color: #434343 !important;
    }
</style>
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