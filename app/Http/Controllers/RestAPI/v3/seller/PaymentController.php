<?php

namespace App\Http\Controllers\RestAPI\v3\seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class PaymentController extends Controller
{

    public function create_payment_link(Request $request)
    {
        $client = new Client(['base_uri' => 'https://accept.paymob.com/api/']);
        $authResponse = $client->post('ecommerce/payment-links', [
            'json' => [
                'api_key' => 'ZXlKaGJHY2lPaUpJVXpVeE1pSXNJblI1Y0NJNklrcFhWQ0o5LmV5SmpiR0Z6Y3lJNklrMWxjbU5vWVc1MElpd2ljSEp2Wm1sc1pWOXdheUk2T1Rjd09EazFMQ0p1WVcxbElqb2lhVzVwZEdsaGJDSjkuWkk3RGRZaWxmank4OVpxc28yQWFLSTYxTHd6VlJsNWpUWVVyemtweUs4dlF6cS1NWmo4MTZiMWxqRmU4S0tqV2JleUlrZks1aTVRZFBhNkRlWHlHYXc=',
            ]
        ]);
        $token = json_decode((string) $authResponse->getBody())->token;
        $headers = [
            'Authorization' => "Token egy_sk_test_ded4412bf37d876fbfd257fc5b58e3880ff4f384b184e92a709c478d1713b365",
            'Content-Type' => 'application/json'
        ];
        $body = [
            "amount" => 10,
            "currency"=> "EGP",
            "payment_methods"=> [
                4556000
            ],
            "items"=> [
                [
                "name"=> "Item name 1",
                "amount"=> 10,
                "description"=> "Watch",
                "quantity"=> 1
                ]
            ],
            "billing_data" => [
                "apartment" => "6",
                "first_name" => "Ammar",
                "last_name" => "Sadek",
                "street" => "938, Al-Jadeed Bldg",
                "building" => "939",
                "phone_number" => "+96824480228",
                "country" => "OMN",
                "email" => "AmmarSadek@gmail.com",
                "floor" => "1",
                "state" => "Alkhuwair"
            ],
            "customer" => [
                "first_name"=> "Ammar",
                "last_name"=> "Sadek",
                "email"=> "AmmarSadek@gmail.com",
                "extras"=> [
                    "re"=> "22"
                ]
            ],
            "extras" => [
                "ee"=> 22
            ]
        ];
        $intentionResponse = $client->post('https://accept.paymob.com/v1/intention/', [
            'headers' => $headers, 'json' => $body
        ]);
        $intentionBody = json_decode((string) $client->getBody());
        return response()->json(['status' => $intentionResponse->getStatusCode(), 'res' => $intentionBody]);
    }
}
