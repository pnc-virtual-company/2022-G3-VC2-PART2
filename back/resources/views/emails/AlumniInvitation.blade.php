<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumni invitation</title>
</head>
<body>
    <div>
        <h2>You are invited as an alumni of PNC</h2>
        <h4>Use Email and Password below to login into your account:</h4>
        <h4>Email: <span style="font-weight: bolder;">{{ $data['email'] }}</span></h4>
        <h4>Password: <span style="font-weight: bolder;">{{ $data['password'] }}</span></h4>
        <a href="http://localhost:8080/login" target="blank" style="cursor: pointer;"><button style="padding: 10px 25px 10px 25px; background-color: #2EA3F2; border: none; font-size: 15px; font-weight: bold; color: white; border-radius: 5px; letter-spacing: 0.5px; cursor: pointer;">Login now</button></a>
    </div>
</body>
</html>