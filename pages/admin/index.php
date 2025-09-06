<?php
require "system/query/admin/costumer.php";
require "system/query/admin/product.php";
require "system/query/admin/orders.php";
require "system/query/admin/category.php";
?>

<div class="flex h-screen">
    <?php include("layout/sidebar.php") ?>
    <div class="flex-1 overflow-y-auto flex flex-col">
        <?php include("layout/header.php") ?>

        <main class="bg-gray-200 flex-1">
            <div class="flex flex-col p-4 gap-4">

                <div class="flex items-center gap-2">
                    <span class="bg-gradient-to-r from-violet-400 to-violet-500 py-1 px-2 text-lg text-white border-2 border-violet-500 rounded-lg">
                        <i class="fa-solid fa-house"></i>
                    </span>
                    <p class="text-xl font-light">Dashboard</p>
                </div>

                <div class="flex gap-4">
                    <div
                        class="h-40 flex-1 bg-gradient-to-r from-red-300 to-red-400 to-60% border border-red-400 rounded-lg">
                        <div class="bg-[url(<?= asset("/circle.png") ?>)] h-full bg-no-repeat bg-contain bg-right p-6">
                            <div class="h-full flex flex-col justify-between">
                                <div class="">
                                    <p class="text-base text-white">Jumlah Pembeli</p>
                                    <p class="text-2xl text-white"><?= Costumer::countCostumers()->fetch()["total"] ?> Pengguna</p>
                                </div>
                                <a href="<?= redirectTo("/admin/costumer") ?>" class="text-sm text-white duration-100 ease-in-out hover:scale-101 active:scale-99">Lihat selengkapnya <i class="fa-solid fa-arrow-right text-xs"></i></a>
                            </div>
                        </div>
                    </div>
                    <div
                        class="h-40 flex-1 bg-gradient-to-r from-blue-300 to-blue-400 to-60% border border-blue-400 rounded-lg">
                        <div class="bg-[url(<?= asset("/circle.png") ?>)] h-full bg-no-repeat bg-contain bg-right p-6">
                            <div class="h-full flex flex-col justify-between">
                                <div class="">
                                    <p class="text-base text-white">Produk Terjual Sebulan Terakhir</p>
                                    <p class="text-2xl text-white"><?= Orders::order1Mounth()->fetch()["total"] ?></p>
                                </div>
<<<<<<< HEAD
                                <a href="<?= redirectTo("/admin/product") ?>" class="text-sm text-white">Lihat selengkapnya <i class="fa-solid fa-arrow-right text-xs"></i></a>
=======
                                <a href="<?= redirectTo("/admin/history-order") ?>" class="text-sm text-white">Lihat selengkapnya <i class="fa-solid fa-arrow-right text-xs"></i></a>
>>>>>>> 8e2f315 (Third commit)
                            </div>
                        </div>
                    </div>
                    <div
                        class="h-40 flex-1 bg-gradient-to-r from-green-300 to-green-400 to-60% border border-green-400 rounded-lg">
                        <div class="bg-[url(<?= asset("/circle.png") ?>)] h-full bg-no-repeat bg-contain bg-right p-6">
                            <div class="h-full flex flex-col justify-between">
                                <div class="">
                                    <p class="text-base text-white">Total Pendapatan Sebulkan Terakhir</p>
                                    <p class="text-2xl text-white">Rp. <?= number_format(Orders::totalPayment1Mounth()->fetch()["total_payment"], 0, ",", ".") ?></p>
                                </div>
                                <a href="<?= redirectTo("/admin/history-order") ?>" class="text-sm text-white duration-100 ease-in-out hover:scale-101 active:scale-99">Lihat selengkapnya <i class="fa-solid fa-arrow-right text-xs"></i></a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </main>

    </div>
</div>