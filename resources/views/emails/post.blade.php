<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1> hello {{$user->name}}</h1>
    <div>
        <p>you created {{$post->title}}</p>
        <p>{{$post->body}}</p>
        <p>at time {{$post->created_at}}</p>
        <img src="{{$message->embed('storage/'.$post->image_path)}}" alt="" width="30">
    </div>
</body>
</html>