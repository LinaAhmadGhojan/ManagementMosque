<?php


namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class LoginApiRequest extends FormRequest
{
    protected $stopOnFirstFailure = true;
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'phone'   => 'required|numeric',
            'password' => 'required|min:6'
        ];
    }


    public function messages()
      {
        return [
        'phone.required' => 'يحب إدخال رقم الهاتف ',
        'password.required' => 'يحب إدخال كلمة السر ',
        'phone.numeric' => ' يحب إدخال رقم    ',
        'password.min' => 'يحب إدخال كلمة السر على الأقل ستة أحرف',
        ];
     }


     public function failedValidation(Validator $validator)

     {

         throw new HttpResponseException(response()->json([

             'code'=>401,
             'success'=> false,
             'message'=> $validator->errors()

         ]));

     }
}
