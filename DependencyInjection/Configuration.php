<?php

namespace Jaitec\ClickBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('jaitec_click');

        // Here you should define the parameters that are allowed to
        // configure your bundle. See the documentation linked above for
        // more information on that topic.
        $rootNode
            ->children()
                ->arrayNode('routes')
                    ->requiresAtLeastOneElement()->useAttributeAsKey('name')
                        ->prototype('array')
                            ->children()
                                ->scalarNode('route')
                                    ->isRequired(true)
                                ->end()
                                ->scalarNode('entity_type')
                                    ->isRequired(true)
                                ->end()
                                ->scalarNode('entity_id')
                                    ->isRequired(true)
                                ->end()
                                ->scalarNode('entity_name')
                                    ->isRequired(true)
                                ->end()
                                ->scalarNode('msg')
                                ->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
