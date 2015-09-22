<?php
$body_text = isset($node->body['und']) ? $node->body['und'][0]['value'] : null;
$readable_title = isset($node->field_title['und']) ? $node->field_title['und'][0]['value'] : null;
$icon = isset($node->field_page_title_icon['und']) ? $node->field_page_title_icon['und'][0]['value'] : null;
?>


<section id="page-title-block">

    <div class="background-image">

        <?php if ( isset( $content['background_image'] ) ) : ?>

            <?php print render( $content['background_image'] ); ?>

        <?php else : ?>

            <div class="background-color random-color"></div>

        <?php endif; ?>

    </div> <!-- .background-image -->

    <div class="container">

        <?php if ( $icon ) : ?>

            <div class="main-icon">
                <div class="i-container">
                    <i class="fa fa-<?php print $icon; ?>"></i>
                </div>
            </div> <!-- .column-image -->

        <?php endif; ?>

        <section class="main-text">

            <?php if ( $readable_title ) : ?>

                <div class="page-title">
                    <h1><?php print $readable_title; ?></h1>
                </div> <!-- .page-title -->

            <?php endif; ?>

            <?php if ( $body_text ) : ?>

                <div class="text-center">
                    <?php print $body_text; ?>
                </div> <!-- .text-center -->

            <?php endif; ?>

        </section> <!-- .main-text -->

    </div> <!-- .container -->
</section> <!-- #page-title-block -->
