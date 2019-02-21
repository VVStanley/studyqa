@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <ul class="nav nav-pills card-header-pills">
                            <li class="nav-item">
                                <div class="nav-link">Мероприятия</div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('meeting.create') }}">Создать</a>
                            </li>
                        </ul>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <ul class="list-group">
                            @forelse($meetings as $meeting)
                                <li class="list-group-item">
                                    <span class="lead">{{ $meeting->name . '; Организатор - ' . $meeting->user()->first()->name }}</span>
                                    <form action="{{ route('meeting.destroy', $meeting->id) }}" method="post" class="float-right">
                                        <input name="_method" type="hidden" value="DELETE">
                                        {{ csrf_field() }}
                                        <button type="submit" class=" btn btn-danger">Удалить</button>
                                    </form>

                                </li>
                            @empty
                                <li class="list-group-item">нет мероприятий</li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection