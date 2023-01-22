<?php
$languages = array('PHP', 'JS', 'Ruby');
/* 1 */
echo 'Forloop Dropdown';
echo '<select>';
for ($i = 0; $i < count($languages); $i++) {
    echo '<option value="' . $languages[$i] . '">' . $languages[$i] . '</option>';
}
echo '</select>' . '<br>';
/* 2 */
echo 'Foreach Dropdown';
echo '<select>';
foreach ($languages as $val) {
    echo '<option value="' . $val . '">' . $val . '</option>';
}
echo '</select>' . '<br>';
/* 3 */
array_push($languages, 'HTML', 'CSS');
echo 'New Options Dropdown';
echo '<select>';
foreach ($languages as $val) {
    echo '<option value="' . $val . '">' . $val . '</option>';
}
echo '</select>';
