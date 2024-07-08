<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Error | 404</title>
    <style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body{
        width: 100vw;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        background: #fff;
        }

    #text{
        font-size: 10rem;
        font-weight: 1000;
        background-image: url("https://i.pinimg.com/236x/5b/8e/fb/5b8efbc12aa8846697f3fe27e4d11d5e.jpg");
        background-clip: text;
        -webkit-background-clip: text;
        color: transparent;
    }
    p{
        margin: 16px 0;
        font-weight: 600;
        font-size: 20px;
    }
    span{
        font-size: 16px;
    }
    a{
        display: block;
        background-color: rgb(43, 43, 228);
        color: #fff;
        padding: 10px 30px;
        font-size: 20px;
        margin-top: 16px;
        border-radius: 25px;
        text-decoration: none;
    }
    </style>
</head>
<body>

    <h1 id="text">OOps!</h1>
    <p>404 - PAGE NOT FOUND</p>
    <span>The page you are looking for might have been removed</span>
    <span>had it's name changed or it's temporarily unavailable</span>

    <a href="{{ route('dashboard') }}">GO TO HOMEPAGE</a>


</body>
</html>
