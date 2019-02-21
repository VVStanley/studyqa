@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <ul class="nav nav-pills card-header-pills">
                            <li class="nav-item">
                                <div class="nav-link">Галлерея</div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('dashboard') }}">Список</a>
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

                        <form action="{{ route('gallery.store') }}" method="post" enctype="multipart/form-data">
                            <div class="form-group row">
                                <label for="inputImage" class="col-sm-2 col-form-label">image</label>
                                <div class="col-sm-10">
                                    <input type="file" name="image" class="form-control-file" id="inputImage" placeholder="image" required>
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