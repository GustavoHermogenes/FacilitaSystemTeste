# *Facilita System*

Uma aplicação web desenvolvida com Laravel, PHP, Bootstrap, HTML, CSS e MySQL.

## *Índice*
- [Sobre](#sobre)
- [Pré-requisitos](#pré-requisitos)
- [Instalação](#instalação)
- [Uso](#uso)
- [Autor](#autor)

## *Sobre*
Facilita System é uma aplicação web simples que oferece funcionalidades como sistema de login, cadastro de usuários, autenticação CSRF, e gerenciamento de atividades. O sistema permite que usuários e examinadores realizem tarefas específicas, com uma interface objetiva e focada na usabilidade.

### *Funcionalidades Principais:*
- *Login*: Verifica se o e-mail está registrado e se o usuário está ativo.
- *Cadastro*: Permite criar novos registros de usuários no banco de dados.
- *Autenticação*: Utiliza o método CSRF para proteção.
- *Gerenciamento de Atividades*: Criação, edição e exclusão de atividades.
- *Dashboard do Examinador*: Examinadores podem gerenciar tarefas e usuários.
- *Visualização de Atividades*: Interface para ver atividades respondidas ou em andamento.
  
A interface foi projetada com um design simples e utiliza predominantemente a cor azul, em alinhamento com a identidade visual da empresa.

## *Pré-requisitos*
Antes de utilizar o projeto, certifique-se de que sua máquina possui os seguintes itens instalados:

- *Laravel* >= 8.1
- *Composer*
- *MySQL*

## *Instalação*

### 1. Clonar o repositório
bash
git clone https://github.com/GustavoHermogenes/FacilitaSystemTeste.git


### 2. Entrar na pasta do projeto
`cd FacilitaSystemTest`


### 3. Instalar as dependências do Composer
bash
composer install


### 4. Configurar a conexão com o banco de dados
Crie um banco de dados no MySQL e configure a conexão no arquivo .env do projeto, conforme as credenciais do seu banco de dados.

### 5. Executar as migrações
bash
php artisan migrate


### 6. Executar o servidor de desenvolvimento
bash
php artisan serve


Agora, você pode acessar a aplicação no seu navegador em http://localhost:8000.

## *Uso*
A utilização da aplicação é simples e intuitiva. Recomenda-se o seguinte fluxo de uso:

1. *Cadastro de Examinador*: Crie um examinador. Após o cadastro, você será redirecionado ao dashboard do examinador, onde poderá criar tarefas.
2. *Login como Usuário*: Faça logout e entre novamente, agora como um usuário. O usuário poderá responder às tarefas e visualizar as tarefas respondidas ou em andamento.
3. *Gerenciamento de Usuários*: Volte ao dashboard do examinador para visualizar e gerenciar os usuários. Você pode ativar ou inativar usuários conforme necessário.

> *Nota:* Como parte do escopo do trabalho, não foi implementada a edição de perfil do usuário, nem a verificação de e-mails duplicados. Para sistemas de login em produção, essas verificações são recomendadas.

## *Autores*
- *Gustavo Hermogenes* - [GitHub](https://github.com/GustavoHermogenes)

---

Obrigado por utilizar o Facilita System! Desejamos uma ótima experiência.
