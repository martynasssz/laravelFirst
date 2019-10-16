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

if(!function_exists('truncateWords')){
   function truncateWords($input, $numwords, $padding="")
  {
      $output = strtok($input, " \n");
      while(--$numwords > 0) $output .= " " . strtok(" \n");
      if($output != $input) $output .= $padding;
      return $output;
  }
}