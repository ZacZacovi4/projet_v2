<?php

$_SESSION["user_id"] = "";
session_unset();
session_destroy();

redirect("index.php?page=login");
