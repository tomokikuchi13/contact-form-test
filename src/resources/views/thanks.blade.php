<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>thank</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
</head>

<body>
  <main class="thanks-page">
    
    <div class="thanks-page__background-text">Thank You</div>

    
    <div class="thanks-page__content">
      <p class="thanks-page__message">お問い合わせありがとうございました。</p>

      
      <a href="{{ route('contact.show') }}" class="thanks-page__home-button">HOME</a>
    </div>
  </main>
</body>

</html>
