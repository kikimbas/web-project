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
                        <h1 class="fw-bolder mb-1">Контакты</h1>
                        <!-- Post categories-->
                        <a class="badge bg-secondary text-decoration-none link-light" href="#!">Тестовое задание</a>
                        <a class="badge bg-secondary text-decoration-none link-light" href="#!">Web-программиста(PHP)</a>
                    </header>
                    <!-- Post content-->
                    <section class="mb-5">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif


                        @if ($errors->any())
                            <div class="alert alert-danger" role="alert">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error  }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif


                        <form method="post" action="{{ route('update') }}">
                            @csrf
                            <div class="card mb-4">
                                <div class="card-header">Редактировать</div>
                                <div class="card-body">
                                    <div class="input-group">
                                        <h2 class="fw-bolder">Список контактов пользователя</h2>
                                        @foreach($contacts as $contact)
                                            <div class="w-100">
                                                <p class="fs-5 mb-4">
                                                    <span>{{$contact->name}}:</span>
                                                    <input name="{{$contact->code}}" class="form-control" type="text" value="{{  $filledContacts[$contact->id]->getAttributes()['value'] }}">
                                                    <br/>
                                                    <span>Приватное?</span> <input type="checkbox" name="is_private_{{$contact->code}}" @if($filledContacts[$contact->id]->getAttributes()['is_private'] === 1) checked @endif>
                                                </p>
                                            </div>
                                        @endforeach
                                    </div>
                                    <p class="fs-5 mb-4"><button type="submit" class="btn btn-primary">Сохранить</button></p>
                                </div>
                            </div>
                        </form>
                    </section>
                </article>
            </div>

        </div>
    </div>
@endsection