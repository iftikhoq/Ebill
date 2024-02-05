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
      width: 900px;
      min-height: 50px;
      backdrop-filter: blur(10px);
      box-shadow: 0 0 30px rgb(0, 0, 0);
      border-radius: 10px;
      margin-top: 15vh;
      margin-bottom: 5vh;
    }

    .bullet {
      height: 25px;
      width: 65px;
      /* margin: auto; */
      border-radius: 5px;
      border: 1px solid ;
      cursor: pointer;

    }

    .red {
      background-color: #FF2323;
    }

    .green {
      background-color: #34B433;
      margin-right: 5px;

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
      width: 770px;
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
  <title>Complaint</title>
  <script src="https://kit.fontawesome.com/06d164d474.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>


</head>

<body>
  
<?php
  if (isset($_POST['submit'])) {
    include("../connection.php");
    $sql = "select * from feedback";
    $r = mysqli_query($con, $sql);
    $sql1 = "";

    if ($_POST['submit'][0] == 'a') {
      $id = substr($_POST['submit'], 1, null);
      $sql1 = "update feedback set processed='1' where fid='" . $id . "'";
    } else {
      $id = substr($_POST['submit'], 1, null);
      $sql1 = "update feedback set processed='2' where fid='" . $id . "'";
    }
    if (mysqli_query($con, $sql1)) {
      header("refresh:0");
    }
  }
  ?>

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
      $sql = "SELECT * FROM feedback WHERE processed='0'";
      $result = $con->query($sql);
      ?>

      <div class="table-container">
        <h1>Complaint Box</h1>
        <table>
          <tr>
            <th>Customer Id</th>
            <th>Complain Date</th>
            <th>Complain</th>
            <th>Action</th>
          </tr>
          <?php
          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              echo "<tr>";

              // echo "<td>" . $row["cid"] . "</td>";

              echo "<td>" . $row["cid"] . "</td>";
              echo "<td>" . $row["fdate"] . "</td>";
              echo "<td>" . $row["ftext"] . "</td>";
              echo "<td>
                    <form method='post'>
                    <button class='bullet green' name='submit' value='a" . $row["fid"] . "' type='submit'>Accept</button>
                    <button class='bullet red' name='submit' value='d" . $row["fid"] . "' type='submit'>Decline</button>
                    </form>
                  </td>";
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