 <?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
?>
<?php for ($i = 0; $i < count($rows); $i += 3) { ?>
	<div class="column-container">
		<?php for ($k = $i; $k < $i + 3 && $k < count($rows); $k++) { ?>
			<div class="column-<?php echo count($rows) > 3 ? 3 : count($rows); ?>">
		  		<?php print $rows[$k]; ?>
		  </div>
		<?php } ?>
	</div>
<?php } ?>
