<?php
function vacation($_action, $_data = null, $_mailbox = null) {
  global $pdo;
  global $redis;
  global $lang;
  global $MAILBOX_DEFAULT_ATTRIBUTES;
  switch ($_action) {
    case 'get':
      if (!hasDomainAccess($_SESSION['mailcow_cc_username'], $_SESSION['mailcow_cc_role'], $_data) && $_SESSION['mailcow_cc_role'] != "admin") {
        return false;
      }
      else {
        if (isset($_data) && filter_var($_data, FILTER_VALIDATE_EMAIL)) {
          if (!hasMailboxObjectAccess($_SESSION['mailcow_cc_username'], $_SESSION['mailcow_cc_role'], $_data)) {
            return false;
          }
        }
        else {
          $_data = $_SESSION['mailcow_cc_username'];
        }
        $stmt = $pdo->prepare("select JSON_EXTRACT(c_defaults, '$.Vacation') AS vacation from sogo_user_profile where c_uid = :username;");
        $stmt->execute(array(':username' => $_data));
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $vacation_settings = $row;
        http_response_code(200);
        echo $vacation_settings;
        exit();
        return $vacation_settings;
      }
      break;

    case 'edit':

      if (!hasDomainAccess($_SESSION['mailcow_cc_username'], $_SESSION['mailcow_cc_role'], $_data) && $_SESSION['mailcow_cc_role'] != "admin") {
        return false;
      }

      break;
    default:
      return false;
  }
}
