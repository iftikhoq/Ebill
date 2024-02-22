<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<style>
    html,
    body {
        height: 100%;
    }

    .nav {
        position: fixed;
        background: #1D224E;
        height: 12vh;
        width: 100%;
        transition: top 0.5s;
        z-index: 10;
        border-bottom: 3px solid;
        border-color: rgb(0, 0, 0);
    }

    label.logo {
        padding-left: 50px;
        line-height: 15vh;
        font-size: 25px;
        font-weight: bold;
        color: white;
    }

    .nav ul {
        float: right;
        margin-right: 50px;
    }

    .nav ul li {
        display: inline-block;
        margin-top: 6vh;
    }

    .nav ul li a {
        color: rgb(255, 255, 255);
        font-size: 20px;
        font-weight: bold;
        padding: 5px 5px;
        border-radius: 5px;
        text-decoration: none;
    }

    .nav ul li a:hover {
        background-color:#585e8c;
        transition: .5s;
    }

    .checkbtn {
        font-size: 30px;
        color: rgb(248, 248, 248);
        float: right;
        height: 80px;
        margin-right: 50px;
        cursor: pointer;
        display: none;
    }

    .checkbtn i {
        line-height: 15vh;
    }

    #check {
        display: none;
    }

    @media (max-width: 1020px) {
        .checkbtn {
            display: block;
        }

        label.logo {
            padding-left: 60px;
            transition: .5s;
        }

        #side {
            position: absolute;
            width: 80%;
            margin: 5% 7% 0 10%;
            height: 52vh;
            border-radius: 10px;
            /* backdrop-filter: blur(10px); */
            background:  #1D224E ;
            top: 12vh;
            left: -100%;
            transition: 0.5s;
            text-align: center;
            font-weight: 900;
            z-index: 99999;
        }

        .nav ul li {
            display: block;
            margin-top: 4vh;
        }

        .nav ul li a {
            font-size: 20px;
            font-weight: bolder;
            padding: 1.5vh 20px;
            border-radius: 3px;
        }

        a:hover {
            background: none;
            color: rgb(14, 14, 14);
        }

        #check:checked~ul {
            left: 0;
        }
    }
</style>

<body>

    <script>
        var prevScrollpos = window.pageYOffset;
        window.onscroll = function () {
            var currentScrollPos = window.pageYOffset;
            if (prevScrollpos > currentScrollPos) {
                document.getElementById("navbar").style.top = "0";
                document.getElementById("side").style.left = "-100%";
            } else {
                document.getElementById("navbar").style.top = "-15vh";
                document.getElementById("side").style.left = "-100%";

            }
            prevScrollpos = currentScrollPos;
        }

        $('#check').click(function (e) {
            e.stopPropagation();
            document.getElementById("side").style.left = "0";
        });
        $(".main").on("click", function (e) {
            document.getElementById("side").style.left = "-100%";
        });
    </script>

    <div class="nav" id="navbar">
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fa-solid fa-bars"></i>
        </label>

        <label class="logo">
            <!-- <a href="profile.php">
                <img src="LOGO 2.png" height="60px" width="60px">

                <img src="Techzone(2).png" height="60px" width="120px">
            </a> -->

            <i class="fa-solid fa-bolt"></i> Electricity Bill Management

        </label>

        <ul id="side">
            <li><a href="cusrecord.php">Customer Record</a></li>
            <li><a href="generatebill.php">Generate Bill</a></li>
            <li><a href="records.php">Bill Records</a></li>
            <li><a href="complaint.php">Complaint Box</a></li>
            <li><a href="changepass.php">Change Password</a></li>
            <li><a href="?sign=out">Logout</a></li>
        </ul>
    </div>
</body>

</html>