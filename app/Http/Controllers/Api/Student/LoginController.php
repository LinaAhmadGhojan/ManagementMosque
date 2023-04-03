<?php

namespace App\Http\Controllers\Api\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginApiRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function studentLogin(LoginApiRequest $request)
    {

        if (\Auth::attempt($request->only(['phone','password']), $request->get('remember')))
        {

            return response()->json(
                [
                  'code'=>200,
                  'message'=>  "تم تسجيل الطالب  بنجاح",
                  'token'=>Auth::user()->createToken("token student")->plainTextToken
                ], 200);

        }

        return response()->json(
            [
              'code'=>401,
              'message'=>  "يوجد خطأ في كلمة السر أو الإيميل ",
            ], 401);

    }
}
