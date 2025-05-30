<?php

namespace ContainerIDZk8ET;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getMakeCrudControllerCommandService extends App_KernelDevDebugContainer
{
    /**
     * Gets the public 'EasyCorp\Bundle\EasyAdminBundle\Command\MakeCrudControllerCommand' shared service.
     *
     * @return \EasyCorp\Bundle\EasyAdminBundle\Command\MakeCrudControllerCommand
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/console/Command/Command.php';
        include_once \dirname(__DIR__, 4).'/vendor/easycorp/easyadmin-bundle/src/Command/MakeCrudControllerCommand.php';
        include_once \dirname(__DIR__, 4).'/vendor/easycorp/easyadmin-bundle/src/Maker/ClassMaker.php';

        $container->services['EasyCorp\\Bundle\\EasyAdminBundle\\Command\\MakeCrudControllerCommand'] = $instance = new \EasyCorp\Bundle\EasyAdminBundle\Command\MakeCrudControllerCommand(\dirname(__DIR__, 4), ($container->privates['EasyCorp\\Bundle\\EasyAdminBundle\\Maker\\ClassMaker'] ??= new \EasyCorp\Bundle\EasyAdminBundle\Maker\ClassMaker(($container->services['kernel'] ?? $container->get('kernel', 1)), \dirname(__DIR__, 4))), ($container->services['doctrine'] ?? self::getDoctrineService($container)));

        $instance->setName('make:admin:crud');
        $instance->setDescription('Creates a new EasyAdmin CRUD controller class');

        return $instance;
    }
}
