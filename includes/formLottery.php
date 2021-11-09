<script type='text/javascript' src='https://code.jquery.com/jquery-1.11.0.js'></script>
<script type='text/javascript' src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
<main>
    <br>
    <section>
        <a href="index.php">
            <button class="btn btn-success">voltar</button>
        </a>
    </section>
    <h2 class="mt-3">Loteria</h2>
    <form target="result.php" action="result.php" method="post">
        <div class="form-group">
            <label>Nome da Loteria</label>
            <input type="text" class="form-control" name="name">
        </div>

        <div class="form-group">
            <label>Data da loteria</label>
            <!-- <input data-provide="datepicker" name="date"> -->
            <input type="date" class="form-control" data-inputmask="'alias': 'date'" name="date">
        </div>

        <div class="form-group">
            <label>Número inicial</label>
            <input type="text" class="form-control" name="firstNum">
        </div>

        <div class="form-group">
            <label>Número final</label>
            <input type="text" class="form-control" name="lastNum">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-success">
                Enviar
            </button>
        </div>
    </form>
</main>

<script src="../javascript/formLottery.js"></script>
<link href="../css/formLottery.css" rel="stylesheet">