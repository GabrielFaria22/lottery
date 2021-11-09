<main>
    <section>
        <a href="index.php">
            <button class="btn btn-success">voltar</button>
        </a>
    </section>
    <h2 class="mt-3">Cadastrar loteria</h2>
    <form target="result.php" action="result.php" method="post">
        <div class="form-group">
            <label>Nome da Loteria</label>
            <input type="text" class="form-control" name="name">
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