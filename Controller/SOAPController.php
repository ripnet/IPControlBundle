<?php

namespace ripnet\IPControlBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\DependencyInjection\ContainerInterface;

class SOAPController extends Controller
{
    protected $soapClient;
    protected $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
        $this->soapClient = new \SoapClient(
            $this->getParameter('ipcontrol.url'),
            array(
                'login' => $this->getParameter('ipcontrol.user'),
                'password' => $this->getParameter('ipcontrol.pass'),
            )
        );
        return $this;
    }

    public function getClient()
    {
        return $this->soapClient;
    }
}
