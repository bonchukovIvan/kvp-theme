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
                        <a href="tel:+380542628315">
                            <h1 class="phone-number">
                                +38 0542 62 83 15
                            </h1>
                        </a>
                    </div>
                    <div class="phone">
                        <p class="phone-type">
                            консультант приймальної комісії:
                        </p>
                        <a href="tel:+380685819687">
                            <h1 class="phone-number">
                                +38 068 581 96 87
                            </h1>
                        </a>
                    </div>
                </div>
                <div class="footer-body__contacts">
                    <a href="mailto:youremail@example.com">
                        <button class="contact-btn" >
                            Електронне звернення
                        </button>
                    </a>
                    <div class="email">
                    <a href="info@kvp.sumdu.edu.ua">
                        <img src="/images/mail.svg" alt="">
                        <p>
                            info@kvp.sumdu.edu.ua
                        </p>
                    </div>
                    <div class="icons">
                        <a href="#">
                            <img src="images/facebook.svg" alt="" srcset="">
                        </a>
                        <a href="#">
                            <img src="images/inst.svg" alt="" srcset="">
                        </a>
                        <a href="#">
                            <img src="images/yt.svg" alt="" srcset="">
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