<?php
require "system/query/admin/product.php";
require "system/query/admin/category.php";

if (empty($_POST["search"])) {
    $products = Product::findAll();
} else {
    $products = Product::search();
}

$categoriesCreate = Category::findAll();
$categoriesUpdate = Category::findAll();

$no = 1;
?>
<div class="flex h-screen">
    <?php include("layout/sidebar.php") ?>
    <div class="flex-1 overflow-y-auto flex flex-col">
        <?php include("layout/header.php") ?>

        <main class="bg-gray-200 flex-1">

            <div class="flex gap-4 p-4">
                <div class="w-2/3 flex flex-col gap-4">
                    <div class="p-4 bg-white rounded-lg">
                        <p class="text-lg font-semibold">Daftar produk di toko ini</p>
                    </div>
                    <div class="p-4 bg-white rounded-xl flex-1 flex gap-4">
                        <div class="flex flex-col gap-4 flex-1">
                            <div class="w-full border-b border-gray-400 pb-4 flex items-center justify-between">
                                <div class="flex items-center gap-2">
                                    <form action="" method="POST" class="relative">
                                        <input type="text" name="search"
                                            class="border border-gray-400 rounded-md text-sm py-1 px-2 w-74 focus:outline-violet-600"
                                            placeholder="Cari produk" value="<?= (!empty($_POST["search"])) ? $_POST["search"] : "" ?>">
                                        <button type="submit"
                                            class="h-full px-2 absolute -translate-x-9 text-gray-400 hover:text-gray-600"><i
                                                class="fa-solid fa-magnifying-glass"></i></button>
                                    </form>
                                    <?php
                                    if (!empty($_POST["search"])) :
                                    ?>
                                        <form action="" method="post">
                                            <input type="hidden" name="search" value="">
                                            <button type="submit" class="text-2xl text-red-500"><i class="fa-solid fa-circle-xmark"></i></button>
                                        </form>
                                    <?php endif; ?>
                                </div>

                                <button onclick="openCreate()" class="bg-blue-600 py-1 px-3 text-white rounded-lg duration-100 ease-in-out hover:scale-101 active:scale-99">Tambah <i
                                        class="fa-solid fa-plus"></i></button>
                            </div>
                            <div class="w-full grid grid-cols-4 gap-4">
                                <?php
                                foreach ($products as $product) {
                                ?>
                                    <div class="w-full h-70 flex rounded-t-lg overflow-hidden">
                                        <button onclick="openDetail({id:'<?= $product['id'] ?>', name:'<?= $product['name'] ?>', price:<?= $product['price'] ?>, stock:<?= $product['stock'] ?>, image:'<?= $product['image'] ?>'})" class="cursor-pointer bg-white flex-1 flex flex-col overflow-hidden hover:scale-101 duration-100 ease-in-out">
                                            <img src="<?= storage("/images/") . $product['image'] ?>" alt="" class="w-full h-3/4 object-cover">
                                            <div class="py-1 text-left h-1/4">
                                                <p class="text-sm font-light"><?= (strlen($product["name"]) > 24) ? substr($product["name"], 0, 24) . " ..." : $product["name"] ?></p>
                                                <p class="text-lg font-semibold">Rp. <?= number_format($product["price"], 0, ",", ".") ?></p>
                                                <p class="text-sm font-medium text-gray-500">Stock <?= $product["stock"] ?></p>
                                            </div>
                                        </button>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="detail" class="hidden w-1/3">
                    <div class="bg-white border border-gray-300 shadow-xl h-auto p-4 rounded-xl w-full flex flex-col gap-4">
                        <div class="flex flex-col gap-4">
                            <img id="detailImage" src="" alt="" class="w-full">
                            <p id="detailName" class="font-semibold text-xl"></p>
                            <p id="detailPrice" class="text-lg font-medium"></p>
                            <form id="restock" method="POST" class="flex flex-col">
                                <label for="detailStock" class="text-lg font-semibold">Stok</label>
                                <div class="flex items-center gap-2">
                                    <input type="number" name="stock" id="detailStock" class="py-1 px-2 w-24 border-2 border-gray-300 rounded-lg text-base">
                                    <button type="submit" class="h-full py-1 px-2 rounded-lg bg-green-500 text-white"><i class="fa-solid fa-plus-minus"></i></button>
                                </div>
                            </form>
                            <div class="flex gap-2">
                                <button id="detailUpdate" class="bg-green-500 text-white text-sm flex-1 py-1 px-2 rounded-lg text-center duration-100 ease-in-out hover:bg-green-600 hover:scale-101 active:scale-99">Update <i class="fa-solid fa-pen-to-square text-sm"></i></button>
                                <a id="detailDelete" href="" class="bg-red-500 text-white text-sm flex-1 py-1 px-2 rounded-lg text-center duration-100 ease-in-out hover:bg-red-600 hover:scale-101 active:scale-99">Hapus <i class="fa-solid fa-trash text-sm"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="formCreate" class="hidden z-2 fixed inset-0 bg-gray-300/25 backdrop-blur-xs">
                <div class="w-full h-screen flex justify-center items-center">
                    <div class="w-2/5 bg-white border border-gray-300 shadow-xl p-4 rounded-xl relative">
                        <button onclick="closeCreate()" class="absolute -right-3 -top-3 text-3xl text-gray-600 hover:text-red-500"><i class="fa-solid fa-circle-xmark"></i></button>
                        <p class="text-center font-medium text-2xl mb-6 mt-4">Masukan Produk Baru</p>
                        <form action="<?= action("/admin/product/create") ?>" method="POST" enctype="multipart/form-data">
                            <div class="flex flex-col gap-1 my-4">
                                <label for="name">Nama Produk</label>
                                <input type="text" name="name" id="name" class="border border-gray-300 py-1 px-2 rounded-lg focus:outline-gray-400" placeholder="Masukan nama produk">
                            </div>
                            <div class="flex w-full gap-4">
                                <div class="flex flex-col gap-1 my-4 flex-1">
                                    <label for="price">Harga</label>
                                    <input type="number" name="price" id="price" class="border border-gray-300 py-1 px-2 rounded-lg focus:outline-gray-400" placeholder="Masukan harga produk">
                                </div>
                                <div class="flex flex-col gap-1 my-4">
                                    <label for="stock">Stok</label>
                                    <input type="number" name="stock" id="stock" class="w-24 border border-gray-300 py-1 px-2 rounded-lg focus:outline-gray-400" placeholder="0">
                                </div>
                            </div>
                            <div class="flex flex-col gap-1 my-4">
                                <label for="category">Kategori</label>
                                <select name="category_id" id="category" class="w-full border border-gray-300 py-1 px-2 rounded-lg focus:outline-gray-400">
                                    <option value="" disabled selected>Pilih kategori</option>
                                    <?php
                                    foreach ($categoriesCreate as $category) {
                                    ?>
                                        <option value="<?= $category["id"] ?>"><?= $category["name"] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="flex flex-col gap-1 my-4">
                                <label for="image">Gambar</label>
                                <input type="file" name="image" id="image" class="border border-gray-300 py-1 px-2 rounded-lg focus:outline-gray-400" placeholder="Masukan nama produk">
                            </div>
                            <div class="flex flex-col gap-1 my-4">
                                <button class="bg-green-500 py-1 w-full text-white rounded-lg">Simpan <i class="fa-solid fa-floppy-disk"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div id="formUpdate" class="hidden z-2 fixed inset-0 bg-gray-300/25 backdrop-blur-xs">
                <div class="w-full h-screen flex justify-center items-center">
                    <div class="w-2/5 bg-white border border-gray-300 shadow-xl p-4 rounded-xl relative">
                        <button onclick="closeUpdate()" class="absolute -right-3 -top-3 text-3xl text-gray-600 hover:text-red-500"><i class="fa-solid fa-circle-xmark"></i></button>
                        <p class="text-center font-medium text-2xl mb-6 mt-4">Update Product</p>
                        <form id="actionUpdate" method="POST" enctype="multipart/form-data">
                            <div class="flex flex-col gap-1 my-4">
                                <label for="nameUpdate">Nama Produk</label>
                                <input type="text" name="name" id="nameUpdate" class="border border-gray-300 py-1 px-2 rounded-lg focus:outline-gray-400" placeholder="Masukan nama produk">
                            </div>
                            <div class="flex w-full gap-4">
                                <div class="flex flex-col gap-1 my-4 flex-1">
                                    <label for="priceUpdate">Harga</label>
                                    <input type="number" name="price" id="priceUpdate" class="border border-gray-300 py-1 px-2 rounded-lg focus:outline-gray-400" placeholder="Masukan harga produk">
                                </div>
                                <div class="flex flex-col gap-1 my-4">
                                    <label for="stockUpdate">Stok</label>
                                    <input type="number" name="stock" id="stockUpdate" class="w-24 border border-gray-300 py-1 px-2 rounded-lg focus:outline-gray-400" placeholder="0">
                                </div>
                            </div>
                            <div class="flex flex-col gap-1 my-4">
                                <label for="categoryUpdate">Kategori</label>
                                <select name="category_id" id="categoryUpdate" class="w-full border border-gray-300 py-1 px-2 rounded-lg focus:outline-gray-400">
                                    <option value="" disabled selected>Tidak diubah</option>
                                    <?php
                                    foreach ($categoriesUpdate as $category) {
                                    ?>
                                        <option value="<?= $category["id"] ?>"><?= $category["name"] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="flex flex-col gap-1 my-4">
                                <label for="image">Gambar</label>
                                <input type="file" name="image" id="image" class="border border-gray-300 py-1 px-2 rounded-lg focus:outline-gray-400" placeholder="Masukan nama produk">
                            </div>
                            <div class="flex flex-col gap-1 my-4">
                                <button class="bg-green-500 py-1 w-full text-white rounded-lg">Simpan <i class="fa-solid fa-floppy-disk"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </main>

    </div>
</div>

<script>
    let formCreate = document.getElementById("formCreate")
    let formUpdate = document.getElementById("formUpdate")
    let restock = document.getElementById("restock")

    let detail = document.getElementById("detail")
    let detailName = document.getElementById("detailName")
    let detailPrice = document.getElementById("detailPrice")
    let detailStock = document.getElementById("detailStock")
    let detailImage = document.getElementById("detailImage")

    let detailDelete = document.getElementById("detailDelete")
    let detailUpdate = document.getElementById("detailUpdate")

    let nameUpdate = document.getElementById("nameUpdate");
    let priceUpdate = document.getElementById("priceUpdate");
    let stockUpdate = document.getElementById("stockUpdate");

    function openCreate() {
        formCreate.classList.remove("hidden")
    }

    function closeCreate() {
        formCreate.classList.add("hidden")
    }

    function openDetail(product = {}) {
        detail.classList.remove("hidden")
        detailName.innerHTML = product.name
        detailPrice.innerHTML = "Rp. " + product.price.toLocaleString("id-ID");;
        detailStock.value = product.stock

        detailImage.src = "<?= storage("/images/") ?>" + product.image
        detailDelete.href = "<?= action("/admin/product/delete") ?>?id=" + product.id
        detailUpdate.onclick = () => {
            openUpdate({
                id: product.id,
                name: product.name,
                price: product.price,
                stock: product.stock
            })
        };

        restock.action = "<?= action("/admin/product/restock") ?>?id=" + product.id
    }

    function openUpdate(product = {}) {
        formUpdate.classList.remove("hidden")
        nameUpdate.value = product.name
        priceUpdate.value = product.price
        stockUpdate.value = product.stock
        actionUpdate.action = "<?= action('/admin/product/update') ?>?id=" + product.id
    }

    function closeUpdate() {
        formUpdate.classList.add("hidden")
    }
</script>