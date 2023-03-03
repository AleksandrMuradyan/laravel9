<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>

    <meta charset="utf-8">

    <title>َAuthorization Through a token</title>



</head>

<body>

<form class="box" action="{{ route('token_login') }}" method="post">

    <h1>Authorization Through a token</h1>

    <input id="token_unique" type="text" class="form-control @error('token_unique') is-invalid @enderror" name="token_unique" value="{{ old('token_unique') }}" required autocomplete="token_unique" autofocus placeholder="Token">

    @error('token_unique')
    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
    @enderror
    <input type="submit" name="" value="Login">
@csrf
</form>

</body>

</html>
<style>
    body{

        margin: 0;

        padding: 0;

        font-family: sans-serif;

        background: #34495e;

    }

    .box{

        width: 300px;

        padding: 40px;

        position: absolute;

        top: 50%;

        left: 50%;

        transform: translate(-50%,-50%);

        background: #191919;

        text-align: center;

    }

    .box h1{

        color: white;

        text-transform: uppercase;

        font-weight: 500;

    }

    .box input[type = "text"],.box input[type = "password"]{

        border:0;

        background: none;

        display: block;

        margin: 20px auto;

        text-align: center;

        border: 2px solid #3498db;

        padding: 14px 10px;

        width: 200px;

        outline: none;

        color: white;

        border-radius: 24px;

        transition: 0.25s;

    }

    .box input[type = "text"]:focus,.box input[type = "password"]:focus{

        width: 280px;

        border-color: #2ecc71;

    }

    .box input[type = "submit"]{

        border:0;

        background: none;

        display: block;

        margin: 20px auto;

        text-align: center;

        border: 2px solid #2ecc71;

        padding: 14px 40px;

        outline: none;

        color: white;

        border-radius: 24px;

        transition: 0.25s;

        cursor: pointer;

    }

    .box input[type = "submit"]:hover{

        background: #2ecc71;

    }
</style>