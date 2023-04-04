<?php

namespace ContainerPQpNx6f;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_FUFZG2CService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.fUFZG2C' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.fUFZG2C'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'repository' => ['privates', 'App\\Repository\\MainEntityRepository', 'getMainEntityRepositoryService', true],
        ], [
            'repository' => 'App\\Repository\\MainEntityRepository',
        ]);
    }
}