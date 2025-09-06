<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Register</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/login.css') }}" />
</head>
<body>
  <!-- ヘッダー -->
  <header class="header">
    <div class="header__logo">FashionablyLate</div>
    <a href="{{ route('login') }}" class="header__register">login</a>
  </header>

  <!-- メインコンテンツ -->
  <main class="contents">
    <div class="login-title">Register</div>
    <div class="login-box">
      <form action="{{ route('register') }}" method="post" class="login-form">
        @csrf

        <!-- お名前 -->
        <div class="form-group">
          <label for="name">お名前</label>
          <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="例：山田太郎" required>
          @error('name')
              <p class="error">{{ $message }}</p>
          @enderror
        </div>

        <!-- メールアドレス -->
        <div class="form-group">
          <label for="email">メールアドレス</label>
          <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="例：test@example.com" required>
          @error('email')
              <p class="error">{{ $message }}</p>
          @enderror
        </div>

        <!-- パスワード -->
        <div class="form-group">
          <label for="password">パスワード</label>
          <input type="password" id="password" name="password" placeholder="例：coachtech1106" required>
          @error('password')
              <p class="error">{{ $message }}</p>
          @enderror
        </div>

        <!-- 登録ボタン -->
        <button type="submit" class="login-button">登録</button>
      </form>
    </div>
  </main>
</body>
</html>
