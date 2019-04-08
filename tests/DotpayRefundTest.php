<?php

namespace Evilnet\Dotpay\Tests;

use Evilnet\Dotpay\DotpayApi\Requests\CreateRefund;

use Evilnet\Dotpay\Exceptions\RequestIntegrityException;
use Tests\TestCase;

/**
 * Class DotpayRefundTest
 * @package Evilnet\Dotpay\Tests
 */
class DotpayRefundTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @throws
     */
    public function test_refund_request_can_be_instantiated()
    {
        $request = new CreateRefund('M1006-4674',
            [
                "amount"      => 120,
                "description" => "Refund for payment",
                "control"     => 123
            ]
        );
        $this->assertTrue(isset($request));
    }

    /**
     * @throws
     */
    public function test_behavior_when_amount_is_invalid(){
        $this->expectException(RequestIntegrityException::class);
        $request = new CreateRefund('M1006-4674',
            [
                "amount"      => -1,
                "description" => "Refund for payment",
                "control"     => 123
            ]
        );
        $this->assertTrue(isset($request));
    }

    /**
     * @throws
     */
    public function test_behavior_when_operation_number_is_null(){
        $this->expectException(RequestIntegrityException::class);
        $request = new CreateRefund(null,
            [
                "amount"      => 120,
                "description" => "Refund for payment",
                "control"     => 123
            ]
        );
        $this->assertTrue(isset($request));
    }
}
