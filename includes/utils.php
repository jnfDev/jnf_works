<?php

function jnf_get_work_img($work_id, $alt = '', $get_url = false) {
    $output = '';
    $img_url = get_the_post_thumbnail_url($work_id);

    if ($img_url === false) {
        $img_url = JNF_WORKS_URL . 'public/images/default.png';
    }

    if ($get_url === true) {
        return $img_url;
    }

    $output .= '<img src="' . $img_url . '" alt="' . $alt . '" />';

    return $output;
}