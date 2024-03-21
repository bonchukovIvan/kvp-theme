<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage Sumdu_theme
 * @since Sumdu theme 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
			<div class="page-wrapper">
				<div class="page-content">
                    <div class="container">
                        <div class="page-404__body">
                            <div class="page-404__desc">
                                <div class="page-header page-404">
                                    <h1>
                                        Сторінку не знайдено
                                    </h1>
                                </div>
                                <div class="description">
                                    Вибачте, але ми не можемо знайти ту сторінку, яку ви шукаєте. Можливо, вона була переміщена, видалена або ніколи не існувала.
                                </div>
                                <?php 
                                    kvp_get_btn( array(
                                        'title'               => 'Повернутися на головну',
                                        'on_click_href'       => '/',
                                    ) );
                                ?>
                            </div>
                            <div class="page-404__img">
                                <img src="<?php echo get_template_directory_uri()?>/assets/images/404.svg" alt="">
                            </div>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</div>
<?php get_footer(); ?>