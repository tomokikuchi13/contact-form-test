<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;

class ContactController extends Controller
{
    // お問い合わせフォーム表示
    public function show()
    {
        $categories = Category::all();
        return view('contact', compact('categories'));
    }

    // 確認画面
    public function confirm(Request $request)
    {
        $validated = $request->validate([
            'last_name'    => 'required|string|max:50',
            'first_name'   => 'required|string|max:50',
            'gender'       => 'required|integer|in:1,2,3',
            'email'        => 'required|email|max:255',
            'tel1'         => 'required|string|max:5',
            'tel2'         => 'required|string|max:5',
            'tel3'         => 'required|string|max:5',
            'address'      => 'required|string|max:255',
            'building'     => 'nullable|string|max:255',
            'category_id'  => 'required|exists:categories,id',
            'content'      => 'required|string|max:1000',
        ]);

        // 性別のテキスト変換
        $genderText = [
            1 => '男性',
            2 => '女性',
            3 => 'その他'
        ][$validated['gender']] ?? '';

        // カテゴリ名取得
        $category = Category::find($validated['category_id']);
        $categoryName = $category ? ($category->content ?? $category->name) : '';

        // 電話番号結合して 'tel' キーを追加
        $validated['tel'] = $validated['tel1'] . '-' . $validated['tel2'] . '-' . $validated['tel3'];

        return view('confirm', [
            'data' => $validated,
            'genderText' => $genderText,
            'categoryName' => $categoryName,
        ]);
    }

    // データ保存＆完了画面表示
    public function submit(Request $request)
    {
        if ($request->input('action') === 'back') {
            return redirect()->route('contact.show')->withInput($request->all());
        }

        $validated = $request->validate([
            'last_name'    => 'required|string|max:50',
            'first_name'   => 'required|string|max:50',
            'gender'       => 'required|integer|in:1,2,3',
            'email'        => 'required|email|max:255',
            'tel1'         => 'required|string|max:5',
            'tel2'         => 'required|string|max:5',
            'tel3'         => 'required|string|max:5',
            'address'      => 'required|string|max:255',
            'building'     => 'nullable|string|max:255',
            'category_id'  => 'required|exists:categories,id',
            'content'      => 'required|string|max:1000',
        ]);

        $validated['tel'] = $validated['tel1'].'-'.$validated['tel2'].'-'.$validated['tel3'];

         // サンクスページへリダイレクト
        return redirect()->route('contact.thanks');
    }

    // サンクスページ
    public function thanks()
    {
        return view('thanks');
    }
}