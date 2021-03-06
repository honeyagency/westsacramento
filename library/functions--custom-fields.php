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
        'link'  => get_field('field_5b5799b5abbf1'),
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
    $connected = array(
        'title' => get_field('field_5aea3359c1003', 'options'),
        'link'  => get_field('field_5aea3376c1005', 'options'),
        'text'  => get_field('field_5aea3364c1004', 'options'),
    );
    $options = array(
        'email'     => $email,
        'social'    => $social,
        'connected' => $connected,
    );
    $section = array(
        'footer'  => $footer,
        'options' => $options,
    );
    return $section;
}

function prepareBaseFields()
{
    $headerImageId = get_field('field_5ae7570df0e78');
    $headerImage   = null;
    if (!empty($headerImageId)) {
        $headerImage = new TimberImage($headerImageId);
    }
    $previous = array(
        'link'  => get_field('field_5ae75751f0e7c'),
        'color' => get_field('field_5ae8e36889802'),
    );
    $next = array(
        'link'  => get_field('field_5ae75760f0e7d'),
        'color' => get_field('field_5ae8e38c89803'),
    );
    $header = array(
        'image'       => $headerImage,
        'icon'        => get_field('field_5ae8d89bacab3'),
        'color'       => get_field('field_5ae8e3188ae7f'),
        'title'       => get_field('field_5ae75724f0e79'),
        'subtitle'    => get_field('field_5ae7572df0e7a'),
        'description' => get_field('field_5ae75739f0e7b'),
        'prev'        => $previous,
        'next'        => $next,
    );
    if (have_rows('field_5ae757def0e82')) {
        $steps = array();
        while (have_rows('field_5ae757def0e82')) {
            the_row();
            $steps[] = array(
                'title' => get_sub_field('field_5ae757f3f0e83'),
                'text'  => get_sub_field('field_5ae757faf0e84'),
            );
        }
    } else {
        $steps = null;
    }

    $started = array(
        'title' => get_field('field_5ae7579ef0e81'),
        'steps' => $steps,
    );
    if (have_rows('field_5aebc0cce7695')) {
        $steps2 = array();
        while (have_rows('field_5aebc0cce7695')) {
            the_row();
            $steps2[] = array(
                'title' => get_sub_field('field_5aebc0cce7696'),
                'text'  => get_sub_field('field_5aebc0cce7697'),
            );
        }
    } else {
        $steps2 = null;
    }

    $secondstart = array(
        'title' => get_field('field_5aebc0c2e7691'),
        'steps' => $steps2,
    );

    $storyArray = get_field('field_5ae7581ff0e86');
    $stories    = array();
    if (!empty($storyArray)) {
        foreach ($storyArray as $story) {
            $imageId = get_post_thumbnail_id($story);
            $image   = null;
            if (!empty($imageId)) {
                $image = new TimberImage($imageId);
            }
            $stories[] = array(
                'image'       => $image,
                'title'       => get_the_title($story),
                'achievement' => get_field('field_5ae75b28bb14a', $story),
                'description' => get_field('field_5ae75b96bb14c', $story),
                'link'        => get_the_permalink($story),
            );
        }
    }

    if (have_rows('field_5ae7568e7z14x')) {
        $item = array();
        while (have_rows('field_5ae7568e7z14x')) {
            the_row();
            $item[] = array(
                'number' => get_sub_field('field_5ae7569d7z15x'),
                'text'   => get_sub_field('field_5ae756ac7z16x'),
            );
        }
    } else {
        $item = null;
    }
    $community = array(
        'title' => get_field('field_5ae756817z13x'),
        'item'  => $item,
        'link'  => get_field('field_5ae756c07z17x'),
    );
    $base = array(
        'header'      => $header,
        'content'     => get_field('field_5ae75773f0e7f'),
        'started'     => $started,
        'secondstart' => $secondstart,
        'stories'     => $stories,
        'community'   => $community,
    );
    return $base;
}

function prepareGetInvolvedFields()
{

    if (have_rows('field_5ae90339c5ba5')) {
        $base = array();
        while (have_rows('field_5ae90339c5ba5')) {
            the_row();
            $base[] = array(
                'color'    => get_sub_field('field_5ae90354c5ba6'),
                'class'    => get_sub_field('field_5ae9037dc5ba8'),
                'title'    => get_sub_field('field_5ae90371c5ba7'),
                'subtitle' => get_sub_field('field_5ae90805459f7'),
                'content'  => get_sub_field('field_5ae90399c5baa'),
                'link'     => get_sub_field('field_5ae903a7c5bab'),
            );
        }
    } else {
        $base = null;
    }
    $content = array(
        'title'   => get_field('field_5ae9031ec5ba3'),
        'content' => get_field('field_5ae9032dc5ba4'),
        'bases'   => $base,
    );
    if (have_rows('field_5ae903f6bd1af')) {
        $item = array();
        while (have_rows('field_5ae903f6bd1af')) {
            the_row();
            $item[] = array(
                'title' => get_sub_field('field_5ae90412bd1b0'),
                'link'  => get_sub_field('field_5ae9041dbd1b1'),
            );
        }
    } else {
        $item = null;
    }

    if ($item != null) {
        $aside = array(
            'title' => get_field('field_5ae903eebd1ae'),
            'item'  => $item,
        );
    } else {
        $aside = null;
    }
    $section = array(
        'content' => $content,
        'sidebar' => $aside,
    );
    return $section;
}
function prepareCommunitySuccess()
{

    $header = array(
        'title'    => get_field('field_5ae9f249b632a'),
        'subtitle' => get_field('field_5ae9f25fb632b'),
        'content'  => get_field('field_5ae9f26ab632c'),
    );
    $steps = array();

    if (have_rows('field_5ae9f27bb632e')) {
        $steps = array();
        while (have_rows('field_5ae9f27bb632e')) {
            the_row();
            if (have_rows('field_5ae9f2beb6331')) {
                $data = array();
                while (have_rows('field_5ae9f2beb6331')) {
                    the_row();
                    $data[] = array(
                        'number' => get_sub_field('field_5ae9f2cbb6332'),
                        'text'   => get_sub_field('field_5ae9f2d1b6333'),
                    );
                }

            }
            $steps[] = array(
                'icon'  => get_sub_field('field_5ae9f28db632f'),
                'color' => get_sub_field('field_5ae9f2a4b6330'),
                'title' => get_sub_field('field_5ae9f4a30a61e'),
                'data'  => $data,
            );
        }
    }
    $storyArray = get_field('field_5ae9f359aa759');
    $stories    = array();
    if (!empty($storyArray)) {
        foreach ($storyArray as $story) {
            $imageId = get_post_thumbnail_id($story);
            $image   = null;
            if (!empty($imageId)) {
                $image = new TimberImage($imageId);
            }
            $stories[] = array(
                'image'       => $image,
                'title'       => get_the_title($story),
                'achievement' => get_field('field_5ae75b28bb14a', $story),
                'description' => get_field('field_5ae75b96bb14c', $story),
                'link'        => get_the_permalink($story),
            );
        }
    }

    $section = array(
        'header'  => $header,
        'steps'   => $steps,
        'stories' => $stories,
    );
    return $section;

}

function prepareNewsFields()
{
    $news = array(
        'publication' => get_field('field_5ae7a0762bfa3'),
    );
    return $news;
}
function prepareSuccessFields()
{

    $success = array(
        'achievement' => get_field('field_5ae75b28bb14a'),
        'description' => get_field('field_5ae75b96bb14c'),
    );

    return $success;
}
function prepareEventFields()
{
    $event = array(
        'subtitle' => get_field('field_5aea26df69625'),
        'date'     => get_field('field_5aea26fa69626'),
    );
    return $event;
}

function preparePreschoolMap()
{
    if (have_rows('field_5afcbd990314c')) {
        $schools = array();
        while (have_rows('field_5afcbd990314c')) {
            the_row();
            $schools[] = array(
                'title'    => get_sub_field('field_5afcbdab0314d'),
                'phone'    => get_sub_field('field_5afcbdc803150'),
                'website'  => get_sub_field('field_5afcbdb00314e'),
                'location' => get_sub_field('field_5afcbdb70314f'),
            );
        }
    } else {
        $schools = null;
    }
    $maps = array(
        'schools' => $schools,
        'center'  => get_field('field_5afdc61422398'),
    );
    return $maps;
}
