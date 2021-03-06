<?php

namespace Ess\M2ePro\Controller\Adminhtml\ControlPanel;

use Ess\M2ePro\Helper\Module;
use Magento\Backend\App\Action;

abstract class Command extends \Ess\M2ePro\Controller\Adminhtml\Base
{
    //########################################

    public function execute()
    {
        if (!($action = $this->getRequest()->getParam('action'))) {
            return $this->_redirect($this->getHelper('View\ControlPanel')->getPageInspectionTabUrl());
        }

        $methodName = $action.'Action';

        if (!method_exists($this, $methodName)) {
            return $this->_redirect($this->getHelper('View\ControlPanel')->getPageInspectionTabUrl());
        }

        $actionResult = $this->$methodName();

        if (is_string($actionResult)) {
            $this->getRawResult()->setContents($actionResult);
            return $this->getRawResult();
        }

        return $actionResult;
    }

    protected function _validateSecretKey()
    {
        return true;
    }

    //########################################

    protected function postDispatch(\Magento\Framework\App\RequestInterface $request) {}

    //########################################

    protected function getStyleHtml()
    {
        return <<<HTML
<style type="text/css">

    table.grid {
        border-color: black;
        border-style: solid;
        border-width: 1px 0 0 1px;
    }
    table.grid th {
        padding: 5px 20px;
        border-color: black;
        border-style: solid;
        border-width: 0 1px 1px 0;
        background-color: silver;
        color: white;
        font-weight: bold;
    }
    table.grid td {
        padding: 3px 10px;
        border-color: black;
        border-style: solid;
        border-width: 0 1px 1px 0;
    }

</style>
HTML;
    }

    //########################################
}