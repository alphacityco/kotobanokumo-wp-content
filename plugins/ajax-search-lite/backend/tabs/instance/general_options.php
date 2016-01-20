<ul id="subtabs"  class='tabs'>
    <li><a tabid="101" class='subtheme current'>Sources</a></li>
    <li><a tabid="102" class='subtheme'>Behavior</a></li>
    <li><a tabid="103" class='subtheme'>Autocomplete & Suggestions</a></li>
</ul>
<div class='tabscontent'>
    <div tabid="101">
        <fieldset>
            <legend>Sources</legend>
            <?php include(ASL_PATH."backend/tabs/instance/general/sources.php"); ?>
        </fieldset>
    </div>
    <div tabid="102">
        <fieldset>
            <legend>Behavior</legend>
            <?php include(ASL_PATH."backend/tabs/instance/general/behavior.php"); ?>
        </fieldset>
    </div>
    <div tabid="103">
        <fieldset>
            <legend>Autocomplete & Suggestions</legend>
            <?php include(ASL_PATH."backend/tabs/instance/general/autocomplete.php"); ?>
        </fieldset>
    </div>
</div>
<div class="item">
    <input type="hidden" name='asl_submit' value=1 />
    <input name="submit_asl" type="submit" value="<?php _e("Save options!", "ajax-search-lite"); ?>" />
</div>