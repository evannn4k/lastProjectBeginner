<?php
require "system/query/admin/product.php";
require "system/query/admin/costumer.php";

$products = Product::stock();
$costumers = Costumer::findAll();


?>

<div class="flex h-screen">
    <?php include("layout/sidebar.php") ?>
    <div class="flex-1 overflow-y-auto flex flex-col">
        <?php include("layout/header.php") ?>

        <main class="bg-gray-200 flex-1">
            <div class="container mx-auto px-6">
                <div class="w-full flex justify-center">

                    <form action="<?= action("/admin/orders/create") ?>" method="POST"
                        class="w-2/3 flex flex-col gap-6 p-4 bg-white rounded-xl shadow-lg m-8">
                        <div class="flex justify-between">
                            <p class="text-center font-semibold text-3xl">Buat Orderan</p>
                            <button type="submit"
                                class="bg-green-500 text-white py-2 px-4 rounded-lg hover:bg-green-600 hover:scale-103 duration-150 ease-in-out"><i
                                    class="fa-solid fa-cart-plus"></i></button>
                        </div>
                        <div class="flex flex-col gap-6">
                            <div class="flex flex-col gap-1">
                                <label for="costumer_id">Pilih nama pembeli</label>
                                <select name="costumer_id" id="costumer_id"
                                    class="py-1 px-2 border border-gray-300 rounded-lg">
                                    <option value="" disabled selected>Pilih pembeli</option>
                                    <?php
                                    foreach ($costumers as $costumer) {
                                        ?>
                                        <option value="<?= $costumer["id"] ?>"><?= $costumer["name"] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="flex flex-col">
                                <p for="">Pilih Produk</p>
                                <div class="w-full relative">
                                    <button type="button"
                                        class="w-full flex justify-between items-center bg-white border border-gray-300 p-2 rounded-xl">Pilih
                                        product <i class="fa-solid fa-angle-down"></i></button>
                                    <div class="grid grid-cols-4 gap-4 p-4 bg-gray-200 my-8 rounded-lg">
                                        <?php foreach ($products as $product) { ?>
                                            <label id="" class="">
                                                <img src="<?= storage("/images/") . $product["image"] ?>" alt="">
                                                <div class="">
                                                    <input type="radio" id="" name="product">
                                                    <p><?= $product['name'] ?></p>
                                                </div>
                                            </label>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </main>

    </div>
</div>