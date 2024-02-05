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
      width: 800px;
      min-height: 50px;
      backdrop-filter: blur(10px);
      box-shadow: 0 0 30px rgb(0, 0, 0);
      border-radius: 10px;
      margin-top: 15vh;
      margin-bottom: 5vh;
    }

    .input {
      text-align: center;
      background-color: #959bcf;
      margin-top: 30px;
      border: 1px solid;
      border-radius: 5px;
      cursor: pointer;

    }

    .submit {
      width: 80px;
      background-color: #959bcf;
      border: 1px solid;
      border-radius: 5px;
      cursor: pointer;

    }

    .bullet {
      /* float: left; */
      height: 25px;
      width: 100px;
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

    .grey {
      background-color: #a7a6ba;
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
  <title>Complaint</title>
  <script src="https://kit.fontawesome.com/06d164d474.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
</head>

<body>

  <!-- navbar start -->
  <script>
    $(function () {
      $("#nav-placeholder").load("nav2.php");
    });
  </script>
  <div id="nav-placeholder"></div>
  <!-- navbar end -->



  <?php
  include('../connection.php');


  if (isset($_POST['submit'])) {
    if ($_POST['ftext'] != "null") {


      $countQ = "SELECT * FROM feedback";
      $countR = mysqli_query($con, $countQ);
      $fid = mysqli_num_rows($countR);
      $fid += 1;

      $uid = $_SESSION['user_id'];
      $ftext = $_POST['ftext'];
      $fdate = $_POST['cdate'];

      $query = "INSERT INTO feedback VALUES ('$fid', '$uid', '$ftext','$fdate', '0')";
      if (mysqli_query($con, $query)) {
        // echo "<div class='successful'><p>Successfully submitted the complain!</p></div>";
      } else {
        throw new Exception(mysqli_error($con));
      }
    }
  }
  ?>



  <div class="main">
    <div class="box">
      <!-- <h1>Submit Complaint</h1> -->
      <form method="post">
        <select class="input" id="ftext" name="ftext" required>
          <option value='null'>Select Your Complaint</option>
          <option value='Bill Not Correct'>Bill Not Correct</option>
          <option value='Bill Generated Late'>Bill Generated Late</option>
          <option value='Transaction Not Processed'>Transaction Not Processed</option>
          <option value='Previous Complaint Not Processed'>Previous Complaint Not Processed</option>
        </select>
        <input placeholder="Today's Date" class="input" type="hidden" id="cdate" name="cdate" value="<?php $d = strtotime('today');
        echo date('Y-m-d', $d) ?>" required />
        <input type="submit" class="submit" value="Submit" name="submit">
      </form>



      <?php
      $sql = "SELECT * FROM feedback WHERE cid='" . $_SESSION['user_id'] . "'";
      $result = $con->query($sql);
      ?>

      <div class="table-container">
        <h1>Complaint Record</h1>
        <table>
          <tr>
            <!-- <th>Complain id</th> -->
            <th>Complaint</th>
            <th>Complaint date</th>
            <th>Action</th>
          </tr>
          <?php
          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              echo "<tr>";
              // echo "<td>" . $row["fid"] . "</td>";
              echo "<td>" . $row["ftext"] . "</td>";
              echo "<td>" . $row["fdate"] . "</td>";
              if ($row["processed"] == "0")
                echo "<td><div class='bullet grey'>In process</div></td>";
              else if ($row["processed"] == "1")
                echo "<td><div class='bullet green'>Processed</div></td>";
              else
                echo "<td><div class='bullet red'>Rejected</div></td>";
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