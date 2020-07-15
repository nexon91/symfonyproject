<?php

namespace ContainerYmsDYWI;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_NS7Y7AService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.N_s7Y7A' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.N_s7Y7A'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'buildingRepository' => ['privates', 'App\\Repository\\BuildingRepository', 'getBuildingRepositoryService', true],
        ], [
            'buildingRepository' => 'App\\Repository\\BuildingRepository',
        ]);
    }
}
