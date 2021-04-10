<?php

namespace Tests\Feature;

use App\Services\ViacepService;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class ViacepServiceTest extends TestCase
{
    public function test_if_viacep_api_is_working()
    {
        $cep = "14020-055";

        $response = Http::get("http://viacep.com.br/ws/{$cep}/json/");

        $this->assertSame(200, $response->status());
    }

    public function test_if_response_is_an_array()
    {
        $cep = "14020-055";

        $response = Http::get("http://viacep.com.br/ws/{$cep}/json/");

        $this->assertTrue(Arr::accessible($response->json()));
    }

    public function test_if_viacep_service_is_working()
    {
        $cep = "14020-055";

        $service = new ViacepService($cep);
        $location = $service->getLocation();

        $this->assertSame($cep, $location['cep']);
    }
}
