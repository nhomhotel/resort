<div class="container" style="margin-top: 72px; ">
    <form action="<?php echo base_url().'help/'?>search" method="get" id="support-search" class="form-inline" role="form">
        <div class="outer">
            <div class="inner">
                <input type="text" id="q" name="q" maxlength="100" value="" class="ui-autocomplete-input form-control" autocomplete="off" role="textbox" aria-autocomplete="list" aria-haspopup="true" placeholder="How can we help?">
                <input type="hidden" name="b_id" value="7855">
                <input type="submit" id="support-search-submit" value="Search" class="btn btn-primary">
            </div>
        </div>
    </form>
    <div id="support-main">

        <div class="support-body">
            <div class="content dashboard">
                <h3><?php echo lang('browse_by_topic');?></h3>
                <div class="row">
                    <?php if(!empty($post_guides_topic1)&&!empty($post_guides_topic2)):?>
                    <div class="col-xs-12 col-md-6">
                        <a href="<?php // echo base_url().'help/topic/'.  convertUrl($row->title_en, $row->post_guide_id)?>"><?php // echo (empty($language)||$language==='vietnamese')?$row->title:$row->title_en;?></a>
                        <ul>
                        <?php $topicTitle1 = '';?>
                        <?php foreach ($post_guides_topic1 as $row):?>
                        <?php if($topicTitle1!==$row->topic_title):?>
                            <div class="row">
                                <table>
                                    <tr>
                                        <td>
                                            <h4><?php $topicTitle1 = $row->topic_title;echo (empty($language)||$language==='vietnamese')?$row->topic_title:$row->topic_title_en;?></h4></td>
                                        <td>
                                            <a href="<?php echo base_url().'help/topic/'.  convertUrl($row->topic_title_en, $row->topic_id)?>"><?php echo lang('view_all')?></a>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        <?php endif;?>
                            <li><a href="<?php echo base_url().'help/article/'.  convertUrl($row->title_en, $row->post_guide_id)?>"><?php echo (empty($language)||$language==='vietnamese')?$row->title:$row->title_en;?></a></li>
                        <?php endforeach;?>
                        </ul>
                    </div>
                    <div class="col-xs-12 col-md-6">
                        <ul>
                            <?php $topicTitle2 = '';?>
                        <?php foreach ($post_guides_topic2 as $row):?>
                        <?php if($topicTitle1!==$row->topic_title):?>
                            <div class="row">
                                <table>
                                    <tr>
                                        <td>
                                            <h4><?php $topicTitle1 = $row->topic_title;echo (empty($language)||$language==='vietnamese')?$row->topic_title:$row->topic_title_en;?></h4></td>
                                        <td>
                                            <a href="<?php echo base_url().'help/topic/'.  convertUrl($row->topic_title_en, $row->topic_id)?>"><?php echo lang('view_all')?></a>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        <?php endif;?>
                        <li><a href="<?php echo base_url().'help/article/'.  convertUrl($row->title_en, $row->post_guide_id)?>"><?php echo (empty($language)||$language==='vietnamese')?$row->title:$row->title_en;?></a></li>
                        <?php endforeach;?>
                        </ul>
                    </div>
                    <?php elseif (!empty($post_guides_topic1)):?>
                    <div class="col-xs-12">
                        <?php $topicTitle1 = '';?>
                        <ul>
                        <?php foreach ($post_guides_topic1 as $row):?>
                        <?php if($topicTitle1!==$row->topic_title):?>
                        <h4><?php $topicTitle1 = $row->topic_title;echo (empty($language)||$language==='vietnamese')?$row->topic_title:$row->topic_title_en;?></h4>
                        <a href="<?php echo base_url().'help/topic/'.  convertUrl($row->topic_title_en, $row->topic_id)?>"><?php echo (empty($language)||$language==='vietnamese')?$row->topic_title:$row->topic_title_en; ?></a>
                        <?php endif;?>
                        <li><a href="<?php echo base_url().'help/article/'.  convertUrl($row->title_en, $row->post_guide_id)?>"><?php echo (empty($language)||$language==='vietnamese')?$row->title:$row->title_en;?></a></li>
                        <?php endforeach;?>
                        </ul>
                    </div>
                    <?php elseif (!empty($post_guides_topic2)):?>
                    <div class="col-xs-12">
                        <?php $topicTitle2 = '';?>
                        <ul>
                        <?php foreach ($post_guides_topic2 as $row):?>
                        <?php if($topicTitle2!==$row->topic_title):?>
                        <h4><?php $topicTitle2 = $row->topic_title;echo (empty($language)||$language==='vietnamese')?$row->topic_title:$row->topic_title_en;;?></h4>
                        <a href="<?php echo base_url().'help/topic/'.  convertUrl($row->topic_title_en, $row->topic_id)?>"><?php echo (empty($language)||$language==='vietnamese')?$row->topic_title:$row->topic_title_en; ?></a>
                        <?php endif;?>
                        <li><a href="<?php echo base_url().'help/article/'.  convertUrl($row->title_en, $row->post_guide_id)?>"><?php echo (empty($language)||$language==='vietnamese')?$row->title:$row->title_en;?></a></li>
                        <?php endforeach;?>
                        </ul>
                    </div>
                    <?php endif;?>
                </div>
            </div>
        </div>
        <div id="footer">
        </div>
    </div>
</div>