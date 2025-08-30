<?php
require "system/query/admin/orders.php";
require "system/query/admin/order-product.php";

$orders = Orders::findAll();
?>

<div class="flex h-screen">
    <?php include("layout/sidebar.php") ?>
    <div class="flex-1 overflow-y-auto flex flex-col">
        <?php include("layout/header.php") ?>

        <main class="bg-gray-200 flex-1">
            <div class="m-4 bg-white p-4 rounded-xl ">
                <div class="flex flex-col gap-4">
                    <p class="text-2xl font-semibold">Riwayat pembelian</p>
                    <div class="w-full border-t-3 border-violet-500 rounded-t-xl overflow-hidden">
                        <table class="w-full">
                            <thead class="bg-gradient-to-t from-violet-500 to-violet-300 text-white">
                                <tr>
                                    <th class="p-1 w-12 text-center border-e border-gray-400">No</th>
                                    <th class="p-1">Nama</th>
                                    <th class="p-1">Admin</th>
                                    <th class="p-1">Total pengeluaran</th>
                                    <th class="p-1">Total produk</th>
                                    <th class="p-1">Tanggal</th>
                                    <th class="p-1">Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($orders as $order) {
                                ?>
                                    <tr class="border-b border-gray-300 text-sm hover:bg-gray-100">
                                        <td class="p-1 text-center border-e border-gray-400"><?= $no++ ?></td>
                                        <td class="p-1"><?= $order["name"] ?></td>
                                        <td class="p-1"><?= $order["admin_email"] ?></td>
                                        <td class="p-1">Rp. <?= number_format($order["total_payment"], 0, ",", ".") ?></td>
                                        <td class="p-1"><?= $order["total_product"] ?></td>
                                        <td class="p-1"><?= $order["created_at"] ?></td>
                                        <td class="p-1 flex justify-center gap-1">
                                            <a href="<?= redirectTo("/admin/history-order") ?>&strukId=<?= $order["id"] ?>" onclick="openDetail(event)" class="bg-cyan-400 text-white py-1 px-4 rounded-full duration-150 ease-in-out hover:scale-103 hover:bg-cyan-500 active:scale-99">Struk </a>
                                            <a href="<?= redirectTo("/admin/history-order") ?>&detailId=<?= $order["id"] ?>" onclick="openDetail(event)" class="bg-yellow-400 text-white py-1 px-4 rounded-full duration-150 ease-in-out hover:scale-103 hover:bg-yellow-500 active:scale-99">Detail </a>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <?php
            if (isset($_GET["strukId"])) :
            ?>
                <div id="detail" class="z-2 fixed inset-0 bg-gray-300/25 backdrop-blur-xs">
                    <?php
                    $orderDetail = OrderProduct::findById($_GET["strukId"])->fetch();
                    $products = OrderProduct::findById($_GET["strukId"])->fetchAll();
                    ?>
                    <div class="w-full h-full flex items-center justify-center">
                        <div class="w-1/3 bg-violet-100 shadow-lg shadow-violet-300 border border-violet-300 px-4 py-8 rounded-xl flex flex-col items-center gap-8 relative">
                            <a href="<?= redirectTo("/admin/history-order") ?>" class="absolute -right-3 -top-3 text-3xl text-gray-600 hover:text-red-500"><i class="fa-solid fa-circle-xmark"></i></a>
                            <div class="w-72 bg-white p-4 flex flex-col items-center">
                                <p class="text-xl text-center font-semibold">EvanStore</p>
                                <p class="text-center">No pesanan : <?= $orderDetail["id"] ?></p>
                                <br>
                                <p>-----------------------------</p>
                                <table class="w-full text-xs">
                                    <tr class="py-2 border-b border-gray-300">
                                        <td class="text-center px-1">Jml</td>
                                        <td class="text-center w-36">Produk</td>
                                        <td class="text-right">Harga</td>
                                    </tr>
                                    <?php
                                    foreach ($products as $product) {
                                    ?>
                                        <tr class="py-2">
                                            <td class="flex justify-center px-1"><?= $product["quantity"] ?></td>
                                            <td><?= $product["product"] ?></td>
                                            <td class="w-full ps-4 flex justify-between">
                                                <p>Rp.</p>
                                                <p><?= number_format($product["total_price"], 0, ",", ".") ?></p>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </table>
                                <p>-----------------------------</p>
                                <div class="w-full flex justify-between">
                                    <p class="text-xs">Total :</p>
                                    <p class="text-xs">Rp. <?= number_format($orderDetail["total_payment"], 0, ",", ".") ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            endif;
            ?>
            <?php
            if (isset($_GET["detailId"])) :
            ?>
                <div id="detail" class="z-2 fixed inset-0 bg-gray-300/25 backdrop-blur-xs">
                    <?php
                    $orderDetail = OrderProduct::findById($_GET["detailId"])->fetch();
                    $products = OrderProduct::findById($_GET["detailId"])->fetchAll();
                    ?>
                    <div class="w-full h-full flex items-center justify-center">
                        <div class="w-1/2 bg-white shadow-xl border border-gray-300 px-4 py-8 rounded-xl flex flex-col gap-8 relative">
                            <a href="<?= redirectTo("/admin/history-order") ?>" class="absolute -right-3 -top-3 text-3xl text-gray-600 hover:text-red-500"><i class="fa-solid fa-circle-xmark"></i></a>
                            <p class="text-xl font-medium">Detail pesanan</p>
                            <table>
                                <tr class="flex items-start">
                                    <td class="w-34">Nama</td>
                                    <td>: <label><?= $orderDetail["name"] ?></label></td>
                                </tr>
                                <tr class="flex items-start">
                                    <td class="w-34">Tanggal</td>
                                    <td>: <label><?= $orderDetail["created_at"] ?></label></td>
                                </tr>
                                <tr class="flex items-start">
                                    <td class="w-34">Peasanan</td>
                                    <td class="flex flex-1 gap-1">:
                                        <table class="flex-1">
                                            <tr class="bg-gray-100 p-2 border-b border-gray-300">
                                                <td class="px-1 w-100">Nama produk</td>
                                                <td class="px-1">Jumlah</td>
                                                <td class="px-1">Total harga</td>
                                            </tr>
                                            <?php
                                            foreach ($products as $product) {
                                            ?>
                                                <tr class="border-b border-gray-300">
                                                    <td><?= $product["product"] ?></td>
                                                    <td><?= $product["quantity"] ?></td>
                                                    <td>Rp. <?= number_format($product["total_price"], 0, ",", ".") ?></td>
                                                </tr>
                                            <?php } ?>
                                        </table>
                                    </td>
                                </tr>
                                <tr class="flex items-start mt-4">
                                    <td class="w-34">Total</td>
                                    <td class="flex-1 flex justify-between">: <label>Rp. <?= number_format($orderDetail["total_payment"], 0, ",", ".") ?></label></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            <?php
            endif;
            ?>

        </main>
    </div>
</div>

<!-- <script>
    let detail = document.getElementById("detail")

    function openDetail(event) {
        detail.classList.remove("hidden")
        event.preventDefault()
    }

    function closeDetail() {
        detail.classList.add("hidden")
    }
</script> -->