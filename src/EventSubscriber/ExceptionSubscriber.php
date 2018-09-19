<?php

namespace App\EventSubscriber;

use Google\Cloud\ErrorReporting\Bootstrap;
use Google\Cloud\Logging\PsrLogger;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;

class ExceptionSubscriber implements EventSubscriberInterface
{
    private $logger;

    public function __contruct(PsrLogger $logger)
    {
        $this->logger = $logger;
    }

    public function onKernelException(GetResponseForExceptionEvent $event)
    {
        $e = $event->getException();
        Bootstrap::init($this->logger);
        Bootstrap::exceptionHandler($e);
    }

    public static function getSubscribedEvents()
    {
        return [
           'kernel.exception' => 'onKernelException',
        ];
    }
}
