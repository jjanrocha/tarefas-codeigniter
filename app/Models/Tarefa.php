<?php

namespace App\Models;

use CodeIgniter\Model;

class Tarefa extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'tarefas';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = true;
	protected $protectFields        = true;
	protected $allowedFields        = ['tarefa', 'data_limite_conclusao'];

	// Dates
	protected $useTimestamps        = true;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';
	protected $deletedField         = 'deleted_at';

	// Validation
	protected $validationRules      = [
		'tarefa' => 'required|min_length[3]',
		'data_limite_conclusao' => 'required'
	];
	protected $validationMessages   = [
		'required' => 'O campo {field} é de preenchimento obrigatório.',
		'min_length' => 'O campo {field} deve possuir no mínimo {param} caracteres'
	];
	protected $skipValidation       = false;
	protected $cleanValidationRules = true;

	// Callbacks
	protected $allowCallbacks       = true;
	protected $beforeInsert         = [];
	protected $afterInsert          = [];
	protected $beforeUpdate         = [];
	protected $afterUpdate          = [];
	protected $beforeFind           = [];
	protected $afterFind            = [];
	protected $beforeDelete         = [];
	protected $afterDelete          = [];
}
