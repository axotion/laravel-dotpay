<?php

namespace Evilnet\Dotpay\Tests;

use Evilnet\Dotpay\DotpayApi\StatusMapper;
use Tests\TestCase;

class DotpayStatusTest extends \PHPUnit\Framework\TestCase
{

    protected $statusMapper;
    protected function setUp()
    {
        $this->statusMapper = new StatusMapper();
    }

    public function test_api_response_success()
    {

        $acceptedStatus = 'completed';

        $this->assertTrue($this->statusMapper->map($acceptedStatus));
    }

    public function test_api_status_rejected()
    {
        $rejectedStatus = 'rejected';

        $this->assertFalse($this->statusMapper->map($rejectedStatus));

    }

    public function test_api_status_unknown()
    {
        $this->expectExceptionMessage('Status not found');

        $rejectedStatus = 'unknown';

        $this->statusMapper->map($rejectedStatus);

    }

}
