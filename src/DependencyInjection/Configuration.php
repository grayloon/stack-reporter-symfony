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
                // Add any configuration options for your bundle here
                // For example:
                // ->scalarNode('api_key')->defaultNull()->end()
            ->end()
        ;

        return $treeBuilder;
    }
}