<?php
$db1 = new SQLite3('world_sql_content_9b3d145b61b7ed3572d770102f24eb94/world_sql_content_9b3d145b61b7ed3572d770102f24eb94.sqlite3');

$results = $db1->query('select * from DestinyGrimoireCardDefinition');

$m = array();
while ($row = $results->fetchArray()) {
  $lore = ($row['json']);
  $a = (json_decode($lore));

  $de = ['Derivante', 'Colméia', 'Despertos', 'Desperto'];
  $para = ['Drifter', 'Hive', 'Awoken', 'Awoken'];


  if (!property_exists($a, 'cardDescription')) {
    $card = $a->cardName;
  } else {
    $card = $a->cardName;
  }

  $n = str_replace($de, $para, $card);
  $id = str_replace($de, $para, ($row['id']));
  $uid = str_replace($de, $para, base64_encode($row['id']));

  if ($n != "") {
    $data = array("nome" => $n, "id" => $id, "uid" => $uid);
    array_push($m, $data);
  }
}

echo '{"data":' . json_encode($m) . ', "draw":"1","recordsTotal": 1, "recordsFiltered": 1}';
