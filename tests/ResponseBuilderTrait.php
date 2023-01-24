<?php

declare(strict_types=1);

namespace RHo\Http\Response;

use PHPUnit\Framework\TestCase;

trait ResponseBuilderTrait
{
    public function testBuildingResponseWithoutHeaderAndBody(): void
    {
        $builder = new ResponseBuilder();
        $x = $this->getStatusCodeEnum($this->className);
        $res = $builder->init($x)->build();

        ob_start();
        $res->send();
        $actualBody = ob_get_clean();

        $this->assertSame($this->expectedStatusCode, http_response_code());
        $this->assertSame([], xdebug_get_headers());
        $this->assertSame('', $actualBody);
    }

    /**
     * @dataProvider httpHeaderDataProvider
     */
    public function testBuildingResponseWithHeader(array $headers): void
    {
        $builder = new ResponseBuilder();
        $x = $this->getStatusCodeEnum($this->className);
        $builder->init($x);
        foreach ($headers as $k => $v)
            $builder->withHeader($k, $v);
        $res = $builder->build();

        ob_start();
        $res->send();
        $actualBody = ob_get_clean();

        $this->assertSame($this->expectedStatusCode, http_response_code());
        $this->assertSame($this->expectedHeaders($headers), xdebug_get_headers());
        $this->assertSame('', $actualBody);
    }

    // Cannot build only with body. In this case Content-Type header must be sent
    // public function testBuildingResponseWithBody(string $body): void;

    /**
     * @dataProvider httpHeaderAndBodyDataProvider
     */
    public function testBuildingResponseWithHeaderAndBody(array $headers, string $body): void
    {
        $builder = new ResponseBuilder();
        $x = $this->getStatusCodeEnum($this->className);
        $builder->init($x)->withBody($body);
        foreach ($headers as $k => $v)
            $builder->withHeader($k, $v);
        $res = $builder->build();

        ob_start();
        $res->send();
        $actualBody = ob_get_clean();

        $this->assertSame($this->expectedStatusCode, http_response_code());
        $this->assertSame($this->expectedHeaders($headers), xdebug_get_headers());
        $this->assertSame($body, $actualBody);
    }

    private function getStatusCodeEnum(string $classFullName): StatusCode
    {
        $x = explode('\\', $classFullName);
        $className = array_pop($x);
        foreach (StatusCode::cases() as $statusCode) {
            if ($className === $statusCode->name) {
                return $statusCode;
            }
        }
        return NULL;
    }
}
