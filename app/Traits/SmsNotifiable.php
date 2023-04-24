<?php

namespace App\Traits;

use Illuminate\Support\Facades\Http;

trait SmsNotifiable
{

    public function sendSms($number, $message)
    {
        $url = config('lankabell.sms.http.url');
        $data = array(
            'SmsMessage' => $message,
            'PhoneNumber' => $number,
            'CompanyId' => config('lankabell.sms.http.company_id'),
            'Pword' => config('lankabell.sms.http.password'),
        );
        $response = Http::post($url, $data);

        $smsResult = $response->json();

        if ($smsResult['Status'] == "200") {
            return true;
        }

        return false;
    }
}
