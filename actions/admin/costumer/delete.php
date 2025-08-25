<?php
require "../../../system/action.php";
useQuery("admin/costumer");

Costumer::delete();
redirect("/admin/costumer");