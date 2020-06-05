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
    <h1>
        Name: {{ $template->name }}
    </h1>
    <h2>
        Content: {{ $template->content }}
    </h2>
    <h3>
        Result: {{ $template->result }}
    </h3>
</body>
</html>