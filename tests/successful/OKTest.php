<?php

declare(strict_types=1);

namespace RHo\Http\Response;

class OKTest extends AbstractResponseTester
{
    protected function setUp(): void
    {
        $this->expectedStatusCode = 200;
        $this->className = OK::class;
    }
}
