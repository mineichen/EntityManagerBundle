<?php

namespace mineichen\EntityManagerBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use mineichen\EntityManagerBundle\DependencyInjection\Compiler;

class mineichenEntityManagerBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new Compiler\RepositoryCompilerPass());
    }
}
