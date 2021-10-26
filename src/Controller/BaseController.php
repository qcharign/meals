<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class BaseController extends AbstractController
{
    /**
     * @return mixed
     */
    protected function getRefererParams(Request $request) {
        dump($request);
        $referer = $request->headers->get('referer');
        $baseUrl = $request->getBaseUrl();
        $lastPath = substr($referer, strpos($referer, $baseUrl) + strlen($baseUrl));
        dump($referer);
        dump($baseUrl);
        dump($lastPath);
        return $this->get('router')->getMatcher()->match($lastPath);
    }
}
