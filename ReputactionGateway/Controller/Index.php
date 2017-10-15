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
namespace Reputaction\ReputactionGateway\Controller;

use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Index extends \Magento\Framework\App\Action\Action
{
    /**
     * @var PageFactory
     */
    protected $resultPageFactory;

    /**
     * @param Context $context
     * @param PageFactory $resultPageFactory
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory
    ) {
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }

    /**
     * Index action
     *
     * @return $this
     */
    public function execute()
    {
       
    }
}
