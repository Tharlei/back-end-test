<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Providers\CorreiosProvider;

class ProductShippingController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $product = Product::find($id);

        $body = [
            "nCdEmpresa" => "",
            "sDsSenha" => "",
            "nCdServico" => $request->service,
            "sCepOrigem" => $request->zipCodeSource,
            "sCepDestino" => $request->zipCodeDestiny,
            "nVlPeso" => $product->weight,
            "nCdFormato" => $request->format,
            "nVlComprimento" => $product->length,
            "nVlAltura" => $request->format == '3' ? "0" : $product->height,
            "nVlLargura" => $product->width,
            "nVlDiametro" => round(sqrt(($product->length * $product->length) + ($product->width * $product->width))),
            "sCdMaoPropria" => $request->serviceHands,
            "nVlValorDeclarado" => $product->price,
            "sCdAvisoRecebimento" => $request->serviceAlert,
        ];

        $prices = CorreiosProvider::calcPreco($body);

        if (empty($prices))
            return response()->json([
                'message' => 'Error in calculate shipping',
            ], 400);

        if (!empty($prices->Erro))
            $prices->error = str_replace('(-1)', '', explode(':', $prices->MsgErro)[1]);

        return response()->json($prices, 200);
    }
}
