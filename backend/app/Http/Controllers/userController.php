<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return response()->json(['data'=>$users],200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
        {
    //     $user = new User();
    //     $user->name = $request->name;
    //     $user->email = $request->email;
    //     $user->password = bcrypt($request->password);
    //     $user->isAdmin = $request->isAdmin;
    //     $user->photo = $request->photo;
    //     $user->save();
    //     return response()->json(['message'=>'user Created'], 201);

     $user = User::create([
         "name" => $request->name,
         "email" => $request->email,
         "password" => bcrypt($request->password),
         "isAdmin" => $request->isAdmin,
         "photo" => $request->photo
     ]);    
    
         return response()->json(['message'=>'user Created'], 201);
   

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        if($user != null){
            return response()->json([$user], 200);
        }else {
            return response()->json(['Error'=>'User Not Found'], 404);
        }
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
        $user = User::find($id);
        if($user != null){
             $user->update([
                "name" => $request->name,
                "email" => $request->email,
                "password" => bcrypt($request->password),
                "isAdmin" => $request->isAdmin,
                "photo" => $request->photo
             ]);

             return response()->json(['message'=>'updated'],200);
        }else {
            return response()->json(['Error'=>'User Not Found'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if($user != null){
             $user->delete();
             return 'Deleted!!';
        }else {
            return response()->json(['Error'=>'User Not Found'], 404);
        }
    }
}
