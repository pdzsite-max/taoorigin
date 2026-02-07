<?php
get_header();
?>
<div class="content">
    <div class="site-container">
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <article <?php post_class('resource'); ?>>
                    <h1 class="resource-title"><?php the_title(); ?></h1>
                    <div class="resource-content">
                        <?php the_content(); ?>
                    </div>
                    <div class="resource-action">
                        <a class="btn" href="#">立即获取</a>
                    </div>
                </article>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</div>
<?php
get_footer();
