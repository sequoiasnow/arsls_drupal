<?php

/**
 * @file
 * Default theme implementation to display a node.
 *
 * Available variables:
 * - $title: the (sanitized) title of the node.
 * - $content: An array of node items. Use render($content) to print them all,
 *   or print a subset such as render($content['field_example']). Use
 *   hide($content['field_example']) to temporarily suppress the printing of a
 *   given element.
 * - $user_picture: The node author's picture from user-picture.tpl.php.
 * - $date: Formatted creation date. Preprocess functions can reformat it by
 *   calling format_date() with the desired parameters on the $created variable.
 * - $name: Themed username of node author output from theme_username().
 * - $node_url: Direct URL of the current node.
 * - $display_submitted: Whether submission information should be displayed.
 * - $submitted: Submission information created from $name and $date during
 *   template_preprocess_node().
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default values can be one or more of the
 *   following:
 *   - node: The current template type; for example, "theming hook".
 *   - node-[type]: The current node type. For example, if the node is a
 *     "Blog entry" it would result in "node-blog". Note that the machine
 *     name will often be in a short form of the human readable label.
 *   - node-teaser: Nodes in teaser form.
 *   - node-preview: Nodes in preview mode.
 *   The following are controlled through the node publishing options.
 *   - node-promoted: Nodes promoted to the front page.
 *   - node-sticky: Nodes ordered above other non-sticky nodes in teaser
 *     listings.
 *   - node-unpublished: Unpublished nodes visible only to administrators.
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 *
 * Other variables:
 * - $node: Full node object. Contains data that may not be safe.
 * - $type: Node type; for example, story, page, blog, etc.
 * - $comment_count: Number of comments attached to the node.
 * - $uid: User ID of the node author.
 * - $created: Time the node was published formatted in Unix timestamp.
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 * - $zebra: Outputs either "even" or "odd". Useful for zebra striping in
 *   teaser listings.
 * - $id: Position of the node. Increments each time it's output.
 *
 * Node status variables:
 * - $view_mode: View mode; for example, "full", "teaser".
 * - $teaser: Flag for the teaser state (shortcut for $view_mode == 'teaser').
 * - $page: Flag for the full page state.
 * - $promote: Flag for front page promotion state.
 * - $sticky: Flags for sticky post setting.
 * - $status: Flag for published status.
 * - $comment: State of comment settings for the node.
 * - $readmore: Flags true if the teaser content of the node cannot hold the
 *   main body content.
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 * - $is_admin: Flags true when the current user is an administrator.
 *
 * Field variables: for each field instance attached to the node a corresponding
 * variable is defined; for example, $node->body becomes $body. When needing to
 * access a field's raw values, developers/themers are strongly encouraged to
 * use these variables. Otherwise they will have to explicitly specify the
 * desired field language; for example, $node->body['en'], thus overriding any
 * language negotiation rule that was previously applied.
 *
 * @see template_preprocess()
 * @see template_preprocess_node()
 * @see template_process()
 *
 * @ingroup themeable
 */
?>

<?php
	$title 	  = "";
	$phone 	  = isset($content['field_phone_number']) ? $content['field_phone_number']['#object']->field_phone_number['und'][0]['value'] : '';
	$email	  = isset($content['field_email']) ? $content['field_email']['#object']->field_email['und'][0]['value'] : '';
	$location = isset($content['field_location']) ? $content['field_location']['#object']->field_location['und'][0]['value'] : '';
	$confirm_message = isset($content['field_confirmation_text']) ? $content['field_confirmation_text']['#object']->field_confirmation_text['und'][0]['value'] : '';
	$confirm_mail_html = isset($content['field_confirm_email_html']) ? $content['field_confirm_email_html']['#object']->field_confirm_email_html['und'][0]['value'] : '';
?>
<?php 
	# Set if a message was filled out 
	$message_submited = isset($_POST['message']);
	
	# Set if the message form is filled out completly.
	$correct_form = isset($_POST['name']) && isset($_POST['email']) && isset($_POST['submited']) && isset($_POST['message']);
	
	
	# Handle the sending of the message to the 	
	if ($correct_form) {
		# Message the main email for the content type
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		$headers .= "From: " . strip_tags($_POST['name']) . "<" . strip_tags($_POST['email']) . ">\n\r";
		
		mail($email, "Contact Form $title", $_POST['message'], $headers);
		
		
		# Message the client that there email has been recieved.
		if (strlen($confirm_mail_html)) {
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= "From: <" . strip_tags($email) . ">\n\r";
			
			# Make $confirm_mail_html have an html body 
			if (strpos($headers, '<html>') === false) {
				$confirm_mail_html = "<html><body>$confirm_mail_html</body></html>";
			}
			
			mail($_POST['email'], "Your message has been recorded.", $confirm_mail_html, $headers);
		}
		
		# Display message on the page.
		if ($confirm_message) {
			print $confirm_message;
		}
	}
	
	
?>


<div class="column-container">
    <div class="column-1">
        <div class="text-center">
        	<?php print $content['field_main_message']['#object']->field_main_message['und'][0]['value']; ?>
        </div>
    </div>
</div>

<div class="column-container">
	<?php if (strlen($phone)) { ?>
    <div class="column-3">
        <div class="column-image small background">
            <div class="i-wraper">
                <i class="fa fa-phone color-white"></i>
            </div>
        </div>
        <div class="text-center">
            <p><?php print $phone; ?></p>
        </div>
    </div>
    <?php } ?>
    <?php if (strlen($email)) { ?>
    <div class="column-3">
        <div class="column-image small background">
            <div class="i-wraper">
                <i class="fa fa-envelope-o color-white" ></i>
            </div>
        </div>
        <div class="text-center">
            <p><a class="no-style" href="mailto:<?php print $email; ?>"><?php print $email; ?></a></p>
        </div>
    </div>
    <?php } ?>
    <?php if (strlen($location)) { ?>
    <div class="column-3">
        <div class="column-image small background">
            <div class="i-wraper">
                <i class="fa fa-map-marker color-white"></i>
            </div>
        </div>
        <div class="text-center">
            <p><?php print $location ?></p>
        </div>
    </div>
    <?php } ?>
</div>

<form action="" method="post" class="contact-form">
	<input type="hidden" value="true" name="submited">
    <div class="column-container">
        <div class="column-2">
            <p>Name:</p>
            <input type="text" name="name" required />
        </div>
        <div class="column-2">
            <p>Email:</p>
            <input type="email" name="email" required />
        </div>
    </div>
    <div class="column-container">
        <div class="column-1">
            <p>Message: </p>
            <textarea name="message"></textarea>
        </div>
    </div>
    <div class="column-container">
        <div class="column-1">
            <input type="submit" value="Send" />
        </div>
    </div>
</form>



<?php
  // We hide the comments and links now so that we can render them later.
  hide($content['comments']);
  hide($content['links']);
?>

<?php print render($content['comments']); ?>


