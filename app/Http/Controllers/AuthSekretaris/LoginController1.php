<?php

namespace App\Http\Controllers\AuthMahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
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

    public function __construct()
    {
        $this->middleware('guest:mahasiswa')->except('logout');
    }

    public function showLoginForm()
    {
        return view('authMahasiswa.login');
    }

    // public function show($id)
    // {
    //     //karena kita menggunakan model post maka kita akan panggil class post
    //     $post = Post::findOrFail($id);
    //     // return $post;
    //     // method compact diguanakan utk mengirimkan data post yg dimiliki melalui variabel post
    //     // return view('posts.show', compact('post'));
    //     return $post;
    // }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            // 'name' => 'required|name',
            'password' => 'required|min:6'
        ]);

        $credential = [
            'email' => $request->email,
            'password' => $request->password
        ];

        // Attempt to log the user in
        if (Auth::guard('mahasiswa')->attempt($credential, $request->member)) {
            // If login succesful, then redirect to their intended location
            // return redirect() - intended(route('admin.home'));
            return redirect()->to(route('mahasiswa.home'));
            // return redirect()(route('admin.home'));
        }

        // If Unseccesful, then redirect back to the login with the form data
        // return redirect()->back()withInput($request->only('email', 'remember'));
        // return redirect() - intended(route('home'));
        return redirect()->to(route('mahasiswa.login'));
    }

    // public function login(Request $request)
    // {
    //     $input = $request->all();
    //     $this->validate($request, [
    //         'email' => 'required|email',
    //         // 'name' => 'required|name',
    //         'password' => 'required|min:6'
    //     ]);

    //     if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
    //     {
    //         if (auth()->user()->is)
    //     }
    // }



    //     /*
    //     |--------------------------------------------------------------------------
    //     | Login Controller
    //     |--------------------------------------------------------------------------
    //     |
    //     | This controller handles authenticating users for the application and
    //     | redirecting them to your home screen. The controller uses a trait
    //     | to conveniently provide its functionality to your applications.
    //     |
    //     */
    //     use AuthenticatesUsers;
    //     /**
    //      * Where to redirect users after login.
    //      *
    //      * @var string
    //      */
    //     protected $redirectTo;
    //     public function redirectTo()
    //     {
    //         switch (Auth::user()->role) {
    //             case 2:
    //                 $this->redirectTo = '/sekretaris';
    //                 return $this->redirectTo;
    //                 break;
    //             case 3:
    //                 $this->redirectTo = '/mahasiswa';
    //                 return $this->redirectTo;
    //                 break;
    //             case 4:
    //                 $this->redirectTo = '/tutor';
    //                 return $this->redirectTo;
    //                 break;
    //             case 5:
    //             default:
    //                 $this->redirectTo = '/login';
    //                 return $this->redirectTo;
    //         }

    //         // return $next($request);
    //     }
    //     /**
    //      * Create a new controller instance.
    //      *
    //      * @return void
    //      */
    //     public function __construct()
    //     {
    //         // $this->middleware('guest')->except('logout');
    //     }
}
