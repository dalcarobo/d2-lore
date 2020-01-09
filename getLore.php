<?php

$db2 = new SQLite3('world_sql_content_e2e6f97ab386457d36c5c857d6b98fa3/world_sql_content_e2e6f97ab386457d36c5c857d6b98fa3.sqlite3');

if (isset($_POST['search']) && $_POST['search'] != '') {
  $results = $db2->query("select * from DestinyLoreDefinition where json like '%" . $_POST['search'] . "%'");
} else {
  $results = $db2->query('select * from DestinyLoreDefinition');
}

$m = array();
while ($row = $results->fetchArray()) {
  if($row) {
    $lore = ($row['json']);
    $a = (json_decode($lore));

    $de = ['Derivante', 'Colméia', 'Colméia', 'Despertos', 'Desperto', 'Decaído'];
    $para = ['Drifter', 'Hive', 'Hive', 'Awoken', 'Awoken', 'Fallen'];

    $n = str_replace($de, $para, $a->displayProperties->name);
    $id = str_replace($de, $para, base64_encode($row['id']));

    if ($n != "") {
      $data = array("hash" => $a->hash, "nome" => $n, "id" => $id);
      array_push($m, $data);
    }
  }
}

echo '{"data":' . json_encode($m) . ', "draw":"1","recordsTotal": 1, "recordsFiltered": 1}';
