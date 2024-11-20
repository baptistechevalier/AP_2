<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * MaintenancesFixture
 */
class MaintenancesFixture extends TestFixture
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
                'dates' => '2024-11-18 16:31:51',
                'computer_id' => 1,
            ],
        ];
        parent::init();
    }
}
