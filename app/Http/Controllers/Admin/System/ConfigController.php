<?php

namespace App\Http\Controllers\Admin\System;

use App\Http\Controllers\Controller;
use App\Http\Requests\System\ApplicationConfigRequest;
use App\Http\Requests\System\DatabaseConfigRequest;
use App\Http\Requests\System\EmailConfigRequest;
use Exception;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class ConfigController extends Controller
{

    // path to index view
    protected $index_view = 'admin.system.email-configs.index';

    // define variable to hold collection resources
    protected $route = 'admin.email.configs.index';

    public function __construct()
    {
        $this->middleware('auth');
    }

    // Get Mail Configuration data
    public function index()
    {
        abort_if(Gate::denies('config_view'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        try {
            return view('admin.system.config.index');
        }
        catch (Exception $e) {
            return $this->error($e->getMessage());
        }
    }


    /*============================= EMAIL CONFIGURATION =========================*/
    // Update
    public function emailEdit()
    {
        abort_if(Gate::denies('config_update'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        try {
            return view('admin.system.config.email');
        }
        catch (Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    // Update config files
    public function emailUpdate(EmailConfigRequest $request)
    {
        abort_if(Gate::denies('config_update'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        try {
            // Update the .env file
            $this->updateEnv([
                'MAIL_DRIVER' => $request->input('mail_driver'),
                'MAIL_HOST' => $request->input('mail_host'),
                'MAIL_PORT' => $request->input('mail_port'),
                'MAIL_USERNAME' => $request->input('mail_username'),
                'MAIL_PASSWORD' => $request->input('mail_password'),
                'MAIL_ENCRYPTION' => $request->input('mail_encryption'),
                'MAIL_FROM_ADDRESS' => $request->input('mail_address'),
            ]);

            // Reconfigure
            Artisan::call('config:clear');

            return $this->successRoute('configs.index','Email configuration saved.');
        }
        catch (Exception $e) {
            return $this->error($e->getMessage());
        }
    }


    /*======================================= EMAIL CONFIGURATION ===============================*/
    // Update
    public function dbEdit()
    {
        abort_if(Gate::denies('config_update'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        try {
            return view('admin.system.config.db');
        }
        catch (Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    // Update config files
    public function dbUpdate(DatabaseConfigRequest $request)
    {
        abort_if(Gate::denies('config_update'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        try {
            // Update the .env file
            $this->updateEnv([
                'DB_CONNECTION' => $request->input('db_connection'),
                'DB_HOST' => $request->input('db_host'),
                'DB_PORT' => $request->input('db_port'),
                'DB_DATABASE' => $request->input('db_database'),
                'DB_USERNAME' => $request->input('db_username'),
                'DB_PASSWORD' => $request->input('db_password'),
                'DB_DUMP_BINARY_PATH' => $request->input('db_dump_binary'),

            ]);

            // Reconfigure
            Artisan::call('config:clear');

            return $this->successRoute('configs.index','Database configuration saved.');
        }
        catch (Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    /*======================================= APPLICATION CONFIGURATION ===============================*/
    // Update
    public function appEdit()
    {
        abort_if(Gate::denies('config_update'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        try {
            return view('admin.system.config.app');
        }
        catch (Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    // Update config files
    public function appUpdate(ApplicationConfigRequest $request)
    {
        abort_if(Gate::denies('config_update'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        try {
            // Update the .env file
            $this->updateEnv([
                'APP_NAME' => $request->input('app_name'),
                'APP_ENV' => $request->input('app_env'),
                'APP_DEBUG' => $request->input('app_debug'),
                'APP_URL' => $request->input('app_url'),
            ]);

            // Reconfigure
            Artisan::call('config:clear');

            return $this->successRoute('configs.index','Application configuration saved.');
        }
        catch (Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    /* Update the .env File */
    private function updateEnv(array $data)
    {
        $envFile = base_path('.env');

        if(file_exists($envFile)) {
            foreach ($data as $key => $value) {
                // Update or add the configuration value in the .env file
                file_put_contents($envFile, preg_replace(
                    "/$key=(.*)/",
                    "$key=$value",
                    file_get_contents($envFile)
                ));
            }
        }
    }



}
