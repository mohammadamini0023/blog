<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use Illuminate\Http\request;
use Mail;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'family' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
     public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'family' => $data['family'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    protected function register (Request $request)
    {
        $input=$request->all();
        $validator=$this->validator($input);

        if ($validator->passes()) {
            $data=$this->create($input)->toArray();
            $data['token']=str_random(25);

            $users=User::find($data['id']);
            $users->token=$data['token'];
            $users->save();

            Mail::send('mails.verify_email', $data, function ($message) use($data) {
                $message->to($data['email']);
                $message->subject('register email');
            });
            return redirect(route('login'))->with('status','canfrimation email has be send email . please open in your email box');
        }
        return redirect(route('login'))->with('status','errore');
    }

    public function confrimation($token)
    {
        $user=User::where('token',$token)->frist();

        if(!is_null($user))
        {
            $user->verify_email=1;
            $user->token='';
            $user->save();
            return redirect(route('login'))->with('status','your avtive user');
        }
        return redirect(route('login'))->with('status','wrong errore');
    }
}
