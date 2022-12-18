<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\PagenatorComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Component\PagenatorComponent Test Case
 */
class PagenatorComponentTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Controller\Component\PagenatorComponent
     */
    protected $Pagenator;

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->Pagenator = new PagenatorComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Pagenator);

        parent::tearDown();
    }
}
