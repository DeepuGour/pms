<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UsersFixture
 */
class UsersFixture extends TestFixture
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
                'email' => 'Lorem ipsum dolor sit amet',
                'password' => 'Lorem ipsum dolor sit amet',
                'user_type' => 'Lorem ipsum dolor sit amet',
                'status' => 1,
                'image' => 'Lorem ipsum dolor sit amet',
                'created_date' => 1675140593,
                'modified_date' => 1675140593,
            ],
        ];
        parent::init();
    }
}
