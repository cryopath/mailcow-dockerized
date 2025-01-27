<?php
function vacation($_action, $_data = null, $_mailbox = null) {
  switch ($_action) {
    case 'edit':

      if (!hasDomainAccess($_SESSION['mailcow_cc_username'], $_SESSION['mailcow_cc_role'], $_data) && $_SESSION['mailcow_cc_role'] != "admin") {
        return true;
      }

      break;
    default:
      return false;
  }
}
