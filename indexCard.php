<?php

use App\models\Card;

include 'config/database.php';

require __DIR__.'/vendor/autoload.php';

include __DIR__.'/includes/header.php';

?>

<main>
    <table>
        <tr>
            <td>
            <section>
                <a href="index.php">
                    <button class="btn btn-success">Voltar</button>
                </a>
            </section>
            </td>
            <td>
            <section>
                <a href="manageCard.php">
                    <button class="btn btn-success">Cadastrar</button>
                </a>
            </section>
            </td>
        </tr>
    </table>
</main>

<?php

$database = new Database();
$db = $database->getConnection();

$card = new Card($db);

$teste = $card->getAll();

var_dump($teste);

include __DIR__.'/includes/footer.php';
