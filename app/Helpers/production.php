<?php

use Carbon\Carbon;
use Illuminate\Routing\Route;

function httpToHttps($url)
{
    if (app()->environment() == 'production') {
        return str_replace('http://', 'https://', $url);
    }
    return $url;
}