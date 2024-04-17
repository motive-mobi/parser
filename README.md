
# Backend Challenge 20230105

- [Apresentação] (https://coodesh.com/pt/assessments/project/8ba89fff-1917-4971-91ad-88f96c554839/presentation)

REST API para utilizar os dados do projeto Open Food Facts
 - Backend: Laravel versão 11.0
 - SGBD: MySQL versão 8.3.0
 - NodeJS: 18.17.1
 - npm: 9.6.7
 - docker versão 26.0.1

## Autor

- Alexandre Tucunduva | [@motive-mobi](https://www.github.com/motive-mobi)


## 🔗 Links
[![linkedin](https://img.shields.io/badge/linkedin-0A66C2?style=for-the-badge&logo=linkedin&logoColor=white)](https://www.linkedin.com/in/alexandre-tucunduva)


## Referências

- [Docker](https://www.docker.com/get-started/)


## Deploy

Comandos utilizados no deploy deste projeto:

### 1. Básico:

Clonando o repositório:
```bash
git clone git@github.com:motive-mobi/parser.git
```

Instalação das dependências do backend (ambiente *nix):
```bash
cd parser
cp .env.example .env
composer install
```
Editar as seguintes seções do arquivo .env para apontar corretamente o banco de dados criado no docker e setar a chave da API:
```bash
DB_CONNECTION=mysql
DB_HOST=meu_host
DB_PORT=3306
DB_DATABASE=minha_database
DB_USERNAME=meu_usuario
DB_PASSWORD=minha_senha
...
API_ACCESS_KEY="my_super_secret_key"
```
Dica para gerar a chave de acesso  a API (Copie e cole o resultado gerado na seção API_ACCESS_KEY do .env):
```bash
php artisan tinker
\Str::random(64)
```

Gerar a chave da aplicação:
```bash
php artisan key:generate
```

Migração das tabelas do banco de dados:
```bash
php artisan migrate
```

Iniciando a aplicação localmente:
```bash
php artisan serve
```

Após o deploy, os endpoints podem ser acessados via postman (ou similar) em:
http://localhost:8000/api/v1/

## 2. Docker (selecionar mysql como service):

Obs.: Alterar a variável DB_HOST do arquivo .env com o valor mysql
```bash
php artisan sail:install
./vendor/bin/sail up
./vendor/bin/sail artisan migrate
```
Após o deploy via docker, os endpoints podem ser acessados via postman (ou similar) em:
http://localhost/api/v1/

Configuração do Postman:

Adicionar o parâmetro x-api-key como chave e a chave de acesso gerada como valor, nas configurações de HEADERS
