<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class EpisodeController extends Controller
{
    public function getAllEpisodes()
    {
        $client = new Client();
        $response = $client->request('GET', 'https://rickandmortyapi.com/api/episode/', ['verify' => false]);
        $data = json_decode($response->getBody());
        dd($data->results);
        return view('episodes.all', ['episodes' => $data->results]);
    }

    public function getEpisodeById($id)
    {
        $client = new Client();
        $response = $client->request('GET', 'https://rickandmortyapi.com/api/episode/' . $id, ['verify' => false]);
        $data = json_decode($response->getBody());
        dd($data);
        return view('episodes.single', ['episode' => $data]);
    }

    public function search(Request $request)
    {
        $client = new Client();
        $name = $request->input('name');
        $episode = $request->input('episode');
        $url = 'https://rickandmortyapi.com/api/episode/?';
        if ($name) {
            $url .= 'name=' . urlencode($name) . '&';
        }
        if ($episode) {
            $url .= 'episode=' . urlencode($episode) . '&';
        }
        $response = $client->request('GET', $url, ['verify' => false]);
        $data = json_decode($response->getBody());
        dd($data->results);
        if (count($data->results) == 0) {
            return view('episodes.search', ['error' => 'No se encontraron episodios con los filtros proporcionados.']);
        }
        return view('episodes.search', ['episodes' => $data->results]);
    }
}
