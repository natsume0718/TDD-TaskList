<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>


    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>

    <div class="container">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <h2>{{ $task->title }}</h2>
        <ul>
            <li>
                {!! Form::open(['route'=>['task.update',$task->id],'method'=>'put']) !!}
                {{ Form::text('title', $task->title, ['id' => 'title', 'class' => 'form-control']) }}
                {{ Form::checkbox('executed', true, $task->executed) }}
                {{ Form::submit('更新', ['class' => 'btn btn-primary']) }}
                {!! Form::close() !!}

            </li>
        </ul>
        <script src="{{ asset('css/app.js') }}"></script>
</body>

</html>