<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\Tarefa;
use CodeIgniter\HTTP\Request;

class Tarefacontroller extends ResourceController
{
	private $tarefa;

	public function __construct()
	{
		helper(['form', 'url', 'session']);
		$this->session = \Config\Services::session();
		$this->tarefa = new Tarefa;
	}
	/**
	 * Return an array of resource objects, themselves in array format
	 *
	 * @return mixed
	 */
	public function index()
	{
		$tarefas = $this->tarefa->orderBy('id', 'desc')->findAll();
		return view('tarefas/index', compact('tarefas'));
	}

	/**
	 * Return the properties of a resource object
	 *
	 * @return mixed
	 */
	public function show($id = null)
	{
		$tarefa = $this->tarefa->find($id);
		if ($tarefa) {
			return view('tarefas/show', compact('tarefa'));
		} else {
			return redirect()->to('/tarefas');
		}
	}

	/**
	 * Return a new resource object, with default properties
	 *
	 * @return mixed
	 */
	public function new()
	{
		return view('tarefas/new');
	}

	/**
	 * Create a new resource object, from "posted" parameters
	 *
	 * @return mixed
	 */
	public function create()
	{
		//validação dos campos
		if (!$this->validate($this->tarefa->validationRules, $this->tarefa->validationMessages)) {
			return view('tarefas/new', [
				'validation' => $this->validator
			]);
		}

		//inserção da tarefa no banco de dados caso estejam dentro dos parâmetros
		$this->tarefa->save([
			'tarefa' => $this->request->getVar('tarefa'),
			'data_limite_conclusao'  => $this->request->getVar('data_limite_conclusao')
		]);

		return redirect()->to(base_url('/'));
	}

	/**
	 * Return the editable properties of a resource object
	 *
	 * @return mixed
	 */
	public function edit($id = null)
	{
		$tarefa = $this->tarefa->find($id);
		if ($tarefa) {
			return view('tarefas/edit', compact('tarefa'));
		} else {
			return redirect()->to('/tarefas');
		}
	}

	/**
	 * Add or update a model resource, from "posted" properties
	 *
	 * @return mixed
	 */
	public function update($id = null)
	{
		if (!$this->validate($this->tarefa->validationRules, $this->tarefa->validationMessages)) {
			return view('tarefas/edit/', [
				'id' => $id,
				'validation' => $this->validator
			]);
		}

		//atualização da tarefa no banco de dados caso estejam dentro dos parâmetros
		$this->tarefa->save([
			'id' => $id,
			'tarefa' => $this->request->getVar('tarefa'),
			'data_limite_conclusao'  => $this->request->getVar('data_limite_conclusao')
		]);

		return redirect()->to(base_url('/'));
	}

	/**
	 * Delete the designated resource object from the model
	 *
	 * @return mixed
	 */
	public function delete($id = null)
	{
		$this->tarefa->delete($id);
        return redirect()->to(base_url('/'));
	}
}
