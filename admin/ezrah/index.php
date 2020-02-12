
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Ezraelle Cabalhin">
    <link rel="icon" 
      type="image/png" 
      href="logo karate.ico">
    <title>JNH Karatedo</title>
    <!-- Bootstrap core CSS -->
    <link href="bootstrap4/css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <style type="text/css">
      .bannermain{
        background-image: url(banner.jpg);
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        height: 70vh;
        min-height:500px;
        position: relative;
      }.bannermain .container{
        
        margin-top:10vh;

      }
      .imgdown{
        position: absolute;
        transform: translate(-50%, -50%);
        left:50%;
        bottom: -55px;
        height: 60px;
        width: 60px;
      }
      .aboutimg{
        width:100%;
        height: auto;
      }

    
    </style>
    <!-- Custom styles for this template -->
    <link href="styles.css" rel="stylesheet">
    
  </head>
  <body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <div class="container">
    <a class="navbar-brand" href="#">JNH Karatedo</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbars" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
  

    <div class="collapse navbar-collapse " id="navbar">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active mx-md-3">
          <a class="nav-link" href="#bannermain">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item mx-md-3">
          <a class="nav-link" href="#about">About</a>
        </li>
        <li class="nav-item mx-md-3">
          <a class="nav-link" href="#">Programs</a>
        </li>
        <li class="nav-item mx-md-3">
          <a class="nav-link" href="#staffs">Staffs</a>
        </li>
        <li class="nav-item mr-md-5 ml-md-3">
          <a class="nav-link" href="#contact">Contact</a>
        </li>
        <li class="nav-item mr-sm-2 ml-md-5">
          <a class="nav-link"  href="https://www.facebook.com/jnhkaratedo">
            <i class="fa fa-facebook-official fa-fw fa-lg" aria-hidden="true"></i>
          </a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li> -->
        <!-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
          <div class="dropdown-menu" aria-labelledby="dropdown01">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li> -->
      </ul>
      <!-- <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form> -->
    </div>
  </div>
</nav>

<main role="main">

  <!-- Main jumbotron for a primary marketing message or call to action -->
  <div class="bannermain jumbotron" id="bannermain">
    <div class="container">
      <h1 class="display-3" style="border: 5px solid #000;padding:20px;width: 450px;border-radius: 10px;"><b>JNH KARATE<br>SCHOOL</b></h1>
      
      <button type="button" class="btn btn-primary btn-lg" style="border: 5px solid #000;" data-toggle="modal" data-target="#Register">
        Try it today!
      </button></p>
    </div>
    <img class="imgdown" src="down.png">
  </div>



  

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="Register" tabindex="-1" role="dialog" aria-labelledby="ModalRegisterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalRegisterTitle">Register Today!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="register.php?student=reservation">
          <div class="form-group">
            <label for="RegFname">First name</label>
            <input type="text" class="form-control" id="RegFname" name="RegFname" aria-describedby="first name" placeholder="First Name" required="">
            <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
          </div>
          <div class="form-group">
            <label for="RegLname">Last name</label>
            <input type="text" class="form-control" id="RegLname" name="RegLname" aria-describedby="Last name" placeholder="Last Name" required="">
            <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
          </div>
          <div class="form-group">
            <label for="RegBdate">Birthdate</label>
            <input type="date" max="2017-01-01" min="1920-01-01" class="form-control" id="RegBdate" name="RegBdate" aria-describedby="Birthdate" required="">
            <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
          </div>
          <div class="form-group">
            <label for="RegEmail">Email</label>
            <input type="email" class="form-control" id="RegEmail" name="RegEmail" aria-describedby="Email" placeholder="Email" required="">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>
          <div class="form-group">
            <label for="RegContact">Contact number</label>
            <input type="number" class="form-control" id="RegContact" name="RegContact" aria-describedby="Contact Number" placeholder="09 - xxx - xxxx">
            <small id="emailHelp" class="form-text text-muted">We'll never share your contact info with anyone else.</small>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="Gender" id="Male" value="male" required="">
            <label class="form-check-label" for="Male">
              Male
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="Gender" id="Female" value="female" required="">
            <label class="form-check-label" for="Female">
              Female
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="Gender" id="Others" value="others" required="">
            <label class="form-check-label" for="Others">
              Others
            </label>
          </div>
          
        
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
      
    </div>
  </div>
</div>  





<!-- modal success -->


<!-- Modal -->
<div class="modal fade" id="ModalSuccess" tabindex="-1" role="dialog" aria-labelledby="ModalSuccess" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content bg-success text-white">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Success!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
        <p>Thank you for your reservations!</p>
        <p>Kindly check your emails for notifications.</p>
      </div>
     
    </div>
  </div>
</div>
<!-- modal success -->








  <div class=" container">
 
    <div class="row">
      <div class="col-md-4">
        <h2>ShukokaiDojo Kun</h2>
        <p>
          One, Be moderate and courteous.
         
          One, Be righteous and have a strong sense of justice.
        
          One, Be modest in your words and actions.
        
          One, respect others. One, Karate-do is a lifetime study.</p>
       
      </div>
      <div class="col-md-4">
        <h2>Karate Creed</h2>
        <p>
        I came to you with my empty hands, other weapons I have none.
        But if I should ever be force to defend myself, my honor, my principles, even if it's a matter of lide or death, between right or wrong. Then I will show you my weapon, Karate my empty hands". </p>
        
      </div>
      <div class="col-md-4">
        <h2>ShukokaiDojo Kun</h2>
        <p>Hitotsu, Reigeotadshikusurukoto.
        Hitotsu, Hitonimeiwakiwokakanaikoto.
        Hitotsu, Otagaininakayokusurukoto.
        Hitotsu, Sensei Senpai no oshieo. Mamorukoto.
        Hitotsu, Reshuamainichisurukoto.
      </p>
        
      </div>
    </div>

    <hr>

  </div>



  <div class="container-fluid" id="about">
    <div class="aboutbanner container">
      <div class="row no-gutters">
        <div class="col-md-6"><img src="about.jpg" class="aboutimg"></div>
        <div class="col-md-6" style="background-color:#ff0000;padding:5%;">
        <h3 style="color: #fff;">About Our Karate School</h3>
        <p style="color: #fff;">
          The JNH Karate-do is dedicated in providing the best instruction in traditional and sports KARATE. This prides itself on the practice of "Traditional Okinawan karate". traditional karate demands the mind, body and spirit to be trained as one.
          <br><br>
          The Students need to demonstrate a willingness to learn and to hold strongly to never give up.
        </p>
        </div>
      </div>
    </div>
  </div>

  <div class="container-fluid my-5">
  <div class="container my-5">
      <div class="row no-gutters" style="border: 5px solid #000;">
        <div class="col-2 p-2" style="border-right: 5px solid #000;">
          <p style="font-size: 5em;text-align: center;"><b>5</b></p>
        </div>
        <div class="col-10 p-5"><h1>PRINCIPLES OF OUR KARATE SCHOOL</h1></div>
      </div>
      <div class="row no-gutters">
        <div class="col-2 p-2" >
         
        </div>
        <div class="col-10 p-5"  style="border: 5px solid #000;border-top: none;">
          <p style="text-align: center;font-size: 1.5em;"><b>Character &nbsp&nbsp Sincerity &nbsp&nbsp Effort<br>
         Etiquette &nbsp&nbsp Self-Control </b></p>
        </div>
      </div>
  </div>
  </div>

<!-- staffs -->
<div class="container-fluid bg-light my-5 py-5" id="staffs">
  <div class="container">
  <h1 class="text-center my-5" >Meet Our Staffs</h1>

<div class="card-group">
  <div class="card">
    <div class="card-body text-center">
      <h5 class="card-title">Julito F. Igdalino</h5>
      <p class="card-text">
        Kumite Instructor<br>
        3rd Dan Black Belt
      </p>
     
    </div>
  </div>
  <div class="card">
    <div class="card-body text-center">
      <h5 class="card-title">Shihan Jaime "JIMBO" N. Hernandez</h5>
      <p class="card-text">
        JNH Karate-do / Kobu-do<br>
        Founder/Chief Instructor<br>
        6th Dan Black Belt
      </p>
     
    </div>
  </div>
  
  <div class="card">
    <div class="card-body text-center">
      <h5 class="card-title">Joe Mari Angus Igdalino</h5>
      <p class="card-text">
        Kumite Instructor<br>
        1st Dan Black Belt</p>
     
    </div>
  </div>
</div>

</div>

</div>
<!-- staffs -->



  <!-- contact us -->
  <div class="container contact-form" id="contact" >
            <div class="contact-image">
                <img src="https://image.ibb.co/kUagtU/rocket_contact.png" alt="rocket_contact"/>
            </div>
            <form method="post">
                <h3>Drop Us a Message</h3>
               <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="txtName" class="form-control" placeholder="Your Name *" value="" />
                        </div>
                        <div class="form-group">
                            <input type="text" name="txtEmail" class="form-control" placeholder="Your Email *" value="" />
                        </div>
                        <div class="form-group">
                            <input type="text" name="txtPhone" class="form-control" placeholder="Your Phone Number *" value="" />
                        </div>
                        <div class="form-group">
                            <input type="submit" name="btnSubmit" class="btnContact" value="Send Message" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <textarea name="txtMsg" class="form-control" placeholder="Your Message *" style="width: 100%; height: 150px;"></textarea>
                        </div>
                    </div>

                </div>
            </form>
</div>
  <!-- contact us -->


</main>
<footer class="container-fluid" style="background-color: white;min-height: 150px;">
<div class="container text-center my-3 py-3" >
  <p>&copy; Company 2020 </p>
  <p>Sun: 0932-202-3275 Globe: 0905-165-0914    Email: jnhkaratedo@yahoo.com

<a href="https://www.facebook.com/jnhkaratedo">
  <i class="fa fa-facebook-official fa-fw fa-lg" aria-hidden="true"></i>
</a>
© 2023 by JNHKARATEDO
  </p>
</div>
</footer>


<script src="jquery/jquery.min.js"></script>
<script type="text/javascript" src="jquery/popper.js"></script>
<script type="text/javascript" src="bootstrap4/js/bootstrap.min.js"></script>
<?php 
 if(isset($_GET['success'])&&$_GET==true){
    
    ?><script>
    $(document).ready(function(){
        $("#ModalSuccess").modal("show");
    });
    </script>
  <?php }
?>

</body>
</html>
