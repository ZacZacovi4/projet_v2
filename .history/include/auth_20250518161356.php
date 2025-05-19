<?php

function isLoggedIn(): bool {
    return isset($_SESSION["user"]);
}

function isAdmin(): bool {
    return isLoggedIn() && isset($_SESSION["user"]["role"]) === "";