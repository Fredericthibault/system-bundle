<?php

namespace Viweb\SystemBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction(Request $request, string $req)
    {
        $repo = $this->get('viweb.repository.section');
        if(strlen($req) == 0){
            $section = $repo->find(1);
        } else {
            $section = $repo->findOneByFullSlug($req, 'en');
        }

        if(!$section){
           throw $this->createNotFoundException('The page does not exist');
        }
        return $this->render('ViwebSystemBundle:Default:index.html.twig', [
            'section' => $section,
        ]);
    }
}
