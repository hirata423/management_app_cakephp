<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TimesFixture
 */
class TimesFixture extends TestFixture
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
                'category' => 'Lorem ipsum dolor sit amet',
                'start_time' => '2022-09-15 01:00:08',
                'finish_time' => '2022-09-15 01:00:08',
                'user_id' => 1,
                'created_at' => 1663203608,
                'updated_at' => 1663203608,
            ],
        ];
        parent::init();
    }
}
