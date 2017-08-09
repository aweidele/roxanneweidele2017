<?php
$c = get_children(array('post_parent'=>$post->ID));
foreach($c as $r) {
  $redirect = $r;
  break;
}
$form = '
 <form action="'.esc_attr(get_template_directory_uri()).'/inc/contact-go.php" method="POST">
  <input type="hidden" name="redirect" value="'.esc_url(get_permalink($redirect->ID)).'">
  <ul>
    <li><label for="name">Your Name</label><input type="text" name="name" id="name" required></li>
    <li><label for="email">Your Email</label><input type="email" name="email" id="email" required></li>
    <li><label for="subject">Subject</label><input type="text" name="subject" id="subject"></li>
    <li><label for="message">Your Message</label><textarea name="message" id="message" required></textarea></li>
    <span class="hp"><label for="url">url</label><input type="text" name="url" id="url"></span>
    <!-- li><div class="g-recaptcha" data-sitekey="6Lfy4xkUAAAAAJQGBIYwBw6DBnjriktjM0p6xc8G"></div></li -->
    <li><button>Submit</button></li>
  </ul>
</form>
';
?>
