<?php

namespace App\Services\Midtrans;

use Midtrans\Config;

class Midtrans {
    protected $server_key;
    protected $is_production;
    protected $is_sanitized;
    protected $is_3ds;

    public function __construct()
    {
        $this->server_key = config('midtrans.server_key');
        $this->is_production = config('midtrans.is_production');
        $this->is_sanitized = config('midtrans.is_sanitized');
        $this->is_3ds = config('midtrans.is_3ds');
        $this->notification_url = config('midtrans.notification_url');
    }
    

    public function _configureMidtrans() {
        Config::$serverKey = $this->server_key;
        Config::$isProduction = $this->is_production;
        Config::$isSanitized = $this->is_sanitized;
        Config::$is3ds = $this->is_3ds;
        Config::$appendNotifUrl = $this->notification_url;
    }
}