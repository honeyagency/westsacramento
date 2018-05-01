<?php

function prepareHomepageFields()
{
    $headerImageId = get_field('field_5ae7559e41db6');
    $headerImage   = null;
    if (!empty($headerImageId)) {
        $headerImage = new TimberImage($headerImageId);
    }

    $header = array(
        'image' => $headerImage,
        'title' => get_field('field_5ae755af41db7'),
    );

    if (have_rows('field_5ae755d941db9')) {
        $steps = array();
        while (have_rows('field_5ae755d941db9')) {
            the_row();
            $steps[] = array(
                'title'       => get_sub_field('field_5ae75614e76da'),
                'subtitle'    => get_sub_field('field_5ae755e741dba'),
                'description' => get_sub_field('field_5ae75626c47b1'),
                'link'        => get_sub_field('field_5ae75634c47b2'),
                'icon'        => get_sub_field('field_5ae75642c47b3'),
            );
        }
    } else {
        $steps = null;
    }

    $steps = array(
        'title' => get_field('field_5ae755c141db8'),
        'steps' => $steps,
    );

    $successImageId = get_field('field_5ae75664726c9');
    $successImage   = null;
    if (!empty($successImageId)) {
        $successImage = new TimberImage($successImageId);
    }
    if (have_rows('field_5ae7568e726cb')) {
        $item = array();
        while (have_rows('field_5ae7568e726cb')) {
            the_row();
            $item[] = array(
                'number' => get_sub_field('field_5ae7569d726cc'),
                'text'   => get_sub_field('field_5ae756ac726cd'),
            );
        }
    } else {
        $item = null;
    }

    $community = array(
        'image' => $successImage,
        'title' => get_field('field_5ae75681726ca'),
        'item'  => $item,
        'link'  => get_field('field_5ae756c0726ce'),
    );
    $home = array(
        'header'    => $header,
        'steps'     => $steps,
        'community' => $community,
    );
    return $home;
}
function prepareOptions()
{
    if (have_rows('field_5ae8a87cb670a', 'options')) {
        $navs = array();
        while (have_rows('field_5ae8a87cb670a', 'options')) {
            the_row();
            if (have_rows('field_5ae8a89eb670b', 'options')) {
                $links = array();
                while (have_rows('field_5ae8a89eb670b', 'options')) {
                    the_row();
                    $links[] = get_sub_field('field_5ae8a8adb670c');
                }
                $navs[] = $links;
            }

        }
    }
    $news = array(
        'title' => get_field('field_5ae79f3094e44', 'options'),
        'posts' => getCustomPosts('news', 2, 'featured', 'date', null, null),
    );
    $logoImageId = get_field('field_5ae8a86ab6708', 'options');
    $logoImage   = null;
    if (!empty($logoImageId)) {
        $logoImage = new TimberImage($logoImageId);
    }

    $footer = array(
        'news'       => $news,
        'navigation' => $navs,
        'logo'       => $logoImage,
    );
    $email = array(
        'title' => get_field('field_5ae89fb8069e3', 'options'),
        'embed' => get_field('field_5ae89fc1069e4', 'options'),
    );
    $social = array(
        'linkedin'  => get_field('field_5ae89fd4069e7', 'options'),
        'facebook'  => get_field('field_5ae89fce069e6', 'options'),
        'twitter'   => get_field('field_5ae89fdf069e8', 'options'),
        'instagram' => get_field('field_5ae89fe4069e9', 'options'),
    );
    $options = array(
        'email'  => $email,
        'social' => $social,
    );
    $section = array(
        'footer'  => $footer,
        'options' => $options,
    );
    return $section;
}
