<form id="formData" enctype="multipart/form-data">
    @csrf
        <div class="form-group">
         이름 : <input type="text" name="name" id ="name" value="{{ old('name') }}"></br>
         생일 : <input type="text" name="birth" id ="birth" value="{{ old('birth') }}"></br>
         전화번호 : <input type="text" name="phone" id ="phone" value="{{ old('phone') }}"></br>
         이메일 : <input type="text" name="email" id ="email" value="{{ old('email') }}"></br>
         비밀번호 : <input type="text" name="password" id="password"></br>
         사진
        </div>

        <div>
         <button type="submit" class=addBtn>저장하기</button>
        </div>
</form>
<script>
    $.ajaxSetup({
    headers: {
        //토큰을 HTML태그 에 저장  --> 'X-CSRF-TOKEN' meta
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        //meta태그를 생성하면 jQuery와 같은 라이브러리가 모든 요청 헤더에 자동으로 토큰을 추가하도록 지시
        //이를 통해 AJAX 기반 애플리케이션에 대해 간단하고 편리한 CSRF 보호 기능을 제공
    });

    $.('.addBtn').on('click',function(e){
        //GET form

        $.ajax({
            type: 'POST',
            enctype: 'multipart/form-data',
            url: '/introduce',
            data: data,
            success : function(data){
                get_list();
                // $('.btmBlk').empty();
            }

        }); 
    });
</script>



