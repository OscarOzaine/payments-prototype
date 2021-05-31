<?php

namespace Tests\Feature;

use Tests\TestCase;

class PaymentTest extends TestCase
{
    public function testPaymentWithoutParametersReturnsBankPaymentFee()
    {
        $response = $this->post('/pay');

        $response->assertStatus(200);

        $response->assertJson([
            'amount' => 2000,
            'currency' => 'usd',
            'discount' => 500,
            'fee' => 12.5,
        ]);
    }

    public function testPaymentWithCreditParameterReturnsCreditCardPaymentFee()
    {
        $response = $this->post('/pay', ['credit'=>true]);

        $response->assertStatus(200);

        $response->assertJson([
            'amount' => 2000,
            'currency' => 'usd',
            'discount' => 500,
            'fee' => 75,
        ]);
    }
}
