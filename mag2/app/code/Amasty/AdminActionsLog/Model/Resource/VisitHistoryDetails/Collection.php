<?php
/**
 * @author Amasty Team
 * @copyright Copyright (c) 2016 Amasty (https://www.amasty.com)
 * @package Amasty_AdminActionsLog
 */


namespace Amasty\AdminActionsLog\Model\Resource\VisitHistoryDetails;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected function _construct()
    {
            $this->_init(
                        'Amasty\AdminActionsLog\Model\VisitHistoryDetails',
            'Amasty\AdminActionsLog\Model\Resource\VisitHistoryDetails'
        );
    }
}
