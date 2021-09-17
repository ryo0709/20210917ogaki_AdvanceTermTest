@extends('layouts.default')
<script src="https://yubinbango.github.io/yubinbango/yubinbango.js" charset="UTF-8"></script>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<link rel="stylesheet" href="{{ asset('css/reset.css') }}">

<style>
  * {
    margin: 0;
  }

  th {
    text-align: left;
    padding: 40px 50px 40px 10px;
    font-weight: bold;
    font-size: 18px;
    width: 160px;
  }

  td {
    padding: 10px 0px;
    text-align: center;
    width: 650px;
  }

  .gender {
    text-align: left;
  }

  input[type=radio] {
    width: 40px;
    height: 40px;
    vertical-align: middle;
  }

  .fullName {
    display: flex;
  }

  .lastName {
    width: 100%;
    padding-right: 10px;
  }

  .firstName {
    width: 100%;
    padding-left: 10px;
  }

  .example {
    color: #999;
    text-align: left;
    margin-top: 10px;
    margin-left: 40px;
  }

  .txt {
    display: inline-block;
    width: 100%;
    height: 50px;
    border: 1px solid #999;
    border-radius: 5px;
    box-sizing: border-box;
    margin-top: 20px;
    font-size: 18px;
  }

  .text {
    display: block;
    width: 650px;
    height: 50px;
    border: 1px solid #999;
    border-radius: 5px;
    box-sizing: border-box;
    text-align: left;
    font-size: 18px;
    margin-top: 15px;
  }

  .textarea {
    display: block;
    width: 650px;
    height: 150px;
    border: 1px solid #999;
    border-radius: 5px;
    box-sizing: border-box;
    text-align: left;
    margin-top: 20px;
    font-size: 18px;
  }

  .postCode {
    display: flex;
    align-items: center;
  }

  .mark {
    width: 5%;
    font-weight: bold;
  }

  .code {
    text-align: center;
    align-items: center;
    width: 94%;
  }

  button {
    padding: 10px 20px;
    background-color: #289ADC;
    border: none;
    color: white;
  }

  .error {
    color: red;
  }

  .btn {
    text-align: center;
    border: 2px solid #999;
    font-size: 12px;
    color: white;
    background-color: black;
    font-size: 18px;
    padding: 8px 16px;
    margin: 20px 0;
    border-radius: 5px;
    cursor: pointer;
    width: 160px;
    outline: none;
  }
  table {
    margin: 0 auto;
  }
</style>

@section('content')
@csrf
<div class="section">
  @section('title', 'お問い合わせ')
  <form action="/confirm" method="GET" class="h-adr">
    <table>
      <tr>
        <th>
          お名前<span style="color:red;">&nbsp;※</span>
          @error('lastName')
          <p class="error">{{$message}}</p>
          @enderror
          @error('firstName')
          <p class="error">{{$message}}</p>
          @enderror
        </th>
        <td class="fullName">
          <div class="lastName">
            <input name="lastName" type="text" class="txt" value="{{ old('lastName') }}">
            <p class="example">例）山田</p>
          </div>
          <div class="firstName">
            <input name="firstName" type="text" class="txt" value="{{ old('firstName') }}">
            <p class="example">例）太郎</p>
          </div>
        </td>
      </tr>
      <tr>
        <th>
          性別<span style="color:red;">&nbsp;※</span>
        </th>
        <td class="gender">
          <input type="radio" name="gender" value="1" checked <?= (old('gender') == "1") ? " checked" : ""; ?>>男性
          <input type="radio" name="gender" value="2" <?= (old('gender') == "2") ? " checked" : ""; ?>>女性
        </td>
      </tr>
      <tr>
        <th>
          メールアドレス<span style="color:red;">&nbsp;※</span>
          @error('email')
          <p class="error">{{$message}}</p>
          @enderror
        </th>
        <td>
          <input type="text" name="email" value="{{ old('email') }}" class="text">
          <p class="example">例）test@example.com</p>
        </td>
      </tr>
      <tr>
        <th>
          郵便番号<span style="color:red;">&nbsp;※</span>
          @error('postcode')
          <p class="error">{{$message}}</p>
          @enderror
        </th>
        <td>
          <div class="postCode">
            <div class="mark">
              〒
            </div>
            <div class="code">
              <span class="p-country-name" style="display:none;">Japan</span>
              <input type="text" name="postcode" value="{{ old('postcode') }}" class="p-postal-code sample text" maxlength="8" id="postcode" style="width: 620px;">
              <p class="example">例）123-4567</p>
            </div>
          </div>
        </td>
      </tr>
      <tr>
        <th>
          住所<span style="color:red;">&nbsp;※</span>
          @error('address')
          <p class="error">{{$message}}</p>
          @enderror
        </th>
        <td>
          <input type="text" name="address" value="{{ old('address') }}" class="p-region p-locality p-street-address p-extended-address text">
          <p class="example">例）東京都渋谷区千駄ヶ谷1-2-3</p>
        </td>
      </tr>
      <tr>
        <th>
          建物名
        </th>
        <td>
          <input type="text" name="building_name" value="{{ old('building_name') }}" class="text">
          <p class="example">例）千駄ヶ谷マンション101</p>
        </td>
      </tr>
      <tr>
        <th>
          ご意見<span style="color:red;">&nbsp;※</span>
          @error('opinion')
          <p class="error">{{$message}}</p>
          @enderror
        </th>
        <td>
          <textarea name="opinion" maxlength="120" class="textarea">{{ old('opinion') }}</textarea>
        </td>
      </tr>
    </table>
    <button type="submit" class="btn">確認</button>
  </form>
</div>
<script>
  $(function() {
    $("#postcode").change(function() {
      var str = $(this).val();
      str = str.replace(/[Ａ-Ｚａ-ｚ０-９－！”＃＄％＆’（）＝＜＞，．？＿［］｛｝＠＾～￥]/g, function(s) {
        return String.fromCharCode(s.charCodeAt(0) - 65248);
      });
      $(this).val(str);
    }).change();
  });
</script>
@endsection