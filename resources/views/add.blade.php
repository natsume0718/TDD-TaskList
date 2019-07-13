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
        <h2>New Task</h2>
        <div class="row">
            <div class="col-md-offset-2 col-md-8">
                {!! Form::open(['action' => ['TaskController@create'], 'method' => 'post']) !!}
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <td>タイトル</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ Form::text('title', '', ['id' => 'title', 'class' => 'form-control']) }}</td>
                        </tr>
                    </tbody>
                </table>
                {{ Form::submit('登録', ['class' => 'btn btn-primary']) }}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</body>

</html>