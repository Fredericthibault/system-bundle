<?php
/**
 * Created by PhpStorm.
 * User: pmdc
 * Date: 25/01/17
 * Time: 11:49 AM
 */

namespace Viweb\SystemBundle\Controller;

use Sylius\Bundle\ResourceBundle\Form\Type\ResourceTranslationsType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Viweb\SystemBundle\Repository\SectionRepository;

class FrontendUtilsController extends Controller
{
    public function buildMenuAction(Request $request)
    {
        /**
         * @var SectionRepository $repo
         */
        $repo = $this->get('viweb.repository.section');
        $sections = $repo->findForMenuBuilder();
        $url = $request->getUri();
        $this->render('ViwebSystemBundle:Frontend:_menu.html.twig', [
           'sections' => $sections
        ]);

    }

}