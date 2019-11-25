@extends('layouts.introduce')
@section('content')
<form action="{{ route('introduce.store') }}" method="POST" enctype="multipart/form-data">
 {!! csrf_field() !!}
    <div class="form-group">
         아이디 : <input type="text" name="userId" id ="userId" value="{{ old('userId') }}"></br>
         비밀번호 : <input type="password" name="password" id ="password" value="{{ old('password') }}"></br>
         자기소개 : <textarea cols='30' rows='5' name='intro'>{{ old('intro') }}</textarea></br>
         목표 : <input type="text" name="goal" id ="goal" value="{{ old('goal') }}"></br>
         사진 : <input type="file" name="photo" id="photo"></br>
         
    </div>

    <div>
        <button type="submit" class=addBtn>저장하기</button>
    </div>
</form>
@stop