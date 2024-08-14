@extends("Interface.layouts.layout")
@section('content')

<head>
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: montserrat-bold, sans-serif;

        }

        /* header */

        /* header */
        /* body */
        /* element */
        #box {
            width: 80%;
            margin: auto;
            height: 600px;
        }

        form {
            margin-top: 220px;

        }

        #box h1 {
            background: linear-gradient(to right, #30CFD0 0%, #5e08c8 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        form .txt_field {
            position: relative;
            margin: 40px 70px;
        }

        .txt_field input {
            width: 100%;
            padding: 0 3px;
            height: 50px;
            font-size: 50px;
            border: none;
            background: none;
            outline: none;
        }

        .txt_field label {
            font-weight: 700;
            position: absolute;
            top: 50%;
            left: 5px;
            z-index: 1;
            font-size: 20px;
            color: #adadad;
            transform: translateY(-50%);
            pointer-events: none;
            transition: 0.3s;
        }

        .txt_field span::before {
            content: '';
            position: absolute;
            top: 50px;
            left: 0;
            width: 100%;
            height: 2px;
            background: #2691d9;
        }

        .txt_field input:focus~label,
        .txt_field input:valid~label {
            top: -5px;
            color: #2691d9;
        }

        .pass {
            float: right;
            margin-right: 60px;
            margin-bottom: 20px;
        }

        .pass a {
            color: black;

        }

        .pass a:hover {
            opacity: 0.5;
        }

        #box-button {
            width: 100%;
            display: flex;
            align-items: center;

            justify-content: center;
        }



        .input {
            width: 70%;
            height: 40px;
            margin: auto;
            font-size: 17px;
            border: 2px solid #2f3132;
            background-color: #2f3132;
            color: #000;
            transition: 0.2s;
        }

        .input:hover {
            background: none;
            color: #2f3132;
        }

        .signup_link {
            margin-top: 20px;
            width: 100%;
            text-align: center;
        }

        .signup_link a {
            color: black;

        }

        .signup_link a:hover {
            opacity: 0.5;
        }

        /* element */
        /* body */
        #footer {
            width: 100%;
            height: 60vh;
            background-color: #adadad;
            text-transform: uppercase;
        }

        #footer .footer-infor {
            width: 80%;
            margin-left: auto;
            margin-right: auto;
            display: flex;
            font-weight: 500;
            justify-content: space-between;
        }

        #footer .footer-infor .site-box {
            margin-top: 100px;
            width: 25%;
            height: 200px;
        }

        #footer .footer-infor .site-box a {
            font-weight: 600;
            text-decoration: none;
            font-size: 15px;
            color: black;
            line-height: 35px;
        }

        #footer .footer-infor .site-box a:hover {
            text-decoration: underline;

        }

        #footer .footer-icon {
            width: 100%;
            text-align: center;
        }

        #footer .footer-icon .box {
            width: 15%;
            height: 100px;
            margin: auto;
            display: flex;
            justify-content: space-between;
        }

        #footer .footer-icon .box i {
            font-size: 25px;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <div id="body" style="margin-top: 170px;">
        <div id="box">

            <form method="post" action="/login">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <h1 style="width: 100%; text-align: center;letter-spacing: 2px;">LOGIN TO DISCOVER</h1>
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $err )
                    {{$err}} <br>
                    @endforeach
                </div>
                @endif
                @if(session('thongbao'))
                <div class="alert alert-success">
                    {{session('thongbao')}}
                </div>
                @endif
                <div class="txt_field">

                    <input type="email" name="email" style="background-color: transparent; color: #000; font-size: 20px;" required>
                    <span></span>
                    <label for="">Email</label>
                </div>
                <div class="txt_field">
                    <input type="password" name="password" id="passwordField" style="background-color: transparent;color: #000; font-size: 20px;" required>
                    <span class="togglePassword" onclick="anHienMk()"></span>
                    <label for="">Password</label>
                </div>
                <div class="pass"><a href="">Forget the password?</a></div><br>
                <div id="box-button"><input class="input" type="submit" value="Login" style="color: #2691d9;"></div>
                <div class="signup_link">
                    Not a member ? <a href="{{ route('register') }}">Register now</a>
                </div>
            </form>

        </div>
    </div>

</body>
@endsection