<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
  
  <style>
    body {
      font-size: 16px;
      margin: 0 auto;
    }

    h1 {
      font-size: 30px;
      letter-spacing: -4px;
      text-align: center;
      letter-spacing: 1.2;
      padding-top: 30px;
    }

    .content {
      margin: 0 auto;
      text-align: center;
    }
  </style>
</head>

<body>
  <h1>@yield('title')</h1>
  <div class="content">
    
    @yield('content')
  </div>
</body>

</html>