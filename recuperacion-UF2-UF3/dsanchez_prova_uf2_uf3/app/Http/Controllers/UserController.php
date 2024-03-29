<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Message;
use App\Events\NewMessageNotification;

use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($id)
    {
        $user = User::find($id);
        $data["user_id"] = Auth::user()->id;
        $data["user_name"] = Auth::user()->name;
        if($user->is_admin == 1){
            return view('admin', $data);

        }else{
            return redirect()->to('dashboard');

        }

    }

    public function send(Request $request)
    {
        // ...
        // message is being sent
        
        
        $message = new Message;
        $message->setAttribute('from', Auth::user()->id);
        $message->setAttribute('to', $request->input("to"));
        $message->setAttribute('message', $request->input("message"));
        $message->save();
         
        // want to broadcast NewMessageNotification event
        event(new NewMessageNotification($message));

        return "enviado";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('editUser', ['user'=>$user]);
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
        $request->validate([
            'name' => 'required|string',
            'lastname' => 'required|string',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:8|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/',
            'password_confirm' => 'same:password',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
          
        ]);

        User::findOrFail($id)->update([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'img' => 'user-img/'.time().'.'.$request->file->extension()
        ]);

        $imageName = time().'.'.$request->file->extension();
        $request->file->move(public_path('user-img'), $imageName);
        
        return redirect()->to('dashboard')->with('success', 'Perfil actualizado!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
