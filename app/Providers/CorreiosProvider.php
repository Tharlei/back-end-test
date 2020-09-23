<?php

namespace App\Providers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class CorreiosProvider
{
    private static function url($path)
    {
        return env('CORREIOS_URL') . $path;
    }

    public static function calcPreco($data)
    {
        $response = Http::asForm()
            ->post(self::url("/CalcPreco"), $data);

        Log::info($data);
        if ($response->failed())
            return false;

        $xml = simplexml_load_string($response);
        return $xml->Servicos->cServico;
    }
}
