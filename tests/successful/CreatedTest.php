<?php

declare(strict_types=1);

namespace RHo\Http\Response;

class CreatedTest extends AbstractResponseTester
{
    protected function setUp(): void
    {
        $this->expectedStatusCode = 201;
        $this->className = Created::class;
    }
}
