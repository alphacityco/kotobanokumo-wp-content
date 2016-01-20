<div class="item">
    <?php
    $o = new wpdreamsYesNo("triggeronclick", __("Trigger search when clicking on search icon?", "ajax-search-lite"),
        wpdreams_setval_or_getoption($sd, 'triggeronclick', $_dk));
    $params[$o->getName()] = $o->getData();
    ?>
</div>
<div class="item">
    <?php
    $o = new wpdreamsYesNo("trigger_on_facet_change", __("Trigger search on facet change?", "ajax-search-lite"),
        wpdreams_setval_or_getoption($sd, 'trigger_on_facet_change', $_dk));
    $params[$o->getName()] = $o->getData();
    ?>
    <p class="descMsg">Will trigger a search when the user clicks on a checkbox on the front-end.</p>
</div>
<div class="item">
    <?php
    $o = new wpdreamsYesNo("redirectonclick", __("Redirect to search results page when clicking on search icon?", "ajax-search-lite"),
        wpdreams_setval_or_getoption($sd, 'redirectonclick', $_dk));
    $params[$o->getName()] = $o->getData();
    ?>
</div>
<div class="item">
    <?php
    $o = new wpdreamsYesNo("triggerontype", __("Trigger search when typing?", "ajax-search-lite"),
        wpdreams_setval_or_getoption($sd, 'triggerontype', $_dk));
    $params[$o->getName()] = $o->getData();
    ?>
</div>
<div class="item">
    <?php
    $o = new wpdreamsTextSmall("charcount", __("Minimal character count to trigger search", "ajax-search-lite"),
        wpdreams_setval_or_getoption($sd, 'charcount', $_dk), array(array("func" => "ctype_digit", "op" => "eq", "val" => true)));
    $params[$o->getName()] = $o->getData();
    ?>
</div>
<div class="item">
    <?php
    $o = new wpdreamsTextSmall("maxresults", __("Max. results", "ajax-search-lite"), wpdreams_setval_or_getoption($sd, 'maxresults', $_dk), array(array("func" => "ctype_digit", "op" => "eq", "val" => true)));
    $params[$o->getName()] = $o->getData();
    ?>
</div>
<div class="item">
    <?php
    $o = new wpdreamsYesNo("description_context", __("Display the description context?", "ajax-search-lite"),
        wpdreams_setval_or_getoption($sd, 'description_context', $_dk));
    $params[$o->getName()] = $o->getData();
    ?>
    <p class="descMsg"><?php __("Will display the description from around the search phrase, not from the beginning.", "ajax-search-lite"); ?></p>
</div>
<div class="item"><?php
    $o = new wpdreamsTextSmall("itemscount", __("Results box viewport (in item numbers)", "ajax-search-lite"), wpdreams_setval_or_getoption($sd, 'itemscount', $_dk), array(array("func" => "ctype_digit", "op" => "eq", "val" => true)));
    $params[$o->getName()] = $o->getData();
    ?>
</div>