<?= $this->extend('layouts/basico');
$this->section('title') ?> Criar Nova Tarefa <?= $this->endSection()
                                                ?>
<?= $this->section('content') ?>

<div class="container">
    <?php $validation = \Config\Services::validation(); ?>
    <div class="row justify-content-center">
        <div class="col-md-8 mt-4">
            <div class="card">
                <div class="card-header">Adicionar tarefa</div>
                <div class="card-body">
                    <form method="POST" action="<?= base_url('tarefas') ?>">
                        <?= csrf_field() ?>
                        <div class="mb-3">
                            <label class="form-label">Tarefa</label>
                            <input type="text" name="tarefa" class="form-control <?php if ($validation->getError('tarefa')) : ?>is-invalid<?php endif ?>" value="<?php echo set_value('tarefa'); ?>">
                            <?php if ($validation->getError('tarefa')) : ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('tarefa') ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Data limite conclusão</label>
                            <input type="date" name="data_limite_conclusao" class="form-control <?php if ($validation->getError('data_limite_conclusao')) : ?>is-invalid<?php endif ?>" value="<?php echo set_value('data_limite_conclusao'); ?>">
                            <?php if ($validation->getError('data_limite_conclusao')) : ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('data_limite_conclusao') ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <button type="submit" class="btn btn-secondary">Cadastrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection() ?>