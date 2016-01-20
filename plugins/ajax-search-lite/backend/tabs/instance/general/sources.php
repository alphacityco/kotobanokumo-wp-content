<?php
$themes = array(
    array('option'=>'Simple Red', 'value'=>'simple-red'),
    array('option'=>'Simple Blue', 'value'=>'simple-blue'),
    array('option'=>'Simple Grey', 'value'=>'simple-grey'),
    array('option'=>'Classic Blue', 'value'=>'classic-blue'),
    array('option'=>'Curvy Black', 'value'=>'curvy-black'),
    array('option'=>'Curvy Red', 'value'=>'curvy-red'),
    array('option'=>'Curvy Blue', 'value'=>'curvy-blue'),
    array('option'=>'Underline White', 'value'=>'underline')
);
?>
<div class="item">
    <?php
    $o = new wpdreamsCustomSelect("theme", __("Theme", "ajax-search-lite"), array(
        'selects'=>$themes,
        'value'=>wpdreams_setval_or_getoption($sd, 'theme', $_dk)
    ));
    $params[$o->getName()] = $o->getData();
    ?>
</div>
<div class="item">
    <?php
    $o = new wpdreamsYesNo("searchinposts", __("Search in posts?", "ajax-search-lite"),
        wpdreams_setval_or_getoption($sd, "searchinposts", $_dk));
    $params[$o->getName()] = $o->getData();
    ?>
</div>
<div class="item">
    <?php
    $o = new wpdreamsYesNo("searchinpages", __("Search in pages?", "ajax-search-lite"),
        wpdreams_setval_or_getoption($sd, 'searchinpages', $_dk));
    $params[$o->getName()] = $o->getData();
    ?>
</div>
<div class="item"><?php
    $o = new wpdreamsCustomPostTypes("customtypes", __("Search in custom post types", "ajax-search-lite"),
        wpdreams_setval_or_getoption($sd, 'customtypes', $_dk));
    $params[$o->getName()] = $o->getData();
    $params['selected-'.$o->getName()] = $o->getSelected();
    ?></div>
<div class="item">
    <?php
    $o = new wpdreamsYesNo("searchintitle", __("Search in title?", "ajax-search-lite"),
        wpdreams_setval_or_getoption($sd, 'searchintitle', $_dk));
    $params[$o->getName()] = $o->getData();
    ?>
</div>
<div class="item">
    <?php
    $o = new wpdreamsYesNo("searchincontent", __("Search in content?", "ajax-search-lite"),
        wpdreams_setval_or_getoption($sd, 'searchincontent', $_dk));
    $params[$o->getName()] = $o->getData();
    ?>
</div>
<div class="item">
    <?php
    $o = new wpdreamsYesNo("searchinexcerpt", __("Search in post excerpts?", "ajax-search-lite"),
        wpdreams_setval_or_getoption($sd, 'searchinexcerpt', $_dk));
    $params[$o->getName()] = $o->getData();
    ?>
</div>
<div class="item"><?php
    $o = new wpdreamsCustomFields("customfields", __("Search in custom fields", "ajax-search-lite"),
        wpdreams_setval_or_getoption($sd, 'customfields', $_dk));
    $params[$o->getName()] = $o->getData();
    $params['selected-'.$o->getName()] = $o->getSelected();
    ?>
</div>
<div class="item">
    <?php
    $o = new wpdreamsYesNo("exactonly", __("Show exact matches only?", "ajax-search-lite"),
        wpdreams_setval_or_getoption($sd, 'exactonly', $_dk));
    $params[$o->getName()] = $o->getData();
    ?>
</div>
<div class="item">
    <?php
    $o = new wpdreamsYesNo("searchinterms", __("Search in terms? (categories, tags)", "ajax-search-lite"),
        wpdreams_setval_or_getoption($sd, 'searchinterms', $_dk));
    $params[$o->getName()] = $o->getData();
    ?>
</div>
<div class="item"><?php
    $o = new wpdreamsCustomSelect("orderby", __("Result ordering", "ajax-search-lite"),
        array(
            'selects' => wpdreams_setval_or_getoption($sd, 'orderby_def', $_dk),
            'value' => wpdreams_setval_or_getoption($sd, 'orderby', $_dk)
        ));
    $params[$o->getName()] = $o->getData();
    ?>
</div>