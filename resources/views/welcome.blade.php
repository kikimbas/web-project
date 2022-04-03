@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-8">
            <!-- Post content-->
            <article>
                <!-- Post header-->
                <header class="mb-4">
                    <!-- Post title-->
                    <h1 class="fw-bolder mb-1">Добро пожаловать в тестовое задание</h1>
                    <!-- Post categories-->
                    <a class="badge bg-secondary text-decoration-none link-light" href="#!">Тестовое задание</a>
                    <a class="badge bg-secondary text-decoration-none link-light" href="#!">Web-программиста(PHP)</a>
                </header>
                <!-- Post content-->
                <section class="mb-5">
                    <h2 class="fw-bolder">Список контактов пользователя</h2>
                    @foreach($contacts as $contact)
                        @if($filledContacts[$contact->id]->getAttributes()['is_private'] !== 1)
                        <p class="fs-5 mb-4"><span>{{$contact->name}}:</span> {{  $filledContacts[$contact->id]->getAttributes()['value'] }}</p>
                        @endif
                    @endforeach
                    <p class="fs-5 mb-4"><a href="{{ route('edit')  }}">Редактировать</a></p>
                    <p class="fs-5 mb-4"><a href="{{ route('add')  }}">Добавить</a></p>
                </section>
            </article>
        </div>
        <!-- Side widgets-->
        <div class="col-lg-4">
            <!-- Search widget-->
            {{--<div class="card mb-4">--}}
                {{--<div class="card-header">Search</div>--}}
                {{--<div class="card-body">--}}
                    {{--<div class="input-group">--}}
                        {{--<input class="form-control" type="text" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search">--}}
                        {{--<button class="btn btn-primary" id="button-search" type="button">Go!</button>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            <!-- Categories widget-->
            <div class="card mb-4">
                <div class="card-header">Быстрые ссылки</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <ul class="list-unstyled mb-0">
                                <li>
                                    <a href="{{route('favorite')}}">Избранные контакты</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-sm-6">
                            <ul class="list-unstyled mb-0">
                                {{--<li><a href="#!">JavaScript</a></li>--}}
                                {{--<li><a href="#!">CSS</a></li>--}}
                                {{--<li><a href="#!">Tutorials</a></li>--}}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Side widget-->
            <div class="card mb-4">
                <div class="card-header">ТЗ</div>
                <div class="card-body">Часть 1. Работа с пользователем

                    1) Создание системы регистрации пользователя в проекте (кол-во
                    информации о пользователе

                    не важно)

                    2) Создание системы авторизации пользователя в проекте

                    3) Создание закрытой части проекта, доступной только после авторизации

                    4) Незарегистрированным пользователям доступна только страница
                    регистрации/

                    авторизации.

                    Часть 2. Создание контактов в системе (общие и личные)

                    1) Необходимо придумать и разместить на главной странице проекта
                    произвольный «общий

                    список контактов», который будет доступен каждому авторизованному
                    пользователю в системе.

                    (достаточно заполнить 10-15 произвольных контактов)

                    2) Добавить возможность сохранения в личные контакты пользователя
                    контактов из общего

                    списка (раздел избранное)

                    Результатом выполнения всех частей ТЗ должны стать

                    - Система авторизации/регистрации пользователя и страница авторизации
                    (регистрации)

                    - Главная страница с общим списком контактов (10-15 контактов) - должна
                    отображаться одинаково для всех авторизованных пользователей

                    - Раздел избранных контактов пользователя - должен быть разным для
                    каждого авторизованного пользователя.</div>
            </div>
        </div>
    </div>
</div>
@endsection