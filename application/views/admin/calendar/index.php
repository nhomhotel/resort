<?php $lang = get_lang(); ?>
<div class="titleArea clearfix">
    <div class="wrapper col-md-12">
        <div class="pageTitle">
            <h4><?php if (!empty($link)) :?><a href="<?php echo $link; ?>"><i style="position: relative; top:3px" class="glyphicon glyphicon-menu-left"></i><?php endif; ?><?php echo $title; ?><?php if (!empty($link)) :?></a><?php endif; ?></h4>
            <p class="font-14"><?php echo $description; ?></p>
        </div>
        <div class="clear"></div>
    </div>
</div>
<div class="line"></div>
<div class="wrapper col-md-12 content mt-10">
    <div id="calendar"></div>
</div>
<script>
    $(document).ready(function () {
        var events = []; <?php if (!empty($events)) : ?>events = <?php echo $events; ?>;<?php endif; ?>
        console.log(events);
        $('#calendar').fullCalendar({
            header:{
                left: 'prev,next today',
                center: 'title',
                right: 'month,basicWeek,basicDay'
            },
            lang: 'vi',
            timezone: 'local',
            defaultDate: '<?php echo date('Y-m-d'); ?>',
            editable: true,
            eventLimit: true,
            events: events,
            eventClick: function(event) {
                window.open(event.url);
                return false;
            }
        });
    });
</script>
