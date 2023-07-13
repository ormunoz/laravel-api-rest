<?php

namespace App\Jobs;

use Filemaker\FMRestAPI\FMRestAPI;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\AuthController;

class LoginToFilemaker implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $domain = 'https://rdp2.citolab.cl';
        $version = 'vLatest';
        $database = 'DEV';
        $accountName = 'fullstack';
        $password = 'laravel';

        $api = new FMRestAPI($domain, $version);
        $api->setDatabase($database);
        $api->setUsername($accountName);
        $api->setPassword($password);

        $requestData = [
            'email' => $accountName,
            'password' => $password,
        ];

        $response = $api->post('/login', $requestData);

        Log::info('Inicio de sesión en Filemaker realizado.');

        if ($response->isSuccess()) {
            $endpoint = '/contacto';
            $response = $api->get($endpoint);

            if ($response->isSuccess()) {
                $record = $response->getData()['data'][0];
            } else {
                $error = $response->getResponseData();
                Log::error('Error al obtener el primer registro: ' . $error['messages'][0]);
            }
        } else {
            $error = $response->getResponseData();
            Log::error('Error en el inicio de sesión en Filemaker: ' . $error['messages'][0]);
        }

        Log::info('Operaciones adicionales en Filemaker realizadas.');
    }
}