<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    
    <script defer src="../js/face-api.min.js"></script>
    <script defer src="../js/webcam.js"></script>
    <script defer src="../js/init.js"></script>
    <script defer src="../js/register.js"></script>


    <style>
        canvas {
            position: absolute;
            /*Wajib iki*/
        }
    </style>
</head>

<body>
    <div id="video"></div>
    <form id="form" action="" method="post" enctype="multipart/form-data">
        Name: <input type="text" name="name"><br>
        <input id="submit" type="submit" value="Submit">
</body>



</html>