<?php
require "system/query/admin/product.php";
require "system/query/admin/costumer.php";

$products = Product::stock();
$costumers = Costumer::findAll();

function option($products)
{
    $option = "";
    foreach ($products as $product) {
        $option .= "<option value='{$product['id']}'>{$product['name']}</option>";
    }
    return $option;
}

$productOption = option($products)
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
                        <input type="hidden" name="admin_email" value="<?= $_SESSION["email"] ?>">
                        <div class="flex justify-between">
                            <p class="text-center font-semibold text-3xl">Buat Orderan</p>
                            <!-- <button type="submit"
                                class="bg-green-500 text-white py-2 px-4 rounded-lg hover:bg-green-600 hover:scale-103 duration-150 ease-in-out"><i
                                    class="fa-solid fa-cart-plus"></i></button> -->
                            <button onclick="addProduct()" type="button" class="bg-green-500 text-white rounded-full px-4 py-2 duration-150 ease-in-out hover:scale-103 hover:bg-green-600">Tambah produk <i class="fa-solid fa-plus"></i></button>
                        </div>
                        <div id="formProduct" class="flex flex-col gap-6">
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
                            <div class="flex flex-col gap-1 bg-gray-100 p-2 rounded-lg border border-gray-300">
                                <label>Pilih Produk</label>
                                <select name="products[0][product_id]"
                                    class="py-1 px-2 bg-white border border-gray-300 rounded-lg">
                                    <option value="" disabled selected>Pilih produk</option>
                                    <?= $productOption ?>
                                </select>
                                <label>Jumlah produk</label>
                                <input type="text" name="products[0][quantity]" placeholder="Jumlah" class="bg-white px-2 py-1 rounded-lg border border-gray-300 w-28">
                            </div>
                        </div>
                        <div class="flex justify-center">
                            <button type="submit"
                                class="bg-green-500 text-white py-2 w-1/4 rounded-full hover:bg-green-600 hover:scale-103 duration-150 ease-in-out">Buat pesanan<i
                                    class="fa-solid fa-cart-plus"></i></button>
                            <!-- <button onclick="addProduct()" type="button" class="bg-green-500 text-white rounded-full px-4 py-2 duration-150 ease-in-out hover:scale-103 hover:bg-green-600">Tambah produk <i class="fa-solid fa-plus"></i></button> -->
                        </div>
                    </form>

                </div>
            </div>
        </main>

    </div>
</div>

<script>
    let index = 1;

    function addProduct() {
        let formProduct = document.getElementById("formProduct")
        let row = `
        <div class="flex flex-col gap-1 bg-gray-100 p-2 rounded-lg border border-gray-300">
            <label>Pilih Produk</label>
            <select name="products[${index}][product_id]"
                class="py-1 px-2 bg-white border border-gray-300 rounded-lg">
                <option value="" disabled selected>Pilih produk</option>
                <?= $productOption ?>
            </select>
            <label>Jumlah produk</label>
            <input type="text" name="products[${index}][quantity]" placeholder="Jumlah" class="bg-white px-2 py-1 rounded-lg border border-gray-300 w-28">
        </div>
        `

        formProduct.insertAdjacentHTML('beforeend', row)
        index++
        console.log(option);
    }
</script>