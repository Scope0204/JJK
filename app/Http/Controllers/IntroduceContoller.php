<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class IntroduceContoller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

  
    public function index()
    {            

        return view('introduce.index');
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('introduce.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
      
        $validator = \Validator::make($request->all(), [
            // 'userId' => 'required|unique:members',
            'userId' => 'required',
            'password' => 'required',
            'name' => 'required',
            'intro' => 'required',
            'goal' => 'required',
        ]);

        if ($validator->fails())
        {
            return response()->json(['error'=>$validator->errors()->all()]);
        }
    
        


        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $filename = Str::random(15).filter_var($photo->getClientOriginalName(),FILTER_SANITIZE_URL);
            // 중복방지를 위해 랜덤문자열 + filter_var(첫번째 인자값의 내용중 두번째인자 필터를 이용해서 필터링)
            // getClientOriginalName : 기존 파일이름,  FILTER_SANITIZE_URL : URL로 부적절한 이름 필터링
            $photo->move(attachements_path(),$filename);
            // 파일을 원하는 위치로 옮기는 구문
        }

        $users = \App\User::where('userId',$request->userId)->where('password',$request->password)->first(); //여기에 where('admin',1) 추가 
        //$users 는 id와 password를 검사함 
        //password 암호화 뚫는걸로 고쳐야함
        
        if($users){
            $members = \App\Member::create([
                "name"=>$request->name,
                "intro"=>$request->intro,
                "goal"=>$request->goal,
                "photo"=>isset($filename) ? $filename : '이미지없음',
            ]);
        }
        else{
            return "idx";
        }
        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $member = \App\Member::where('id',$id)->first();
        return view('introduce.edit', ['member' => $member]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $validator = \Validator::make($request->all(), [
            'name' => 'required',
            'intro' => 'required',
            'goal' => 'required',
        ]);

        if ($validator->fails())
        {
            return response()->json(['error'=>$validator->errors()->all()]);
        }
    
        $oldPhoto = \App\Member::where('id','=', $id)->first();

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $filename = Str::random(15).filter_var($photo->getClientOriginalName(),FILTER_SANITIZE_URL);
            // 중복방지를 위해 랜덤문자열 + filter_var(첫번째 인자값의 내용중 두번째인자 필터를 이용해서 필터링)
            // getClientOriginalName : 기존 파일이름,  FILTER_SANITIZE_URL : URL로 부적절한 이름 필터링
            $photo->move(attachements_path(),$filename);
            // 파일을 원하는 위치로 옮기는 구문  
            if(file_exists(storage_path('../public/images/'.$oldPhoto->photo))){
                unlink(storage_path('../public/images/'.$oldPhoto->photo)); // 기존파일 삭제
                //unlink : 파일삭제 storage_path: 주어진 파일의 절대경로 반환
            }
        }
        
        $users = \App\User::where('userId',$request->userId)->where('password',$request->password)->first();

        if($users){
            $member = \App\Member::where('id',$id)->update([  
                "name"=>$request->name, 
                "intro"=>$request->intro,
                "goal"=>$request->goal,
                "photo"=>isset($filename) ? $filename : $oldPhoto->photo,
            ]);
        }else{
            return "idx";
        }
        
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id) //Member = id 가 넘어옴
    {
        
        $oldPhoto = \App\Member::where('id','=', $id)->first(); 
        if ($oldPhoto->photo != '이미지없음') {
        unlink(storage_path('../public/images/'.$oldPhoto->photo));
        }

        \App\Member::where('id', $id)->delete(); // $id와 같은 userId의 값을 삭제 
        return response()->json([],204);
    }
}
