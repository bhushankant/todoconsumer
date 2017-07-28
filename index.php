<?php

require "vendor/autoload.php";

$client = new GuzzleHttp\Client;

try {
    $response = $client->post('http://localhost:8000/oauth/token', [
        'form_params' => [
            'client_id' => 2,
            // The secret generated when you ran: php artisan passport:install
            'client_secret' => 'UkNyFuniwsZTezmuG9ma8n8QCuoXzkqX4SFTF2Ch',
            'grant_type' => 'password',
            'username' => 'prema@gmail.com',
            'password' => 'kant@1411',
            'scope' => '*',
        ]
    ]);

    // You'd typically save this payload in the session
    $auth = json_decode( (string) $response->getBody() );
    //echo "<pre>"; print_r($auth);exit;

    $response = $client->get('http://localhost:8000/api/todos', [
        'headers' => [
            'Authorization' => 'Bearer '.$auth->access_token,
        ]
    ]);

    $todos = json_decode( (string) $response->getBody() );

    $todoList = "";
    foreach ($todos as $todo) {
        $todoList .= "<li>{$todo->task}".($todo->done ? '✅' : '')."</li>";
    }

    echo "<ul>{$todoList}</ul>";
    // This is for testing purposes
     // This is for testing purposes
    // This is for testing purposes
   




} catch (GuzzleHttp\Exception\BadResponseException $e) {
    echo "Unable to retrieve access token.";
}

<<<<<<< HEAD
=======
function chandra33(){
  echo "This is for chandra function";
}

function chandra(){
  echo "This is for chandra function";
}
function chandra1(){
  echo "This is for chandra function";
  echo "Last change";
}


>>>>>>> 68b6fe49509bfe8d4eb569adec3288f43ab23782
