<?php

namespace App\NotificationChannels;

use Illuminate\Support\Facades\Http;
use \Illuminate\Http\Client\Response;

class LankabellSmsClient
{

    /**
     * Send SMS message
     *
     * @param string $to
     * @param string $message
     * @return bool
     */
    public function send(string $to, string $message)
    {
        $number = preg_replace('/^\+?1|\|1|\D/', '', $to);

        if (strlen(trim($number)) == 0) {
            return false;
        }

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
