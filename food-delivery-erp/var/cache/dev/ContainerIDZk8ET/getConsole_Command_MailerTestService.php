<?php

namespace ContainerIDZk8ET;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getConsole_Command_MailerTestService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'console.command.mailer_test' shared service.
     *
     * @return \Symfony\Component\Mailer\Command\MailerTestCommand
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/console/Command/Command.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/mailer/Command/MailerTestCommand.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/mailer/Transport/TransportInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/mailer/Transport/Transports.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/mailer/Transport.php';

        $container->privates['console.command.mailer_test'] = $instance = new \Symfony\Component\Mailer\Command\MailerTestCommand((new \Symfony\Component\Mailer\Transport(new RewindableGenerator(function () use ($container) {
            yield 0 => $container->load('getMailer_TransportFactory_NullService');
            yield 1 => $container->load('getMailer_TransportFactory_SendmailService');
            yield 2 => $container->load('getMailer_TransportFactory_NativeService');
            yield 3 => $container->load('getMailer_TransportFactory_SmtpService');
        }, 4)))->fromStrings(['main' => $container->getEnv('MAILER_DSN')]));

        $instance->setName('mailer:test');
        $instance->setDescription('Test Mailer transports by sending an email');

        return $instance;
    }
}
