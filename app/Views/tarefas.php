<aside>
  <div>
    <div>
      <?= session()->getFlashdata('error') ?>
      <?= service('validation')->listErrors() ?>
      <form action="list" method="get">
        <?= csrf_field() ?>
        <div class="mb-3">
          <label for="status" class="form-label">Status</label>
          <select name="status" id="status" class="form-control">
          <option value="0">Selecione</option>
            <?php
              foreach ($status as $key => $value) { ?>
                <option value="<?=esc($value['id'])?>"><?=esc($value['status'])?></option>
            <?php };
            ?>
          </select>
        </div>
        <div class="mb-3">
          <button type="submit" class="btn btn-danger">Buscar Tarefas</button>
        </div>
      </form>
    </div>
    <div>
      <form action="create" method="post">
        <?= csrf_field() ?>
        <div class="mb-3">
          <label for="descricao" class="form-label">Tarefa:</label>
          <textarea name="descricao" id="descricao" cols="30" rows="10" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
          <button type="submit" class="btn btn-danger">Criar Tarefa</button>
        </div>
      </form>
    </div>
  </div>
</aside>
<main>
  <section>
    <div>
      <h3>Lista de Tarefas</h3>
      <?php
        if (count($tarefas) > 0) { ?>
          <table>
            <thead>
              <tr>
                <th>Lista de tarefas</th>
              </tr>
            </thead>
            <tbody>
          <?php
            foreach ($tarefas as $key => $tarefa) { ?>
              <tr>
                <td><?=$tarefa['descricao']?></td>
                <td>Editar</td>
                <td>Deletar</td>
              </tr>
        <?php  }; ?>
          </tbody>
        </table>
        <?php } else { ?>
          <p>Não há tarefas cadastradas no momento</p>
        <?php }; ?>
    </div>
  </section>
</main>