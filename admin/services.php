<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>services</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide|Sofia|Trirong">

    <link rel="icon" href="../images/myLogoLettreGrand.png" type="image/x-icon">
	<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

    <style>
        body {
            padding: 0;
            margin: 0;
            height: 100vh;
            justify-self: center;
            align-items: center;
            background: rgb(184, 179, 179);
        }

        .section {
            padding: 0;
            margin: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .slider {
    width: 100%;
    max-width: 800px;
}

.nav-m {
    width: 100%;
    max-width: 800px;
}
.slider {
    width: 800px;
    height: 500px;
    border-radius: 10px;
    overflow: hidden;
}


/*       

        .slide {
            width: 600%;
            height: 800px;
            display: flex;
        }

        .slide input {
            display: none;
        }
        .st {
    width: 100%;
    transition: 2s;
}

        /*.st {
            width: 25%;
            transition: 2s;
        }*/

        .st img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        

      /*  .nav-m {
            position: absolute;
            width: 800px;
            margin-top: -40px;
            justify-content: center;
            display: flex;
        }*/

        .m-btn {
            border: 2px solid rgb(156, 37, 37);
            padding: 5px;
            border-radius: 10px;
            cursor: pointer;
            transition: 1s;
        }

        .m-btn:not(:last-child) {
            margin-right: 30px;
        }

        .m-btn:hover {
            background-color: aqua;
        }

        #radio1:checked ~ .first {
            margin-left: 0;
        }

       /* #radio2:checked ~ .first {
            margin-left: -25%;
        }

        #radio3:checked ~ .first {
            margin-left: -50%;
        }

        #radio4:checked ~ .first {
            margin-left: -75%;
        }

        #radio5:checked ~ .first {
            margin-left: -100%;
        }

        #radio6:checked ~ .first {
            margin-left: -125%;
        }
*/
#radio2:checked ~ .first {
    margin-left: -800px;
}

#radio3:checked ~ .first {
    margin-left: -1600px;
}

#radio4:checked ~ .first {
    margin-left: -2400px;
}

#radio5:checked ~ .first {
    margin-left: -3200px;
}

#radio6:checked ~ .first {
    margin-left: -4000px;
}

.m-btn.selected {
    background-color: aquamarine;
}



        .nav-auto div {
            border: 2px solid aquamarine;
            padding: 5px;
            border-radius: 10px;
            transition: 1s;
        }

        .nav-auto div.m-btn:not(:last-child) {
            margin-right: 30px;
            justify-content: center;
        }

        #radio1:checked ~ .nav-auto .a-b1 {
            background-color: aquamarine;
        }

        #radio2:checked ~ .nav-auto .a-b2 {
            background-color: aquamarine;
        }

        #radio3:checked ~ .nav-auto .a-b3 {
            background-color: aquamarine;
        }

        #radio4:checked ~ .nav-auto .a-b4 {
            background-color: aquamarine;
        }

        #radio5:checked ~ .nav-auto .a-b5 {
            background-color: aquamarine;
        }
        #radio6:checked ~ .nav-auto .a-b6 {
            background-color: aquamarine;
        }

        .footer{
            background-color: black;
            padding: 5rem 10%;
        }
        .footer .box-footer{
            display: grid;
            grid-template-columns: repeat(auto-fit , minmax(10rem,1fr));
            grid-gap: 0.2rem;
        }
        .footer .box-footer .links h3{
            color: #1995AD;
            font-size: 1.5rem;
            padding-bottom: 1rem;
        }
        .footer .box-footer .links a{
            color: #BCBABE;
            font-size: 1rem;
            text-decoration: none;
            padding-bottom: 1rem; /* la disctance entre les a */
            display: block;
        }
        .footer .box-footer .links a i{
            color:  #05B7C0;
            padding-right: .5rem;
            transition: .2s linear;
        }
        .footer .box-footer .links a:hover i{
            padding-right: 2rem;
        }

        @media(max-width:450px){
            .slider {
            width: 400px;
        }
        .nav-m {
            width: 400px;}

    }
	
	
    </style>
</head>
<body>
                <div style="text-align: center; object-fit:cover">
                <div >
                    <img src="../images/photo1.png" width="500px" height="400px" alt="">
                </div>
                
                <div >
                    <img src="../images/photo4.png" width="500px" height="400px" alt="">
                </div>
                <div >
                    <img src="../images/photo5.png" width="500px" height="400px" alt="">
                </div>
                <div >
                    <img src="../images/photoo6.png" width="500px" height="400px" alt="">
                </div>
                <div >
                    <img src="../images/photo2.png" width="500px" height="400px" alt="">
                </div>
                <div >
                    <img src="../images/photo3.png" width="500px" height="400px"alt="">
                </div>
                </div>


    <section class="footer">
        <div class="box-footer">
            <div class="links">
                <h3>Quick links</h3>
                <a href="home.php"> <i class="fas fa-angle-right"></i> home</a>
                <a href="about.php"> <i class="fas fa-angle-right"></i> services</a>
                <a href="package.php"> <i class="fas fa-angle-right"></i> contacts</a>
                
            </div>
            <div class="links">
                <h3>Extra links</h3>
                <a href="#"> <i class="fas fa-angle-right"></i> ask questions</a>
                <a href="#"> <i class="fas fa-angle-right"></i> about us</a>
                <a href="#"> <i class="fas fa-angle-right"></i> arivacy policy</a>
                <a href="#"> <i class="fas fa-angle-right"></i> terms of user</a>
            </div>
            <div class="links">
                <h3>Contact info</h3>
                <a href="#"> <i class="fas fa-phone"></i> +212608251522</a>
                <a href="#"> <i class="fas fa-phone"></i> 0536520260</a>
                <a href="#"> <i class="fas fa-map"></i> Oujda , Maroc</a>
            </div>
            <div class="links">
                <h3>Follow us </h3>
                <a href="#"> <i class="fab fa-facebook-f"></i> facebook</a>
                <a href="#"> <i class="fab fa-instagram"></i> instagram</a>
                <a href="#"> <i class="fab fa-twitter"></i> twitter</a>
                <a href="#"> <i class="fab fa-linkedin"></i> linkedin</a>
            </div>
        </div>
        
    
    </section>

    <script type="text/javascript">
        var counter = 1;
        setInterval(function () {
            document.getElementById('radio' + counter).checked = true;
            counter++;
            if (counter > 6) {
                counter = 1;
            }
        }, 5000);


        



    </script>
</body>
</html>