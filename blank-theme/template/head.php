<meta charset="UTF-8">
<meta name="viewport" content="width=device-width">
<title><?php echo get_page_title(); ?></title>
<meta name="description" content="">
<meta property="og:title" content="<?php echo get_page_title(); ?>">
<meta property="og:type" content="<?php echo is_single() ? 'article' : 'website'; ?>">
<meta property="og:url" content="<?php echo (is_ssl() ? 'https' : 'http') . '://' . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]; ?>">
<meta property="og:image" content="<?php echo has_post_thumbnail() ? get_the_post_thumbnail_url() : image('common/ogp.jpg'); ?>">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="<?php echo get_page_title(); ?>">
<link rel="icon" href="<?php echo image('favicon.ico'); ?>">
<?php wp_head(); ?>