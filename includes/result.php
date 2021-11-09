<main>
    <section>
        <a href="draw.php">
            <button class="btn btn-success">Novo</button>
        </a>
    </section>
    <h2 class="mt-3">Resultado</h2>
    <form method="post">
        <div class="form-group">
            <label>Nome da Loteria</label>
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