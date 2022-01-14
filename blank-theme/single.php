<!DOCTYPE html>
<html lang="ja" prefix="og: https://ogp.me/ns#">
<head>
<?php get_template_part('partials/head'); ?>
</head>
<body id="app">
    <?php get_header(); ?>

    <main id="main" class="main">
        <?php the_content(); ?>
    </main>

    <?php get_footer(); ?>
</body>
</html>