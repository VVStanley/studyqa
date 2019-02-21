@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <ul class="nav nav-pills card-header-pills">
                            <li class="nav-item">
                                <div class="nav-link">Пользователи</div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('user.create') }}">Создать</a>
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
                            @forelse($users as $user)
                                <li class="list-group-item">
                                    <span class="lead">{{ $user->name . '; роль - ' . config('helpers.role')[$user->role] }}</span>
                                    <form action="{{ route('user.destroy', $user->id) }}" method="post" class="float-right">
                                        <input name="_method" type="hidden" value="DELETE">
                                        {{ csrf_field() }}
                                        <button type="submit" class=" btn btn-danger">Удалить</button>
                                    </form>

                                </li>
                            @empty
                                <li class="list-group-item">нет пользователей</li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection