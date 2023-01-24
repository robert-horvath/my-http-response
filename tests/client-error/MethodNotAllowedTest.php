<?php

declare(strict_types=1);

namespace RHo\Http\Response;

class MethodNotAllowedTest extends AbstractResponseTester
{
    protected function setUp(): void
    {
        $this->expectedStatusCode = 405;
        $this->className = MethodNotAllowed::class;
    }
}
