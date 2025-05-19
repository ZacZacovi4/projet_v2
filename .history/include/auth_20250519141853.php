<?php

function isLoggedIn(): bool
{
    return isset($_SESSION["user_id"]);
}

function isAdmin(): bool
{
    return isLoggedIn()
        && isset($_SESSION['role'])
        && $_SESSION['role'] === 1;
}

function isBookingManager(): bool
{
    return isLoggedIn()
        && isset($_SESSION['role'])
        && $_SESSION['role'] === 2;
}