<?php

namespace App\Tests\Integrational\Service;

use App\Service\NoteService;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class NoteServiceTest extends KernelTestCase
{
    private $noteService;

    protected function setUp(): void
    {
        self::bootKernel();

        $container = static::getContainer();

        $this->noteService = $container->get(NoteService::class);
        parent::setUp();
    }

    public function testAddNote()
    {
        $this->noteService->add(123, "Заплатить Налоги #финансы #бюджет");
    }
}
