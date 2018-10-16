<?php
namespace Mss\Connector\Setup;

//@codingStandardsIgnoreStart
class InstallSchema implements \Magento\Framework\Setup\InstallSchemaInterface
{
    public function install(\Magento\Framework\Setup\SchemaSetupInterface $setup, \Magento\Framework\Setup\ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();
        $connection = $installer->getConnection();
        $installer->getConnection()->addColumn(
            $installer->getTable('sales_order'),
                    'mms_order_type',
                    [
                        'type'    => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                        'length'  => 0,
                        'comment' => 'Order Type',
                    ]
                );
       $installer->getConnection()->addColumn(
            $installer->getTable('sales_order_grid'),
                    'mms_order_type',
                    [
                        'type'    => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                        'length'  => 0,
                        'comment' => 'Order Type',
                    ]
                );
        if (!$installer->tableExists('mss_dashboard')) {
            $table = $installer->getConnection()->newTable(
                $installer->getTable('mss_dashboard')
            )
                ->addColumn(
                    'id',
                    \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                    null,
                    [
                        'identity' => true,
                        'nullable' => false,
                        'primary'  => true,
                    ],
                    'ID'
                )
                ->addColumn(
                    'status',
                    \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                    1,
                    [],
                    'Status'
                )
                ->addColumn(
                    'tile_tittle',
                    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    255,
                    ['nullable => false'],
                    'Name'
                )
                ->addColumn(
                    'tile_type',
                    \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                    1,
                    [],
                    'Type'
                )
                ->addColumn(
                    'banner_name',
                    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    '255',
                    [],
                    'Banner Tittle'
                )
                ->addColumn(
                    'banner_image',
                    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    '255',
                    [],
                    'Banner Image'
                )->addColumn(
                    'category_id',
                    \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                    1,
                    [],
                    'Link To category ID'
                )
                ->addColumn(
                    'banner_type',
                    \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                    1,
                    [],
                    'Banner Display Type'
                )
                ->addColumn(
                    'category_display',
                    \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                    1,
                    [],
                    'Category Display Type'
                )
                ->addColumn(
                    'category_display_id',
                    \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                    1,
                    [],
                    'Category Display'
                )
                ->addColumn(
                    'promotion_display',
                    \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                    1,
                    [],
                    'Promotion Display Type'
                )
                ->addColumn(
                    'promotion_display_id',
                    \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                    1,
                    [],
                    'Promotion Display'
                )
                ->addColumn(
                    'display_start_date',
                    \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
                    null,
                    ['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT],
                    'Display Start Date'
                )->addColumn(
                    'display_end_date',
                    \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
                    null,
                    ['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT],'Display End Date')
                ->addColumn(
                    'created_at',
                    \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
                    null,
                    ['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT],
                    'Created At'
                )
                ->addColumn(
                    'position',
                    \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                    1,
                    [],
                    'Position'
                )
                ->setComment('Dashboard Table');
            $installer->getConnection()->createTable($table);

            $installer->getConnection()->addIndex(
                $installer->getTable('mss_dashboard'),
                $setup->getIdxName(
                    $installer->getTable('mss_dashboard'),
                    ['id', 'status', 'tile_tittle', 'tile_type', 'banner_name', 'category_id', 'banner_image', 'banner_type', 'category_display', 'category_display_id', 'promotion_display', 'promotion_display_id', 'display_start_date', 'display_end_date', 'created_at',  'position'],
                    \Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
                ),
                ['id', 'status', 'tile_tittle', 'tile_type', 'banner_name', 'category_id', 'banner_image', 'banner_type', 'category_display', 'category_display_id', 'promotion_display', 'promotion_display_id', 'display_start_date', 'display_end_date', 'created_at',  'position'],
                \Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
            );

            if ($connection->tableColumnExists('sales_order', 'mms_order_type') === false) {
            $connection
                ->addColumn(
                    $setup->getTable('sales_order'),
                    'mms_order_type',
                    [
                        'type'    => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                        'length'  => 0,
                        'comment' => 'Order Type',
                    ]
                );
        }

        if ($connection->tableColumnExists('sales_order_grid', 'mms_order_type') === false) {
            $connection
                ->addColumn(
                    $setup->getTable('sales_order_grid'),
                    'mms_order_type',
                    [
                        'type'    => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                        'length'  => 0,
                        'comment' => 'Order Type',
                    ]
                );
        }



        }
        $installer->endSetup();
    }//@codingStandardsIgnoreEnd
}
