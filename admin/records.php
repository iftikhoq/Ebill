<?php
session_start();

if ($_SESSION['admin_login_status'] != "loged in" and !isset($_SESSION['user_id']))
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
      width: 800px;
      min-height: 50px;
      backdrop-filter: blur(10px);
      box-shadow: 0 0 30px rgb(0, 0, 0);
      border-radius: 10px;
      margin-top: 15vh;
      margin-bottom: 5vh;
    }

    .bullet {
      /* float: left; */
      height: 23px;
      width: 70px;
      margin: auto;
      /* margin-bottom: 15px; */
      border: 1px solid black;
      border-radius: 5px;
      clear: both;
    }

    .red {
      background-color: #FF2323;
    }

    .green {
      background-color: #34B433;
    }

    .box h1 {
      padding-top: 20px;
    }


    /* table css start */

    .table-container {
      width: fit-content;
      height: 100%;
      margin: auto;
      padding-bottom: 40px;
    }

    table {
      border-collapse: collapse;
      width: 650px;
      margin-top: 20px;
    }

    th,
    td {
      border: 1px solid black;
      padding: 8px;
      text-align: center;
    }
  </style>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bill Record</title>
  <script src="https://kit.fontawesome.com/06d164d474.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
</head>

<body>

  <!-- navbar start -->
  <script>
    $(function () {
      $("#nav-placeholder").load("nav3.php");
    });
  </script>
  <div id="nav-placeholder"></div>

  <div class="main">
    <div class="box">

      <?php
      include('../connection.php');
      $duesQ = "SELECT * FROM billing WHERE  status='PENDING'";
      $duesR = $con->query($duesQ);
      $paidQ = "SELECT * FROM billing WHERE  status='PROCESSED'";
      $paidR = $con->query($paidQ);
      ?>

      <div class="table-container">
        <h1>Bill Record</h1>
        <table>
          <tr>
            <th>Customer id</th>
            <th>Units</th>
            <th>Amount</th>
            <th>Bill date</th>
            <th>Deadline</th>
            <th>Status</th>
          </tr>
          <?php
          if ($duesR->num_rows > 0) {
            while ($row = $duesR->fetch_assoc()) {
              echo "<tr>";
              echo "<td>" . $row["uid"] . "</td>";
              echo "<td>" . $row["units"] . "</td>";
              echo "<td>" . $row["amount"] . "</td>";
              echo "<td>" . $row["bdate"] . "</td>";
              echo "<td>" . $row["ddate"] . "</td>";
              echo "<td><div><div class='bullet red'>Dues</div></td>";
            }
            echo "</tr>";
          }

          if ($paidR->num_rows > 0) {
            while ($row = $paidR->fetch_assoc()) {
              echo "<tr>";
              echo "<td>" . $row["uid"] . "</td>";
              echo "<td>" . $row["units"] . "</td>";
              echo "<td>" . $row["amount"] . "</td>";
              echo "<td>" . $row["bdate"] . "</td>";
              echo "<td>" . $row["ddate"] . "</td>";
              echo "<td><div><div class='bullet green'>Paid</div></td>";

            }
            echo "</tr>";
          }

          ?>
        </table>

      </div>
    </div>
  </div>


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