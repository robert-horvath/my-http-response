<?php

declare(strict_types=1);

namespace RHo\Http\Response;

class AcceptedTest extends AbstractResponseTester
{
    protected function setUp(): void
    {
        $this->expectedStatusCode = 202;
        $this->className = Accepted::class;
    }
}
