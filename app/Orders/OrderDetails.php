<?php


namespace App\Orders;

use App\Billing\PaymentGatewayContract;

class OrderDetails
{
    /**
     * @var PaymentGatewayContract
     */
    private $paymentGateway;

    /**
     * @param PaymentGatewayContract $paymentGateway
     */
    public function __construct(PaymentGatewayContract $paymentGateway)
    {
        $this->paymentGateway = $paymentGateway;
    }

    /**
     * @return string[]
     */
    public function all()
    {
        $this->paymentGateway->setDiscount(500);

        return [
            'name' => 'Oscar',
            'address' => '2220',
        ];
    }
}
