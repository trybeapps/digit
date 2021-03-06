<?php

namespace App\Events\Paystack;

use Illuminate\Queue\SerializesModels;

class SubscriptionEnabled
{
    use SerializesModels;

    public $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }
}