<?php

declare(strict_types=1);

namespace RHo\Http\Response;

class ForbiddenTest extends AbstractResponseTester
{
    protected function setUp(): void
    {
        $this->expectedStatusCode = 403;
        $this->className = Forbidden::class;
    }
}
