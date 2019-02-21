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
                                <a class="nav-link" href="{{ route('meeting') }}">Список</a>
                            </li>
                        </ul>
                    </div>

                    <div class="card-body">

                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @include('partials.errors')

                        <form action="{{ route('meeting.store') }}" method="post">
                            <div class="form-group row">
                                <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" class="form-control" id="inputName" value="{{ old('name') }}" placeholder="name" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputUser" class="col-sm-2 col-form-label">Организатор</label>
                                <div class="col-sm-10">
                                    <select name="user_id" class="form-control" id="inputUser" required>
                                        @foreach($organizers as $organizer)
                                            <option value="{{ $organizer->id }}">{{ $organizer->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection