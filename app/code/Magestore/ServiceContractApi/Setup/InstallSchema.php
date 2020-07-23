<?php


namespace Magestore\ServiceContractApi\Setup;


use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements \Magento\Framework\Setup\InstallSchemaInterface
{

    /**
     * @inheritDoc
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        /**
         * Create table 'student'
         */
        $setup->startSetup();
        $tableName = $setup->getTable('magestore_service_contractApi');
        $table = $setup->getConnection()
            ->newTable($tableName);

        $table->addColumn(
            'id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
            'Student ID'
        )
            ->addColumn(
                'name',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => false, 'default' => ''],
                'Name Student'
            )->addColumn(
                'classStudent',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => false, 'default' => ''],
                'Class Student'
            )->addColumn(
                'university',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => false, 'default' => ''],
                'University Student'
            )->setComment("Student table");
        $setup->getConnection()->createTable($table);
        $setup->endSetup();
    }
}
