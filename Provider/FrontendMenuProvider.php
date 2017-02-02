<?php
/**
 * Created by PhpStorm.
 * User: pmdc
 * Date: 26/01/17
 * Time: 2:40 PM
 * Music: Kabuki quantum fighter lvl3
 */

namespace Viweb\SystemBundle\Provider;


use Knp\Menu\FactoryInterface;
use Knp\Menu\Provider\MenuProviderInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;
use Symfony\Component\EventDispatcher\ContainerAwareEventDispatcher;
use Viweb\SystemBundle\Event\ConfigureFrontendMenuEvent;

class FrontendMenuProvider implements MenuProviderInterface, ContainerAwareInterface
{
    use ContainerAwareTrait;

    protected $factory;

    protected $config;

    /**
     * @var ContainerAwareEventDispatcher
     */
    protected $dispatcher;

    public function __construct(FactoryInterface $factory = null, $container = null)
    {
        $this->container = $container;
        $this->factory = $factory;
        $this->dispatcher = $container->get('event_dispatcher');
    }

    public function get($name, array $options = [])
    {

            $config = $this->buildConfig();
            $builder = $config[$name];

            $menu = $this->factory->createItem($name);
            foreach ($builder as $i => $v){
                    $menu->addChild($i, ['route' => $v['route'], 'routeParameters' => ['req' => $v['route_params']]]);
            }

            return $menu;

    }

    public function has($name, array $options = [])
    {
        $config = $this->buildConfig();

        return array_key_exists($name, $config);
    }

    private function buildConfig()
    {
        if($this->config){
            return $this->config;
        }
        $c = $this->container->getParameter('viweb_system.menus');
        $repo = $this->container->get('viweb.repository.section');
        $w = [];
        foreach ($c as $name => $config)
        {
                $w[$name] = [];
                $r = [];
                if($config['sections']){
                    foreach ($config['sections'] as $section => $sectionData) {
                        $r[$section] = [
                            'route' => 'viweb_system_catchall',
                            'route_params' => $repo->findSlug($sectionData['name']) ?? '',
                            'order' => $sectionData['priority']
                        ];
                    }

                    if($config['bundles']) {
                        $this->dispatcher->dispatch(ConfigureFrontendMenuEvent::CONFIGURE, new ConfigureFrontendMenuEvent($this->factory, $this->container->get('doctrine.orm.entity_manager')));
                        foreach ($config['bundles'] as $section => $sectionData) {
                            $r[$section] = [
                                'route' => 'viweb_system_catchall',
                                'route_params' => $sectionData['name'],
                                'order' => $sectionData['priority']
                            ];
                        }
                    }

                    uasort($r, function($a, $b){
                        return (int) $a['order'] < (int) $b['order'] ? -1 : 1;
                    });
                    $w[$name] = $r;
                }
                if ($config['bundles']) {

                }
        }

        $this->config = $w;
        return $w;
    }


}