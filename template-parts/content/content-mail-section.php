<div class="custom-mail">
<div class="custom-mail__body">
    <div class="custom-mail__top">
        <div class="custom-mail__text">
            <?php echo $args['text']; ?>
        </div> 
        <?php kvp_get_btn( array(
        'title'         => $args['btn-title'],
        'btn_style'     => 'btn-white',
        'on_click_href' => 'mailto:'.$args['btn-href'],
    ) ); ?>
    </div>
    <div class="custom-mail__icon">
        <img src="<?php echo get_template_directory_uri()?>/assets/images/custom-mail.svg" alt="">
    </div>

</div>
    <div class="custom-mail__gradient"></div>
</div>