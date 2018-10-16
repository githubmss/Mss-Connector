<?php
namespace Mss\Connector\Model\ResourceModel\Dashboard;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    private $idFieldName = 'id';
    //@codingStandardsIgnoreStart
    protected function _construct()
    {
        $this->_init(

            'Mss\Connector\Model\Dashboard',
            'Mss\Connector\Model\ResourceModel\Dashboard'
        );
    }//@codingStandardsIgnoreEnd
}
