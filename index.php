
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel ="stylesheet" href="./assets/bootstrap/css/bootstrap.min.css">
    <title>Contact Us</title>
</head>

<section id="contact" style="background-image:url('assets/img/map-image.png');">
<div class="container">
    <?php
      require "database.php";
      $db = Database::connect();
    ?>
    <div class="row mt-5">
        <h3 class="text-center text-uppercase section-heading" > Dear <?php echo $_POST['name'] ;?>, thanks for your comment.</h3>
    </div>
                   <div class="row mt-3">
                     <h6 class="text-center" style="color:rgb(0, 109, 91);">If you want to resend a comment, <a href="index.html" style="text-decoration: none; color :orangered;">click here</a>.</h6>
                   </div>
            </div>
    </div>
    <?php
    try{
         $req = $db->prepare("INSERT INTO contact(name,email,comments,phone) VALUES(?,?,?,?)");
         $req -> execute(array($_POST['name'],$_POST['email'],$_POST['comments'],$_POST['phone']));
         Database::disconnect();
        }
    catch(Exception $e){
     die($e->getMessage("Erreur lors de l\'envoie des donnees dans la base de donnees"));
    }
    ?>
</div>
</section>
