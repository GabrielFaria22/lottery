<?php

use App\models\Card;
use App\models\Client;

include 'config/database.php';

require __DIR__.'/vendor/autoload.php';

include __DIR__.'/includes/header.php';

$database = new Database();
$db = $database->getConnection();

$client = new Client($db);

$clients = $client->getAll();

include __DIR__.'/includes/formCard.php';

$bodyParams = $_POST;

var_dump($bodyParams);


$card = new Card($db);

$card->name = $bodyParams['name'];

$teste = $card->create($bodyParams);

?>

<form method="post">
        <div class="form-group">
            <label>Jogador</label>
            <select class="form-select" aria-label="Default select example" name="client_id">
                <option selected>Selecionar</option>
                <?php 
                    foreach($clients as $player){
                ?>
                        <option value="<?= $player['id'] ?>"><?= $player['name'] ?></option>
                <?php
                    }
                ?>
            </select>
        </div>

        <div class="form-group">
            <table style="width:75%">
                <tr>
                    <th>Número 1</th>
                    <th>Número 2</th>
                    <th>Número 3</th>
                    <th>Número 4</th>
                    <th>Número 5</th>
                    <th>Número 6</th>
                </tr>
                <tr>
                    <td><input type="text" class="form-control" name="number_1"></td>
                    <td><input type="text" class="form-control" name="number_2"></td>
                    <td><input type="text" class="form-control" name="number_3"></td>
                    <td><input type="text" class="form-control" name="number_4"></td>
                    <td><input type="text" class="form-control" name="number_5"></td>
                    <td><input type="text" class="form-control" name="number_6"></td>
                </tr>
            </table>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-success">
                Enviar
            </button>
        </div>
    </form>
</main>

<?php

include __DIR__.'/includes/footer.php';

