<?php
session_start();

if ($_SESSION['customer_login_status'] != "loged in" and !isset($_SESSION['user_id']))
  header("Location:../login.php");

if (isset($_GET['sign']) and $_GET['sign'] == "out") {
  $_SESSION['customer_login_status'] = "loged out";
  unset($_SESSION['user_id']);
  header("Location:../index.php");
}
include('../connection.php');

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
      background: white;
    }

    .main {
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 95vh;
      background: #C5D5F8;
    }

    .box {
      text-align: center;
      width: 550px;
      min-height: 50px;
      backdrop-filter: blur(10px);
      box-shadow: 0 0 30px rgb(0, 0, 0);
      border-radius: 10px;
      margin-top: 15vh;
      margin-bottom: 5vh;
    }

    .bullet {
      float: left;
      height: 20px;
      width: 40px;
      margin-bottom: 15px;
      border: 1px solid black;
      clear: both;
    }

    .red {
      background-color: red;
    }

    .green {
      background-color: #3B7A57;
    }

    .box h1 {
      padding-top: 20px;
    }


    #dbtn {
      width: 40%;
      height: 30px;
      border: none;
      margin: 15 0 10 0px;
      border-radius: 10px;
      background-color: rgba(0, 0, 0, 0.658);
      color: white;
    }

    #dbtn:hover {
      background-color: rgba(246, 241, 241, 0.305);
      color: rgb(0, 0, 0);
      box-shadow: 0 0 30px rgb(0, 0, 0);
    }

    .btn {
      cursor: pointer;
      height: 20px;
      width: 40px;

    }

    .btno {
      margin-left: 10px;
    }

    
    /* table css start */

    .table-container {
      width: fit-content;
      height: 60%;
      margin: auto;
      padding-bottom: 40px;
    }

    table {
      border-collapse: collapse;
      width: 400px;
      margin-top: 20px;
    }

    th,
    td {
      border: 1px solid black;
      padding: 6px;
      text-align: center;
    }
  </style>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Download</title>
  <script src="https://kit.fontawesome.com/06d164d474.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
  <!-- <script src="html2pdf.bundle.min.js"></script> -->
  <script src="https://rawgit.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>


</head>

<body id="body">
  <?php
  include('../connection.php');
  $sql = "SELECT * FROM billing WHERE id='" . $_SESSION["bid"] . "'";
  $result = $con->query($sql);

  if (isset($_POST['submit'])) {
    $sq = "update billing set status='PROCESSED' where id='" . $_SESSION["bid"] . "'";
    if (mysqli_query($con, $sq)) {
      header("refresh:0");
    }
  }

  ?>
  <!-- navbar start -->
  <script>
    $(function () {
      $("#nav-placeholder").load("nav2.php");
    });
  </script>
  <div id="nav-placeholder"></div>
  <div class="main" id="tabled">
    <div class="box">



      <div class="table-container">
        <h1>Bill</h1>
        <table>
          <?php
          while ($row = $result->fetch_assoc()) {
            echo "<tr><th>Invoice id</th><td>" . $row["id"] . "</td></tr>";
            echo "<tr><th>Units</th><td>" . $row["units"] . "</td></tr>";
            echo "<tr><th>Amount</th><td>" . $row["amount"] . "</td></tr>";
            echo "<tr><th>Bill date</th><td>" . $row["bdate"] . "</td></tr>";
            echo "<tr><th>Deadline</th><td>" . $row["ddate"] . "</td></tr>";
            if ($row["status"] == "PROCESSED") {
              echo "<tr><th colspan='2'>PAID</th></tr>";
            } else {
              echo "<tr><th colspan='2'>DUES</th></tr>";
              echo "<tr>
                        <th colspan='2'>
                          <form method='post'>
                          <span> Pay With  → </span>
                            <button class='btno' name='submit' type='submit' value='submit'><img src='../picture/bkash.png' class='btn'></button>
                            <button class='btno' name='submit' type='submit' value='submit'><img src='../picture/rocket.png' class='btn'></button>
                            <button class='btno' name='submit' type='submit' value='submit'><img src='../picture/nagad.png' class='btn'></button>
                          </form>
                        </th>
                    </tr>";
            }
            echo "<tr><th colspan='2'><button id='dbtn'>Download PDF</button></th></tr>";
          }
          ?>
        </table>

      </div>
    </div>
  </div>

  <script>
    const btn = document.getElementById("dbtn");
    btn.addEventListener('click', function () {
      var element = document.getElementById('tabled');
      html2pdf(element);
    });
  </script>

  <!-- footer start -->
  <script>
    $(function () {
      $("#footer-placeholder").load("../footer.php");
    });
  </script>
  <div id="footer-placeholder"></div>
  <!-- footer end -->


</body>

</html>