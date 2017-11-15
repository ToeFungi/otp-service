<?php namespace ToeFungi\OTP\Laravel\Providers;

use Illuminate\Support\ServiceProvider;
use ToeFungi\OTP\OTPService;
use ToeFungi\OTP\predis\PredisOTPService;

class PredisOTPServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(OTPService::class, function () {
            return new PredisOTPService(
                json_decode(getenv('PREDIS_OTP_HOSTS'), true),
                json_decode(getenv('PREDIS_OTP_OPTIONS'), true)
            );
        });
    }
}