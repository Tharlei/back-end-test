<p align="center">
 <img width="250" src="https://legado.focusconcursos.com.br/focus-online/skin/default/images/logo-color.png"/>
</p>

<p align="center">
  <img src="https://img.shields.io/static/v1?label=laravel&message=framework&color=orange&style=for-the-badge&logo=laravel"/>
  <img src="https://img.shields.io/static/v1?label=sqlite&message=use&color=blue&style=for-the-badge&logo=sqlite"/>
  <img src="https://img.shields.io/static/v1?label=Heroku&message=deploy&color=purple&style=for-the-badge&logo=heroku"/>
</p>

> Status do Projeto: :heavy_check_mark: (concluido)

### Tópicos 

:small_blue_diamond: [Descrição do projeto](#descrição-do-projeto)

:small_blue_diamond: [Funcionalidades](#funcionalidades)

:small_blue_diamond: [Deploy da Aplicação](#deploy-da-aplicação-dash)

:small_blue_diamond: [Pré-requisitos](#pré-requisitos)

## Descrição do projeto 

<p align="justify">
  API de produtos, projeto realizado para execução do teste para Focus Concursos
</p>

## Funcionalidades

:heavy_check_mark: Listagem de produtos 

:heavy_check_mark: Adição de produto  

:heavy_check_mark: Envio de e-mail ao adicionar produto

:heavy_check_mark: Edição de produto 

:heavy_check_mark: Exclusão de produto 

:heavy_check_mark: Buscar produto

:heavy_check_mark: Integração com API do Correios

:heavy_check_mark: Calculo de frete com produto

:heavy_check_mark: Testes de integração

## Deploy da Aplicação :dash:

> Link do deploy da aplicação: https://api-focus-concursos.herokuapp.com/api

> Link da documentação da API: https://app.swaggerhub.com/apis-docs/TharleiAleixo/focus_concursos/1.0#/

## Pré-requisitos

:warning: [Composer](https://getcomposer.org/)

## Como rodar a aplicação :arrow_forward:

No terminal, clone o projeto: 

```
git clone https://github.com/Tharlei/back-end-test
```

Ainda no terminal, entre na pasta:

```
cd back-end-test
```

Instale as dependências:

```
composer install
```

Copie o .env.example:

```
cp .env.example .env
```

Execute atualizações do banco

```
composer run db-remake
```

Por fim, inicie o projeto:

```
composer run dev
```

## Linguagens, dependências e libs utilizadas :books:

- [Laravel](https://laravel.com/)

## Desenvolvedor :octocat:

[<img src="https://avatars2.githubusercontent.com/u/32899049?s=460&u=946f73939bb511fa8ae40ed80764cc4dbffe359f&v=4" width=115><br><sub>Tharlei Aleixo</sub>](https://github.com/Tharlei)


## Licença 

The [MIT License]() (MIT)

Copyright :copyright: 2020 - back-end-test
