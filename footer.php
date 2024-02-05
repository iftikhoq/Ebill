<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/06d164d474.js" crossorigin="anonymous"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        .footer-distributed {
            background: #1D224E;
            box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.12);
            box-sizing: border-box;
            width: 100%;
            text-align: left;
            font: bold 16px;
            padding: 55px 50px;
        }

        .footer-distributed .footer-left,
        .footer-distributed .footer-center,
        .footer-distributed .footer-right {
            display: inline-block;
            vertical-align: top;
        }


        /* Footer left */

        .footer-distributed .footer-left {
            width: 40%;
            text-align: center;
        }

        /* The company logo */
        .footer-distributed h3 {
            color: #ffffff;
            margin: 0;
            font-size: 40px;
        }

        .footer-distributed h3 span {
            color: lightseagreen;
        }

        .footer-distributed .footer-links {
            color: #ffffff;
            margin: 20px 0 12px;
            padding: 0;
        }

        .footer-distributed .footer-links a {
            display: inline-block;
            line-height: 1.8;
            font-weight: 400;
            text-decoration: none;
            color: inherit;
        }

        .footer-distributed .footer-links a:before {
            content: "|";
            font-weight: 300;
            font-size: 20px;
            left: 0;
            color: #fff;
            display: inline-block;
            padding-right: 5px;
        }

        .footer-distributed .footer-links span::after {
            content: "|";
            font-weight: 300;
            font-size: 20px;
            left: 0;
            color: #fff;
            display: inline-block;
            padding-right: 5px;
        }

        .footer-distributed .footer-icons {
            margin-top: 25px;
        }

        .footer-distributed .footer-icons i {
            display: inline-block;
            width: 38px;
            height: 38px;
            cursor: pointer;
            background-color: #7097EA;
            border-radius: 10px;

            font-size: 20px;
            color: #ffffff;
            text-align: center;
            line-height: 37px;

            margin-right: 20px;
            margin-bottom: 5px;
        }


        /* Footer Right */

        .footer-distributed .footer-right {
            width: 35%;
            margin-left: 180px;
        }

        .footer-distributed .footer-right i {
            background-color: #7097EA;
            color: #ffffff;
            font-size: 25px;
            width: 38px;
            height: 38px;
            border-radius: 50%;
            text-align: center;
            line-height: 42px;
            margin: 10px 15px;
            vertical-align: middle;
        }

        .footer-distributed .footer-right i.fa-envelope {
            font-size: 17px;
            line-height: 38px;
        }

        .footer-distributed .footer-right p {
            display: inline-block;
            color: #ffffff;
            vertical-align: middle;
            margin: 0;
            font-size: 18px;
        }

        .footer-distributed .footer-right p span {
            display: block;
            font-weight: bold;
            font-size: 20px;
            line-height: 2;
        }

        .footer-distributed .footer-right p a {
            color: white;
            text-decoration: none;
        }

        .footer-distributed .footer-links .link-1:before {
            content: none;
        }


        /* Footer Right */

        /* .footer-distributed .footer-right {
            width: 40%;
        } */

        /* .footer-distributed .footer-company-about {
            line-height: 20px;
            color: #bcbfc2;
            font-size: 13px;
            font-weight: normal;
            margin: 0;
            text-align: center;
        }

        .footer-distributed .footer-company-about span {
            display: block;
            color: #ffffff;
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .footer-distributed .footer-company-name {
            color: black;
            font-size: 14px;
            font-weight: bold;
            margin-top: 10px;
            text-align: center;
        } */


        /*footer to be responsive*/

        @media (max-width: 880px) {
            .footer-distributed {
                font: bold 12px sans-serif;
            }

            .footer-distributed .footer-left,
            .footer-distributed .footer-right {
                display: block;
                width: 100%;
                margin-bottom: 20px;
                text-align: center;
            }

            .footer-distributed .footer-right {
                margin-left: 0;
            }
        }
    </style>
</head>

<body>

    <footer class="footer-distributed">

        <div class="footer-left">

            <h3>E-Bill Management</h3>

            <p class="footer-links">
                <a>Home</a>
                <a>Faq</a>
                <a>Contact</a>

                <span></span>
            </p>

            <div class="footer-icons">
                <a><i class="fa fa-facebook"></i></a>
                <a><i class="fa fa-twitter"></i></a>
            </div>

        </div>

        <!-- <div class="footer-center">

            <div>
                <i class="fa fa-map-marker"></i>
                <p><span>Premier University</span> Chittagong</p>
            </div>

            <div>
                <i class="fa fa-phone"></i>
                <p>+8801812233445</p>
            </div>

            <div>
                <i class="fa fa-envelope"></i>
                <p>
                    <a> support@electricity Boardd.com</a>
                </p>
            </div>

        </div> -->

        <div class="footer-right">
            <div>
                <i class="fa fa-map-marker"></i>
                <p><span>Premier University</span> Chittagong</p>
            </div>

            <div>
                <i class="fa fa-phone"></i>
                <p>+8801812233445</p>
            </div>

            <div>
                <i class="fa fa-envelope"></i>

                <p>
                    <a
                        href="https://mail.google.com/mail/u/0/?source=mailto&to=electricityboard1122@gmail.com&fs=1&tf=cm">support@electricityboard.com</a>
                </p>

                <!-- <p>
                    <a> support@electricityboard.com</a>
                </p> -->
            </div>


        </div>

    </footer>

</body>

</html>