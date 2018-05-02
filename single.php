<?php
/**
 * The Template for displaying all single posts
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

$context                 = Timber::get_context();
$post                    = Timber::query_post();
$context['post']         = $post;
$context['comment_form'] = TimberHelper::get_comment_form();

if ($post->post_type == 'event') {
    $context['event'] = prepareEventFields();
} elseif ($post->post_type == 'success_story') {
    $context['success'] = prepareEventFields();
} elseif ($post->post_type == 'news') {
    $context['news'] = prepareNewsFields();
}

if (post_password_required($post->ID)) {
    Timber::render('single-password.twig', $context);
} else {
    Timber::render(array('single-' . $post->ID . '.twig', 'single-' . $post->post_type . '.twig', 'single.twig'), $context);
}
