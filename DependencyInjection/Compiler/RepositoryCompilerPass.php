<?php

namespace mineichen\EntityManagerBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\Reference;

class RepositoryCompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        if (false === $container->hasDefinition('mineichen_EntityManager_Manager')) {
            return;
        }

        $definition = $container->getDefinition('mineichen_EntityManager_Manager');

        foreach ($container->findTaggedServiceIds('mineichen_EntityManager_repository') as $id => $attributes) {
            $definition->addMethodCall('addRepository', array(new Reference($id)));
        }

    }
}
