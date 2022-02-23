<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Throwable;

use function PHPUnit\Framework\throwException;

class UserController extends Controller
{
    //Create
    public function create(Request $request){
        try{
            $request->validate([
                'name' => 'required|min:3|max:30',
                'email' => 'required|email|min:10|max:35',
                'password' => 'required|min:8|max:8'
            ]);
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();
            if($user->save()){
                return response()->json('User created', 201);
            }
        }catch(Throwable $e){
            return  response()->json('Something wrong', 400);
        }
    }
    //Code
    public function code(Request $request){
        try{
            $request->validate([
                'email' => 'required|email',
                'code' => 'required'
            ]);
            $user = User::where('email', $request->email)->first();
            if(! $user || ! Hash::check($request->code, $user->code)){
                return response()->json('Something wrong', 400);
            }else{
                $token = DB::table('personal_access_tokens')->where('personal_access_tokens.name', '=', $request->email)->first();
                if($token){
                    DB::table('personal_access_tokens')->where('personal_access_tokens.name', '=', $request->email)->delete();
                    $newtoken = $user->createToken($request->email)->plainTextToken;
                    return response()->json(['token' => $newtoken], 201);
                }else{
                    $token = $user->createToken($request->email)->plainTextToken;
                    return response()->json(['token' => $token], 201);
                }
            }
        }catch(Throwable $e){
            return response()->json('Something wrong', 400);
        }
    }
    //LogIn
    public function LogIn(Request $request){
        try{
            $request->validate([
                'email' => 'required|email',
                'password' => 'required'
            ]);
            $user = User::where('email', $request->email)->first();
            if(! $user || ! Hash::check($request->password, $user->password)){
                return response()->json('Something wrong', 400);
            }else{
                $code = DB::table('users')->where('users.email', '=', $request->email)->first();
                if($code){
                    $code = Str::random(5);
                    $user->code = Hash::make($code);
                    $user->save();
                    $datos = array('email'=> $user->email, 'name'=> $user->name, 'code'=> $code);
                    Mail::send('code', $datos, function($message) use ($datos) {
                        $message->from('19170162@uttcampus.edu.mx', 'JAIR ALEJANDRO MARTINEZ CARRILLO');
                        $message->to($datos['email'], $datos['name'])->subject('Código de autenticación');
                    });
                    return response()->json(['code' => $code], 201);
                }else{
                    $code = Str::random(5);
                    $user->code = Hash::make($code);
                    $user->save();
                    $datos = array('email'=> $user->email, 'name'=> $user->name, 'code'=> $code);
                    Mail::send('code', $datos, function($message) use ($datos) {
                        $message->from('19170162@uttcampus.edu.mx', 'JAIR ALEJANDRO MARTINEZ CARRILLO');
                        $message->to($datos['email'], $datos['name'])->subject('Código de autenticación');
                    });
                    return response()->json(['code' => $code], 201);
                }
            }
        }catch(Throwable $e){
            return response()->json('Something wrong', 400);
        }
    }

    //LogOut
    public function LogOut(Request $request){
        try{
            $request->validate([
                'email' => 'required|email|min:10|max:35'
            ]);
            $user = DB::table('personal_access_tokens')->where('personal_access_tokens.name', '=', $request->email);
            if($user->token){
                DB::table('personal_access_tokens')->where('personal_access_tokens.name', '=', $request->email)->delete();
                return response()->json('LogOut done', 200);
            }
        }catch(Throwable $e){
            return response()->json('Something wrong', 400);
        }
    }

    //Show
    public function Show(Request $request){
        try{
            $request->validate([
                'email' => 'required|email|min:10|max:35'
            ]);
            $user = User::where('email', $request->email)->get();
            if($user){
                return response()->json(['User' => $user], 200);
            }
        }catch(Throwable $e){
            return response()->json('Something wrong', 400);
        }
    }
}
