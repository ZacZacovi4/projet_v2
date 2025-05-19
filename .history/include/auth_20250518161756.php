<?php

function isLoggedIn(): bool
{
    return isset($_SESSION["user"]);
}

function isAdmin(): bool
{
    return isLoggedIn() && isset($_SESSION["user"]["role"]) === 1;
}

function isBookingManager(): bool
{
    return isLoggedIn() && isset($_SESSION["user"]["role"]) === 2;
}

function isUser(): bool
{
    return isLoggedIn() && isset($_SESSION["user"]["role"]) === 3;
}