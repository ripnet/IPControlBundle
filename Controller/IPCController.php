<?php

namespace ripnet\IPControlBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class IPCController extends Controller
{
    var $soap;
    public function __construct(SOAPController $soap)
    {
        $this->soap = $soap->getClient();
    }
    public function exportChildBlocksByContainer($container)
    {
        $outputHeaders = array();
        $initExportChildBlockReturn = $this->soap->__soapCall(
            'initExportChildBlock',
            array('query' => "Container='".$container."'", 'includeFreeBlocks' => false),
            array(),
            array(),
            $outputHeaders
            );
        $soapHeader = new \SoapHeader('http://xml.apache.org/axis/session', 'sessionID', $outputHeaders['sessionID']);
        return $this->soap->__soapCall('exportChildBlock', array('context' => $initExportChildBlockReturn), array(), $soapHeader);

    }

    public function exportDeviceByIP($ip)
    {
        $outputHeaders = array();
        $initExportDeviceResponse = $this->soap->__soapCall(
            'initExportDevice',
            array('filter' => "IPAddress=".$ip."", 'includeFreeBlocks' => false),
            array(),
            array(),
            $outputHeaders
        );
        $soapHeader = new \SoapHeader('http://xml.apache.org/axis/session', 'sessionID', $outputHeaders['sessionID']);
        return $this->soap->__soapCall('exportDevice', array('context' => $initExportDeviceResponse), array(), $soapHeader);
    }
}
