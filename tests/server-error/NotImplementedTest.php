<?php

declare(strict_types=1);

namespace RHo\Http\Response;

class NotImplementedTest extends AbstractResponseTester
{
    protected function setUp(): void
    {
        $this->expectedStatusCode = 501;
        $this->className = NotImplemented::class;
    }
}
