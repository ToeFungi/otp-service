ToeFungi OTP Service
=

Register the service provider in bootstrap
> $app->register(\ToeFungi\OTP\Laravel\Providers\PredisOTPServiceProvider::class);

The following are environment variables for this provider
- PREDIS_OTP_HOSTS - An array of hosts is accepted
- PREDIS_OTP_OPTIONS - An array of options to configure predis
- PREDIS_OTP_TTL - Time to live for OTP

