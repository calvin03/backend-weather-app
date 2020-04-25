<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Response;



class WeatherController extends Controller
{
    public function getWeather(Request $request)
    {



        try {
            $weatherApiKey = env('WEATHER_API_KEY', '');
            $latitude = $request->coordinates['lat'];
            $longitude = $request->coordinates['lon'];
            $client = new Client;
            $response = $client->get("api.openweathermap.org/data/2.5/weather?lat=$latitude&lon=$longitude&APPID=$weatherApiKey&units=metric");
            $getWeather =  collect(json_decode($response->getBody()));

            if (count($getWeather) > 0) {
                return Response::json([
                    'data' => $getWeather
                ], 200);
            }
            return Response::json([
                'error' => "No Data Found"
            ], 200);
        } catch (\Exception $e) {

            return Response::json([
                'error' => $e->getMessage()
            ], 200);
        }
    }
}
