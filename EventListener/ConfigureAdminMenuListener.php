<?php
/**
 * Created by PhpStorm.
 * User: pmdc
 * Date: 16/01/17
 * Time: 2:11 PM
 */

namespace Viweb\SystemBundle\EventListener;


use Doctrine\ORM\EntityManager;
use Knp\Menu\ItemInterface;
use Viweb\SystemBundle\Event\ConfigureAdminMenuEvent;

class ConfigureAdminMenuListener
{
    public function onMenuConfigure(ConfigureAdminMenuEvent $event)
    {
        $menu = $event->getMenu();
        $this->addSections($event->getEm(), $menu);

    }

    private function  addSections(EntityManager $em, ItemInterface $menu) : ItemInterface
    {
        $sections =  $em->getRepository('ViwebSystemBundle:Section')->findAll();
        $section = $menu->getChild('Sections');
        foreach ($sections as $s){
            $section->addChild($s->getName(), ['route' => 'viweb_admin_section_update', 'routeParameters' => [ 'id' => $s->getId() ]]);

        }
        return $menu;
    }
}