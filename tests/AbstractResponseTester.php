<?php

declare(strict_types=1);

namespace RHo\Http\Response;

use PHPUnit\Framework\TestCase;

abstract class AbstractResponseTester extends TestCase
{
    use DataProviderTrait;
    use ResponseBuilderTrait;

    protected int $expectedStatusCode;
    protected string $className;

    public function testHttpResponseWithoutHeadersAndBody(): void
    {
        ob_start();
        $res = new $this->className();
        $res->send();
        $actualBody = ob_get_clean();

        $this->assertSame($this->expectedStatusCode, http_response_code());
        $this->assertSame([], xdebug_get_headers());
        $this->assertSame('', $actualBody);
    }

    /**
     * @dataProvider httpHeaderDataProvider
     */
    public function testHttpResponseWithoutBody(array $headers): void
    {
        ob_start();
        $res = new $this->className($headers);
        $res->send();
        $actualBody = ob_get_clean();

        $this->assertSame($this->expectedStatusCode, http_response_code());
        $this->assertSame($this->expectedHeaders($headers), xdebug_get_headers());
        $this->assertSame('', $actualBody);
    }

    /**
     * @dataProvider httpHeaderAndBodyDataProvider
     */
    public function testHttpResponse(array $headers, string $body): void
    {
        ob_start();
        $res = new $this->className($headers, $body);
        $res->send();
        $actualBody = ob_get_clean();

        $this->assertSame($this->expectedStatusCode, http_response_code());
        $this->assertSame($this->expectedHeaders($headers), xdebug_get_headers());
        $this->assertSame($body, $actualBody);
    }

    private function expectedHeaders(array $headers): array
    {
        $expectedHeaders = [];
        foreach ($headers as $k => $v)
            $expectedHeaders[] = "$k: $v";
        return $expectedHeaders;
    }
}
