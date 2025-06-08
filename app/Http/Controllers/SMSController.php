<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SMSController extends Controller
{
    public function sendSMS(Request $request)
    {
        $phone = $request->input('phone');
        $message = $request->input('message');

        $username = env('sandbox');
        $apiKey = env('atsk_2dddeb4a9989410ee2189e45ee9ec04fb2aa85f75726ce180dcf6f9e343a8aafc7e45152');

        $response = Http::withHeaders([
            'apiKey' => $apiKey
        ])->post("https://api.africastalking.com/version1/messaging", [
            'username' => $username,
            'to' => $phone,
            'message' => $message
        ]);

        return response()->json($response->json());
    }
}