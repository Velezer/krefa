<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>

  <script defer src="<?=base_url()?>/js/face-api.min.js"></script>
  <script defer src="<?=base_url()?>/js/webcam.js"></script>
  <script defer src="<?=base_url()?>/js/init.js"></script>
  <script defer src="<?=base_url()?>/js/find.js"></script>


  <style>
    body {
      margin: 0;
      padding: 0;
      width: 100vw;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    canvas {
      position: absolute;
      /*Wajib iki*/
    }
  </style>
</head>

<body>
  <div id="video"></div>
</body>


</html>