<?php

namespace CryptoDataPackage;

class cryptodata
{

    function c_request($url, $api, $method, $postdata = [])
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.coincap.io/v2/" . $url);
        if ($method == 'POST') {
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postdata));
        }
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Content-Type: application/json",
            'Authorization:Bearer ' . $api
        ]);
        $output = curl_exec($ch);
        $info = curl_getinfo($ch);
        curl_close($ch);
        return $output;
    }

    function GetAssets($apiKey)
    {
        return $this->c_request("assets", $apiKey, "GET");
    }

    function GetAsset($apiKey, $coin = "bitcoin")
    {
        return $this->c_request("assets/" . $coin, $apiKey, "GET");
    }

    function GetAssetHistory($apiKey, $coin = "bitcoin", $interval = 'd1')
    {
        return $this->c_request("assets/" . $coin . "/history?interval=" . $interval, $apiKey, "GET");
    }

    function GetAssetMarkets($apiKey, $coin = "bitcoin")
    {
        return $this->c_request("assets/" . $coin . "/markets", $apiKey, "GET");
    }

    function GetRates($apiKey)
    {
        return $this->c_request("rates", $apiKey, "GET");
    }

    function GetRateAssets($apiKey, $coin = "bitcoin")
    {
        return $this->c_request("rates/" . $coin, $apiKey, "GET");
    }

    function GetExchanges($apiKey)
    {
        return $this->c_request("exchanges", $apiKey, "GET");
    }

    function GetExchange($apiKey, $exchange = "kraken")
    {
        return $this->c_request("exchanges/" . $exchange, $apiKey, "GET");
    }

    function GetMarkets($apiKey)
    {
        return $this->c_request("markets", $apiKey, "GET");
    }

    function GetCandles($apiKey,$exchange="kraken",$base_coin="bitcoin",$quote_coin="ethereum",$interval="h1"){
        return $this->c_request("candles?exchange=".$exchange."&interval=".$interval."&baseId=".$base_coin."&quoteId=".$quote_coin,$apiKey,"GET");
    }
}
