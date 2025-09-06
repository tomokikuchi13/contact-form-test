<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
</head>
<body>
    <header>
        <div class="header__logo">FashionablyLate</div>
    </header>

    <main class="contact-form__content">
        <h1 class="contact-form__heading">内容確認</h1>

        <form class="form" action="{{ route('contact.submit') }}" method="POST">
            @csrf

            <div class="form__group">
                <div class="form__group-title">姓</div>
                <div class="form__group-content">
                    <input type="text" name="last_name" value="{{ $data['last_name'] }}" readonly>
                </div>
            </div>

            <div class="form__group">
                <div class="form__group-title">名</div>
                <div class="form__group-content">
                    <input type="text" name="first_name" value="{{ $data['first_name'] }}" readonly>
                </div>
            </div>

            <div class="form__group">
                <div class="form__group-title">性別</div>
                <div class="form__group-content">
                    <input type="text" name="gender" value="{{ $genderText }}" readonly>
                    <input type="hidden" name="gender" value="{{ $data['gender'] }}">
                </div>
            </div>

            <div class="form__group">
                <div class="form__group-title">メールアドレス</div>
                <div class="form__group-content">
                    <input type="text" name="email" value="{{ $data['email'] }}" readonly>
                </div>
            </div>

            <div class="form__group">
                <div class="form__group-title">電話番号</div>
                <div class="form__group-content">
                    <input type="text" value="{{ $data['tel'] }}" readonly>
                    <input type="hidden" name="tel1" value="{{ $data['tel1'] }}">
                    <input type="hidden" name="tel2" value="{{ $data['tel2'] }}">
                    <input type="hidden" name="tel3" value="{{ $data['tel3'] }}">
                </div>
            </div>

            <div class="form__group">
                <div class="form__group-title">住所</div>
                <div class="form__group-content">
                    <input type="text" name="address" value="{{ $data['address'] }}" readonly>
                </div>
            </div>

            <div class="form__group">
                <div class="form__group-title">建物名</div>
                <div class="form__group-content">
                    <input type="text" name="building" value="{{ $data['building'] ?? '' }}" readonly>
                </div>
            </div>

            <div class="form__group">
                <div class="form__group-title">お問い合わせ種類</div>
                <div class="form__group-content">
                    <input type="text" value="{{ $categoryName }}" readonly>
                    <input type="hidden" name="category_id" value="{{ $data['category_id'] }}">
                </div>
            </div>

            <div class="form__group">
                <div class="form__group-title">お問い合わせ内容</div>
                <div class="form__group-content">
                    <textarea name="content" readonly>{{ $data['content'] }}</textarea>
                </div>
            </div>

            <div class="form__button-wrapper">
                <button type="submit" class="form__button-submit">送信</button>
                <button type="submit" name="action" value="back" class="form__button-modify">修正</button>
            </div>
        </form>
    </main>
</body>
</html>
