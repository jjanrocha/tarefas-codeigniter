<?= $this->extend('layouts/basico');
$this->section('title') ?> Exibir Tarefa <?= $this->endSection()
                                            ?>
<?= $this->section('content') ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-4">
            <div class="card">
                <div class="card-header">Editar</div>

                <div class="card-body">
                    <form method="post" action="<?= base_url('/tarefas/' . $tarefa['id']) ?>">
                        <?= csrf_field() ?>
                        <input type="hidden" name="_method" value="PUT" />
                        <div class="mb-3">
                            <label class="form-label">Tarefa</label>
                            <input type="text" class="form-control" name="tarefa" value="<?= $tarefa['tarefa'] ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Data limite conclusão</label>
                            <input type="date" class="form-control" name="data_limite_conclusao" value="<?= $tarefa['data_limite_conclusao'] ?>">
                        </div>
                        <button type="submit" class="btn btn-secondary">Atualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<?= $this->endSection() ?>