<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PurchasesFixture
 */
class PurchasesFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'user_id' => '970ad424-8fdc-4d5b-9fc1-6378d0c85cc1',
                'package_id' => 1,
                'purchase_date' => '2024-11-18 16:32:13',
                'expiration_date' => '2024-11-18 16:32:13',
                'status' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
