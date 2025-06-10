<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class USSDController extends Controller
{
    public function handleUSSD(Request $request)
    {
        $sessionId   = $request->input("sessionId");
        $serviceCode = $request->input("serviceCode");
        $phoneNumber = $request->input("phoneNumber");
        $text        = $request->input("text");

        $userInput = explode("*", $text);
        $level = count($userInput);

        if ($text == "") {
            $response  = "CON Welcome to AgriSoko\n";
            $response .= "1. Market Prices\n";
            $response .= "2. Weather Update\n";
            $response .= "3. Apply for Loan\n";
            $response .= "4. Weekly Agri Tip";
        } elseif ($text == "1") {
            $response = "CON Select Crop:\n1. Maize\n2. Beans\n3. Tomatoes";
        } elseif ($text == "1*1") {
            $price = "Ksh 3,200 per 90Kg bag";
            $response = "END Maize Market Price: $price";
        } elseif ($text == "2") {
            $forecast = "Light rain expected in your area today.";
            $response = "END Weather Forecast: $forecast";
        } elseif ($text == "3") {
            $response = "CON Enter loan amount (Ksh):";
        } elseif ($level == 2 && $userInput[0] == "3") {
            $amount = (int)$userInput[1];
            if ($amount < 200 || $amount > 2000) {
                $response = "END Enter amount between Ksh 200 and 2000.";
            } else {
                DB::table('loans')->insert([
                    'phone_number' => $phoneNumber,
                    'amount' => $amount,
                    'status' => 'pending',
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
                Http::post(url('/sms/send'), [
                    'phone' => $phoneNumber,
                    'message' => "Loan request of Ksh $amount received. You'll be notified once processed."
                ]);
                $response = "END Your loan request of Ksh $amount has been submitted.";
            }
        } elseif ($text == "4") {
            $tip = "Use compost manure to enrich your soil organically.";
            $response = "END Weekly Agri Tip: $tip";
        } else {
            $response = "END Invalid option. Try again.";
        }

        return response($response)->header('Content-Type', 'text/plain');
    }

}
