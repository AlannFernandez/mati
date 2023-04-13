<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index()
    {
        $client = new Client();
        $response = $client->request('GET', 'https://rickandmortyapi.com/api/location/', ['verify' => false]);
        $data = json_decode($response->getBody());

        return view('locations.index', ['locations' => $data->results]);
    }

    public function show($id)
    {
        $client = new Client();
        $response = $client->request('GET', 'https://rickandmortyapi.com/api/location/' . $id, ['verify' => false]);
        $data = json_decode($response->getBody());

        return view('locations.show', ['location' => $data]);
    }

    public function search(Request $request)
    {
        $client = new Client();
        $name = $request->input('name');
        $type = $request->input('type');
        $dimension = $request->input('dimension');
        $url = 'https://rickandmortyapi.com/api/location/?';
        if ($name) {
            $url .= 'name=' . urlencode($name) . '&';
        }
        if ($type) {
            $url .= 'type=' . urlencode($type) . '&';
        }
        if ($dimension) {
            $url .= 'dimension=' . urlencode($dimension) . '&';
        }
        $response = $client->request('GET', $url, ['verify' => false]);
        $data = json_decode($response->getBody());

        if (empty($data->results)) {
            return view('locations.index')->with('error', 'No se encontraron resultados para los filtros aplicados.');
        }

        return view('locations.index', ['locations' => $data->results]);
    }
}
