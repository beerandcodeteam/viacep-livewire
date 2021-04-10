<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ViacepService
{
    public function __construct(private string $cep)
    {
    }

    public function getLocation(): mixed
    {
        $response = Http::get("http://viacep.com.br/ws/{$this->cep}/json/");

        return $response->json();
    }
}
