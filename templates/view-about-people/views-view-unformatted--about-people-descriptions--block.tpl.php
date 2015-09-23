<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
?>

<div class="column-container">

	<?php foreach ($rows as $id => $row): ?>

		<div class="column about-person">
			<?php print $row; ?>
		</div>

	<?php endforeach; ?>

</div> <!-- .column-container -->
