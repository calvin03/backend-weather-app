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
            $clientId = env('FOURSQUARE_CLIENT_ID', '');
            $clientSecret = env('FOURSQUARE_CLIENT_SECRET', '');
            $client = new Client;
            $fetchWeather = $client->get("api.openweathermap.org/data/2.5/weather?lat=$latitude&lon=$longitude&APPID=$weatherApiKey&units=metric");
            $getWeather =  collect(json_decode($fetchWeather->getBody()));

            if (count($getWeather) > 0) {

                // if user indicates a establishment to go it will fetch an this api
                if (isset($request->coordinates['establishment'])) {
                    $establisment = $request->coordinates['establishment'];
                    $fetchEstablishments = $client->get("https://api.foursquare.com/v2/venues/explore?v=20180323&client_id=$clientId&client_secret=$clientSecret&query=$establisment&limit=6&ll=$latitude,$longitude");
                    $getEstablishments =  collect(json_decode($fetchEstablishments->getBody()));

                    if (count($getEstablishments) > 0) {
                        return Response::json([
                            'data' => $getWeather,
                            'establishments' => $getEstablishments
                        ], 200);
                    }
                }
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
