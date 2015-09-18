
<?php // Change the labels of the "name" and "mail" textfields.
$form['name']['#title'] = t('Name');
$form['mail']['#title'] = t('E-mail');
?>
<?php // Render the "name" and "mail" elements individually and add markup. ?>
<?php print render($form['name']); ?>
<?php print render($form['mail']); ?>
<?php // Be sure to render the remaining form items. ?> <?php print drupal_render_children($form); ?>