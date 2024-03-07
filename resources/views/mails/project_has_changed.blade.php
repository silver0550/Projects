<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>A projectben változás történt</div>
    <div>
        <label for="project_name">A project neve: </label>
        {{ $projectName }}
    </div>

    <div>
       változások:
        @foreach($data as $item) @endforeach
            <br>{{ __('project.'. $item['key']) }}: {{ $item['from'] }} -> {{ $item['to'] }}
    </div>
</body>
</html>

