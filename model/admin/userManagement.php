<?php
// controle de droit d'acces
if (!isAdmin()) {
    redirect("index.php?page=403");
}
