<?php

namespace App\Billing;

use Illuminate\Support\Str;

class CreditCardPaymentGateway implements PaymentGatewayContract
{
    /**
     * @var int
     */
    private $currency;

    /**
     * @var int
     */
    private $discount;

    /**
     * @param $currency
     */
    public function __construct($currency)
    {
        $this->currency = $currency;
        $this->discount = 0;
    }

    /**
     * @param $amount
     */
    public function setDiscount($amount)
    {
        $this->discount = $amount;
    }

    /**
     * @param $amount
     * @return array
     */
    public function charge($amount): array
    {
        $fee = $amount * 0.03;

        return [
            'amount' => $amount - $this->discount,
            'confirmation_number' => Str::random(),
            'currency' => $this->currency,
            'discount' => $this->discount,
            'fee' => $fee,
        ];
    }
}
