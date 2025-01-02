<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class GeoLocationController extends Controller
{
    public function index(){
        $client = new Client();
        $url = "https://api.binderbyte.com/wilayah/provinsi?api_key=0fe6cb2fc43db12555f9165d3343abc3898ab479f263fe8ca643afa9dcbfe670";
        $response = $client->request('GET', $url);
        dd($response);
    }
}
