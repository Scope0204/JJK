<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
     <div>
        <h1>회원 소개</h1>
        <hr />
        @forelse ($introduces as $introduce)
            <li>{{ $introduce->name }}</li>
            <li>{{ $introduce->birth }}</li>
            <li>{{ $introduce->number }}</li>
            <li>{{ $introduce->email }}</li>
            <li>{{ $introduce->email }}</li>
            <img src="{{ $introduce->photo }}" alt="photo x">
        @empty
            <p>No users</p>
        @endforelse
        <br>
        <button>수정하기</button>
    </div>
</body>
</html>