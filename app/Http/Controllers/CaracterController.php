<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use App\Exports\PersonajesExport;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class CaracterController extends Controller


{
    

    public function getCaracter(){
        $client = new Client();

        $response = $client->request('GET', 'https://rickandmortyapi.com/api/character', ['verify' => false]    );

        $data = json_decode($response->getBody());

        return view('caracter', ['characteres' => $data->results]);
        
    }
    
    public function getCaracterById($id){
        if(!is_numeric($id)) {
            return "El parámetro debe ser un número";
        }
        $client = new Client();

        try {
            $response = $client->request('GET', 'https://rickandmortyapi.com/api/character/' . $id, ['verify' => false]);
            $data = json_decode($response->getBody());
            return view('detail', ['data' => $data]);
        }catch (RequestException $e) {
            return "El personaje con ID " . $id . " no fue encontrado.";
        }
    }

    public function downloadExcel(Request $request){
        $response = $request->data;
        $personajes = unserialize($response);
        
        // Crear una instancia de la clase PersonajesExport
        $export = new PersonajesExport($personajes);
       // Generar el archivo Excel
        
        $excel = \Maatwebsite\Excel\Facades\Excel::raw($export, \Maatwebsite\Excel\Excel::XLSX);
        // Guardar el archivo Excel en el almacenamiento de Laravel
        $archivo = 'public/excel/personajes.xlsx';
        Storage::put($archivo, $excel);

        // Descargar el archivo Excel
        return Storage::download($archivo);
    }

    public function filterCharacters(Request $request){
        
        $client = new Client();
        $name = $request->input('name');
        $status = $request->input('status');
        $species = $request->input('species');
        $url = 'https://rickandmortyapi.com/api/character/?';
        if ($name) {
            $url .= 'name=' . urlencode($name) . '&';
        }
        if ($status) {
            $url .= 'status=' . urlencode($status) . '&';
        }
        if ($species) {
            $url .= 'species=' . urlencode($species) . '&';
        }
        $response = $client->request('GET', $url, ['verify' => false]);
        $data = json_decode($response->getBody());
        
        if (count($data->results) == 0) {
            return view('caracter', ['error' => 'No se encontraron episodios con los filtros proporcionados.']);
        }
        return view('caracter', ['characteres' => $data->results]);
    }
}
