<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PropertiesFixture
 */
class PropertiesFixture extends TestFixture
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
                'user_id' => 1,
                'category_name' => 'Lorem ipsum dolor sit amet',
                'property_title' => 'Lorem ipsum dolor sit amet',
                'property_description' => 'Lorem ipsum dolor sit amet',
                'property_category' => 'Lorem ipsum dolor sit amet',
                'property_tags' => 'Lorem ipsum dolor sit amet',
                'image' => 'Lorem ipsum dolor sit amet',
                'status' => 1,
                'created_date' => '2023-02-02 03:28:57',
                'modify_date' => '2023-02-02 03:28:57',
            ],
        ];
        parent::init();
    }
}
