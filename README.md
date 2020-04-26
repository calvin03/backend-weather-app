

Hi!  route on api called /api/weather 

this route fetch a  data on openweatherapp ui that returns a data based on latitude longhitude

if user indicates a establishment it will also fetch a data on foursquare api to know the establishments nearby on selected latitude and longhitude.

I use this implementation for a much cleaner code and better ux that fits on travelers that wants to know the weather and at the same time know what are the establishments near by.

Documentation:

1.Fetch Weather Data

URL:
http://development.online-pdms.local/api/weather
Method:
POST
Parameters :
lat={string}
long={string}
establishment={string}

Success Response:
Code : 200
Content :{
    "data": {
        "coord": {
            "lon": 121.17,
            "lat": 14.21
        },
        "weather": [
            {
                "id": 801,
                "main": "Clouds",
                "description": "few clouds",
                "icon": "02n"
            }
        ],
        "base": "stations",
        "main": {
            "temp": 30.34,
            "feels_like": 32.86,
            "temp_min": 30,
            "temp_max": 31,
            "pressure": 1011,
            "humidity": 66
        },
        "visibility": 10000,
        "wind": {
            "speed": 4.1,
            "deg": 100
        },
        "clouds": {
            "all": 20
        },
        "dt": 1587815167,
        "sys": {
            "type": 1,
            "id": 8160,
            "country": "PH",
            "sunrise": 1587764156,
            "sunset": 1587809418
        },
        "timezone": 28800,
        "id": 1720681,
        "name": "Calamba",
        "cod": 200
    }
}

Error Response:

Code: 500
Content:
{
    "error": "No Data Found"
}
