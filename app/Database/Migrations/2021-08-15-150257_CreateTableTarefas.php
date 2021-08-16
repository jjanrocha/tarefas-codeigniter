<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableTarefas extends Migration
{
	public function up()
	{
		//criação do id da tabela
		//há uma exceção para a criação de campos id, automaticamente são definidos como int(g), auto_increment e primary key
		$this->forge->addField('id');

		//criação dos demais campos da tabela tarefas
		$this->forge->addField([
			'tarefa' => [
				'type' => 'VARCHAR',
				'constraint' => 120
			],
			'data_limite_conclusao' => [
				'type' => 'VARCHAR',
				'constraint' => 20
			],
			'created_at datetime default current_timestamp',
            'updated_at datetime',
			'deleted_at datetime'
		]);

		//criação da tabela tarefas
		$this->forge->createTable('tarefas');

	}

	public function down()
	{
		$this->forge->dropTable('tarefas', true);
	}
}
