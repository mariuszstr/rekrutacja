<?php
/**
 * Created by PhpStorm.
 * User: mariusz
 * Date: 31.05.18
 * Time: 21:51
 */

namespace App\Engine;


class Checker
{
    public function checkIsCurrent($filename)
    {
        $filename1 = "tmp/$filename";
        $filename2 = "current_images/$filename";
        if (!file_exists($filename1) || !file_exists($filename2))
        {
            return False;
        }
        return filesize($filename1) == filesize($filename2);
    }
}