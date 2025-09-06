// app/Http/Requests/ContactRequest.php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'first_name'   => 'required|string|max:50',
            'last_name'    => 'required|string|max:50',
            'gender'       => 'required|in:male,female,other',
            'email'        => 'required|email',
            'tel1'         => 'required|digits_between:1,5|numeric',
            'tel2'         => 'required|digits_between:1,5|numeric',
            'tel3'         => 'required|digits_between:1,5|numeric',
            'address'      => 'required|string|max:255',
            'inquiry_type' => 'required|string',
            'content'      => 'required|string|max:120',
        ];
    }

    public function messages()
    {
        return [
            'first_name.required'   => '姓を入力してください',
            'last_name.required'    => '名を入力してください',
            'gender.required'       => '性別を選択してください',
            'email.required'        => 'メールアドレスを入力してください',
            'email.email'           => 'メールアドレスはメール形式で入力してください',
            'tel1.required'         => '電話番号を入力してください',
            'tel2.required'         => '電話番号を入力してください',
            'tel3.required'         => '電話番号を入力してください',
            'tel1.numeric'          => '電話番号は5桁までの数字で入力してください',
            'tel2.numeric'          => '電話番号は5桁までの数字で入力してください',
            'tel3.numeric'          => '電話番号は5桁までの数字で入力してください',
            'address.required'      => '住所を入力してください',
            'inquiry_type.required' => 'お問い合わせの種類を選択してください',
            'content.required'      => 'お問い合わせ内容を入力してください',
            'content.max'           => 'お問合せ内容は120文字以内で入力してください',
        ];
    }
}
