<?php

namespace Evilnet\Dotpay\DotpayApi\Requests;

use Evilnet\Dotpay\DotpayApi\Contracts\IRequest;

/**
 * Class CreatePaymentLink
 * @package Evilnet\Dotpay\DotpayApi\Requests
 */
class CreatePaymentLink extends AbstractRequest implements IRequest
{
    /**
     * @var
     */
    protected $amount;
    /**
     * @var
     */
    protected $currency;
    /**
     * @var
     */
    protected $description;
    /**
     * @var
     */
    protected $control;
    // protected $language;
    /**
     * @var int
     */
    protected $onlinetransfer = 1;
    /**
     * @var int
     */
    protected $ch_lock = 1;
    /**
     * @var int
     */
    protected $redirection_type = 0;
    /**
     * @var string
     */
    protected $buttontext = 'Return';
    /**
     * @var
     */
    protected $url;
    /**
     * @var
     */
    protected $urlc;
    /**
     * @var
     */
    protected $expiration_datetime;
    /**
     * @var array
     */
    protected $payer = [];
    /**
     * @var array
     */
    protected $recipient = [];

    /**
     * @var
     */
    protected $shop_id;

    /**
     * CreatePaymentLink constructor.
     * @param $shop_id
     * @param $data
     */
    public function __construct($shop_id, $data)
    {
        $this->shop_id = $shop_id;

        foreach ($data as $key => $value) {
            $this->$key = $value;
        }
    }

    /**
     * @return string
     */
    public function method()
    {
        return 'POST';
    }

    /**
     * @return string
     */
    public function path()
    {
        return 'api/v1/accounts/'.$this->shop_id.'/payment_links/';
    }
}
