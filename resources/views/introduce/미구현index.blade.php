@extends('layouts.introduce')
@section('content')
     <div>
        <h1>회원 소개</h1>
        <hr />
        <div class='main'>
        @forelse ($introduces as $introduce)
            <li>{{ $introduce->name }}</li>
            <li>{{ $introduce->birth }}</li>
            <li>{{ $introduce->number }}</li>
            <li>{{ $introduce->email }}</li>
            <img src="{{ $introduce->photo }}" alt="photo x">
        @empty
            <p>No users</p>
        @endforelse
        <br>
        <button class='creBtn'>등록하기</button>
        <button class='fixBtn'>수정하기</button>
        </div>
     </div>
@stop
@section('script')
     <script>
        $('.creBtn').on('click',function(e){
            $('.main').load('/introduce/create');
        });

        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
            }
        });

        // function get_list(){
        //      $.ajax({
        //          method:'GET',
        //          url: '/introduce/list',
        //      })
        //      .done(function( board_list ){
        //          var board_div = $('.main');
        //          board_div.html('');
        //          board_list.map(board=>{
        //             var str='';
        //             if(board.photo !== ''){
        //                     str = `<img src = "/images/${board.photo}" width="200"/>`;
        //                 }
        //             var li = $('<li>'+ board.name +'</li>');
        //             li.append($('<li>'+ board.birth +'</li>'));
        //             li.append($('<li>'+ board.number +'</li>'));
        //             li.append($('<li>'+ board.email +'</li>'));
        //         });
        //     });
        // }
        // get_list();
     </script>
@stop

