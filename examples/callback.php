<?php

$client = new \Ixopay\Client\Client('username', 'password', 'apiKey', 'sharedSecret');
$client->validateCallbackWithGlobals();
$callbackResult = $client->readCallback(file_get_contents('php://input'));

$myTransactionId = $callbackResult->getTransactionId();
$gatewayTransactionId = $callbackResult->getReferenceId();

if ($callbackResult->getResult() == \Ixopay\Client\Callback\Result::RESULT_OK) {
    //payment ok

    //finishCart();

} elseif ($callbackResult->getResult() == \Ixopay\Client\Callback\Result::RESULT_ERROR) {
    //payment failed, handle errors
    $errors = $callbackResult->getErrors();

}

echo "OK";
die;