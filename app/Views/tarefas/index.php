<?= $this->extend('layouts/basico');
$this->section('title') ?> Tarefas <?= $this->endSection()
                                    ?>
<?= $this->section('content') ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-4">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            Tarefas
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tarefa</th>
                                <th>Data Limite para Conclusão</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (count($tarefas) > 0) :
                                foreach ($tarefas as $tarefa) : ?>
                                    <tr>
                                        <td><?= $tarefa['id'] ?></td>
                                        <td><?= $tarefa['tarefa'] ?></td>
                                        <td><?= date('d/m/Y', strtotime($tarefa['data_limite_conclusao'])) ?></td>
                                        <td class="d-flex">
                                            <a href="<?= base_url('tarefas/' . $tarefa['id']) ?>" class="btn btn-sm btn-info mx-1" title="Show"><i class="bi bi-info-square"></i></a>
                                            <a href="<?= base_url('tarefas/edit/' . $tarefa['id']) ?>" class="btn btn-sm btn-success mx-1" title="Edit"><i class="bi bi-pencil-square"></i></a>
                                            <form class="display-none" method="post" action="<?= base_url('tarefas/' . $tarefa['id']) ?>" id="tarefaDeleteForm<?= $tarefa['id'] ?>">
                                                <input type="hidden" name="_method" value="DELETE" />
                                                <a href="javascript:void(0)" onclick="deleteTarefa('tarefaDeleteForm<?= $tarefa['id'] ?>')" class="btn btn-sm btn-danger" title="Delete"><i class="bi bi-trash"></i></a>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach;
                            else : ?>
                                <tr rowspan="1">
                                    <td colspan="4">
                                        <h6 class="text-danger text-center">Nenhuma tarefa encontrada</h6>
                                    </td>
                                </tr>
                            <?php endif ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function deleteTarefa(formId) {
        var confirm = window.confirm('Tem certeza que deseja excluir essa tarefa?');
        if(confirm == true) {
            document.getElementById(formId).submit();
        }
    }
</script>
<?= $this->endSection() ?>