<?php
function pesan($msg = null, $to = null) {
  echo "<script>alert('$msg');window.location = 'http://localhost/spk/main.php?page={$to}';</script>";
}
?>