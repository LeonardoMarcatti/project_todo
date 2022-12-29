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
        return $this->select('descricao')->where('status_id', $status)->get()->getResultArray();
      }

      return $this->select('descricao')->where('status_id', 1)->get()->getResultArray();
    }
}