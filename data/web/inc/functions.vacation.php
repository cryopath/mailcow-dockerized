<?php
function vacation($_action, $_data = null) {
  global $pdo;
  global $lang;
  $_data_log = $_data;
  switch ($_action) {
    case 'edit':
      return false;

    case 'get':
      $_data = null;
      return false;
  }
  return false;
}
