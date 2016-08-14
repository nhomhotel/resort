<?php
if (isset($sliders)):
    $config = get_config_slide();
    $number = count($sliders);
    $i = 0;
    ?>
    <ul>
        <?php
        $number = count($sliders);
        foreach ($sliders as $key => $value):
            ?>
            <li class="location-item  <?php echo $config[$number][$i]; ?>">
                <a href="<?php echo base_url() . 'room/search?location=' . urlencode($value->name) ?>" style=" background: transparent url('<?php echo base_url() . substr($value->image, 1) ?>') no-repeat scroll 60% 60% / cover; width: 1187px;">
                    <p><?php echo $value->name; ?></p>
                </a>
            </li>
        <?php $i++;
    endforeach;
    ?>
    </ul>
<?php endif; ?>