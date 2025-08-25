<?php

require "../../../system/action.php";
useQuery("/admin/category");

Category::delete();
redirect("/admin/category");