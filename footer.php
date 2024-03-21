<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Sumdu_theme
 * @since Sumdu theme 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// numbers
$f_number = get_theme_mod('basic-header-callout-f-number' );
$s_number = get_theme_mod( 'basic-header-callout-s-number' );

// links
$youtube_link = get_theme_mod( 'basic-header-callout-youtube' );
$facebook_link = get_theme_mod( 'basic-header-callout-facebook' );
$instagram_link = get_theme_mod( 'basic-header-callout-instagram' );

// icons
$youtube_icon = get_theme_mod( 'footer-icon-yu-set' );
$facebook_icon = get_theme_mod( 'footer-icon-face-set' );
$instagram_icon = get_theme_mod( 'footer-icon-instagram-set' );
$mail_icon = get_theme_mod( 'footer-icon-mail-set' );

// emails btn
$btn_title = get_theme_mod( 'footer-btn-title-text' );
$btn_href = get_theme_mod( 'footer-btn-href-text' );

?>
        </main>
	</div>
</div>
<?php if (!is_page_template( 'search-page.php' ) && !is_search() && !is_page_template( 'gallery-page.php' )) get_template_part( 'template-parts/footer/footer-callback' ); ?>
<footer class="main-footer">
        <div class="container">
            <div class="footer-body">
                <div class="footer-body__branding">
                    <div class="logo">
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
                            Сумського Державного<br>університету
                        </p>
                    </div>
                </div>
                <?php 
                if (has_nav_menu('footer_menu'))
                    wp_nav_menu([
                        'theme_location' => 'footer_menu',
                        'container_class'=> 'footer-body__menu',
                        'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        'depth' => 1,
                        'add_li_class'  => 'footer-body__li '
                    ]); 
                ?>
                <div class="footer-body__phones">
                    <div class="phone">
                        <p class="phone-type">
                            тел./факс:
                        </p>
                        <a href="tel:<?php echo str_replace(' ', '', $f_number) ?>">
                            <h1 class="phone-number">
                                <?php echo $f_number ?>
                            </h1>
                        </a>
                    </div>
                    <div class="phone">
                        <p class="phone-type">
                            консультант приймальної комісії:
                        </p>
                        <a href="tel:<?php echo str_replace(' ', '', $s_number) ?>">
                            <h1 class="phone-number">
                                <?php echo $s_number ?>
                            </h1>
                        </a>
                    </div>
                </div>
                <div class="footer-body__contacts">
                    <?php 
                        kvp_get_btn( array(
                                'title'                 => $btn_title,
                                'on_click_href'            => "mailto:$btn_href",
                                'container_add_style'      => '',
                                'btn_add_style'         => 'm-a',
                                'btn_style' => 'btn-orange',
                            ) 
                        );
                    ?>
                    <div class="email">
                    <a href="mailto:<?php echo esc_url( $btn_href ); ?>">
                        <img src="<?php echo esc_url( $mail_icon ); ?>" alt="">
                        <p>
                            <?php echo $btn_href ?>
                        </p>
                    </div>
                    <div class="icons">

                        <a href="<?php echo esc_url( $facebook_link ) ?>" target=”_blank”>
                            <img src="<?php echo esc_url( $facebook_icon ); ?>" alt="" srcset="">
                        </a>

                        <a href="<?php echo esc_url( $instagram_link ); ?>" target=”_blank”>
                            <img src="<?php echo esc_url( $instagram_icon ); ?>" alt="" srcset="">
                        </a>

                        <a href="<?php echo esc_url( $youtube_link );  ?>" target=”_blank”>
                            <img src="<?php echo esc_url( $youtube_icon ); ?>" alt="" srcset="">
                        </a> 

                    </div>
                </div>
            </div>
            
        </div>
       
    </footer>
    <script>
        let navbar_arrows = document.querySelectorAll('#navbar__li-arrow');
        navbar_arrows.forEach((arrow) => {
            arrow.addEventListener('click', () => {
                arrow.nextElementSibling.classList.toggle('show');
                arrow.classList.toggle('active');
            });
        });
    </script>
</body>
</html>