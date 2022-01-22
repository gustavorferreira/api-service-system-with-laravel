<h1 align="center">Sistema de cadastro via API com Laravel | Clean Code and SOLID</h1>

<p align="center">
  <a href="#-tecnologias">Tecnologias</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
  <a href="#-projeto">Projeto</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
  <a href="#-como-executar">Como executar</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
  <a href="#-saiba-mais">Saiba mais</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
  <a href="#-licença">Licença</a>
</p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

<p align="center">
    <a href="https://laravel.com" target="_blank"><img src="https://user-images.githubusercontent.com/48185499/150372342-47c64427-71a3-4c97-8681-03ba9dd1206d.gif" </a></p>

## ✨ Tecnologias

Esse projeto foi desenvolvido com as seguintes tecnologias:

- [Laravel](https://laravel.com/)

## 💻 Projeto

O Web Service feito com Framework Laravel que simula uma API de Controle Financeiro, onde o usuário Lança suas Receitas e Despesas.


## 🚀 Como executar

Pré requisitos para executar o projeto:

- Servidor Web
- PHP >= 7.2.0, com as seguintes extensões:
    - BCMath PHP
    - Ctype PHP
    - JSON PHP
    - Mbstring PHP
    - OpenSSL PHP
    - PDO PHP
    - PGSQL PHP
    - Tokenizer PHP
    - XML PHP
- Composer
- Postgres >= 12

- Instale as dependências com `composer install`
- Crie o banco de dados com `php artisan migrate`

- Configure sua varáivel ambiente `cp .env.example .env` e o banco de dados.
- Inicie o servidor Laravel `php artisan serve`
- Agora você pode acessar [`http://localhost:8000`](http://localhost:8000/api) do seu navegador.
- Veja as rotas de API `php artisan route:list` (http://127.0.0.1:8000/api/register | http://127.0.0.1:8000/api/43054241696)
- Campos obrigatórios:
    
            'first_name' => 'required',
            'last_name' => 'required',
            'cpf' => 'required|max:11',
            'date_birth' => 'required',
            'genre' => 'required|max:1',
            'natioal_code' => 'required|max:2',
            'ddd_code' => 'required|max:2',
            'phone_number' => 'required|max:9',
            'email' => 'required|email',
            'city' => 'required',
            'district' => 'required',
            'uf' => 'required|max:2',
            'county' => 'required',
            'zip_code' => 'required|max:8'
    
## ⚡️ Saiba mais

Modelagem de Banco de Dados

<p align="center">
    <img src="https://user-images.githubusercontent.com/48185499/150406251-bb07381a-0985-4d1e-85c2-de25e51bffe7.png" width="400">
</p>

## 📄 Licença

Esse projeto está sob a licença MIT.

---

Feito com ♥ by GRF 👋🏻
