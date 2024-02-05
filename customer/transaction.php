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
      background:  #C5D5F8 ;
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
      font-family: Times New Roman, serif;
      font-size: 15px;
      /* float: left; */
      height: 22px;
      width: 40px;
      margin: auto;
      cursor: pointer;

      /* margin-bottom: 15px; */
      border: 1px solid;
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
      /* text-align: center; */
    }

  
  </style>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Transaction</title>
  <script src="https://kit.fontawesome.com/06d164d474.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
</head>

<body>
<?php
      if (isset($_POST['submit'])) {
          $_SESSION["bid"]=$_POST['submit'];
          header("location:download.php");
        }
      
  ?>
  <!-- navbar start -->
  <script>
    $(function() {
      $("#nav-placeholder").load("nav2.php");
    });
  </script>
  <div id="nav-placeholder"></div>
  <!-- navbar end -->

  <div class="main">
    <div class="box">
      
      <?php
      include('../connection.php');
      $sql = "SELECT * FROM billing WHERE uid='" . $_SESSION['user_id'] . "'";
      $result = $con->query($sql);
      ?>

      <div class="table-container">
        <h1>Transaction</h1>
        <table>
          <tr>
            <th>Invoice id</th>
            <th>Units</th>
            <th>Amount</th>
            <th>Bill date</th>
            <th>Deadline</th>
            <th>Status</th>
            <th>Download</th>
          </tr>
          <?php
          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              echo "<tr>";
              echo "<td>" . $row["id"] . "</td>";
              echo "<td>" . $row["units"] . "</td>";
              echo "<td>" . $row["amount"] . "</td>";
              echo "<td>" . $row["bdate"] . "</td>";
              echo "<td>" . $row["ddate"] . "</td>";
              echo "<form method='post'>";
              if ($row["status"] == "PROCESSED") {
                echo "<td><div class='bullet green'>Paid</button></td>";
              } else {
                echo "<td><button class='bullet red' name='submit' value='". $row["id"] . "' type='submit'>Pay</button></td>";
              }
              echo "<td><button class='bullet down' name='submit' value='" . $row["id"] . "' type='submit'><i class='fa-solid fa-download'></i></button></td></form>";
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
    $(function() {
      $("#footer-placeholder").load("../footer.php");
    });
  </script>
  <div id="footer-placeholder"></div>
  <!-- footer end -->


</body>

</html>