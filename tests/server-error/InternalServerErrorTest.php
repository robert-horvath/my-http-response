<?php

declare(strict_types=1);

namespace RHo\Http\Response;

class InternalServerErrorTest extends AbstractResponseTester
{
    protected function setUp(): void
    {
        $this->expectedStatusCode = 500;
        $this->className = InternalServerError::class;
    }
}
