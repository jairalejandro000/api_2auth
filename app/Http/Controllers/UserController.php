<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Throwable;

class UserController extends Controller
{

    //Create
    public function create(Request $request){
        try{
            $user = new User();
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = Hash::make($request->input('password'));
            if($user->save()){
                print('Registro correcto');
                return view('login');
            }
        }catch(Throwable $e){
            print ('Error al registrar');
        }
    }

    //Code
    public function code(Request $request){
        print($request->input('email'));
        print($request->input('code'));
        try{
            $user = User::where('email', $request->input('email'))->first();
            if(! $user || ! Hash::check($request->input('code'), $user->code)){
                print('Error en las credenciales');
            }else{
                $token = DB::table('personal_access_tokens')->where('personal_access_tokens.name', '=', $request->input('email'))->first();
                if($token){
                    DB::table('personal_access_tokens')->where('personal_access_tokens.name', '=', $request->input('email'))->delete();
                    $user->createToken($request->input('email'))->plainTextToken;
                    return view('welcome', ['email' => $request->input('email')]);
                }else{
                    $token = $user->createToken($request->input('email'))->plainTextToken;
                    return view('welcome', ['email' => $request->input('email')]);
                }
            }
        }catch(Throwable $e){
            print('Error en las credenciales');
        }
    }
    //LogIn
    public function LogIn(Request $request){
        try{
            $user = User::where('email', $request->input('email'))->first();
            if(! $user || ! Hash::check($request->input('password'), $user->password)){
                return response()->json('Something wrong', 400);
            }else{
                $code = DB::table('users')->where('users.email', '=', $request->input('email'))->first();
                if($code){
                    $code = Str::random(5);
                    $user->code = Hash::make($code);
                    $user->save();
                    $datos = array('email'=> $user->email, 'name'=> $user->name, 'code'=> $code);
                    Mail::send('code', $datos, function($message) use ($datos) {
                        $message->from('19170162@uttcampus.edu.mx', 'JAIR ALEJANDRO MARTINEZ CARRILLO');
                        $message->to($datos['email'], $datos['name'])->subject('Código de autenticación');
                    });
                    return view('auth', ['email' => $user->email]);
                }else{
                    $code = Str::random(5);
                    $user->code = Hash::make($code);
                    $user->save();
                    $datos = array('email'=> $user->email, 'name'=> $user->name, 'code'=> $code);
                    Mail::send('code', $datos, function($message) use ($datos) {
                        $message->from('19170162@uttcampus.edu.mx', 'JAIR ALEJANDRO MARTINEZ CARRILLO');
                        $message->to($datos['email'], $datos['name'])->subject('Código de autenticación');
                    });
                    return view('auth', ['email' => $user->email]);
                }
            }
        }catch(Throwable $e){
            print('Error en las credenciales');
        }
    }
    //LogOut
    public function LogOut(Request $request){
        try{
            $user = DB::table('personal_access_tokens')->where('personal_access_tokens.name', '=', $request->input('email'));
            if($user->token){
                DB::table('personal_access_tokens')->where('personal_access_tokens.name', '=', $request->input('email'))->delete();
                return response()->json('LogOut done', 200);
            }
        }catch(Throwable $e){
            return response()->json('Something wrong', 400);
        }
    }
    //Show
    public function Show(Request $request){
        try{
            $user = User::where('email', $request->input('email'))->get();
            if($user){
                return response()->json(['User' => $user], 200);
            }
        }catch(Throwable $e){
            return response()->json('Something wrong', 400);
        }
    }
}
