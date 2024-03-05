<?php
    if ( have_posts() ) {
        // Load posts loop.
        while ( have_posts() ) {
            the_post();
            get_template_part( 'template-parts/content/content-posts' );
        }			
        ?>

        <?php
    } else {
        // If no content, include the "No posts found" template.
        get_template_part( 'template-parts/content/content-none' );
    }
?>