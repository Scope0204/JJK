@extends('layouts.introduce')
@section('content')
<form action="{{ route('introduce.update', $member->id) }}" method="POST" enctype="multipart/form-data">
 {!! csrf_field() !!}
 {!! method_field('PUT')!!}
    <div class="form-group">
         아이디 : <input type="text" name="userId" id ="userId" value="{{ old('userId',$member->userId)}}"></br>
         자기소개 : <textarea cols='30' rows='5' name='intro'>{{ old('intro', $member->intro ) }}</textarea></br>
         목표 : <input type="text" name="goal" id ="goal" value="{{ old('goal',$member->goal )}}"></br>
         현재 사진 <img src="/images/{{ $member->photo }}" alt="photo x"></br>
         바꿀 사진 : <input type="file" name="photo" id="photo" value="{{ old('photo',$member->photo )}}"></br>
    </div>
    <div>
        <button type="submit" class=editBtn>수정하기</button>
    </div>
</form>
 @stop