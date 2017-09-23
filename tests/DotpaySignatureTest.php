<?php

namespace Evilnet\Dotpay\Tests;

use Evilnet\Dotpay\DotpayApi\Validator;
use Tests\TestCase;

class DotpaySignatureTest extends TestCase
{
    public function test_signature_fail_invalid_pin()
    {
        $pin = 1234;
        $validator = new Validator($pin);
        $response = [
            "id" => "12345",
            "operation_number" => "M0000-0000",
            "operation_type" => "payment",
            "operation_status" => "complete",
            "operation_amount" => "100.00",
            "operation_currency" => "PLN",
            "operation_original_amount" => "100.00",
            "operation_original_currency" => "PLN",
            "operation_datetime" => "2017-09-20 22=>12=>50",
            "control" => "12345",
            "description" => "Payment for internal_id order",
            "email" => "john.smith@example.com",
            "p_info" => "Test User (test@test.com)",
            "p_email" => "test@test.com",
            "channel" => "1",
            "signature" => "88be573b48612af19bf80a1bd43f7e3a219c8a6e70fd1215d596ac098b2b6733"
        ];

        $result = $validator->verify($response);
        $this->assertFalse($result);
    }

    public function test_signature_fail_invalid_hash()
    {
        $pin = 12345;
        $validator = new Validator($pin);
        $response = [
            "id" => "12345",
            "operation_number" => "M0000-0000",
            "operation_type" => "payment",
            "operation_status" => "complete",
            "operation_amount" => "100.00",
            "operation_currency" => "PLN",
            "operation_original_amount" => "100.00",
            "operation_original_currency" => "PLN",
            "operation_datetime" => "2017-09-20 22=>12=>50",
            "control" => "12345",
            "description" => "Payment for internal_id order",
            "email" => "john.smith@example.com",
            "p_info" => "Test User (test@test.com)",
            "p_email" => "test@test.com",
            "channel" => "1",
            "signature" => "dunno"
        ];

        $result = $validator->verify($response);
        $this->assertFalse($result);
    }

    public function test_signature_success()
    {
        $pin = 12345;
        $validator = new Validator($pin);
        $response = [
            "id" => "12345",
            "operation_number" => "M0000-0000",
            "operation_type" => "payment",
            "operation_status" => "complete",
            "operation_amount" => "100.00",
            "operation_currency" => "PLN",
            "operation_original_amount" => "100.00",
            "operation_original_currency" => "PLN",
            "operation_datetime" => "2017-09-20 22=>12=>50",
            "control" => "12345",
            "description" => "Payment for internal_id order",
            "email" => "john.smith@example.com",
            "p_info" => "Test User (test@test.com)",
            "p_email" => "test@test.com",
            "channel" => "1",
            "signature" => "88be573b48612af19bf80a1bd43f7e3a219c8a6e70fd1215d596ac098b2b6733"
        ];

        $result = $validator->verify($response);
        $this->assertTrue($result);
    }
}
