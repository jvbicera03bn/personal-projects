<?php
require("simple_html_dom.php");
$website = file_get_html("https://www.bing.com/search?q=software+engineer&go=Search&qs=ds&form=QBRE");

for ($i = 0; $i <= 5; $i++) { ?>
    <h1>Number <?= $i + 1 ?></h1>
    <h3>Title</h3>
    <h4><?= $website->find('h2 a', $i) ?></h4>
    <h3>Link</h3>
    <h4><a><?= $website->find('h2 a', $i)->href ?></a></h4>
    <hr>
<?php } ?>