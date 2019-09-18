<?php

use Illuminate\Support\Facades\Auth;

if (!function_exists('slug')){
    function slug(){
        //content
    }
}

if (!function_exists('auth_separation')){
    function auth_separation($user){

        if ($user->hasRole('admin')) {
            $loginto ='/admin';
        } else {
            $loginto ='/index';
        }
        return $loginto;
    }
}