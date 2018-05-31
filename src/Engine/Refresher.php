<?php
/**
 * Created by PhpStorm.
 * User: mariusz
 * Date: 31.05.18
 * Time: 21:09
 */

namespace App\Engine;


class Refresher
{
    private $URL="https://www.sedoc.pl/images/games/";
    public function refreshAll($from=0, $to=999)
    {
        $downloader = new Downloader;
        $checker = new Checker;
        $copier = new Copier;
        $isCurrent = [];
        $fileNames = [];
        for ($a=$from; $a<=$to; $a++)
        {
            $filename = "$a".".jpg";
            $url = $this->URL.$filename;
            if ($downloader->download($url)) {
                if ($checker->checkIsCurrent($filename))
                {
                    $isCurrent[$a] = true;
                }
                else
                {
                    $isCurrent[$a] = false;
                    $copier->copy($filename);

                }
                $fileNames[$a] = $filename;
            }
        }
        return(array($isCurrent, $fileNames));
    }
}