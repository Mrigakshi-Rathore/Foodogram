<?php
require 'db_connect.php';
if ($conn) {
    echo 'Connection OK';
} else {
    echo 'No connection';
}