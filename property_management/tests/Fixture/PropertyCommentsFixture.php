<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PropertyCommentsFixture
 */
class PropertyCommentsFixture extends TestFixture
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
                'property_id' => 1,
                'user_id' => 1,
                'comments' => 'Lorem ipsum dolor sit amet',
                'create_date' => '2023-02-01 12:22:34',
                'modifie_date' => '2023-02-01 12:22:34',
            ],
        ];
        parent::init();
    }
}
