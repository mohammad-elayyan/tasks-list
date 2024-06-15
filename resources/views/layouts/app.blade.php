<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        * {
            /* margin: 0; */
            padding: 0;
            box-sizing: border-box;
        }

        .header,
        .footer {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            gap: 1rem;
        }

        .header {
            justify-content: center;
            margin: 20px 0;
        }

        .btn {
            align-items: center;
            border-style: none;
            background-color: #fff;
            border-radius: 24px;
            text-decoration: none;
            box-shadow: rgba(0, 0, 0, .2) 0 3px 5px -1px, rgba(0, 0, 0, .14) 0 6px 10px 0, rgba(0, 0, 0, .12) 0 1px 18px 0;
            color: #3c4043;
            cursor: pointer;
            display: inline-flex;
            height: 40px;
            letter-spacing: .25px;
            font-weight: 600;
            padding: 2px 24px;
            text-align: center;
            text-transform: none;
            transition: all 280ms cubic-bezier(.4, 0, .2, 1), ;

        }

        .btn:hover {
            background: #F1F9FE;
            color: #174ea6;
            box-shadow: rgba(0, 0, 0, .2) 0 3px 5px 1px, rgba(0, 0, 0, .14) 0 6px 10px 2px, rgba(0, 0, 0, .12) 0 1px 18px 2px;
        }

        nav {
            display: flex;
            justify-content: center;
            margin-top: 50px
        }
    </style>
</head>

<body>

    <div class="header mt-5">
        @yield('header')
    </div>
    @if (session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show w-50 mx-auto position-absolute top-0 start-50 translate-middle-x"
            role="alert">
            <strong>success</strong> {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="content">
        @yield('content')
    </div>
    <div class="footer">
        @yield('footer')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
