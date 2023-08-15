# Projeto Backend-CEP
Este projeto é uma API para gerenciamento de endereços utilizando a API ViaCEP.

### Tecnologias utilizadas
- Laravel Framework: v9.52.15
- PHP: v8.0.25
- Composer: Gerenciador de pacotes PHP
- MySQL
  
### Como executar o projeto
1. Clone o repositório
2. Navegue até o diretório do projeto
3. Instale as dependências com o Composer:
```bash
composer install
```
4. Crie um arquivo .env a partir do arquivo .env.example:
```bash
cp .env.example .env
```
5. Configure o arquivo .env com as informações do seu banco de dados:
```bash
DB_CONNECTION=mysql
DB_HOST=
DB_PORT=
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```
6. Gere uma chave para a aplicação:
```bash
php artisan key:generate
```
7. Execute as migrations para criar as tabelas no banco de dados:
```bash
php artisan migrate
```
8. Inicie o servidor:
```bash
php artisan serve
```
9. Acesse a aplicação em http://localhost:8000

## Endpoints

A API oferece as seuintes rotas:

- GET /api/addresses: Retorna uma lista paginada de endereços.
- GET /api/addresses/{id}: Retorna os detalhes de um endereço específico.
- POST /api/addresses: Cria um novo endereço com base em um CEP fornecido.
- PUT /api/addresses/{id}: Atualiza os detalhes de um endereço específico.
- DELETE /api/addresses/{id}: Exclui um endereço específico.

# Requisições na API

Você pode usar uma ferramenta como o Postman para testar as requisições na API.

- GET /api/addresses: Retorna a lista de endereços paginados.
- GET /api/addresses/{id}: Retorna os detalhes de um endereço específico.
- POST /api/addresses: Cria um novo endereço com base em um CEP fornecido. Envie um JSON no corpo da requisição com o seguinte formato:
```json
{
    "cep": "12345-678",
    "numero_casa": "123"
}
```
- PUT /api/addresses/{id}: Atualiza os detalhes de um endereço específico. Envie um JSON no corpo da requisição com o seguinte formato:
```json
{
    "cep": "12345-678",
    "numero_casa": "123"
}
```
- DELETE /api/addresses/{id}: Exclui um endereço específico.
  
# Status da resposta

A API retorna os seguintes status de resposta:

- 200 OK: Requisição bem-sucedida.
- 201 Created: Recurso criado com sucesso.
- 204 No Content: Requisição bem-sucedida, mas sem conteúdo para retornar (exemplo: após exclusão).
- 400 Bad Request: Erro na requisição (exemplo: dados inválidos).
- 404 Not Found: Recurso não encontrado.
- 409 Conflict: Conflito (exemplo: endereço já cadastrado).

# Licença
Este projeto está licenciado sob a Licença MIT 

# Autor 

[Anderson Franciscato](https://github.com/t3lo5)
