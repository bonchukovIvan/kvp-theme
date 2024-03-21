<?php
/**
 * Template part for displaying page content in page.php
 *
 *
 * @package WordPress
 * @subpackage Sumdu_theme
 * @since Sumdu theme 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?>

<section class="preview-section p5-25--nm <?php echo $args['add_class'] ?>">
    <div class="container">
        <div class="preview__back" style="background-image: url(<?php echo get_template_directory_uri()."/assets/images/background-main.png" ?>)">
            
            <div class="preview__body p5-25f" >

                <div class="preview__text">

                    <div class="">
                        <?php get_template_part( 'template-parts/header/page-header' ); ?>
                        <div class="preview__desc m25-0">
                            <?php echo get_field("page-desc"); ?>
                        </div>
                    </div>
                    
                    <?php 
                        kvp_get_btn( array(
                                'title'                 => 'Детальніше',
                                'on_click_href'            => get_field("preview-link"),
                                'container_add_style'      => '',
                                'btn_add_style'         => 'm-a',
                                'btn_style' => 'btn-white',
                            ) 
                        );
                    ?>
                   
                </div>

                <?php if ( is_page_template( 'templates/about-us.php' ) ) :?>
                    <div class="preview__logo">
                        <img src="<?php echo esc_url( get_field( "page-img" ) ); ?>" alt="" class="">
                    <div class="kvp-logo">
                        <a href="/" >
                            <?php 
                                $custom_logo_id = get_theme_mod( 'custom_logo' );
                                $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                                
                                if ( has_custom_logo() ) {
                                    echo '<img src="' . esc_url( $logo[0] ) . '" alt="' . get_bloginfo( 'name' ) . '">';
                                } 
                            ?>
                        </a>
                        <div class="faculty">
                            <p>
                                Кафедра
                            </p>
                            <p style="color: #EF7919;">військової підготовки</p>
                        </div>
                        <p>
                            Сумського Державного університету
                        </p>
                    </div>
                </div>

                <?php else : ?>
                    <div class="preview__img">

                        <?php if ( get_field( "page-img" ) != '') : ?>
                            <img src="<?php echo esc_url( get_field( "page-img" ) ); ?>" alt="" class="">
                        <?php endif; ?>

                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>