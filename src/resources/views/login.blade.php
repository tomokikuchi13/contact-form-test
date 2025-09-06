<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/login.css') }}" />
</head>
<body>
  
  <header class="header">
    <div class="header__logo">FashionablyLate</div>
    <a href="{{ route('register.show') }}" class="header__register">Register</a>
  </header>

  
  <main class="contents">
    <div class="login-title">Login</div>
    <div class="login-box">
      <form action="{{ route('login') }}" method="post" class="login-form">
        @csrf

        
        <div class="form-group">
          <label for="email">メールアドレス</label>
          <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="例：test@example.com" required>
          @error('email')
              <p class="error">{{ $message }}</p>
          @enderror
        </div>

        
        <div class="form-group">
          <label for="password">パスワード</label>
          <input type="password" id="password" name="password" placeholder="例：coachtech1106" required>
          @error('password')
              <p class="error">{{ $message }}</p>
          @enderror
        </div>

        
        @if(session('login_error'))
            <p class="error">{{ session('login_error') }}</p>
        @endif

        
        <button type="submit" class="login-button">ログイン</button>
      </form>
    </div>
  </main>
</body>
</html>
