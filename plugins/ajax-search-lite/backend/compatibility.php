<?php
/* Prevent direct access */
defined('ABSPATH') or die("You can't access this file directly.");

$com_options = get_option('asl_compatibility');

if (ASL_DEMO) $_POST = null;
?>

<div id="wpdreams" class='wpdreams wrap'>
    <div class="wpdreams-box">

        <?php ob_start(); ?>

        <div tabid="1">
            <fieldset>
                <legend>Database Compatibility</legend>

                <p class='infoMsg'>
                    If you are experiencing issues with accent(diacritic) or case sensitiveness, you can force the search to try these tweaks.<br>
                    <i>The search works according to your database collation settings</i>, so please be aware that <b>this is not an effective way</b> of fixing database collation issues.<br>
                    If you have case/diacritic issues then please read the <a href="http://dev.mysql.com/doc/refman/5.0/en/charset-syntax.html" target="_blank">MySql manual on collations</a> or consult a <b>database expert</b> - those issues should be treated on database level!
                </p>
                <div class="item">
                    <?php
                    $o = new wpdreamsCustomSelect("db_force_case", "Force case", array(
                            'selects'=> array(
                                array('option' => 'None', 'value' => 'none'),
                                array('option' => 'Sensitivity', 'value' => 'sensitivity'),
                                array('option' => 'InSensitivity', 'value' => 'insensitivity')
                            ),
                            'value'=>wpdreams_setval_or_getoption($com_options, 'db_force_case', 'asl_compatibility_def')
                        )
                    );
                    $params[$o->getName()] = $o->getData();
                    ?>
                </div>
                <div class="item">
                    <?php $o = new wpdreamsYesNo("db_force_unicode", "Force unicode search",
                        wpdreams_setval_or_getoption($com_options, 'db_force_unicode', 'asl_compatibility_def')
                    ); ?>
                    <p class='descMsg'>Will try to force unicode character conversion on the search phrase.</p>
                </div>
                <div class="item">
                    <?php $o = new wpdreamsYesNo("db_force_utf8_like", "Force utf8 on LIKE operations",
                        wpdreams_setval_or_getoption($com_options, 'db_force_utf8_like', 'asl_compatibility_def')
                    ); ?>
                    <p class='descMsg'>Will try to force utf8 conversion on all LIKE operations in the WHERE and HAVING clauses.</p>
                </div>

            </fieldset>
        </div>

        <?php $_r = ob_get_clean(); ?>


        <?php

        // Compatibility stuff
        $updated = false;
        if ( isset($_POST) && isset($_POST['asl_compatibility']) ) {
            $values = array(
                // CSS and JS
                // Query options
                "db_force_case" => $_POST['db_force_case'],
                "db_force_unicode" => $_POST['db_force_unicode'],
                "db_force_utf8_like" => $_POST['db_force_utf8_like']
            );
            update_option('asl_compatibility', $values);
            $updated = true;
        }

        ?>

        <div class='wpdreams-slider'>

            <?php if ($updated): ?>
                <div class='successMsg'>Search compatibility settings successfuly updated!</div><?php endif; ?>

            <?php if (ASL_DEMO): ?>
                <p class="infoMsg">DEMO MODE ENABLED - Please note, that these options are read-only</p>
            <?php endif; ?>

            <ul id="tabs" class='tabs'>
                <li><a tabid="1" class='current multisite'>Database compatibility</a></li>
            </ul>

            <div id="content" class='tabscontent'>

                <!-- Compatibility form -->
                <form name='compatibility' method='post'>

                    <?php print $_r; ?>

                    <div class="item">
                        <input type='submit' class='submit' value='Save options'/>
                    </div>
                    <input type='hidden' name='asl_compatibility' value='1'/>
                </form>

            </div>
        </div>
    </div>
</div>
<script>
    // Simulate a click on the first element to initialize the tabs
    jQuery(function ($) {
        $('.tabs a[tabid=1]').click();
    });

</script>