<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php $this->load->view('site/head'); ?>
</head>
<body>
<div id="wrapper">
    <header>
        <?php $this->load->view('site/header'); ?>
    </header>
    <?php if (isset($temp) && !empty($temp)) {
        $this->load->view($temp, isset($data) ? ($data) : NULL);
    } ?>
    <footer>
        <?php $view_footer = $this->area_model->get_list(array(
            'where' => array('view_footer>' => 0),
            'limit' => array('5' => '0'),
            'order'=>array('view_footer','desc')
        ));
            $FollowSocial = $this->Follow_Social_model->get_list();
            if(count($FollowSocial)>0)$data['FollowSocial'] = $FollowSocial;
            if(count($view_footer)>0)$data['view_footer'] = $view_footer;
            $this->load->view('site/footer',  isset($data['view_footer'])?$data:null);?>
    </footer>
</div>
</body>