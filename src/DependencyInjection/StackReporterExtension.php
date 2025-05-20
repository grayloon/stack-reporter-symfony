<?php

namespace Grayloon\StackReporter\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

class StackReporterExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);
        
        // Set the API key as a parameter
        if (isset($config['api_key'])) {
            $container->setParameter('grayloon_stack_reporter.api_key', $config['api_key']);
        }

        $loader = new YamlFileLoader(
            $container,
            new FileLocator(__DIR__ . '/../../Resources/config')
        );
        
        // Load service definitions and routes
        if (file_exists(__DIR__ . '/../../Resources/config/services.yaml')) {
            $loader->load('services.yaml');
        }
    }

    public function getAlias(): string
    {
        return 'grayloon_stack_reporter';
    }

}