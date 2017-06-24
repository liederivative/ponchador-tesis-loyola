<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class Report extends Base
{
    function __construct() {
        $this->set_methods(array('university'));
    }
}