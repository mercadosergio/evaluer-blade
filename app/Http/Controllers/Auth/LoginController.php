<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(LoginRequest $request)
    {
        $credentials = $request->getCredentials();

        if (!Auth::validate($credentials)) {
            return redirect()->to('login')
                ->withErrors(trans('auth.failed'));
        };
        $user = Auth::getProvider()->retrieveByCredentials($credentials);
        Auth::login($user);
        return $this->authenticated($user);
    }

    public function authenticated($user)
    {
        switch ($user->role_id) {
            case 1:
                return redirect()->route('student.dashboard');
                break;

            case 2:
                return redirect()->route('advisor.dashboard');
                break;

            case 3:
                return redirect()->route('coordinator.dashboard');
                break;

            case 4:
                return redirect()->route('admin');
                break;
        }
    }
}
