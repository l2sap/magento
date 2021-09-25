<?php

namespace ModelCompany\SomeCompany\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;

class ShippingMethods implements ArgumentInterface
{
    protected $scopeConfig;

    protected $shipconfig;
    
    public function __construct(
    \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
    \Magento\Shipping\Model\Config $shipconfig
    ) {
        $this->shipconfig=$shipconfig;
        $this->scopeConfig = $scopeConfig;
    }
    
    public function getShippingMethods(){
    
            $activeCarriers = $this->shipconfig->getActiveCarriers();
            $storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORE;
                foreach($activeCarriers as $carrierCode => $carrierModel)
                {
                   $options = array();
                   if( $carrierMethods = $carrierModel->getAllowedMethods() )
                   {
                       foreach ($carrierMethods as $methodCode => $method)
                       {
                            $code= $carrierCode.'_'.$methodCode;
                            $options[]=array('value'=>$code,'label'=>$method);
    
                       }
                       $carrierTitle =$this->scopeConfig->getValue('carriers/'.$carrierCode.'/title');
    
                   }
                    $methods[]=array('value'=>$options,'label'=>$carrierTitle);
                }
            return $methods;        
    
        }
}
