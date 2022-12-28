1 - CRIAÇÃO DO BANCO DE DADOS MySQL
  1.1 - Procure ter certeza de que não exista um banco de dados com o nome todo_leonardo em seu sistema.
  Caso exista você será instruído a mudar algumas variáveis de ambiente tanto no arquivo banco.sql quanto nos arquivos de configuração do CodeIgnite 4;

  1.2 - Caso necessite de mudanças no nome do banco - todo_leonardo - altere o tópico 1.4.4 e no arquivo banco.sql altere o nome do banco

  1.3 - Abra o arquivo project_todo/Config/App.php e altere as linhas:
    A - $baseURL = 'url da pasta public' Ex: 'ip_server/teste-todo-list/project_todo/public/'
    B - $appTimezone = 'America/Sao_Paulo';

  1.4 - Edite o arquivo .env 
    1.4.1 - CI_ENVIROMENT = 'development'
    1.4.2 - app.baseURL = 'ip_server/teste-todo-list/project_todo/public/'
    1.4.3 - database.default.hostname = localhost
    1.4.4 - database.default.database = todo_leonardo
    1.4.5 - database.default.username = seu_usuario
    1.4.6 - database.default.password = sua_senha

