<?= $this->extend('layouts/basico');
$this->section('title') ?> Exibir Tarefa <?= $this->endSection()
                                            ?>
<?= $this->section('content') ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-4">
            <div class="card">
                <div class="card-header"><?= $tarefa['tarefa'] ?></div>

                <div class="card-body">
                    <fieldset disabled>
                        <div class="mb-3">
                            <label class="form-label">Data limite conclusão</label>
                            <input type="date" value="<?= $tarefa['data_limite_conclusao'] ?>">
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>