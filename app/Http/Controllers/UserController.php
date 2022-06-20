<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\_user;

use function PHPUnit\Framework\isNull;

class UserController extends Controller
{
    //

    public function welcome()
    { 
        return view('user.welcome');
    }

    public function register()
    {
        return view('user.registration');
    }

    public function registerSubmit(Request $req)
    {
        $this->validate($req,
        [
            "name"=> "required|regex:/^[A-Za-z- .,]+$/i",
            "password"=>"required|min:8|regex:/^.*(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[!@#$ %^&*~><.,:;]).*$/i",
            "confirmPassword"=>"required|same:password",
            "email"=>"required"
        ]);

        $user= new _user();
        $user->name = $req->name;
        $user->email =$req->email;
        $user->password =$req->password;
        $user->type = $req->type;
        $user->save();
        return redirect()->route('welcome');
    }

    public function login()
    {
        return view('user.login');
    }
    
    public function loginSubmit(Request $req)
    {
        $this->validate($req,
        [
            "email"=>"required",
            "password"=>"required"
        ]);

        $user=_user::where('email',$req->email)
                    ->where('password',$req->password)
                    ->first();
        
        if($user)
        {
            if($user->type=="User")
            {
                session()->put('logged.user',$user->id);
                return redirect()->route('user.dashboard');
            }
            else if($user->type=="Admin")
            {
                session()->put('logged.admin',$user->id);
                return redirect()->route('admin.home');
            }
        }

        else
        {
            // return redirect()->route('user.error');
            session()->flash('msg','User not valid');
            return back();
        }

    }

    public function error()
    {
        return view('user.error');
    }

    public function dashboard()
    {
        $users = _user::where('type','User')->get();
        //return $users;
        return view('user.dashboard')->with('users',$users);
    }
    

    public function logout()
    {
        session()->forget('logged');
        session()->flash('msg','Sucessfully Logged out');
        return redirect()->route('user.login');
    }

    //DETAILS
    public function details($id)
    {
        $users=_user::where('id',$id)->get();
        return view('user.details')->with('users',$users);
    }


    //ADMIN
    public function delete($id)
    {
        $users=_user::where('id',$id)->delete();
        $user=_user::all();
        return view('admin.home')->with('users',$user);
    }

    public function allDetails()
    {
        $users=_user::all();
        //var_dump($users);
        return view('admin.alldetails')->with('users',$users);
    }

    public function adminHome()
    {
        $users = _user::all();
        return view('admin.home')->with('users',$users);
    }

    public function modify($id)
    {
        $user=_user::where('id',$id)->first();
        return view('admin.modify')->with('user',$user);
    }

    public function modified($id,Request $req)
    {
        $id=$req->id;
        $this->validate($req,
        [
            "name"=> "required|regex:/^[A-Za-z- .,]+$/i",
            "password"=>"required|min:8|regex:/^.*(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[!@#$ %^&*~><.,:;]).*$/i",
            "confirmPassword"=>"required|same:password",
            "email"=>"required"
        ]);

        $modified = _user::where('id',$id)
                            ->update(
                                ['name'=>$req->name,
                                 'email'=>$req->email,
                                 'password'=>$req->password]
                            );
        $user=_user::where('id',$id)->first();
        return view('admin.modified')->with('user',$user);
    }
}
