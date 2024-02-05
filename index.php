<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>

  <style>
    * {
      margin: 0;
      padding: 0;
    }

    body {
      font-family: Times New Roman, serif;
      color: rgb(0, 0, 0);
      background-image: none;
      background-size: cover;
    }

    .main {
      color: white;
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 95vh;
      background-image: url(https://images.unsplash.com/photo-1413882353314-73389f63b6fd?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D);
      background-size: cover;
    }

     .box {
      margin-top: 8vh;
      display: inline-block;
      text-align: center;
      width: 700px;
      height: 100px;
      backdrop-filter: blur(15px);
      box-shadow: 0 0 30px rgb(0, 0, 0);
      border-radius: 10px;
      text-shadow: 0 0 2px #fff;

    }

     .box h1 {
      padding-top: 25px;
      margin-bottom: 15px;
    }

    /*.input {
      text-align: center;
      background-color: transparent;
      border-radius: 10px;
      margin-top: 10px;
      border: 1px solid;
      width: 70%;
      height: 35px;
    }

    ::-webkit-input-placeholder {
      text-align: center;
      color: rgb(0, 0, 0);
    }

    .submit {
      width: 70%;
      height: 40px;
      border: none;
      margin: 5% 0 3% 0;
      border-radius: 10px;
      background-color: rgba(0, 0, 0, 0.658);
      color: rgba(255, 255, 255, 0.737);
    }

    .submit:hover {
      background-color: rgba(246, 241, 241, 0.305);
      color: rgb(0, 0, 0);
      box-shadow: 0 0 30px rgb(0, 0, 0);
    }

    .box p {
      margin-bottom: 6px;
    }

    .box a {
      color: black;
      text-decoration: none;
      font-weight: 600;
    }

    .box a:hover {
      font-weight: 600;
      font-size: 21px;
    }

    .error {
      color: red;
      text-align: center;
      margin-top: 10px;
    } */
  </style>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>E-Bill Management</title>
  <script src="https://kit.fontawesome.com/06d164d474.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
</head>

<body>

  <!-- navbar start -->
  <script>
    $(function () {
      $("#nav-placeholder").load("nav.php");
    });
  </script>
  <div id="nav-placeholder"></div>
  <!-- navbar end -->


  <div class="main">

    <div class="box">
      <h1>Electricity Bill Management</h1>
    </div>

  </div>

  <!-- footer start -->
  <script>
    $(function () {
      $("#footer-placeholder").load("footer.php");
    });
  </script>
  <div id="footer-placeholder"></div>
  <!-- footer end -->

</body>

</html>