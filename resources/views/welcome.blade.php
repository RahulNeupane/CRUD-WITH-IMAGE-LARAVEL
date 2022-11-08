<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Choose One</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>
        body{
            background:;
            overflow: hidden;
        }
        .container{
            height: 30vh;
            width:30vw;
            display: flex;
            justify-content: space-around;
            align-items: center;
        }
        h1{
            letter-spacing: 2px;
            text-transform: uppercase;
        }
    </style>
</head>
<body>
    <h1 class="text-center mt-5">Where to navigate ?</h1>
    <div class="container">
        <a class="btn btn-primary mt-3 mb-3" href="{{route('student.index')}}">Student</a>
        <a class="btn btn-primary mt-3 mb-3" href="{{route('image.index')}}">Product</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>
