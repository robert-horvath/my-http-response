<?php

declare(strict_types=1);

namespace RHo\Http\Response;

trait DataProviderTrait
{
    public function httpHeaderDataProvider(): array
    {
        return [
            [
                []
            ],
            [
                ['Content-Type' => 'application/prs.api.ela.do+json;version=1']
            ],
            [
                ['Content-Type' => 'text/html;charset=UTF-8']
            ]
        ];
    }


    public function httpHeaderAndBodyDataProvider(): array
    {
        return [
            [
                [],
                ''
            ],
            [
                [
                    'Access-Control-Allow-Headers' => 'Accept',
                    'X-Errno' => '12'
                ],
                ''
            ],
            [
                ['Content-Type' => 'text/plain;charset=UTF-8'],
                'Hello World'
            ]
        ];
    }
}
