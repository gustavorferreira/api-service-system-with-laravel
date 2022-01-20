<h1 align="center">Sistema de controle financeiro via API com Laravel</h1>

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

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://user-images.githubusercontent.com/48185499/144947473-84c56550-2d8d-4532-adf5-697a849541c6.png" </a></p>

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
- Popule o banco de dados com fakes:

  - php artisan db:seed --class=RegistrationOriginSeeder &&
  - php artisan db:seed --class=StatusSeeder &&
  - php artisan db:seed --class=RevenueTypeSeeder &&
  - php artisan db:seed --class=ExpenseTypeSeeder &&
  - php artisan db:seed --class=PeopleSeeder &&
  - php artisan db:seed --class=PaymentSeeder &&
  - php artisan db:seed --class=UserSeeder &&
  - php artisan db:seed --class=RevenueSeeder &&
  - php artisan db:seed --class=ExpenseSeeder

- Configure sua varáivel ambiente `cp .env.example .env` e o banco de dados.
- Inicie o servidor Laravel `php artisan serve`
- Agora você pode acessar [`http://localhost:8000`](http://localhost:8000) do seu navegador.
- Veja as rotas de API `php artisan route:list`

## ⚡️ Saiba mais

Modelagem de Banco de Dados

<p align="center"><img src="https://user-images.githubusercontent.com/48185499/144934015-7183fae2-6d34-4bfc-a17e-43ee38acfbfc.png" width="400"></p>

## 📄 Licença

Esse projeto está sob a licença MIT.

---

Feito com ♥ by GRF 👋🏻
