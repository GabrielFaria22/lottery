<?php

include 'config/database.php';

require __DIR__.'/vendor/autoload.php';

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
while( ++$count <= 5 ){
    $lotteryArray[$count] = rand($intFirstNum,$intLastNum);
}

$client = new Client($db);

$first = $client->getFirstClient();
$second = $client->getSecondClient();
$third = $client->getThirdClient();

$firstClientHits = array_intersect($first, $lotteryArray);
$secondClientHits = array_intersect($second, $lotteryArray);
$thirdClientHits = array_intersect($third, $lotteryArray);

include __DIR__.'/includes/header.php';

?>


<main>
    <section>
        <a href="draw.php">
            <button class="btn btn-success">Novo</button>
        </a>
    </section>
    <h2 class="mt-3"><?php echo $bodyParams['name']; ?></h2>
    <form method="post">

        <?php if (count($firstClientHits) <= 0){ ?>

            <div class="form-group">
                <label><?php echo $first['name'] ?></label>
                <p><?php echo "não acertou nenhum número"?></p>
            </div>

        <?php }else{ ?>

            <div class="form-group">
            <label><?php echo $first['name'] ?></label>
            <p><?php echo $first['name'] . " acertou " . count($firstClientHits). " números! Os numeros acertados foram: ";?></p>
            <p><?php 
                foreach ($firstClientHits as $number) {
                    echo strval($number) . "-";
                }
            ?></p>
        </div>

        <?php }?>

        <?php if (count($secondClientHits) <= 0){ ?>

        <div class="form-group">
            <label><?php echo $second['name'] ?></label>
            <p><?php echo "não acertou nenhum número"?></p>
        </div>

        <?php }else{ ?>

        <div class="form-group">
        <label><?php echo $second['name'] ?></label>
        <p><?php echo $second['name'] . " acertou " . count($secondClientHits). " números! Os numeros acertados foram: ";?></p>
        <p><?php 
            foreach ($secondClientHits as $number) {
                echo strval($number) . "-";
            }
        ?></p>
        </div>

        <?php }?>

        <?php if (count($thirdClientHits) <= 0){ ?>

        <div class="form-group">
            <label><?php echo $third['name'] ?></label>
            <p><?php echo "não acertou nenhum número"?></p>
        </div>

        <?php }else{ ?>

        <div class="form-group">
        <label><?php echo $third['name'] ?></label>
        <p><?php echo $third['name'] . " acertou " . count($thirdClientHits). " números! Os numeros acertados foram: ";?></p>
        <p><?php 
            foreach ($thirdClientHits as $number) {
                echo strval($number) . "-";
            }
        ?></p>
        </div>

        <?php }?>

    </form>
</main>




<?php

//include __DIR__.'/includes/result.php';

include __DIR__.'/includes/footer.php';

