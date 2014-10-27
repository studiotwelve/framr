<?php
global $conn;

$conn = new mysqli(
  $vars['db']['host'],
  $vars['db']['user'],
  $vars['db']['pass'],
  $vars['db']['data'],
  (($vars['db']['port']) ? $vars['db']['port'] : null)
) or die($conn->connect_error.$conn->connect_errno);