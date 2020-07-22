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