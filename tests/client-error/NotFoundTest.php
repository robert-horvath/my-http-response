<?php

declare(strict_types=1);

namespace RHo\Http\Response;

class NotFoundTest extends AbstractResponseTester
{
    protected function setUp(): void
    {
        $this->expectedStatusCode = 404;
        $this->className = NotFound::class;
    }
}
