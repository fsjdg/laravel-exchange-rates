<?php

namespace AshAllenDesign\LaravelExchangeRates\Drivers\ExchangeRatesDataApi;

use AshAllenDesign\LaravelExchangeRates\Interfaces\ResponseContract;

class Response implements ResponseContract
{
    public function __construct(private array $rawResponse)
    {
    }

    public function get(string $key): mixed
    {
        return $this->rawResponse[$key] ?? collect($this->rawResponse)->flatten()->get($key);
    }

    public function rates(): array
    {
        return $this->get('rates');
    }

    public function raw(): mixed
    {
        return $this->rawResponse;
    }
}
