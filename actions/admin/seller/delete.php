<?php

require "../../../system/action.php";
useQuery("/admin/seller");

Seller::delete();
redirect("/admin/seller", "success", "Berhasil menghapus data penjual!");