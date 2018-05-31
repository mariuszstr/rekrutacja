<?php
/**
 * Created by PhpStorm.
 * User: mariusz
 * Date: 31.05.18
 * Time: 21:14
 */

namespace App\Engine;


class Downloader
{
    private $PATH = "tmp/";
    public function download($url)
    {
        $path = parse_url($url, PHP_URL_PATH);
        $filename = $this->PATH.basename($path);

        file_put_contents($filename, fopen($url, 'r'));
        return filesize($filename) != 0;
    }
}