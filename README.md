<h3>Задание:</h3>
<h4>
Реализовать следующую задачу на Yii2 advanced app, а также спроектировать БД:
    
1) Нужно хранить данные о пользователях: имя, фамилия, емайл, номер телефона,
статус, рейтинг, дату регистрации, дату последнего действия на сайте.
2) О статусах пользователей(подал заявку, зарегистрирован, подтверждён,
одобрен, особый) хранить данные: название статуса, право отправлять сообщения,
право публиковать информацию, право просматривать информацию.
3) Данные о совершённых действиях пользователей: оценка (баллы от 1 до 10),
дата совершения, цель, тип, продолжительность. 
4) Вывести на странице данные о 10 первых пользователях (имя, фамилию,
количество действий пользователя с оценкой не ниже 7, количество действий
пользователя с оценкой ниже 7) из результатов сортировки согласно условиям:
статус не ниже "одобрен", сортировать следующим образом - чем выше оценка действий
и больше их, тем выше в списке.
</h4>

<h4>
Что сделано:
    
1) Созданы три миграции для создания таблиц в базе данных
2) Созданы три модели актив рекордс в папке common/models: Users, Statuses, Actions
3) Создан контроллер в папке frontend/controllers: ShowController для вывода данных из таблиц
</h4>
<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Yii 2 Advanced Project Template</h1>
    <br>
</p>

Yii 2 Advanced Project Template is a skeleton [Yii 2](http://www.yiiframework.com/) application best for
developing complex Web applications with multiple tiers.

The template includes three tiers: front end, back end, and console, each of which
is a separate Yii application.

The template is designed to work in a team development environment. It supports
deploying the application in different environments.

Documentation is at [docs/guide/README.md](docs/guide/README.md).

[![Latest Stable Version](https://img.shields.io/packagist/v/yiisoft/yii2-app-advanced.svg)](https://packagist.org/packages/yiisoft/yii2-app-advanced)
[![Total Downloads](https://img.shields.io/packagist/dt/yiisoft/yii2-app-advanced.svg)](https://packagist.org/packages/yiisoft/yii2-app-advanced)
[![Build Status](https://travis-ci.org/yiisoft/yii2-app-advanced.svg?branch=master)](https://travis-ci.org/yiisoft/yii2-app-advanced)

DIRECTORY STRUCTURE
-------------------

```
common
    config/              contains shared configurations
    mail/                contains view files for e-mails
    models/              contains model classes used in both backend and frontend
    tests/               contains tests for common classes    
console
    config/              contains console configurations
    controllers/         contains console controllers (commands)
    migrations/          contains database migrations
    models/              contains console-specific model classes
    runtime/             contains files generated during runtime
backend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains backend configurations
    controllers/         contains Web controller classes
    models/              contains backend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for backend application    
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
frontend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains frontend configurations
    controllers/         contains Web controller classes
    models/              contains frontend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for frontend application
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
    widgets/             contains frontend widgets
vendor/                  contains dependent 3rd-party packages
environments/            contains environment-based overrides
```
