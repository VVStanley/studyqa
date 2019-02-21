@extends('layouts.app')

@section('js')
    <script src="{{ asset('js/custom.js') }}"></script>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <ul class="nav nav-pills card-header-pills">
                            <li class="nav-item">
                                <div class="nav-link">{{ $meeting->name }}</div>
                            </li>
                        </ul>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="notification">
                            <div class="alert alert-success" role="alert">
                            </div>
                        </div>

                        <form action="{{ route('ajax') }}" method="post" class="ajax-form">
                            <div class="form-group row">
                                <label for="inputFirstName" class="col-sm-2 col-form-label">First name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="firstName" class="form-control" id="inputFirstName" value="{{ old('firstName') }}" placeholder="First name" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputLastName" class="col-sm-2 col-form-label">Last name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="lastName" class="form-control" id="inputLastName" value="{{ old('lastName') }}" placeholder="Last name" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPhone" class="col-sm-2 col-form-label">Phone</label>
                                <div class="col-sm-10">
                                    <input type="text" name="phone" class="form-control" id="inputPhone" value="{{ old('phone') }}" placeholder="Phone" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="text" name="email" class="form-control" id="inputEmail" value="{{ old('email') }}" placeholder="email" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEducation" class="col-sm-2 col-form-label">Education</label>
                                <div class="col-sm-10">
                                    <select name="education" class="form-control" id="inputEducation" required>
                                        @foreach(config('helpers.education') as $key => $education)
                                            <option value="{{ $key }}">{{ $education }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <input type="hidden" name="meeting" value="{{ $meeting->id }}">
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>

                            <hr>

                            <p>
                                Учитывая ключевые сценарии поведения, укрепление и развитие внутренней структуры влечет
                                за собой процесс внедрения и модернизации направлений прогрессивного развития. Не
                                следует, однако, забывать, что базовый вектор развития способствует повышению качества
                                соответствующих условий активизации.
                            </p>
                            <p>
                                Задача организации, в особенности же граница обучения кадров однозначно определяет
                                каждого участника как способного принимать собственные решения касаемо экономической
                                целесообразности принимаемых решений. В своем стремлении повысить качество жизни, они
                                забывают, что повышение уровня гражданского сознания играет определяющее значение для
                                приоритизации разума над эмоциями. Современные технологии достигли такого уровня, что
                                существующая теория не дает нам иного выбора, кроме определения как самодостаточных, так
                                и внешне зависимых концептуальных решений. Значимость этих проблем настолько очевидна,
                                что базовый вектор развития влечет за собой процесс внедрения и модернизации
                                благоприятных перспектив. Кстати, ключевые особенности структуры проекта лишь добавляют
                                фракционных разногласий и функционально разнесены на независимые элементы.
                            </p>
                            <p>
                                В своем стремлении повысить качество жизни, они забывают, что высококачественный
                                прототип будущего проекта позволяет выполнить важные задания по разработке
                                глубокомысленных рассуждений. Ясность нашей позиции очевидна: базовый вектор развития
                                является качественно новой ступенью поэтапного и последовательного развития общества.
                                Как уже неоднократно упомянуто, независимые государства представляют собой не что иное,
                                как квинтэссенцию победы маркетинга над разумом и должны быть функционально разнесены на
                                независимые элементы. Следует отметить, что синтетическое тестирование, в своем
                                классическом представлении, допускает внедрение как самодостаточных, так и внешне
                                зависимых концептуальных решений. В целом, конечно, постоянное
                                информационно-пропагандистское обеспечение нашей деятельности обеспечивает широкому
                                кругу (специалистов) участие в формировании вывода текущих активов.
                            </p>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection