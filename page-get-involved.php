<?php
// Template Name: Get Involved

/**
 * The template for the group of "Get Involved" pages
 *
 */

$context             = Timber::get_context();
$post                = new TimberPost();
$context['post']     = $post;
$context['involved'] = prepareGetInvolvedFields();
Timber::render('page-get-involved.twig', $context);
