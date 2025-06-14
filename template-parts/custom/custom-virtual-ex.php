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

$is_employment = is_page_template( 'templates/about-us.php' );

$title      =  !$is_employment ? get_field( "virtual-ex_title" ) : get_field( "emp-virtual-ex_title") ;
$desc       =  !$is_employment ? get_field( "virtual-ex_desc" ) : get_field( "emp-virtual-ex_desc" );
$border_add = !$is_employment ? "t-white" : '';
?>

<section class="virtual-ex t-black <?php if ( $is_employment ) echo "back-grey"?>" 
        id="virtual-ex-section"
<?php if ( !$is_employment ) : ?> 
    style="background: url('<?php echo get_template_directory_uri()?>/assets/images/background-main.png')" 
<?php endif; ?>
>
    <div class="container">
        <div class="virtual-ex__body" >
            <?php  kvp_get_border_header( array( 'title' => $title,'add_styles' => $border_add, 'h'     => 'h2' ) ); ?>
            <div class="virtual-ex__content <?php if(!$is_employment) echo 't-white'  ?>">
                <div class="virtual-ex__text">
                    <?php print_r( $desc ); ?>
                </div>
                <div class="virtual-ex__excursion <?php if ( $is_employment ) echo "grd__full-column" ?>">
                    <iframe src="/3d-index.html" frameborder="0"></iframe>
                </div>
                <?php if ( !$is_employment ) :?>
                    <div class="virtual-ex__app-text">
                        Також в нас є додаток для Android з аудіоекскурсіями по 3D простору наших приміщень та віртуальному полігону з військовою технікою.
                    </div>
                <?php endif; ?>
                <div class="virtual-ex__app <?php if ( $is_employment ) echo "back-blue t-white br-10"?>">
                    <div class="virtual-ex__app-add">
                        Зацікавились? Завантажуйте додаток з Google Play за посиланням:
                    </div>
                    <div class="virtual-ex__button ">
                        <?php 
                        $btn_class = $is_employment ? 'btn-white' : 'btn-blue';
                        kvp_get_btn( array(
                            'title'                 => 'Завантажити додаток',
                            'on_click_href'            => get_field('virtual-ex_btn-href'),
                            'container_add_style'      => '',
                            'btn_add_style'         => '',
                            'btn_style' => $btn_class,
                        ) );?>
                    </div>

                </div>
            </div>
        </div>
        <?php if ( !$is_employment ) :?>
            <div class="virtual-ex__gradient"></div>
        <?php endif; ?>
    </div>
</section>