<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ComputersFixture
 */
class ComputersFixture extends TestFixture
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
                'processeur' => 'Lorem ipsum dolor sit amet',
                'os' => 'Lorem ipsum dolor sit amet',
                'ram' => 'Lorem ipsum dolor ',
                'gpu' => 'Lorem ipsum dolor sit amet',
                'stockage' => 'Lorem ipsum dolor ',
                'alim' => 'Lorem ipsum dolor sit amet',
                'disponiblie' => 1,
            ],
        ];
        parent::init();
    }
}
