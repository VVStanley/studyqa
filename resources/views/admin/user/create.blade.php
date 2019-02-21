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
                                <a class="nav-link" href="{{ route('user') }}">Список</a>
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

                        <form action="{{ route('user.store') }}" method="post">
                            <div class="form-group row">
                                <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" class="form-control" id="inputName" value="{{ old('name') }}" placeholder="name" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="text" name="email" class="form-control" id="inputEmail" value="{{ old('email') }}" placeholder="email" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" name="password" class="form-control" id="inputPassword" placeholder="password" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputConfirm" class="col-sm-2 col-form-label">Confirm</label>
                                <div class="col-sm-10">
                                    <input type="password" name="password_confirmation" class="form-control" id="inputConfirm" placeholder="password_confirmation" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputRole" class="col-sm-2 col-form-label">Role</label>
                                <div class="col-sm-10">
                                    <select name="role" class="form-control" id="inputRole" required>
                                        @foreach(config('helpers.role') as $key => $role)
                                            <option value="{{ $key }}">{{ $role }}</option>
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