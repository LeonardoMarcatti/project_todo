<?php

namespace App\Models;

use CodeIgniter\Model;

class TarefasModel extends Model
{
    protected $table = 'tarefas';
    protected $allowedFields = ['descricao', 'status_id'];

    public function getTarefas(int|null $status)
    {
      if ($status != 0) {
        return $this->select(['descricao', 'id'])->where('status_id', $status)->get()->getResultArray();
      }

      return $this->select(['descricao', 'id'])->where('status_id', 1)->get()->getResultArray();
    }

    public function deleteTarefa(int $id)
    {
      return $this->set('status_id', 3)->where('id', $id)->update();
    }

    public function updateTarefa(int $id)
    {
      return $this->set('status_id', 2)->where('id', $id)->update();
    }

    public function editTarefa(int $id, string $txt)
    {
      return $this->set('descricao', $txt)->where('id', $id)->update();
    }

    public function refazer(int $id)
    {
      return $this->set('status_id', 1)->where('id', $id)->update();
    }
}