<?php

namespace Grayloon\StackReporter\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('grayloon_stack_reporter');

        $treeBuilder->getRootNode()
            ->children()
                ->scalarNode('api_key')
                    ->defaultNull()
                    ->info('API key for accessing stack reporter endpoints')
            ->end()
        ;

        return $treeBuilder;
    }
}