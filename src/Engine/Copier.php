<?php
/**
 * Created by PhpStorm.
 * User: mariusz
 * Date: 31.05.18
 * Time: 22:19
 */

namespace App\Engine;


class Copier
{
    public function copy($filename)
    {
        copy("tmp/$filename", "current_images/$filename");
    }
}