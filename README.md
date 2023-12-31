# Sistema de Busca de CEP

Este é um sistema de busca de CEP que consiste em um frontend Vue.js e um backend Laravel. Ele permite cadastrar, editar, excluir e buscar endereços por CEP e logradouro.

## Pré-requisitos

Antes de começar, você precisará ter o Git, Node.js, Composer e PHP instalados em seu sistema.

## Clonando o Repositório

```bash
# Clone o repositório
git clone https://github.com/SEU-USUARIO/sistema-busca-cep.git

# Acesse o diretório do projeto
cd sistema-busca-cep
```

# Backend

## Instalando as Dependências
```bash
   # Acesse o diretório do backend
cd backend

# Instale as dependências do Laravel
composer install
```

## Configurando o Ambiente
1. Crie um arquivo .env no diretório backend e configure as informações do banco de dados.

2. Gere uma nova chave de aplicativo:
```bash
php artisan key:generate
```
1. Execute os seguintes comandos para criar a estrutura da base de dados
```bash
php artisan migrate
```

## Iniciando o Servidor
```bash
# Inicie o servidor de desenvolvimento do Laravel
php artisan serve
```

# Frontend

## Instalando as Dependências
```bash
# Acesse o diretório do frontend
cd frontend

# Instale as dependências do Vue.js
npm install
```

## Configurando a API
1. Abra o arquivo src/services/api.js e ajuste a URL da API de acordo com o seu ambiente:
```javascript
const api = axios.create({
  baseURL: 'http://localhost:8000/api'
})
```

## Iniciando o Frontend
```bash
# Inicie o servidor de desenvolvimento do Vue.js
npm run serve
```

## Acessando o Sistema
- Backend: http://localhost:8000
- Frontend: http://localhost:8080

# Imagens do Projeto
- Home
  ![image](https://github.com/T3lo5/desafio-cep/assets/72330142/cad5fb29-ad2e-4458-ad48-a3a6e8604ea0)
- Listagem de endereços
  ![image](https://github.com/T3lo5/desafio-cep/assets/72330142/43633aee-ab29-469f-810e-f0c4c2d45294)
- Edição
  ![image](https://github.com/T3lo5/desafio-cep/assets/72330142/a7cb294b-847c-492c-a4b5-6b4837de5470)
- Cadastro
  ![image](https://github.com/T3lo5/desafio-cep/assets/72330142/91a6ba7b-5ab9-4514-b3c6-80f2485a825a)
- Exclusão
  ![image](https://github.com/T3lo5/desafio-cep/assets/72330142/d6d113be-2e34-46bf-9c95-f3610a0e9e28)

# Contribuição 

Contribuições são sempre bem-vindas! Para contribuir, por favor, siga estas etapas:
1. Bifurque este repositório;
2. Crie um branch com seu recurso: `git checkout -b meu-recurso`;
3. Faça o commit de suas alterações: `git commit -m 'Adicionando um recurso incrível'`;
4. Faça o push para o branch: `git push origin meu-recurso`.
5. Envie uma pull request no GitHub.
   
# Licença
[MIT](https://choosealicense.com/licenses/mit/)

# Autor
Feito por [Anderson Franciscato](
https://www.linkedin.com/in/andersonwsf)!

   
