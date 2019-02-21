@extends('layouts.admin')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <ul class="nav nav-pills card-header-pills">
                            <li class="nav-item">
                                <div class="nav-link">Галерея</div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('gallery.create') }}">Создать</a>
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
                            @forelse($galleries as $gallery)
                                <li class="list-group-item flex-wrap">
                                    <img src="/uploads/{{ $gallery->image }}" alt="" width="10%" class="rounded float-left img-thumbnail">
                                    <form action="{{ route('gallery.destroy', $gallery->id) }}" method="post" class="float-right">
                                        <input name="_method" type="hidden" value="DELETE">
                                        {{ csrf_field() }}
                                        <button type="submit" class=" btn btn-danger">Удалить</button>
                                    </form>
                                </li>
                            @empty
                                <li class="list-group-item">нет картинок</li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection