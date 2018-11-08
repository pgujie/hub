<?php
/**
 * Created by PhpStorm.
 * User: pgurajena
 * Date: 10/20/2018
 * Time: 9:34 PM
 */

namespace App\core;


interface HasPath
{
    public function getPathAttribute() : string ;
}