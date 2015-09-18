<?php	
	$origional = array(
		'title' => isset($content['field_original_field_title']) ? $content['field_original_field_title']['#object']->field_original_field_title['und'][0]['value'] : '',
		'description' => isset($content['field_original_field_description']) ? $content['field_original_field_description']['#object']->field_original_field_description['und'][0]['value'] : '',
		'link' => isset($content['field_original_field_link']) ? $content['field_original_field_link']['#object']->field_original_field_link['und'][0]['value'] : '',	
		'icon' => isset($content['field_original_field_icon']) ? $content['field_original_field_icon']['#object']->field_original_field_icon['und'][0]['value'] : '',
	);
	
	$hovered = array(
		'title' => isset($content['field_hovered_field_title']) ? $content['field_hovered_field_title']['#object']->field_hovered_field_title['und'][0]['value'] : '',
		'description' => isset($content['field_hovered_field_description']) ? $content['field_hovered_field_description']['#object']->field_hovered_field_description['und'][0]['value'] : '',
		'link' => isset($content['field_hovered_field_link']) ? $content['field_hovered_field_link']['#object']->field_hovered_field_link['und'][0]['value'] : '',
		'icon' => isset($content['field_hovered_field_icon']) ? $content['field_hovered_field_icon']['#object']->field_hovered_field_icon['und'][0]['value'] : '',	
	);
	
	if (strlen($origional['link']) && !strlen($hovered['link'])) $hovered['link'] = $origional['link'];
?>

<div id="animated-push-reveal" class="splashpage-item">
    <div class="splashpage-wraper">
        <div class="column-container">
            <div class="column-1">
	            <div class="descriptions">
		            <div class="conceal">
						<div class="text-center">
		                     <div class="item heading description">
		                        <div class="content">
		                        	<?php print $origional['description']; ?>
		                        </div>
	                        </div>
		            	</div>
                    </div>
                    <div class="reveal">
	                    <div class="text-center">
	                    	<div class="item heading description">
		                        <div class="content">
		                        	<?php print $hovered['description']; ?>
		                        </div>
	                    	</div>
                    	</div>
                    </div>
        
	            </div>
                <div class="action-html" style="color: black;">
                    <div class="drop-down" data-icon="<?php print $origional['icon']; ?>">
                        <div class="item heading title">
                            <?php if(strlen($origional['link'])) { ?><a class="no-style" href="<?php print $origional['link'];?>"><?php } ?>
                            	<h1><?php print $origional['title']; ?></h1>
                            <?php if(strlen($origional['link'])) { ?></a><?php } ?>
                        </div>
                    </div>
                    <div class="push-up" data-icon="<?php print $hovered['icon']; ?>">
                        <div class="item heading title">
                            <?php if(strlen($hovered['link'])) { ?><a class="no-style" href="<?php print $hovered['link'];?>"><?php } ?>
                            	<h1><?php print $hovered['title']; ?></h1>
                            <?php if(strlen($hovered['link'])) { ?></a><?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
  // We hide the comments and links now so that we can render them later.
  hide($content['comments']);
  hide($content['links']);
?>

<?php print render($content['comments']); ?>


