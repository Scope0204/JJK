@extends('layouts.introduce')
@section('content')
     <div>
        <h1>회원 소개</h1>
        <hr />
        <div class='main'>
        @forelse ($introduces as $introduce )
            <li>{{ $introduce->userId }}</li>
            <li>{{ $introduce->intro }}</li>
            <li>{{ $introduce->goal }}</li>
            <img src="/images/{{ $introduce->photo }}" alt="photo x">
        @empty
            <p>No users</p>
        @endforelse

        <br>
        <button class='creBtn'>등록하기</button>
        <button class='fixBtn'>수정하기</button>
        <button class='delBtn'>삭제하기</button>
        </div>
     </div>
@stop

@section('script')
    <script>
    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    $('.creBtn').on('click', function(e){
        $('.main').load('/introduce/create');
    });

    $('.delBtn').on('click', function(e){
        var Member = '{{ $introduce->userId }}'
    if(confirm('삭제하시겠습니까?')){
        $.ajax({
            type: 'DELETE',
            url: '/introduce/' + Member
            }).then(function() {
                window.location.href = '/introduce';
            });
        }
     });   
    </script>
@stop



