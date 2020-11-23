<?php

require 'stripe/init.php';
\Stripe\Stripe::setApiKey('sk_test_51HqgeMBnW3WguQjvPBbaNcbApgiaeRTHHECgVUNOaKQ3ZnFqcTPM4r9JpoEXEygtdhnTq77G7Z1sSjMIgrLDCVqI00AEpg2Ld0');

header('Content-Type: application/json');

$YOUR_DOMAIN = 'https://dawjavi.insjoaquimmir.cat';

$checkout_session = \Stripe\Checkout\Session::create([
  'payment_method_types' => ['card'],
  'line_items' => [[
    'price_data' => [
      'currency' => 'eur',
      'unit_amount' => 2295,
      'product_data' => [
        'name' => 'Producte1',
        'images' => ["https://i.imgur.com/EHyR2nP.png"],
      ],
    ],
    'quantity' => 1,
  ]],
  'mode' => 'payment',
  'success_url' => $YOUR_DOMAIN . '/mbalague/curso2021/UF1A6/success.php',
  'cancel_url' => $YOUR_DOMAIN . '/mbalague/curso2021/UF1A6/cancel.php',
]);

echo json_encode(['id' => $checkout_session->id]);