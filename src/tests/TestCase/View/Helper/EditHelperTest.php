<?php
declare(strict_types=1);

namespace App\Test\TestCase\View\Helper;

use App\View\Helper\EditHelper;
use Cake\TestSuite\TestCase;
use Cake\View\View;

/**
 * App\View\Helper\EditHelper Test Case
 */
class EditHelperTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\View\Helper\EditHelper
     */
    protected $Edit;

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $view = new View();
        $this->Edit = new EditHelper($view);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Edit);

        parent::tearDown();
    }
}
