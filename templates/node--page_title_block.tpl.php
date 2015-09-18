<?php	
$body_text = isset($node->body['und']) ? $node->body['und'][0]['value'] : '';
$readable_title = isset($node->field_title['und']) ? $node->field_title['und'][0]['value'] : '';
$icon = isset($node->field_page_title_icon['und']) ? $node->field_page_title_icon['und'][0]['value'] : '';
?>

<div class="column-container">
      <div class="column-1">
              <div class="column-image">
                     <div class="i-container">
                            <i class="fa fa-<?php print $icon; ?>"></i>
                     </div>
               </div>
               <h1><?php print $readable_title; ?></h1>
               <div class="text-center text-middle">
                    <?php print $body_text; ?>
              </div>
     </div>
</div>


