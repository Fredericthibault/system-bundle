<?php
/**
 * Created by PhpStorm.
 * User: pmdc
 * Date: 16/01/17
 * Time: 2:00 PM
 */

namespace Viweb\SystemBundle\Event;

use Doctrine\ORM\EntityManager;
use Knp\Menu\FactoryInterface;
use Knp\Menu\ItemInterface;
use Symfony\Component\EventDispatcher\Event;

class ConfigureAdminMenuEvent extends Event
{
    const CONFIGURE = 'viweb_system.menu_admin_configure';

    private $factory;

    private $menu;

    private $em;

    public function __construct(FactoryInterface $factory, ItemInterface $menu, EntityManager $em)
    {
        $this->factory = $factory;
        $this->menu = $menu;
        $this->em = $em;
    }

    /**
     * @return \Knp\Menu\FactoryInterface
     */
    public function getFactory()
    {
        return $this->factory;
    }

    /**
     * @return \Knp\Menu\ItemInterface
     */
    public function getMenu()
    {
        return $this->menu;
    }

    /**
     * @return EntityManager
     */
    public function getEm()
    {
        return $this->em;
    }
}