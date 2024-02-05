<?php
include("../connection.php");
session_start();
if ($_SESSION['admin_login_status'] != "loged in" and !isset($_SESSION['user_id']))
  header("Location:../index.php");

if (isset($_GET['sign']) and $_GET['sign'] == "out") {
  $_SESSION['admin_login_status'] = "loged out";
  unset($_SESSION['user_id']);
  header("Location:../index.php");
}
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
      font-family: 'Times New Roman', Times, serif;
      color: rgb(0, 0, 0);
      background-image: none;
      background-size: cover;
    }

    .main {
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 95vh;
      background: #C5D5F8;
    }

    .box {
      display: inline-block;
      text-align: center;
      width: 550px;
      height: 420px;
      backdrop-filter: blur(10px);
      box-shadow: 0 0 30px rgb(0, 0, 0);
      border-radius: 10px;
      margin-top: 10vh;
    }

    .box h1 {
      padding-top: 15px;
      margin-bottom: 5px;
    }

    .input {
      display: inline-block;
      cursor: pointer;

      text-align: center;
      background-color: transparent;
      border-radius: 10px;
      margin-top: 10px;
      border: 1px solid;
      width: 70%;
      height: 30px;
    }

    /* .gtotal{
      display: inline-block;
      
    } */

    ::-webkit-input-placeholder {
      text-align: center;
      color: rgb(0, 0, 0);
    }

    .submit {
      width: 65%;
      height: 40px;
      border: none;
      margin: 3% 0 3% 0;
      border-radius: 10px;
      background-color: rgba(0, 0, 0, 0.658);
      color: rgba(255, 255, 255, 0.737);
    }

    .submit:hover {
      background-color: rgba(246, 241, 241, 0.305);
      color: rgb(0, 0, 0);
      box-shadow: 0 0 30px rgb(0, 0, 0);
    }

    .successful {
      color: green;
      text-align: center;
      margin-top: 0px;
    }

    .error {
      color: red;
      text-align: center;
      margin-top: 0px;
    }
  </style>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Generate Bill</title>
  <script src="https://kit.fontawesome.com/06d164d474.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
</head>

<body>
  <script>
    function calcost() {
      let txtval = document.getElementById("tunit");
      let val = txtval.value * 4;
      let show = document.getElementById("gtotal");
      show.innerText = val;
    }
  </script>

  <!-- navbar start -->
  <script>
    $(function() {
      $("#nav-placeholder").load("nav3.php");
    });
  </script>
  <div id="nav-placeholder"></div>
  <!-- navbar end -->


  <div class="main">
    <div class="box">

      <h1>Generate bill</h1>

      <form method="post">

        <select class="input" id="cid" name="cid" placeholder="ID" onchange="this.form.submit();" required>
          <option value='null'>Select customer id</option>
          <?php
          $sql = "SELECT * FROM customer";
          $result = $con->query($sql);
          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              echo "<option value='" . $row["cust_id"] . "'>" . $row["cust_id"] . "</option>";
            }
          }


          echo "</select>";
          // echo "</form>";
          // echo "<input type='text' class='input' value='".$_POST['cid']."' disabled>"
          ?>
          <input type="text" class="input" id="punit" name="punit" placeholder="Per unit cost 4" disabled>

          <input type="number" class="input" id="tunit" name="tunit" placeholder="Total unit" oninput="calcost()" required>

          <div class="input"><span id="gtotal">Total Cost</span></div>

          <!-- <input type="date" class="input" id="cdate" name="cdate"  required> -->

          <input placeholder="Today's Date" class="input" type="text"  id="cdate" name="cdate" value="<?php $d=strtotime('today');echo date('Y-m-d', $d)?>" required />
          <input placeholder="Deadline" class="input" type="text"  id="ddate" name="ddate" value="<?php $d=strtotime('+7 days');echo date('Y-m-d', $d)?>" required />
          <!-- <input type="date" class="input" id="ddate" name="ddate" required> -->

          <input type="submit" class="submit" value="Submit" name="submit">

      </form>

      <?php
      if (isset($_POST['submit'])) {
        $cid = $_POST['cid'];
        $tunit = $_POST['tunit'];
        $gtotal = $tunit * 4;
        $cdate = $_POST['cdate'];
        $ddate = $_POST['ddate'];

        $query = "SELECT * FROM billing";
        $result = mysqli_query($con, $query);

        $tid = mysqli_num_rows($result);
        $tid += 1;

        $query = "INSERT INTO billing VALUES ('$tid', '$cid', '$tunit', '$gtotal', 'PENDING', '$cdate', '$ddate')";
        try {
          if (mysqli_query($con, $query)) {
            echo "<div class='successful'><p>Successfully inserted!</p></div>";
          } else {
            throw new Exception(mysqli_error($con));
          }
        } catch (Exception $e) {
          if ($e->getCode() == 1062) {
            echo "<div class='error'><p>Duplicate Product Id Entry</p></div>";
          }
        }
      }
      ?>

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