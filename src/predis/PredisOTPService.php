<?php namespace ToeFungi\OTP\predis;

use Predis\Client;
use ToeFungi\OTP\OTPService;

class PredisOTPService implements OTPService
{
    private $predis;

    public function __construct($hosts, $options)
    {
        $this->predis = new Client(
            $hosts,
            $options
        );
    }

    public function generateOTP($userId, $ttl = null)
    {
        if(!$ttl)
            $ttl = getenv('PREDIS_OTP_TTL') ?: 300;

        $otp = rand(100000, 999999);
        $this->predis->setex($userId, $ttl, $otp);
        return $otp;
    }

    public function validateOTP($userId, $otp)
    {
        if($this->predis->exists($userId)) {
            return $this->predis->get($userId) == $otp;
        } return false;
    }

    public function removeOTP($userId)
    {
        if($this->predis->exists($userId)) $this->predis->del($userId);
    }
}