<div class="item"><?php
    $o = new wpdreamsYesNo("autocomplete", "Turn on google search autocomplete?", setval_or_getoption($sd, 'autocomplete', $_dk));
    $params[$o->getName()] = $o->getData();
    ?>
    <p class="descMsg">Autocomplete feature will try to help the user finish what is being typed into the search box.</p>
</div>
<div class="item"><?php
    $o = new wpdreamsYesNo("kw_suggestions", "Turn on google search keyword suggestions?", setval_or_getoption($sd, 'kw_suggestions', $_dk));
    $params[$o->getName()] = $o->getData();
    ?>
    <p class="descMsg">Keyword suggestions appear when no results match the keyword.</p>
</div>
<div class="item"><?php
    $o = new wpdreamsTextSmall("kw_length", "Max. keyword length",
        wpdreams_setval_or_getoption($sd, 'kw_length', $_dk));
    $params[$o->getName()] = $o->getData();
    ?>
    <p class="descMsg">The length of each suggestion in characters. 30-60 is a good number to avoid too long suggestions.</p>
</div>
<div class="item"><?php
    $o = new wpdreamsTextSmall("kw_count", "Max. keywords count",
        wpdreams_setval_or_getoption($sd, 'kw_count', $_dk));
    $params[$o->getName()] = $o->getData();
    ?>
</div>
<div class="item"><?php
    $o = new wpdreamsLanguageSelect("kw_google_lang", "Google suggestions language",
        wpdreams_setval_or_getoption($sd, 'kw_google_lang', $_dk));
    $params[$o->getName()] = $o->getData();
    ?>
</div>
<div class="item">
    <?php
    $o = new wpdreamsTextarea("kw_exceptions", "Keyword exceptions (comma separated)", wpdreams_setval_or_getoption($sd, 'kw_exceptions', $_dk));
    $params[$o->getName()] = $o->getData();
    ?>
</div>