<?php

use App\models\Client;

include 'config/database.php';

require __DIR__.'/vendor/autoload.php';

include __DIR__.'/includes/header.php';

include __DIR__.'/includes/formClient.php';

$bodyParams = $_POST;

$database = new Database();
$db = $database->getConnection();

$client = new Client($db);

$client->name = $bodyParams['name'];

$teste = $client->create();

include __DIR__.'/includes/footer.php';

