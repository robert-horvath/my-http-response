<?php

declare(strict_types=1);

namespace RHo\Http\Response;

class ServiceUnavailableTest extends AbstractResponseTester
{
    protected function setUp(): void
    {
        $this->expectedStatusCode = 503;
        $this->className = ServiceUnavailable::class;
    }
}
