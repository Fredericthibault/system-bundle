<?php
namespace Viweb\SystemBundle\Menu;

use Doctrine\ORM\EntityManager;
use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Viweb\SystemBundle\Event\ConfigureAdminMenuEvent;

class Menubuilder
{
    private $factory;

    private $eventDispatcher;

    private $em;

    public function __construct(FactoryInterface $factory, Container $eventDispatcher, EntityManager $em)
    {
        $this->factory = $factory;
        $this->eventDispatcher = $eventDispatcher->get('event_dispatcher');
        $this->em = $em;
    }

    public function createAdminMenu(array $options)
    {
        $menu = $this->factory->createItem('admin');

        $menu->addChild('Sections', ['route' => 'viweb_admin_section_index', 'class' => "submenu active"])
            ->setAttribute('class', 'submenu');

        $this->eventDispatcher->dispatch(
            ConfigureAdminMenuEvent::CONFIGURE,
            new ConfigureAdminMenuEvent($this->factory, $menu, $this->em)
        );

        return $menu;
    }
}