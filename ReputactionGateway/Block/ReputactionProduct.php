<?php
/**
 * This file is part of the Reputaction project.
 *
 * @package Reputaction_ReputactionGateway
 * @author    Xavier Titi <xavier.titi@gmail.com>
 * @copyright Copyrifht (c) 2017 Reputaction
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * 
 */

namespace Reputaction\ReputactionGateway\Block;

/*  
 * 
 */

use Magento\ConfigurableProduct\Model\ConfigurableAttributeData;
use Magento\Customer\Helper\Session\CurrentCustomer;
use Magento\Framework\Pricing\PriceCurrencyInterface;

class ReputactionProduct extends \Magento\Catalog\Block\Product\View\AbstractView
{
    
    /**
     * Current customer
     *
     * @var CurrentCustomer
     */
    protected $currentCustomer;

    /**
     * Prices
     *
     * @var array
     */
    protected $_prices = [];

    /**
     * @var \Magento\Framework\Json\EncoderInterface
     */
    protected $jsonEncoder;

    /**
     * @var \Magento\ConfigurableProduct\Helper\Data $imageHelper
     */
    protected $helper;

    /**
     * @var PriceCurrencyInterface
     */
    protected $priceCurrency;

    /**
     * @var ConfigurableAttributeData
     */
    protected $configurableAttributeData;
    
    /** 
     * @var \Magento\ConfigurableProduct\Model\Product\Type\Configurable 
     */
    protected $_simplyProducts;
    protected $_storeManager;
    protected $_helperPrice;
    
    protected $_helperLogin;
 
    /**
     * @param \Magento\Catalog\Block\Product\Context $context
     * @param \Magento\Framework\Stdlib\ArrayUtils $arrayUtils
     * @param \Magento\Framework\Json\EncoderInterface $jsonEncoder
     * @param \Magento\ConfigurableProduct\Helper\Data $helper
     * @param \Magento\Catalog\Helper\Product $catalogProduct
     * @param CurrentCustomer $currentCustomer
     * @param PriceCurrencyInterface $priceCurrency
     * @param ConfigurableAttributeData $configurableAttributeData
     * @param \Magento\ConfigurableProduct\Model\Product\Type\Configurable $conf
     * @param array $data
     */
    public function __construct(
        \Magento\Catalog\Block\Product\Context $context,
        \Magento\Framework\Stdlib\ArrayUtils $arrayUtils,
        \Magento\Framework\Json\EncoderInterface $jsonEncoder,
        \Magento\ConfigurableProduct\Helper\Data $helper,
        \Magento\Catalog\Helper\Product $catalogProduct,
        CurrentCustomer $currentCustomer,
        PriceCurrencyInterface $priceCurrency,
        ConfigurableAttributeData $configurableAttributeData,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Framework\Pricing\Helper\Data $helperPrice,    
        \Europrotection\ForcedLogin\Helper\Data $helperLogin,    
        \Magento\ConfigurableProduct\Model\Product\Type\Configurable $conf,
        array $data = []
    ) {
       $this->_storeManager = $storeManager;
       $this->_helperPrice = $helperPrice;
        $this->priceCurrency = $priceCurrency;
        $this->helper = $helper;
        $this->jsonEncoder = $jsonEncoder;
        $this->catalogProduct = $catalogProduct;
        $this->currentCustomer = $currentCustomer;
        $this->configurableAttributeData = $configurableAttributeData;
        $this->_simplyProducts = $conf;
        $this->_helperLogin = $helperLogin;
        
        parent::__construct(
            $context,
            $arrayUtils,
            $data
        );
    }
    

    /**
     * Retrieve current product model
     *
     * @return \Magento\Catalog\Model\Product
     */
    public function getProduct()
    {
        if (!$this->_coreRegistry->registry('product') && $this->getProductId()) {
            $product = $this->productRepository->getById($this->getProductId());
            $this->_coreRegistry->register('product', $product);
        }
        return $this->_coreRegistry->registry('product');
    }
    
    /*
     * Retrieve current product id
     *
     * @return int
     */
    public function getIdProduct(){
        return $this->_coreRegistry->registry('product')->getId();
    }
    
    
    
    
    
}