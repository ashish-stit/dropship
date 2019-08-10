<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use Hash;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ResetValidation;
use Session;
class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
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

    public function EmpResetPassword($id)
    {
        return view('ResetEmail')->with('id',$id);
    }
    public function EmpResetPass(ResetValidation $res)
    {
       $id = $res->id;
        $email = $res->email;
        $password= $res->password;
        $customer = User::where('id',$id)->first();
        $customer->email = $email;
        $customer->password = hash::make($password);
        if ($customer->save()) {
         Session::flash('status', "Your password have been reset Now login Here!!");
         return redirect('emplogin');
        } else {
            echo "data not updated";
        }
    }


}
