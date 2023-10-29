<?php

namespace App\Services\Yoomoney;

class YooMoneyAPI
{
    const BASE_URL = "https://yoomoney.ru/quickpay/confirm.xml?";

    private $finalUrl;

    public function __construct($array)
    {

        $this->finalUrl = self::BASE_URL;

        foreach ($array as $key => $value) {
            $this->finalUrl = $this->finalUrl . $key . "=" . $value . "&";
        }
    }

    public function getFinalUrl()
    {
        return $this->finalUrl;
    }

    //https://github.com/destyk/umoney-quickpay-php
    public static function checkNotificationSignature(string $signature, array $notificationBody, string $secret)
    {
        $body = [
            'notification_type' => null,
            'operation_id' => null,
            'amount' => null,
            'currency' => null,
            'datetime' => null,
            'sender' => null,
            'codepro' => null,
            'notification_secret' => $secret,
            'label' => null
        ];

        foreach ($body as $key => $item) {
            if ('notification_secret' !== $key) {
                if (false === isset($notificationBody[$key])) {
                    $body[$key] = "";
                }

                $body[$key] = $notificationBody[$key];
            }
        }

        $body['amount'] = self::normalizeAmount($body['amount']);
        $notificationDataKeys = join("&", $body);
        $ourSignature = hash("sha1", $notificationDataKeys);

        return $ourSignature === $signature;
    }

    private static function normalizeAmount(float $amount = 0)
    {
        return number_format(round(floatval($amount), 2, PHP_ROUND_HALF_DOWN), 2, '.', '');
    }
}
