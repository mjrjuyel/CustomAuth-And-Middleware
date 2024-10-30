<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('contents') }}/assets/css/style.css">
</head>

<body>
    <div class="box">
        <form action="{{ url('customer/register/insert') }}" method="post" class="div_form">

            @csrf
            <h2 class="form_title">SignUp Page</h2>
            @error('email')
                <strong style="color:red;">{{ $message }}</strong>
            @enderror
            @error('pass')
                <strong style="color:red;">{{ $message }}</strong>
            @enderror
            <div class="input_div">
                <input type="text" class="form_input" required="required" name="name">
                <label class="input_label">Name:</label>
                <i></i>
            </div>
            <div class="input_div">
                <input type="Email" class="form_input" required="required" name="email">
                <label class="input_label">Email:</label>
                <i></i>
            </div>
            <div class="input_div">
                <input type="password" class="form_input" required="required" name="pass">
                <label class="input_label">Password:</label>
                <i></i>
            </div>
            <div class="form_links">
                <a href="{{ url('customer/login') }}" class="forget_pass">Sign In</a>
            </div>
            <input class="submit_button" onclick="document.getElementById('load').style.visibility ='visible'"
                id="submit" type="submit">
            <div id="load" class="load"></div>
        </form>
    </div>
    <script>
    </script>
</body>

</html>
