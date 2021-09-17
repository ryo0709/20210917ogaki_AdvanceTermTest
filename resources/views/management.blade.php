@extends('layouts.default')
<link rel="stylesheet" href="{{ asset('css/reset.css') }}">
<style>
  .manegement {
    width: 100%;
    margin: 30px auto;
    text-align: center;
  }

  .management-system {
    padding-top: 45px;
    margin: 0 60px;
    border: solid 1px;
  }

  table {
    margin: 0 60px;
    border-collapse: collapse;
    border-spacing: 0;
  }

  th {
    text-align: left;
    padding: 20px 0px 20px 60px;
    font-weight: bold;
    font-size: 18px;
    width: 180px;
    margin-top: 20px;
  }

  td {
    text-align: center;
    width: 650px;
  }

  .item {
    height: 61px;
    margin-top: 10px;
  }

  .txt {
    display: block;
    width: 100%;
    height: 50px;
    border: 1px solid #999;
    border-radius: 5px;
    box-sizing: border-box;
    font-size: 18px;
  }

  .fullname {
    width: 100%;
  }

  .gender {
    width: 100%;
  }

  .flex {
    display: flex;
    text-align: center;
    align-items: center;
    width: 750px;
  }

  input[type=radio] {
    width: 40px;
    height: 40px;
    vertical-align: middle;
  }

  .opinion {
    position: relative;
    display: block;
    align-items: center;
  }

  .opinion:hover .opinion-hide {
    display: inline-block;
  }

  .opinion-hide {
    position: absolute;
    display: none;
    padding: 5px 5px 0;
    background-color: white;
    /* 背景色（透明度） */
    width: 100%;
    height: 100%;
    top: 0%;
    left: 0%;
    /* 表示位置 */
    font-size: 90%;
    text-align: left;
    vertical-align: middle;
  }

  .opinion-hide:after {
    content: "";
    /* コンテンツの挿入 */
    position: absolute;
    /* 親要素を基準 */
    top: -500%;
  }


  ul {
    display: flex;
    list-style: none;
    text-decoration: none;
  }

  li {
    border-collapse: collapse;
    border: 1px solid #999;
    background: #ffffff;
    padding: 2px 4px;
    width: 10px;
    text-align: center;
  }

  .page-link {
    text-decoration: none;
    font-size: 12px;
    width: 100%;
  }

  .page-item {
    padding: 1px 7px;
  }

  .Paginator {
    display: flex;
    justify-content: space-between;
    margin: 60px 60px 30px;
  }

  .btn {
    text-align: center;
    border: 2px solid #999;
    color: white;
    background-color: black;
    font-size: 18px;
    padding: 8px 16px;
    margin-top: 20px;
    border-radius: 5px;
    cursor: pointer;
    width: 160px;
    outline: none;
  }

  .btn-delete {
    text-align: center;
    border: 2px solid #999;
    color: white;
    background-color: black;
    font-size: 18px;
    padding: 2px 8px;
    border-radius: 5px;
    cursor: pointer;
    margin-top: 0px auto;
    width: 90px;
    outline: none;
  }


  .created_at {
    width: 50%;
  }

  .updated_at {
    width: 50%;
    margin-left: 0px;
  }

  .center {
    margin: 0 20px;
  }

  .reset {
    display: block;
    padding-top: 10px;
    padding-bottom: 30px;
  }

  .list {
    border-bottom: 2px solid;
    text-align: left;
    margin: 0;
    padding: 0;
  }

  .list-id {
    border-bottom: 2px solid;
    text-align: center;
    margin: 0;
    padding: 0;
  }

  .item {
    margin-bottom: 15px;
    text-align: left;
  }

  .item-center {
    margin-bottom: 15px;
    text-align: center;
  }
</style>
@section('title', '管理システム')

@section('content')
<form action="management" method="GET">
  @csrf
  <div class="manegement">
    <div class="management-system">
      <table>
        <tr>
          <th>お名前
          <td class="flex">
            <div class="fullName">
              <input type="text" name="fullname" class="txt">
            </div>
            <p class="center">&nbsp;&nbsp;</p>
            <div class="gender">
              <span style="font-weight: bold;">性別</span>
              <input type="radio" name="gender" value="" checked style="margin-left: 20px;">全て
              <input type="radio" name="gender" value="1" style="margin-left: 20px;">男性
              <input type="radio" name="gender" value="2" style="margin-left: 20px;">女性
            </div>
          </td>
          </th>
        </tr>
        <tr>
          <th>
            登録日
            <div>
          <td class="flex">
            <div class="created_at">
              <input type="date" name="created_at" class="txt">
            </div>
            <p class="center">~</p>
            <div class="updated_at">
              <input type="date" name="updated_at" class="txt">
            </div>
          </td>
    </div>
    </th>
    </tr>
    <tr>
      <th>メールアドレス
      <td>
        <input type="text" name="email" class="txt" style="width:46%;">
      </td>
      </th>
    </tr>
    </table>
    <input type="submit" value="検索" class="btn"><br>
    <a href="/management" class="reset">リセット</a>
  </div>
  </div>

  <div class="Paginator">
    @if (count($items) >0)
    <p>全{{ $items->total() }}件中&nbsp;&nbsp;
      {{ ($items->currentPage() -1) * $items->perPage() + 1}} ~
      {{ (($items->currentPage() -1) * $items->perPage() + 1) + (count($items) -1)  }}件
    </p>
    @else
    <p>データがありません。</p>
    @endif
    {{$items->appends(request()->query())->links()}}
  </div>
  @if (@isset($items))
  <table>
    <tr>
      <th class="list-id">ID</th>
      <th class="list">お名前</th>
      <th class="list">性別</th>
      <th class="list">メールアドレス</th>
      <th class="list">ご意見</th>
      <th class="list"></th>
    </tr>
    @foreach($items as $item)
    <tr>
      <td class="item-center"> {{$item->id}} </td>
      <td class="item"> {{$item->fullname}} </td>
      <td class="item"> @if ($item->gender == 1)
        <p>男性</p>
        @else
        <p>女性</p>
        @endif
      </td>
      <td class="item"> {{$item->email}} </td>
      <td class="opinion item">
        @if(strlen($item->opinion) <= 50) <p>{{ $item->opinion }}</p>
          @else
          <p>{{ (Str::limit($item->opinion, 50, '(ご意見は25文字以上の場合は...)'))}}
            <span class="opinion-hide">{{ $item->opinion }}</span>
          </p>
          @endif
      </td>
      <td class="item-center">
        <form action="{{ route('delete', ['id' => $item->id]) }}" method="post" class="item-center">
          @csrf
          <button class="btn-delete center">削除</button>
        </form>
      </td>
    </tr>
    @endforeach
  </table>

  @endif
  @endsection