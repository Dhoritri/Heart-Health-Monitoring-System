<?php
session_start();

if (isset($_SESSION['nid'])) {
    $nid = $_SESSION['nid'];
    echo "<h1>Welcome, User ID: $nid</h1>";
} else {
    echo "<h1>Welcome, Guest</h1>";
}
