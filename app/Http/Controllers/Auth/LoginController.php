<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Alert;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;
    protected function authenticate(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        $user = User::where('email',$request->email)->first();
        if(isset($user) && $user != null){
            if(Hash::check($user->password,$request->Password)){
                if ($user->isadmin == 1){
                    return view('admin.profile');
                }
            }
        }else{
            echo "email not found";
        }

    }
    protected function authenticated(Request $request)
    {

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard/home');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    if ( $user->utype=="ADM" ) {// do your magic here

        return redirect()->route('adminhome');
    }

    }
//   protected function authenticated(Request $request, $user)
//    {
//
//    if ( $user->isadmin==1 ) {// do your magic here
//
//        return redirect()->route('adminhome');
//    }
//
//    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Get the failed login response instance.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function sendFailedLoginResponse(Request $request)
    {
        /*throw ValidationException::withMessages([
            'username' => [trans('auth.failed')],
        ]);*/
      
        Alert::error('خطا ف تسجيل الدخول ', 'Error Message');

        return redirect('/login');

    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
//        $login = request()->input('name');
        $login = request()->input('email');
        $field = 'email';

//        if(is_numeric($login)){
//            $field = 'phone';
//        } elseif (filter_var($login, FILTER_VALIDATE_EMAIL)) {
//            $field = 'email';
//        } else {
//            $field = 'name';
//        }

        request()->merge([$field => $login]);

        return $field;
    }
}
