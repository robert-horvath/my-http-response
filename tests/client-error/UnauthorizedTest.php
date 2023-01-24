<?php

declare(strict_types=1);

namespace RHo\Http\Response;

class UnauthorizedTest extends AbstractResponseTester
{
    protected function setUp(): void
    {
        $this->expectedStatusCode = 401;
        $this->className = Unauthorized::class;
    }
}
