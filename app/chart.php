<?php

<div id="pop_div"></div>
// With Lava class alias
<?= Lava::render('AreaChart', 'Population', 'pop_div') ?>

// With Blade Templates
@areachart('Population', 'pop_div')
