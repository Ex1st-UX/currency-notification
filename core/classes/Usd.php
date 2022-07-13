<?php

namespace Core\Currency;

class Usd implements \Core\General\Currencies
{
    protected $url = 'https://currate.ru/api/';
    protected $key = '6226c3ed500357541bd5b050dbf00a9a';

    public function __construct()
    {
        $USDValue = $this->GetCurrencyValue();

        if ($USDValue) {
            $Mail = new \Core\Mail;
            $msg = 'Курс доллара на международном рынке ' . $USDValue;

            $Mail->Send('USD at ' .  date("Y-m-d H:i:s"), $msg);
        }
    }

    public function GetCurrencyValue()
    {
        $curl = curl_init($this->url);

        $params = array(
            'get' => 'rates',
            'pairs' => 'USDRUB',
            'key' => $this->key
        );

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_URL, $this->url . '?' . http_build_query($params));

        $result = curl_exec($curl);
        curl_close($curl);

        $response_data = json_decode($result, true);

        $USDValue = $response_data['data']['USDRUB'];

        if ($USDValue)
            return $USDValue;
        else
            return false;
    }
}