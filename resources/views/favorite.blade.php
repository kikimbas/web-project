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
                        <h1 class="fw-bolder mb-1">Избранные контакты</h1>
                        <!-- Post categories-->
                        <a class="badge bg-secondary text-decoration-none link-light" href="#!">Тестовое задание</a>
                        <a class="badge bg-secondary text-decoration-none link-light" href="#!">Web-программиста(PHP)</a>
                    </header>
                    <!-- Post content-->
                    <section class="mb-5">
                        <h2 class="fw-bolder">Список контактов пользователя</h2>
                        @foreach($contacts as $contact)
                            @if($filledContacts[$contact->id]->getAttributes()['is_private'] === 1)
                                <p class="fs-5 mb-4"><span>{{$contact->name}}:</span> {{  $filledContacts[$contact->id]->getAttributes()['value'] }}</p>
                            @endif
                        @endforeach
                        <p class="fs-5 mb-4"><a href="{{ route('edit')  }}">Редактировать</a></p>
                    </section>
                </article>
            </div>
        </div>
    </div>
@endsection