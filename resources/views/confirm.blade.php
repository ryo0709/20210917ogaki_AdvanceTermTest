@extends('layouts.default')
<link rel="stylesheet" href="{{ asset('css/reset.css') }}">
<style>
  th {
    text-align: left;
    padding: 40px 50px 40px 100px;
    font-weight: bold;
    font-size: 20px;
    width: 250px;
  }

  td {
    padding: 10px 0px;
    font-size: 18px;
    width: 650px;
  }
  table {
    margin: 0 auto;
  }

  button {
    background-color: white;
    border: none;
  }

  .back {
    border-bottom: solid 1px;
    cursor: pointer;
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
</style>
@section('title', '内容確認')
@section('content')


<div class="section">
  <form action="/post" method="post">
    @csrf
    <table>
      <tr>
        <th>
          お名前
        </th>
        <td>
          {{ $lastName . $firstName }}
          <input name="fullname" value="{{ $lastName . $firstName }}" type="hidden">
          <input name="lastName" value="{{ $lastName }}" type="hidden">
          <input name="firstName" value="{{ $firstName }}" type="hidden">
        </td>
      </tr>
      <tr>
        <th>
          性別
        </th>
        <td>
          @if ($gender == 1)
          <p>男性</p>
          @else
          <p>女性</p>
          @endif
          <input name="gender" value="{{$gender}}" type="hidden">
        </td>
      </tr>
      <tr>
        <th>
          メールアドレス
        </th>
        <td>
          {{ $email }}
          <input name="email" value="{{$email}}" type="hidden">
        </td>
      </tr>
      <tr>
        <th>
          郵便番号
        </th>
        <td>
          {{ $postcode }}
          <input name="postcode" value="{{$postcode}}" type="hidden">
        </td>
      </tr>
      <tr>
      <tr>
        <th>
          住所
        </th>
        <td>
          {{ $address }}
          <input name="address" value="{{$address}}" type="hidden">
        </td>
      </tr>
      <tr>
        <th>
          建物名
        </th>
        <td>
          {{ $building_name }}
          <input name="building_name" value="{{$building_name}}" type="hidden">
        </td>
      </tr>
      <tr>
        <th>
          ご意見
        </th>
        <td>
          {{ $opinion }}
          <input name="opinion" value="{{$opinion}}" type="hidden">
        </td>
      </tr>
    </table>
    <input name="post" type="submit" value="送信" class="btn"><br>
    <button name="back" type="submit" value="true">
      <p class="back">修正する</p>
    </button>
  </form>
</div>
@endsection