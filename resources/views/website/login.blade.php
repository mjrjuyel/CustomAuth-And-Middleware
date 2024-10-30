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
        @error('email')
            <strong style="color:red;">{{ $message }}</strong>
        @enderror
        <form action="{{ url('customer/login/insert') }}" method="get" class="div_form">
            @csrf
            <h2 class="form_title">Login Page</h2>
            <div class="input_div">
                <input type="email" class="form_input" required="required" name="email">
                <label class="input_label">Email:</label>
                <i></i>

            </div>
            <div class="input_div">
                <input type="password" class="form_input" required="required" name="password">
                <label class="input_label">Password:</label>
                <i></i>
            </div>
            <div class="form_links">
                <a href="#" class="forget_pass">Forget Password?</a>
                <a href="{{ url('customer/register') }}" class="forget_pass">Signup</a>
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
