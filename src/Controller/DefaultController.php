<?php
/**
 * Created by PhpStorm.
 * User: mariusz
 * Date: 31.05.18
 * Time: 20:49
 */

namespace App\Controller;

use App\Engine\Refresher;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function imagesList(Request $request)
    {
        $refresher = new Refresher;
        $request = Request::createFromGlobals();
        $from = $request->query->get("from");

        $to = $request->query->get("to");

        $result = $refresher->refreshAll($from, $to);
        return $this->render("list.html.twig", array(
            "is_current" => $result[0],
            "file_names" => $result[1]
        ));

    }
    public function index()
    {
        return $this->render("index.html.twig");
    }
}