<?php

include 'config/database.php';

require __DIR__.'/vendor/autoload.php';

include __DIR__.'/includes/header.php';

use App\models\Card;
use App\models\Client;
use \App\models\Lottery;

$bodyParams = $_POST;

if (empty($bodyParams['name']) || strlen($bodyParams['name']) < 7){
    die("Please enter a valid name.");
}

if (empty($bodyParams['date']) || $bodyParams['date'] < date("Y-m-d")){
    die("Please enter a valid date.");
}

if (empty($bodyParams['firstNum']) || ($bodyParams['firstNum'] < 1 || $bodyParams['firstNum'] > 5)){
    die("The initial number must be between 1 and 5.");
}

if (empty($bodyParams['lastNum']) || ($bodyParams['lastNum'] < 60 || $bodyParams['lastNum'] > 80)){
    die("The last number must be between 60 and 80.");
}


$database = new Database();
$db = $database->getConnection();

$intFirstNum = intval($bodyParams['firstNum']);
$intLastNum = intval($bodyParams['lastNum']);

$count = 0;
while( ++$count <= 6 ){
    $lotteryArray[$count] = rand($intFirstNum,$intLastNum);
}

$lotteryArrayToCompare['number_1'] = $lotteryArray[1];
$lotteryArrayToCompare['number_2'] = $lotteryArray[2];
$lotteryArrayToCompare['number_3'] = $lotteryArray[3];
$lotteryArrayToCompare['number_4'] = $lotteryArray[4];
$lotteryArrayToCompare['number_5'] = $lotteryArray[5];
$lotteryArrayToCompare['number_6'] = $lotteryArray[6];

$client = new Client($db);
$clients = $client->getAll();

$card = new Card($db);

?>


<main>
    <section>
        <a href="draw.php">
            <button class="btn btn-success">Novo</button>
        </a>
    </section>
    <h2 class="mt-3"><?= $bodyParams['name']; ?></h2>
    <form method="post">

        <div>
            <p>Números sorteados:</p>
            <table>
                <tr>
                    <?php 
                        foreach ($lotteryArray as $num){
                    ?>
                    <td><?= $num ?></td>
                    <?php    
                        }
                    ?>
                </tr>

                <?php 
                sort($lotteryArray);
                ?> 

                <tr>
                    <?php 
                        foreach ($lotteryArray as $num){
                    ?>
                    <td><?= $num ?></td>
                    <?php    
                        }
                    ?>
                </tr>
            </table>
        </div>

        <?php
            $count = 0;
            foreach($clients as $player){
        ?>
                <div class="form-group">
                    <label><?= $player['name'] ?></label>
                <?php
                    $playerCards = $card->getFromClientId($player['id']);

                    foreach($playerCards as $myCard){

                        foreach($myCard as $key => $element){
                            $element = (int)$element;
                            $myNumbers[$key] = $element;
                        }

                        $playerHits = array_intersect($myNumbers, $lotteryArrayToCompare);
                ?> 
                        <?php 
                        if (!empty($playerHits)){
                        ?> 
                            <p><?php echo $player['name'] . " acertou " . count($playerHits). " número(s) na tabela " . $myCard['id'] . "! Os numeros acertados foram: ";?></p>
                            <table style="width:75%">
                            <tr>
                                <?php 
                                    foreach ($playerHits as $hit) {
                                ?>
                                        <th><?= $hit ?></th>

                                <?php  
                                    }
                                ?>
                            </tr>
                        </table>
                        <?php 
                        }else{
                        ?>
                            <p><?php echo $player['name'] . " não acertou nenhum número na tabela " . $myCard['id'] . "!"?></p>
                        <?php  
                        }
                        ?>
                    <?php  
                        }
                    ?>
        <?php  
            }
        ?>

                </div>


    </form>
</main>




<?php

//include __DIR__.'/includes/result.php';

include __DIR__.'/includes/footer.php';

