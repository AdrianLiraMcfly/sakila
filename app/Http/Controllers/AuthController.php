<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Tymon\JWTAuth\Facades\JWTAuth;
use Carbon\Carbon;
use App\Mail\TwoFactorCodeMail;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function verify(Request $request)
{
    // Validar los datos de entrada
    $validator = Validator::make($request->all(), [
        'email' => 'required|email',
        'password' => 'required|string',
    ]);

    // Si la validación falla, redirigir con errores
    if ($validator->fails()) {
        return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
    }

    // Buscar al usuario por su email
    $user = Staff::where('email', $request->email)->first();

    // Verificar si el usuario existe y si la contraseña es correcta
    if (!$user || !Hash::check($request->password, $user->password)) {
        return redirect()->back()
                        ->withErrors(['email' => 'Credenciales incorrectas'])
                        ->withInput();
    }

    // Autenticar al usuario
    Auth::login($user);

    // Generar y enviar el código de 2FA
    $code = rand(100000, 999999);
    $user->two_factor_code = bcrypt($code);
    $user->two_factor_expires_at = Carbon::now()->addMinutes(10);
    $user->save();

    Mail::to($user->email)->send(new TwoFactorCodeMail($code));

    // Redirigir a la vista de 2FA
    return redirect()->route('2fa.verify')->with('message', 'Código de verificación enviado');
}


    public function logout()
    {
        session()->forget('jwt_token');
        Auth::logout();
        return redirect()->route('login');
    }

    public function sendTwoFactorCode()
    {
        $user = Auth::user();
        $code = rand(100000, 999999);
        $user->two_factor_code = bcrypt($code);
        $user->two_factor_expires_at = Carbon::now()->addMinutes(10);
        $user->save();

        Mail::to($user->email)->send(new TwoFactorCodeMail($code));

        return redirect()->route('2fa.verify')->with('message', 'Código de verificación enviado');
    }

    public function verifyTwoFactorCode(Request $request)
{
    $user = Auth::user();
    if (Hash::check($request->code, $user->two_factor_code) && now()->lt($user->two_factor_expires_at)) {
        $user->two_factor_code = null;
        $user->two_factor_expires_at = null;
        $user->save();

        // Generar el token JWT
        $token = JWTAuth::fromUser($user);
        session(['jwt_token' => $token]);

        return redirect()->route('home');
    }
    return redirect()->back()->withErrors(['code' => 'Código incorrecto o expirado']);
}
}

