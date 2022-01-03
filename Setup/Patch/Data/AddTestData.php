<?php

namespace Luvina\TestModule\Setup\Patch\Data;

use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;

class AddTestData implements DataPatchInterface
{

    /**
     * @var ModuleDataSetupInterface
     */
    private $moduleDataSetup;

    public function __construct(
        ModuleDataSetupInterface $moduleDataSetup

    ) {

        $this->moduleDataSetup = $moduleDataSetup;

    }
    /**
     * {@inheritdoc}
     */
    public static function getDependencies()
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public function getAliases()
    {
        return [];
    }

    public function apply()
    {
        $this->moduleDataSetup->startSetup();
        $setup = $this->moduleDataSetup;
        for ($x = 0; $x <= 50; $x++) {
            $data[] = [
                'id' => $x,
                'name' => 'Gift Name ' . $x,
                'customer' => 'Customer Name ' .$x,
                'email' => 'customer' .$x . '@example.com',
                'price' => 10*$x,
            ];
        }


        $this->moduleDataSetup->getConnection()->insertArray(
            $this->moduleDataSetup->getTable('gifts'),
            ['id', 'name', 'customer', 'email', 'price'],
            $data
        );
        $this->moduleDataSetup->endSetup();
    }
}
