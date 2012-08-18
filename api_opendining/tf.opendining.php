<?php
/*
 * Opendining Integration
 * ---------------------------------------------
 *
 * This is a pretty light integration to see how visitors will use it. Similar to Yelp, the feature
 * will degrade for mobile (not self-hosting for now, though code here: github.com/opendining/opendining-mobile)
 *
*/


/**
 * Returns JS Drop-in for Open Dining (fixed position button) for Desktop
 *
 * @return string DOM output
 */
function tf_opendining_desktop() {

        // A/B Testing

        if ( date('j') % 2 ) { // day of month will likely be less biased then day of week, or hour of day.
            //even
        } else {
            //odd
        }

        // Arguments

        $args = array(

            "mp_target" => "a#cta-header",
            "mp_name" => "Clicked Call to Action (Main)",
            "partner" => "opendining",
            "revenue_type" => "onlineordering",
            "placement" => "header",
            "device" => "desktop",
            "headline" => "Order Online",
            "color" => "default"

        );

        $appid = trim(get_option(tf_opendining_app_id));

        // Display

        ?>

        <a href="http://www.opendining.net/app/locations/<?php echo $appid; ?>" id="cta-header" class="cta-desktop cta-<?php echo $args["color"]; ?> thumb-iframe">
            <span class="cta-icon icon-cart"></span> <span class="cta-headline"><?php echo $args["headline"]; ?></span>
        </a>

        <?php tf_cta_mixpanel($args); ?>

        <div class="clearfix"></div>

        <?php

}

if ( get_option( 'tf_opendining_enabled' ) == 'true') {

    add_action( 'tf_body_desktop_cta', 'tf_opendining_desktop', 12);

}

/**
 * Returns JS Drop-in for Open Dining (fixed position button) for Mobile
 *
 * @return string DOM output
 */
function tf_opendining_mobile() {

    $args = array(

        "mp_target" => "a#cta-header",
        "mp_name" => "Clicked Call to Action (Main)",
        "partner" => "opendining",
        "revenue_type" => "onlineordering",
        "placement" => "header",
        "device" => "desktop",
        "headline" => "Order Online",
        "color" => "default"

    );

    if ( get_option( 'tf_opendining_enabled' ) == 'true') {

            $restid = trim(get_option(tf_opendining_rest_id));

            ?>

            <a href="http://www.opendining.net/m/<?php echo $restid; ?>" class="cta-mobile cta-<?php echo $args["color"]; ?>">
                <span class="cta-icon icon-cart"></span> <span class="cta-headline"><?php echo $args["headline"]; ?></span>
            </a>

            <div class="clearfix"></div>

            <?php

        }

}

if ( get_option( 'tf_opendining_enabled' ) == 'true') {

    add_action( 'tf_body_mobile_cta', 'tf_opendining_mobile', 12);

}