<?php
function vacation($_action, $_data = null) {
  global $pdo;
  global $lang;
  $_data_log = $_data;
  switch ($_action) {
    case 'edit':
      return array('lol' => 'edit');

    case 'get':
      $_data = null;
      return array('lol' => 'get');
  }
}
