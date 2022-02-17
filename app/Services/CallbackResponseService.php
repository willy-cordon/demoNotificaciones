<?php

namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

/**
 * Class CallbackResponseService
 * @package App\Services
 */
class CallbackResponseService
{
    private $client;
    public function __construct()
    {
        $this->client = new Client();
    }

    public function responseClient($idClient)
    {
        Log::debug('client debug');
        Log::debug($idClient);
    }


}
