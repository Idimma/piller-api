<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Unicodeveloper\Paystack\Paystack;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class PaymentController extends Controller
{
    //
    private $base_url;
    private $secretKey;
    private $client;

    public function __construct()
    {
        $this->base_url = config('paystack.paymentUrl');
        $this->secretKey = config('paystack.secretKey');
        $this->setClient();
    }

    /**
     * generate Paystack reference code to add Card
     * @return JsonResponse
     */
    public function initiateCardTransaction()
    {
        $user = getUser();
        $body = [
            'reference' => (new Paystack)->genTranxRef(),
            "amount" => 5000,
            "email" => $user->email,
        ];
        $response = (object) $this->makeRequest('/transaction/initialize', 'post', $body);
        if (!$response->status) {
            return $this->respondWithError(['error' => 'Something went wrong'], 500);
        }
        return $this->respondWithSuccess(['data' => $response->data]);
    }


    /**
     * Verifies The transaction and added the card for the user
     * @param Request $request
     * @return JsonResponse
     */
    public function verifyCardTransaction(Request $request)
    {
        $url = '/transaction/verify/' . $request->get('reference');
        $response = (object) $this->makeRequest($url, 'get');
        $user = getUser();
        if (!$response->status) {
            return $this->respondWithError(['error' => $response->message], 422);
        }
        if ($response->data['status'] !== 'success') {
            return $this->respondWithError(['error' => 'Transaction not completed'], 422);
        }

        $user->cards()->updateOrCreate([
            'last_four' => $response->data['authorization']['last4'],
            'customer_id' => $response->data['customer']['id'],
            'authorization_code' => $response->data['authorization']['authorization_code'],
            'customer_code' => $response->data['customer']['customer_code'],
        ]);
        return $this->respondWithSuccess(['message' => 'Successfully added card']);
    }

    /**
     * Charge the user with the already added authorization_code
     * @param Int $amount
     * @param String $authorization_code
     * @param User $user
     * @return JsonResponse
     */
    public function chargeCustomer(Int $amount, String $authorization_code, Object $user)
    {
        $url = '/transaction/charge_authorization';
        $body = [
            'amount' => $amount,
            'authorization_code' => $authorization_code,
            'email' => $user->email,
        ];
        return  (object) $this->makeRequest($url, 'post', $body);
    }


    /**
     * Sets the client header
     */
    private function setClient()
    {
        $authBearer = 'Bearer ' . $this->secretKey;
        $this->client = new Client(
            [
                'base_uri' => $this->base_url,
                'headers' => [
                    'Authorization' => $authBearer,
                    'Content-Type'  => 'application/json',
                    'Accept'        => 'application/json'
                ]
            ]
        );
    }

    /**
     * @param String $url
     * @param String $method
     * @param Object $data
     * @return JsonResponse
     */
    private function makeRequest(String $url, String $method, $data = [])
    {

        $request_url = $this->base_url . $url;
        try {
            $response = $this->client->{strtolower($method)}($request_url, ['body' => json_encode($data)]);
        } catch (ClientException $e) {
            $response = $e->getResponse();
        }
        return json_decode($response->getBody(), true);
    }
}
