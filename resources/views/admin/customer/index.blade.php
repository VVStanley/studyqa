@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <ul class="nav nav-pills card-header-pills">
                            <li class="nav-item">
                                <div class="nav-link">Заявки</div>
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
                            @forelse($customers as $customer)
                                @can('view', $customer)
                                <li class="list-group-item">
                                    <span class="lead">Имя - {{ $customer->first_name }};</span>
                                    @if(Auth::user()->can('admin'))
                                    <span class="lead">Метки - {{ $customer->utm }};</span>
                                    <span class="lead">ИП - {{ $customer->ip }};</span>
                                    <form action="{{ route('customer.destroy', $customer->id) }}" method="post" class="float-right">
                                        <input name="_method" type="hidden" value="DELETE">
                                        {{ csrf_field() }}
                                        <button type="submit" class=" btn btn-danger">Удалить</button>
                                    </form>
                                    @endif
                                </li>
                                @endcan
                            @empty
                                <li class="list-group-item">нет заявок</li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection