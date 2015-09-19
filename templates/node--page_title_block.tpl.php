<?php
$body_text = isset($node->body['und']) ? $node->body['und'][0]['value'] : null;
$readable_title = isset($node->field_title['und']) ? $node->field_title['und'][0]['value'] : null;
$icon = isset($node->field_page_title_icon['und']) ? $node->field_page_title_icon['und'][0]['value'] : null;
?>

<div class="column-container">
      <div class="column-1">
          <div class="column-image">
                 <div class="i-container">
                        <i class="fa fa-<?php print $icon; ?>"></i>
                 </div>
           </div> <!-- .column-image -->
           <h1><?php print $readable_title; ?></h1>
           <div class="text-center text-middle">
                <?php print $body_text; ?>
          </div> <!-- .text-center -->
     </div> <!-- .column-1 -->
</div> <!-- .column-container -->
