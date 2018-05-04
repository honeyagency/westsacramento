<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * To generate specific templates for your pages you can use:
 * /mytheme/views/page-mypage.twig
 * (which will still route through this PHP file)
 * OR
 * /mytheme/page-mypage.php
 * (in which case you'll want to duplicate this file and save to the above path)
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

$context         = Timber::get_context();
$post            = new TimberPost();
$context['post'] = $post;

if (is_front_page()) {
    $context['home'] = prepareHomepageFields();
} elseif (is_page(8)) {

    if (!empty($_GET["post"])) {
        $type = $_GET["post"];
        if ($type == 'news') {
            $context['filtered'] = 'News';
            $context['news']     = getCustomPosts('news', -1, null, 'date', null, null);
        } elseif ($type == 'success_story') {
            $context['filtered'] = 'Success Stories';
            $context['stories']  = getCustomPosts('success_story', -1, null, 'date', null, null);
        }

    } else {
        $context['events'] = getCustomPosts('event', 2, null, 'eventdate', null, null);

        $feat    = getCustomPosts('news', 2, 'featured', 'date', null, null);
        $exclude = array();
        foreach ($feat as $newsId) {
            $exclude[] = $newsId['id'];

        }

        $context['featurednews'] = $feat;

        $context['news'] = getCustomPosts('news', 3, null, 'date', $exclude, null);
    }
}

if (is_page(24) || is_page(25) || is_page(26)) {
    $context['base'] = prepareBaseFields();
    Timber::render('page-base.twig', $context);
} elseif (is_page(27)) {
    $context['success'] = prepareCommunitySuccess();
    Timber::render('page-community-success.twig', $context);
} else {
    Timber::render(array('page-' . $post->post_name . '.twig', 'page.twig'), $context);

}
