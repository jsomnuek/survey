<?php

namespace Illuminate\Foundation\Auth;

use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

<<<<<<< HEAD
=======
use App\Model\BasicInformations\Role;
use App\Model\BasicInformations\Agency;

>>>>>>> f644d35c23b987086ad2e652e5fc022bb27544b6
trait RegistersUsers
{
    use RedirectsUsers;

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
<<<<<<< HEAD
        // dd(User::all());
        return view('auth.register');
=======
        $allRole = Role::all();
        $allAgency = Agency::all();

        return view('auth.register', ['showAllRole' => $allRole], ['showAllAgency' => $allAgency]);
>>>>>>> f644d35c23b987086ad2e652e5fc022bb27544b6
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));
<<<<<<< HEAD

        $this->guard()->login($user);
=======
        
        //disable auto-login 
        // $this->guard()->login($user);
>>>>>>> f644d35c23b987086ad2e652e5fc022bb27544b6

        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        //
    }
}
