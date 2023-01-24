<?php

declare(strict_types=1);

namespace RHo\Http\Response;

class BadRequestTest extends AbstractResponseTester
{
    protected function setUp(): void
    {
        $this->expectedStatusCode = 400;
        $this->className = BadRequest::class;
    }
}
