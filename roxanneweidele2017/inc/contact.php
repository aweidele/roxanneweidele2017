<form action="<?php echo get_template_directory_uri(); ?>/inc/contact-go.php" method="POST">
  <ul>
    <li><label for="name">Your Name</label><input type="text" name="name" id="name" required></li>
    <li><label for="email">Your Email</label><input type="email" name="email" id="email" required></li>
    <li><label for="subject">Subject</label><input type="text" name="subject" id="subject"></li>
    <li><label for="message">Your Message</label><textarea name="message" id="message" required></textarea></li>
    <li><div class="g-recaptcha" data-sitekey="6Lfy4xkUAAAAAJQGBIYwBw6DBnjriktjM0p6xc8G"></div></li>
    <li><button>Submit</button></li>
  </ul>
</form>