<?php /* Template Name: Contact Template */ ?>
<?php get_header(); ?>

<body>
    <div class="contact-container" id="contact-container">
        <?php
        // The WordPress loop to display the content of the Contact Page
        if (have_posts()) :
            while (have_posts()) : the_post();
                the_content();
            endwhile;
        endif;
        ?>
    </div>
</body>
<?php get_footer(); ?>
