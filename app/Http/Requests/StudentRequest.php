<?php

namespace App\Http\Requests;

use App\Rules\Uppercase;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

use Closure;
use Illuminate\Support\Facades\Validator;

class StudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            // 'sname' => ['required', new Uppercase],
            'sname' => 'required',
            'sage' => 'required|numeric|min:18',
            // 'sage' => 'required|numeric|between:18,60',
            'semail' => 'required|email',
            'saddress' => 'required',
            'scity' => ['required',
             function(string $attribute, mixed $value, Closure $fail){
                if(strtoupper($value) !== $value){
                    $fail('The :attribute must be uppercase.');
                }
             }],
            'sphone' => 'required|size:10',
            'spassword' => 'required|alpha_num|min:6'
        ];
    }
    
    // public function messages()
    // {
    //     return [
    //         'sname.required' => ':attribute  is must be required.',
    //         'sage.required' => 'Age is must be required.',
    //         'sage.min' => 'Age shopuld not less than 18 years old.',
    //         'semail.required' => 'Email is must be required.',
    //         'semail.email' => 'Please enter valid email id.',
    //         'saddress.required' => 'Address is must be required.',
    //         'scity.required' => 'City is must be required.',
    //         'sphone.required' => 'Phone is must be required.',
    //         'sphone.size' => 'The phone field must be 10 characters.',
    //         'spassword.required' => 'Password is must be required.',
    //         'spassword.min' => 'The password field must be at least 6 characters.',
    //         'spassword.alpha_num' => 'The password field must only contain letters and numbers.'
    //     ];
    // }
   
    public function attributes()
    {
        return [
            'sname' => 'Student name',
            'sage' => 'Age',
            'semail' => 'Email',
            'saddress' => 'Address',
            'scity' => 'City',
            'sphone' => 'Phone',
            'spassword' => 'Password'
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            // 'sname' => strtoupper($this->sname),
             'sname' => Str::slug($this->sname),
        ]);
    }

    // protected $stopOnFirstFailure = true;
}
