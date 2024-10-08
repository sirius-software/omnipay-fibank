<?php

namespace Ampeco\OmnipayFibank\Message;

use Omnipay\Common\Message\ResponseInterface;

class AuthorizeRequest extends AbstractRequest
{
    /**
     * Get the raw data array for this message. The format of this varies from gateway to
     * gateway, but will usually be either an associative array, or a SimpleXMLElement.
     *
     * @return mixed
     */
    public function getData()
    {
        return [
            'amount' => $this->getAmountInteger(),
            'description' => $this->getDescription(),
            'language' => $this->getLanguage(),
            'cardReference' => $this->getCardReference(),
        ];
    }

    /**
     * Send the request with specified data
     *
     * @param mixed $data The data to send
     * @return ResponseInterface
     */
    public function sendData($data)
    {
//        $response = $this->fibank->createAuthorizationRequest($data['amount'], $data['description'], $data['cardReference'], $data['language']);
        $response = $this->fibank->purchaseRecurringPayment($data['amount'], $data['description'], $data['cardReference'], $data['language']);

        return $this->createResponse($response);
    }
}
