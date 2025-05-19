<?php

session_unset();
session_destroy();

redirect("index.php?page=login");
