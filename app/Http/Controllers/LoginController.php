<?php

namespace App\Http\Controllers;

use App\Http\Requests\Login;
use App\Http\Requests\Register;
use App\Mail\Welcome;
use App\Models\Color;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Str;


class LoginController extends Controller
{
    public function register(Register $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->active = true;
        $user->save();

        $colorsArray = [$request->input('color1'), $request->input('color2'), $request->input('color3')];

        for ($i = 0; $i < count($colorsArray); $i++) {
            $color = new Color();
            $color->name = $colorsArray[$i];
            $color->user_id = $user->id;

            $color->save();
        }

        Mail::to($request->email)->send(new Welcome(
            $user
        ));

        Auth::login($user);

        return redirect(route('home'));
    }

    public function login(Login $request)
    {
        $credentials = [
            "email" => $request->email,
            "password" => $request->password,
        ];

        $remember = ($request->has('remember') ? true : false);

        if (User::where('email', $request->email)->first()) {
            if (Auth::attempt($credentials, $remember)) {
                if (User::where('email', $request->email)->pluck('active')->first()) {
                    $request->session()->regenerate();

                    return redirect()->intended(route('home'));
                } else {
                    session()->flash('error', 'Tu cuenta ya no está activa :(');
                    return redirect('login');
                }
            } else {
                session()->flash('error', 'Credenciales incorrectas :(');
                return redirect('login');
            }
        } else {
            session()->flash('error', 'Usuario no encontrado :(');
            return redirect('login');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        session()->flash('success', 'Sesión cerrada correctamente');
        return redirect(route('home'));
    }

    public function forgotPassword()
    {
        return view('auth.forgot-password');
    }

    public function sendEmailForgotPassword(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }

    public function resetPasswordToken(string $token)
    {
        return view('auth.reset-password', ['token' => $token]);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }
}
