<?php

namespace App\Controllers;
use App\Models\TarefasModel;
use App\Models\StatusModel;

class PagesController extends BaseController
{
    private ?array $data;

    private function getStatusList()
    {
        $statusModel = \model(StatusModel::class);
        $this->data['status'] = $statusModel->index();
    }

    public function index()
    {
        if (! is_file(APPPATH . 'Views/tarefas.php')) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Tarefas');
        };
        
        $statusID = filter_input(\INPUT_GET, 'status', \FILTER_SANITIZE_NUMBER_INT);

        $tarefasModel = \model(TarefasModel::class);
        $this->data['tarefas'] = $tarefasModel->getTarefas($statusID);
        $this->getStatusList();
        return view('Views/templates/header') . view('Views/tarefas', $this->data) . view('Views/templates/footer');
    }

    public function create()
    {
        if ($this->request->getMethod() === 'post' && $this->validate(
            ['descricao' => 'required'])) {

            $create = model(TarefasModel::class);
            $create->save(['descricao' => $this->request->getPost('descricao'), 'status_id' => 1]);
            return redirect()->to('/');
        }
    }

    public function delete()
    {
        $id = filter_input(\INPUT_GET, 'id', \FILTER_SANITIZE_NUMBER_INT);
        $delete = \model(TarefasModel::class);
        $delete->deleteTarefa($id);
        return redirect()->to('/');
    }

    public function update()
    {
        $id = filter_input(\INPUT_GET, 'id', \FILTER_SANITIZE_NUMBER_INT);
        $update = \model(TarefasModel::class);
        $update->updateTarefa($id);
        return redirect()->to('/');
    }

    public function editar()
    {
        if ($this->request->getMethod() === 'post' && $this->validate(['editText' => 'required'])) {
            $id = \intval(filter_input(\INPUT_GET, 'id', \FILTER_SANITIZE_NUMBER_INT));
            $txt = $this->request->getPost('editText');
            $edit = \model(TarefasModel::class);
            $edit->editTarefa($id, $txt);
            return redirect()->to('/');
        }
    }
}
