# Series Control

O **Series Control** é uma aplicação desenvolvida para demonstrar minhas habilidades em CRUD, incluindo cadastro de usuários, autenticação, atualização de senha e gerenciamento de séries.

## Tecnologias Utilizadas

O projeto foi desenvolvido com as seguintes tecnologias:

- **Laravel** - Framework PHP para desenvolvimento web robustas e escaláveis
- **PHP** - Linguagem de programação para o backend da aplicação
- **Bootstrap** - Estilização rápida e responsiva
- **Eloquent** - ORM do Laravel para manipulação do banco de dados
- **PostgreSQL** - Banco de dados relacional para armazenar informações sobre séries
- **Blade** - Template engine nativa do Laravel para renderização de views

## Funcionalidades

- Cadastros de usuários
- Adicionar e remover séries
- Marcar episódios como assistidos

## Como Rodar o Projeto

### Requisitos:
- **PHP** (>=8.0) instalado  
- **Composer** instalado  
- **MySQL** ou outro banco de dados configurado  
- **Node.js** instalado (caso utilize Vite para o frontend)  

### Passos:

1. **Clone o repositório:**  
   ```bash
   git clone https://github.com/Murillou/series-control.git
   ```  

2. **Acesse a pasta do projeto:**  
   ```bash
   cd series-control
   ```  

3. **Instale as dependências do Laravel:**  
   ```bash
   composer install
   ```  

4. **Crie o arquivo de variáveis de ambiente:**  
   ```bash
   cp .env.example .env
   ```  
   Em seguida, edite o arquivo `.env` e configure as credenciais do banco de dados.  

5. **Gere a chave da aplicação:**  
   ```bash
   php artisan key:generate
   ```  

6. **Execute as migrações do banco de dados:**  
   ```bash
   php artisan migrate
   ```  

7. **Inicie o servidor de desenvolvimento:**  
   ```bash
   php artisan serve
   ```  

O projeto estará disponível em `http://127.0.0.1:8000`.  

Desenvolvido com 💙 por [Murillo Vinícius](https://github.com/Murillou)





