<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(LoggerInterface $logger)
    {
        $logger->info('Oyez Oyez');

        return $this->render('index/index.html.twig', [
            'controller_name' => 'IndexController',
        ]);
    }

    /**
     * @Route("/fatal", name="fatal")
     */
    public function fatal(LoggerInterface $logger)
    {
        $unknown = 'unknown';

        new $unknown();
    }
}
