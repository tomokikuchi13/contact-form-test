<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin</title>
<link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
<style>
body {
  font-family: 'Inika', serif;
  color: #8B7969;
  margin: 0;
  padding: 0;
  background-color: #fff;
}
header {
  width: 100%;
  border-bottom: 1px solid #E0DFDE;
}
.header__logo {
  width: 100%;
  height: 100px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 40px;
}
.admin__content {
  max-width: 1200px;
  margin: 0 auto;
  padding: 20px;
}
.admin__heading {
  font-size: 35px;
  margin-bottom: 20px;
  text-align: center;
}
/* 検索フォーム */
.admin__search-form {
  display: flex;
  gap: 10px;
  align-items: center;
  margin-bottom: 20px;
  padding: 10px 0;
  justify-content: space-between;
  width: 1183px;
  margin-left: auto;
  margin-right: auto;
}
.admin__search-form input[name="keyword"],
.admin__search-form select,
.admin__search-form input[type="date"] {
  height: 50px;
  font-size: 17px;
  padding: 0 12px;
  border: none;
  background-color: #E3DED9;
  color: #8B7969;
  box-sizing: border-box;
}
.admin__search-form input[name="keyword"] { width: 280px; }
.admin__search-form select[name="gender"] { width: 60px; }
.admin__search-form select[name="inquiry_type"] { width: 260px; }
.admin__search-form input[type="date"] { width: 149px; cursor: pointer; }
.admin__search-form .form__button-submit,
.admin__search-form .form__button-modify {
  height: 50px;
  width: 102px;
  font-size: 17px;
  font-family: 'Inika', serif;
  cursor: pointer;
  box-sizing: border-box;
}
.admin__search-form .form__button-submit {
  background-color: #82756A;
  color: #fff;
  border: none;
}
.admin__search-form .form__button-submit:hover { background-color: #6b5f55; }
.admin__search-form .form__button-modify {
  background: none;
  border: 1px solid #82756A;
  color: #82756A;
}
.admin__search-form .form__button-modify:hover { background-color: #82756A; color: #fff; }

/* データテーブル */
.admin-table__inner {
  width: 1183px;
  margin: 0 auto;
  border-collapse: collapse;
  border: 1px solid #E0DFDE;
  table-layout: fixed;
}
.admin-table__header {
  background-color: #8B7969;
  color: #fff;
  font-weight: bold;
  height: 59px;
  text-align: center;
  border-bottom: 1px solid #E0DFDE;
  padding: 0;
  box-sizing: border-box;
}
.admin-table__inner th:nth-child(1),
.admin-table__inner td:nth-child(1) { width: 150px; text-align: center; padding-left: 12px; }
.admin-table__inner th:nth-child(2),
.admin-table__inner td:nth-child(2) { width: 80px; text-align: center; }
.admin-table__inner th:nth-child(3),
.admin-table__inner td:nth-child(3) { width: 400px; text-align: center; padding-left: 12px; }
.admin-table__inner th:nth-child(4),
.admin-table__inner td:nth-child(4) { width: 450px; text-align: left; }
.admin-table__inner th:nth-child(5),
.admin-table__inner td:nth-child(5) { width: 123px; text-align: center; }
.admin-table__text {
  color: #8B7969;
  height: 60px;
  vertical-align: middle;
  border-top: 1px solid #E0DFDE;
  border-left: none;
  border-right: none;
  border-bottom: none;
  padding: 0;
  box-sizing: border-box;
}
.admin-table__text:last-child { border-bottom: 1px solid #E0DFDE; }

/* 詳細ボタン */
.detail-button {
  width: 76px;
  height: 39px;
  background-color: #F4F4F4;
  border: 1px solid #D9C6B5;
  color: #D9C6B5;
  font-family: 'Inika', serif;
  cursor: pointer;
  border-radius: 4px;
  display: flex;
  align-items: center;
  justify-content: center;
  text-decoration: none;
}

/* ページネーション */
.pagination {
  width: 1183px;
  margin: 10px auto 20px auto;
  text-align: center;
}
.pagination button {
  padding: 5px 10px;
  border: 1px solid #82756A;
  background: #fff;
  color: #82756A;
  cursor: pointer;
  font-family: 'Inika', serif;
  border-radius: 4px;
  margin: 0;
}
.pagination button.active,
.pagination button:hover { background-color: #82756A; color: #fff; }

/* CSSモーダル */
.modal-checkbox { display: none; }
.modal {
  position: fixed;
  top:0; left:0;
  width:100%; height:100%;
  background: rgba(0,0,0,0.4);
  display: flex;
  justify-content: center;
  align-items: center;
  opacity:0;
  pointer-events:none;
  transition: opacity 0.3s ease;
}
.modal-content {
  background:#fff;
  padding:20px;
  border-radius:8px;
  width:400px;
  position: relative;
}
.modal-checkbox:checked + .modal { opacity:1; pointer-events:auto; }
.modal-close {
  position: absolute;
  right:15px;
  top:10px;
  font-size:24px;
  font-weight:bold;
  cursor:pointer;
}
.delete-button {
  display:block;
  margin: 20px auto 0 auto;
  padding:8px 16px;
  background:#F44336;
  color:#fff;
  border:none;
  border-radius:4px;
  text-align:center;
  cursor:pointer;
  text-decoration:none;
}
</style>
</head>
<body>
<header class="header">
  <div class="header__logo">FashionablyLate</div>
</header>

<main>
<div class="admin__content">
  <div class="admin__heading">Admin</div>

  <!-- 検索フォーム -->
  <form class="admin__search-form">
    <input type="text" name="keyword" placeholder="名前 または メールアドレスを入力してください">
    <select name="gender">
      <option value="">性別</option>
      <option value="male">男性</option>
      <option value="female">女性</option>
    </select>
    <select name="inquiry_type">
      <option value="">お問い合わせ種類</option>
      <option value="product">商品について</option>
      <option value="other">その他</option>
    </select>
    <input type="date" name="created_at">
    <button type="submit" class="form__button-submit">検索</button>
    <button type="reset" class="form__button-modify">リセット</button>
  </form>

  <!-- ページネーション -->
  <div class="pagination">
    <button>&lt;</button>
    <button class="active">1</button>
    <button>2</button>
    <button>3</button>
    <button>4</button>
    <button>5</button>
    <button>&gt;</button>
  </div>

  <!-- データテーブル -->
  <table class="admin-table__inner">
    <thead>
      <tr>
        <th class="admin-table__header">お名前</th>
        <th class="admin-table__header">性別</th>
        <th class="admin-table__header">メールアドレス</th>
        <th class="admin-table__header">お問い合わせ種類</th>
        <th class="admin-table__header"></th>
      </tr>
    </thead>
    <tbody>
      <!-- 7行ダミーデータ -->
      <tr>
        <td class="admin-table__text">山田 太郎</td>
        <td class="admin-table__text">男性</td>
        <td class="admin-table__text">taro@example.com</td>
        <td class="admin-table__text">商品について</td>
        <td class="admin-table__text">
          <label for="modal-1" class="detail-button">詳細</label>
          <input type="checkbox" id="modal-1" class="modal-checkbox">
          <div class="modal">
            <div class="modal-content">
              <label for="modal-1" class="modal-close">&times;</label>
              <h2>詳細情報</h2>
              <p><strong>お名前:</strong> 山田 太郎</p>
              <p><strong>性別:</strong> 男性</p>
              <p><strong>メールアドレス:</strong> taro@example.com</p>
              <p><strong>お問い合わせ種類:</strong> 商品について</p>
              <a href="#" class="delete-button">削除</a>
            </div>
          </div>
        </td>
      </tr>

      <!-- 以下6行はID番号だけ変えて同様に作成 -->
      <tr>
        <td class="admin-table__text">鈴木 花子</td>
        <td class="admin-table__text">女性</td>
        <td class="admin-table__text">hanako@example.com</td>
        <td class="admin-table__text">その他</td>
        <td class="admin-table__text">
          <label for="modal-2" class="detail-button">詳細</label>
          <input type="checkbox" id="modal-2" class="modal-checkbox">
          <div class="modal">
            <div class="modal-content">
              <label for="modal-2" class="modal-close">&times;</label>
              <h2>詳細情報</h2>
              <p><strong>お名前:</strong> 鈴木 花子</p>
              <p><strong>性別:</strong> 女性</p>
              <p><strong>メールアドレス:</strong> hanako@example.com</p>
              <p><strong>お問い合わせ種類:</strong> その他</p>
              <a href="#" class="delete-button">削除</a>
            </div>
          </div>
        </td>
      </tr>

      <tr>
        <td class="admin-table__text">佐藤 次郎</td>
        <td class="admin-table__text">男性</td>
        <td class="admin-table__text">jiro@example.com</td>
        <td class="admin-table__text">商品について</td>
        <td class="admin-table__text">
          <label for="modal-3" class="detail-button">詳細</label>
          <input type="checkbox" id="modal-3" class="modal-checkbox">
          <div class="modal">
            <div class="modal-content">
              <label for="modal-3" class="modal-close">&times;</label>
              <h2>詳細情報</h2>
              <p><strong>お名前:</strong> 佐藤 次郎</p>
              <p><strong>性別:</strong> 男性</p>
              <p><strong>メールアドレス:</strong> jiro@example.com</p>
              <p><strong>お問い合わせ種類:</strong> 商品について</p>
              <a href="#" class="delete-button">削除</a>
            </div>
          </div>
        </td>
      </tr>

      <tr>
        <td class="admin-table__text">田中 美咲</td>
        <td class="admin-table__text">女性</td>
        <td class="admin-table__text">misaki@example.com</td>
        <td class="admin-table__text">その他</td>
        <td class="admin-table__text">
          <label for="modal-4" class="detail-button">詳細</label>
          <input type="checkbox" id="modal-4" class="modal-checkbox">
          <div class="modal">
            <div class="modal-content">
              <label for="modal-4" class="modal-close">&times;</label>
              <h2>詳細情報</h2>
              <p><strong>お名前:</strong> 田中 美咲</p>
              <p><strong>性別:</strong> 女性</p>
              <p><strong>メールアドレス:</strong> misaki@example.com</p>
              <p><strong>お問い合わせ種類:</strong> その他</p>
              <a href="#" class="delete-button">削除</a>
            </div>
          </div>
        </td>
      </tr>

      <tr>
        <td class="admin-table__text">高橋 健</td>
        <td class="admin-table__text">男性</td>
        <td class="admin-table__text">ken@example.com</td>
        <td class="admin-table__text">商品について</td>
        <td class="admin-table__text">
          <label for="modal-5" class="detail-button">詳細</label>
          <input type="checkbox" id="modal-5" class="modal-checkbox">
          <div class="modal">
            <div class="modal-content">
              <label for="modal-5" class="modal-close">&times;</label>
              <h2>詳細情報</h2>
              <p><strong>お名前:</strong> 高橋 健</p>
              <p><strong>性別:</strong> 男性</p>
              <p><strong>メールアドレス:</strong> ken@example.com</p>
              <p><strong>お問い合わせ種類:</strong> 商品について</p>
              <a href="#" class="delete-button">削除</a>
            </div>
          </div>
        </td>
      </tr>

      <tr>
        <td class="admin-table__text">小林 恵</td>
        <td class="admin-table__text">女性</td>
        <td class="admin-table__text">megumi@example.com</td>
        <td class="admin-table__text">その他</td>
        <td class="admin-table__text">
          <label for="modal-6" class="detail-button">詳細</label>
          <input type="checkbox" id="modal-6" class="modal-checkbox">
          <div class="modal">
            <div class="modal-content">
              <label for="modal-6" class="modal-close">&times;</label>
              <h2>詳細情報</h2>
              <p><strong>お名前:</strong> 小林 恵</p>
              <p><strong>性別:</strong> 女性</p>
              <p><strong>メールアドレス:</strong> megumi@example.com</p>
              <p><strong>お問い合わせ種類:</strong> その他</p>
              <a href="#" class="delete-button">削除</a>
            </div>
          </div>
        </td>
      </tr>

      <tr>
        <td class="admin-table__text">松本 拓也</td>
        <td class="admin-table__text">男性</td>
        <td class="admin-table__text">takuya@example.com</td>
        <td class="admin-table__text">商品について</td>
        <td class="admin-table__text">
          <label for="modal-7" class="detail-button">詳細</label>
          <input type="checkbox" id="modal-7" class="modal-checkbox">
          <div class="modal">
            <div class="modal-content">
              <label for="modal-7" class="modal-close">&times;</label>
              <h2>詳細情報</h2>
              <p><strong>お名前:</strong> 松本 拓也</p>
              <p><strong>性別:</strong> 男性</p>
              <p><strong>メールアドレス:</strong> takuya@example.com</p>
              <p><strong>お問い合わせ種類:</strong> 商品について</p>
              <a href="#" class="delete-button">削除</a>
            </div>
          </div>
        </td>
      </tr>

    </tbody>
  </table>

</div>
</main>
</body>
</html>
