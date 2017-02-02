<?php

namespace Viweb\SystemBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files.
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/configuration.html}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('viweb_system');

        $rootNode
            ->children()
                ->arrayNode('menus')
                    ->prototype('array')
                        ->children()
                            ->arrayNode('sections')
                                ->prototype('array')
                                    ->children()
                                        ->scalarNode('name')->end()
                                        ->scalarNode('priority')
                                            ->defaultValue('-1')
                                        ->end()
                                    ->end()
                                ->end()
                            ->end()
                            ->arrayNode('bundles')
                                ->prototype('array')
                                    ->children()
                                        ->scalarNode('name')->end()
                                        ->scalarNode('bundle')
                                            ->defaultValue('none')
                                        ->end()
                                        ->scalarNode('priority')
                                            ->defaultValue('-1')
                                        ->end()
                                    ->end()
                                ->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end();
        return $treeBuilder;
    }
}
