<?php
if (isAdmin() === false) {
    redirect("index.php?page=403");
}