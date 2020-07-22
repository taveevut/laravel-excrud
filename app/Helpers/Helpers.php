<?php
if (!function_exists('breadcrumb')) {
    function breadcrumb($data = [], $dir = 'ltr')
    {
        $result = '';
        $count = count($data);
        if ($count > 0):
            $i = 1;
            $active = '';
            $result .= '<ol dir="' . $dir . '" class="app-breadcrumb breadcrumb">';
            foreach ($data as $key => $val):
                if ($i == $count) {
                    $result .= '<li class="breadcrumb-item active">' . $val['label'] . '</li>';
                } else {
                    $result .= '<li class="breadcrumb-item"><a href="' . $val['link'] . '">' . $val['label'] . '</a></li>';
                }
                ++$i;
            endforeach;
            $result .= '</ol>';
        endif;

        return $result;
    }
}

if (!function_exists('site_string_url')) {
    function site_string_url($string = '')
    {
        $string = preg_replace("`\[.*\]`U", "", $string);
        $string = preg_replace('`&(amp;)?#?[a-z0-9]+;`i', '-', $string);
        $string = str_replace('%', '-percent', $string);
        $string = htmlentities($string, ENT_COMPAT, 'utf-8');
        $string = preg_replace("`&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig|quot|rsquo);`i", "\\1", $string);
        $string = preg_replace(["`[^a-z0-9ก-๙เ-า]`i", "`[-]+`"], "-", $string);
        $response = strtolower(trim($string, '-'));

        return $response;
    }
}