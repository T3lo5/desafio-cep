<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;
use App\Models\Address;

class AddressController extends Controller
{

    public function store(Request $request)
    {
        $data = $request->validate([
            'cep' => 'required',
            'numero_casa' => 'nullable',
            'complemento' => 'nullable',
        ]);

        // Verifica se já existe um endereço com o mesmo CEP e número de casa
        $existingAddress = null;
        if ($data['numero_casa'] !== null) {
            $existingAddress = Address::where('cep', $data['cep'])
                ->where('numero_casa', $data['numero_casa'])
                ->first();
        }

        if ($existingAddress) {
            // Se já existir um endereço com o mesmo CEP e número de casa, retorna a mensagem
            return response()->json(['message' => 'Endereço já cadastrado'], Response::HTTP_CONFLICT);
        }

        // Se não existir um endereço com o mesmo CEP e número de casa, cria um novo
        $response = Http::get("https://viacep.com.br/ws/{$data['cep']}/json/");

        if ($response->ok()) {
            $cepData = $response->json();
            $data['logradouro'] = $cepData['logradouro'];
            $data['bairro'] = $cepData['bairro'];
            $data['localidade'] = $cepData['localidade'];
            $data['uf'] = $cepData['uf'];

            $address = Address::create($data);
            return response()->json($address, Response::HTTP_CREATED);
        }
    }



    public function index()
    {
        $perPage = 10; // Número máximo de endereços por página (por exemplo, 10)
        $addresses = Address::paginate($perPage);

        return response()->json($addresses);
    }

    public function show($id)
    {
        $address = Address::findOrFail($id);

        return response()->json($address);
    }

    public function update(Request $request, $id)
    {
        $address = Address::findOrFail($id);

        $data = $request->validate([
            'cep' => 'required',
            'logradouro' => 'required',
            'bairro' => 'required',
            'localidade' => 'required',
            'uf' => 'required',
            'complemento' => 'nullable',
        ]);

        if ($request->has('numero_casa')) {
            $data['numero_casa'] = $request->input('numero_casa');
        }

        $address->update($data);

        return response()->json($address);
    }

    public function destroy($id)
    {
        $address = Address::findOrFail($id);
        $address->delete();

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
