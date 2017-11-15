<?php namespace ToeFungi\OTP;

interface OTPService
{
    /**
     * Generates and stores OTP
     *
     * @param int|string $userId
     * @param int|null $ttl ttl in seconds. Default 300
     * @return int Generated OTP
     */
    public function generateOTP($userId, $ttl = null);

    /**
     * Validates OTP
     *
     * @param int|string $userId
     * @param int $otp
     * @return boolean
     */
    public function validateOTP($userId, $otp);

    /**
     * Removes OTP
     *
     * @param int|string $userId
     */
    public function removeOTP($userId);
}