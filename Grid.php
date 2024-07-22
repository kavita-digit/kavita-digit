<?php

namespace Meetanshi\CustomerLog\Block\Adminhtml\Log;

use Magento\Backend\Block\Widget\Grid\Container;

class Grid extends Container
{
    protected function _construct()
    {
        $this->_controller = 'adminhtml_log';
        $this->_blockGroup = 'Meetanshi_CustomerLog';
        $this->_headerText = __('Customer Connections Logs');
        parent::_construct();
        
        $this->setId('customer_connections_logs');
        $this->setDefaultSort('created_at');
        $this->setDefaultDir('DESC');
        $this->setSaveParametersInSession(true);
    }
    protected function _prepareCollection()
    {
        $collection = $this->_collectionFactory->create();
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {
        // Add columns to the grid
        $this->addColumn('id', [
            'header' => __('ID'),
            'index' => 'id',
            'type' => 'number',
        ]);

        $this->addColumn('IP', [
            'header' => __('IP Address'),
            'index' => 'IP',
        ]);

        $this->addColumn('customer_id', [
            'header' => __('Customer ID'),
            'index' => 'customer_id',
        ]);

        $this->addColumn('created_at', [
            'header' => __('Created At'),
            'index' => 'created_at',
            'type' => 'datetime',
        ]);

        return parent::_prepareColumns();
    }
}
