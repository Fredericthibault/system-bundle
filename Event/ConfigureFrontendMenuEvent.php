<?php
/**
 * Created by PhpStorm.
 * User: pmdc
 * Date: 02/02/17
 * Time: 10:34 AM
 */

namespace Viweb\SystemBundle\Event;


use Doctrine\ORM\EntityManager;
use Knp\Menu\FactoryInterface;
use Knp\Menu\ItemInterface;
use Symfony\Component\EventDispatcher\Event;

class ConfigureFrontendMenuEvent extends Event
{
    const CONFIGURE = 'viweb_system.menu_frontend_configure';

    private $factory;

    private $em;

    private $bundles;

    public function __construct(FactoryInterface $factory,  EntityManager $em)
    {
        $this->factory = $factory;;
        $this->em = $em;
        $this->bundles = [];
    }

    /**
     * @return array
     */
    public function getBundles(): array
    {
        return $this->bundles;
    }

    /**
     * @param FactoryInterface $factory
     * @return ConfigureFrontendMenuEvent
     */
    public function setFactory(FactoryInterface $factory): ConfigureFrontendMenuEvent
    {
        $this->factory = $factory;
        return $this;
    }

    /**
     * @param ItemInterface $menu
     * @return ConfigureFrontendMenuEvent
     */
    public function setMenu(ItemInterface $menu): ConfigureFrontendMenuEvent
    {
        $this->menu = $menu;
        return $this;
    }

    /**
     * @param EntityManager $em
     * @return ConfigureFrontendMenuEvent
     */
    public function setEm(EntityManager $em): ConfigureFrontendMenuEvent
    {
        $this->em = $em;
        return $this;
    }

    /**
     * @param array $bundles
     * @return ConfigureFrontendMenuEvent
     */
    public function setBundles(array $bundles): ConfigureFrontendMenuEvent
    {
        $this->bundles = $bundles;
        return $this;
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