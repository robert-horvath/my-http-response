<?php

declare(strict_types=1);

namespace RHo\Http\Response;

class UnsupportedMediaTypeTest extends AbstractResponseTester
{
    protected function setUp(): void
    {
        $this->expectedStatusCode = 415;
        $this->className = UnsupportedMediaType::class;
    }
}
