
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{url('subscribes')}}" method="post">
        @csrf
    <label for="">email </label>
        <input type="email" name="email" id="email">
       
        <button type=submit >submit</button>
    </form>
</body>
</html>