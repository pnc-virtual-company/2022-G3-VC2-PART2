<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration request</title>
</head>
<body>
    <div>
        <h2>A student request to create an account with:</h2>
        <h4>Username: <span style="font-weight: bolder;">{{ $data['first_name'] }} {{ $data['last_name'] }}</span></h4>
        <h4>Email: <span style="font-weight: bolder;">{{ $data['email'] }}</span></h4>
        <a href="http://localhost:8080/requests" target="blank" style="cursor: pointer;"><button style="padding: 10px 25px 10px 25px; background-color: #2EA3F2; border: none; font-size: 15px; font-weight: bold; color: white; border-radius: 5px; letter-spacing: 0.5px; cursor: pointer;">See request</button></a>
    </div>
</body>
</html>