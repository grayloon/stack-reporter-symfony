<?php

namespace Grayloon\StackReporter;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class StackReporterBundle extends Bundle
{
    public function getContainerExtension(): ?\Symfony\Component\DependencyInjection\Extension\ExtensionInterface
    {
        if (null === $this->extension) {
            $this->extension = new DependencyInjection\StackReporterExtension();
        }

        return $this->extension;
    }

    /**
     * Returns the bundle's root path.
     *
     * This helps Symfony locate resources within your bundle.
     * __DIR__ is the 'src' directory, so dirname(__DIR__) is the bundle's root.
     */
    public function getPath(): string
    {
        return \dirname(__DIR__);
    }
}