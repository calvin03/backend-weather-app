

Hi!  route on api called /api/weather 

this route fetch a  data on openweatherapp ui that returns a data based on latitude longhitude

if user indicates a establishment it will also fetch a data on foursquare api to know the establishments nearby on selected latitude and longhitude.

I use this implementation for a much cleaner code and better ux that fits on travelers that wants to know the weather and at the same time know what are the establishments near by. I didnt much focus on the ui because of the limited time but i make it responsive and easy to use for the users.


Here is the actual app you can check it:

https://secure-beach-14872.herokuapp.com/

ENV VARIABLES : 


WEATHER_API_KEY = 52971b08618c0eb1b3320b63dc50d197
FOURSQUARE_CLIENT_ID = 0SMAYLWOTGEQUDPAZTZ0B1GVYWH545QP5J0IAYZJGMFEAARX
FOURSQUARE_CLIENT_SECRET = 4B1PH3X2SCE1BUEPDZDLBDTWIATDSTSGKWCSULII1YYL0SFQ



Documentation:

1.Fetch Weather Data

URL:
https://young-cliffs-37734.herokuapp.com/api/weather
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
