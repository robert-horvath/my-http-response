<?php

declare(strict_types=1);

namespace RHo\Http\Response;

class NotAcceptableTest extends AbstractResponseTester
{
    protected function setUp(): void
    {
        $this->expectedStatusCode = 406;
        $this->className = NotAcceptable::class;
    }
}
