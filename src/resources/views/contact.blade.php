<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Contact Form</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/contact.css') }}" />
</head>
<body>
  <header class="header">
    <div class="header__inner">
      <div class="header__logo">FashionablyLate</div>
    </div>
  </header>

  <main>
    <div class="contact-form__content">
      <div class="contact-form__heading">Contact</div>
    </div>

    
    <form class="form" action="{{ route('contact.confirm') }}" method="POST">
      @csrf

      
      <div class="form__group name">
        <div class="form__group-title">
          <span class="form__label--item">お名前</span>
          <span class="form__label--required">※</span>
        </div>
        <div class="form__group-content name">
          <div class="form__input--nametext">
            <input type="text" name="last_name" value="{{ old('last_name') }}" placeholder="例 山田" />
            @error('last_name')<div class="form__error">{{ $message }}</div>@enderror
          </div>
          <div class="form__input--nametext">
            <input type="text" name="first_name" value="{{ old('first_name') }}" placeholder="例 太郎" />
            @error('first_name')<div class="form__error">{{ $message }}</div>@enderror
          </div>
        </div>
      </div>

      
      <div class="form__group gender">
        <div class="form__group-title">
          <span class="form__label--item">性別</span>
          <span class="form__label--required">※</span>
        </div>
        <div class="form__group-content gender">
          <label class="form__input--radio">
            <input type="radio" name="gender" value="1" {{ old('gender')==1?'checked':'' }} /> 男性
          </label>
          <label class="form__input--radio">
            <input type="radio" name="gender" value="2" {{ old('gender')==2?'checked':'' }} /> 女性
          </label>
          <label class="form__input--radio">
            <input type="radio" name="gender" value="3" {{ old('gender')==3?'checked':'' }} /> その他
          </label>
          @error('gender')<div class="form__error">{{ $message }}</div>@enderror
        </div>
      </div>

      
      <div class="form__group">
        <div class="form__group-title">
          <span class="form__label--item">メールアドレス</span>
          <span class="form__label--required">※</span>
        </div>
        <div class="form__group-content">
          <div class="form__input--mailaddtext">
            <input type="email" name="email" value="{{ old('email') }}" placeholder="例:test@example.com" />
            @error('email')<div class="form__error">{{ $message }}</div>@enderror
          </div>
        </div>
      </div>

      
      <div class="form__group">
        <div class="form__group-title">
          <span class="form__label--item">電話番号</span>
        </div>
        <div class="form__group-content tel">
          <div class="form__input--teltext">
            <input type="tel" name="tel1" value="{{ old('tel1') }}" placeholder="080" />
            @error('tel1')<div class="form__error">{{ $message }}</div>@enderror
          </div>
          <span class="tel-hyphen">-</span>
          <div class="form__input--teltext">
            <input type="tel" name="tel2" value="{{ old('tel2') }}" placeholder="1234" />
            @error('tel2')<div class="form__error">{{ $message }}</div>@enderror
          </div>
          <span class="tel-hyphen">-</span>
          <div class="form__input--teltext">
            <input type="tel" name="tel3" value="{{ old('tel3') }}" placeholder="5678" />
            @error('tel3')<div class="form__error">{{ $message }}</div>@enderror
          </div>
        </div>
      </div>

      
      <div class="form__group">
        <div class="form__group-title">
          <span class="form__label--item">住所</span>
        </div>
        <div class="form__group-content">
          <div class="form__input--mailaddtext">
            <input type="text" name="address" value="{{ old('address') }}" placeholder="例: 東京都千代田区" />
            @error('address')<div class="form__error">{{ $message }}</div>@enderror
          </div>
        </div>
      </div>

      
      <div class="form__group">
        <div class="form__group-title">
          <span class="form__label--item">建物名・部屋番号</span>
        </div>
        <div class="form__group-content">
          <div class="form__input--mailaddtext">
            <input type="text" name="building" value="{{ old('building') }}" placeholder="例: ○○マンション" />
          </div>
        </div>
      </div>

      
      <div class="form__group">
        <div class="form__group-title">
          <span class="form__label--item">お問い合わせの種類</span>
          <span class="form__label--required">※</span>
        </div>
        <div class="form__group-content">
          <div class="form__input--kindstext">
            <select name="category_id">
              <option value="">選択してください</option>
              @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id')==$category->id?'selected':'' }}>
                  {{ $category->name }}
                </option>
              @endforeach
            </select>
          </div>
          @error('category_id')<div class="form__error">{{ $message }}</div>@enderror
        </div>
      </div>

      
      <div class="form__group form__group--textarea">
        <div class="form__group-title">
          <span class="form__label--item">お問い合わせ内容</span>
        </div>
        <div class="form__group-content">
          <div class="form__input--kindscontenttext">
            <textarea name="content" placeholder="資料をいただきたいです">{{ old('content') }}</textarea>
            @error('content')<div class="form__error">{{ $message }}</div>@enderror
          </div>
        </div>
      </div>

      
      <div class="form__button">
        <button class="form__button-submit" type="submit">確認画面</button>
      </div>
    </form>
  </main>
</body>
</html>
