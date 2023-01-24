[![Latest Stable Version](https://img.shields.io/packagist/v/robert/my-http-response.svg?style=flat-square)](https://packagist.org/packages/robert/my-http-response)
[![Minimum PHP Version](https://img.shields.io/badge/php-%3E%3D%208.1-8892BF.svg?style=flat-square)](https://php.net/)
[![CI](https://github.com/robert-horvath/my-http-response/actions/workflows/php.yml/badge.svg?branch=main)](https://github.com/robert-horvath/my-http-response/actions/workflows/php.yml)
[![Code Coverage](https://codecov.io/github/robert-horvath/my-http-response/branch/main/graph/badge.svg?token=xvR1sOEmGx)](https://codecov.io/github/robert-horvath/my-http-response)

# My HTTP Response
The My HTTP response module is an example implementation for [HTTP response](https://github.com/robert-horvath/http-response) message library.

## Example usage

### Send HTTP bad request error mesage
```php
namespace RHo\Http\Response;

class App
{
    public function __construct(private readonly ResponseBuilderInterface $builder) {}

    public function run(): void {
        $this->builder
            ->init(StatusCode::BadRequest)
            ->withHeader('Content-Type', 'application/prs.api.ela.do+json;version=1')
            ->withBody('{ "apple": "tree" }')
            ->build()
            ->send();
    }
}
```

The above code will send the following HTTP response message
```
HTTP/1.1 400 Bad Request
Content-Type: application/prs.api.ela.do+json;version=1
Content-Length: 19

{ "apple": "tree" }
```