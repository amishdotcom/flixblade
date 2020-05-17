<?php
include 'switches/cdn.php';

//Page Title, Description & Keywords
$page_title = "Contact - $site_name";
$desc="Use this page to Contact $site_name";
$keys="$site_name,Contact,Contact Page,Contact $site_name,Contact Us,Contact Us $site_name,Movie Information,Cinematic Information,External Links,Titles,About Movie,All About Movies,Movie Database,Internet Movie Database,$site_name Movies";

include 'switches/smtp_config.php';
include 'system/reset_module/reset_module.php';
$page_type='contact';
include 'includes/central_header.php';
?>
  <link rel="stylesheet" type="text/css" href="<?php echo $site_root ?>/system/css/central<?php echo $reset_module ?>">
  <link rel="stylesheet" href="<?php echo $site_root ?>/system/css/exclusive/exclusive<?php echo $reset_module ?>">

  </head>

  <body>

<?php include 'includes/central_navig_bar.php' ?>

<h1 class="<?php echo $site_name ?>_exclusive_logo"></h1>

<p class="head">Contact Us</p>
<br><br>

          <div class="contact-form">
            <div id="message"></div>
            <form role="form" action="contact" method="POST">

              <div class="form-group">
                <input type="name" name="name" value="<?php (isset($_POST['name'])) ? $_POST['name'] : ''?>" class="form-control" id="contact-name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" >
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <input type="email" name="email" value="<?php (isset($_POST['email'])) ? $_POST['email'] : ''?>" class="form-control" id="contact-email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email">
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <input type="text2" name="subject" value="<?php (isset($_POST['subject'])) ? $_POST['subject'] : ''?>" class="form-control" id="contact-subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject">
                <div class="validate"></div>
              </div>

              <div class="form-group">
                <textarea class="form-control" name="message" value="<?php (isset($_POST['message'])) ? $_POST['message'] : ''?>" id="contact-message" placeholder="Your Message" rows="5" data-rule="required" data-msg="Please write something for us"></textarea>
                <div class="validate"></div>
              </div>

              <div class="loading"></div>
              <div class="error-message"></div>

              <div class="form-send">
                <button type="submit" class="btn btn-large btn-primary" name="submit" value="<?php (isset($_POST['submit'])) ? $_POST['submit'] : ''?>">Send Message</button>
              </div>
			  
			<?php
			if(isset($_POST['submit'])){
			
			if (!isset($_POST['name']) || trim($_POST['name'] == '' ) || !isset($_POST['email']) || trim($_POST['email'] == '' ) || !isset($_POST['subject']) || trim($_POST['subject'] == '' ) || !isset($_POST['message']) || trim($_POST['message'] == '' ) ) { echo "<script>alert(\"You need to fill each field before you can submit the contact form\");</script>"; }
			else {
				
			include 'includes/smtp/contactform_mailer.php';
			echo '<script>alert("Your Query has been Submitted, we will try to contact you back ASAP");</script>';
			
			}

			}
			?>


            </form>
          </div>
<br>
<?php
include 'includes/central_footer.php'
?>

  </body>
</html>