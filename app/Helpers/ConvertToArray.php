<?php

if (!function_exists('convertToArray')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function convertToArray(&$item , $key)
    {
        $item = (array) $item ;
    }
}
