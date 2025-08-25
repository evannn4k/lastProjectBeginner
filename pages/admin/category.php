<?php
require "system/query/admin/category.php";
if (empty($_POST["search"])) {
    $categories = Category::findAll();
} else {
    $categories = Category::search();
}

$no = 1;
?>
<div class="flex h-screen">
    <?php include("layout/sidebar.php") ?>
    <div class="flex-1 overflow-y-auto flex flex-col">
        <?php include("layout/header.php") ?>

        <main class="bg-gray-200 flex-1">
            <div class="p-4 flex flex-col gap-4">
                <div class="p-4 bg-white rounded-lg">
                    <p class="text-lg font-semibold">Kategori produk</p>
                </div>

                <div class="p-4 bg-white rounded-lg flex gap-4">
                    <div class="flex-1 flex flex-col gap-4 w-1/2">
                        <div class="border-b border-gray-400 pb-4 flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <form action="" method="POST" class="relative">
                                    <input type="text" name="search"
                                        class="border border-gray-400 rounded-md text-sm py-1 px-2 w-74 focus:outline-violet-600"
                                        placeholder="Cari kategori" value="<?= (!empty($_POST["search"])) ? $_POST["search"] : "" ?>">
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
                        <div class="w-full border-t-3 border-violet-500 rounded-t-xl overflow-hidden">
                            <table class="w-full">
                                <thead class="bg-gradient-to-t from-violet-500 to-violet-300 text-white">
                                    <tr>
                                        <th class="p-1 w-12 text-center border-e border-gray-400">No</th>
                                        <th class="p-1">Nama Kategori</th>
                                        <th class="p-1">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($categories as $category) {
                                    ?>
                                        <tr class="border-b border-gray-300 text-sm hover:bg-gray-100">
                                            <td class="p-1 text-center border-e border-gray-400"><?= $no++ ?></td>
                                            <td class="p-1"><?= $category["name"] ?></td>
                                            <td class="p-1 flex justify-center gap-2">
                                                <button onclick="openUpdate({id : <?= $category['id'] ?>, name : '<?= $category['name'] ?>'})" class="text-white bg-green-500 p-2 rounded-lg hover:scale-101 hover:bg-green-600 duration-100 ease-in-out active:scale-99"><i class="fa-solid fa-pen-to-square"></i></button>
                                                <a href="<?= action("/admin/category/delete") ?>?id=<?= $category['id'] ?>" class="text-white bg-red-500 p-2 rounded-lg hover:scale-101 hover:bg-red-600 duration-100 ease-in-out active:scale-99"><i class="fa-solid fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="w-1/2">
                        <div class="bg-gray-100 border border-gray-300 shadow-xl h-auto p-4 rounded-xl w-full flex flex-col gap-4">
                            <div class="bg-white shadow-lg border border-gray-300 py-6 px-auto text-center rounded-lg">
                                <i class="fa-solid fa-circle-user text-8xl"></i>
                            </div>
                            <p class="text-2xl font-light text-center">Data Pembeli</p>
                            <div class="bg-white shadow-lg border border-gray-300 px-auto rounded-lg p-4">
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quam error quisquam eos saepe illo facere reiciendis provident aspernatur. Ducimus minima ipsam et sapiente odio doloremque aliquid ad, aspernatur repellat reprehenderit.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="formCreate" class="hidden z-2 fixed inset-0 bg-gray-300/25 backdrop-blur-xs">
                <div class="w-full h-full flex items-center justify-center">
                    <div class="w-1/5 bg-white shadow-xl border border-gray-300 px-4 py-8 rounded-xl flex flex-col gap-8 relative">
                        <button onclick="closeCreate()" class="absolute -right-3 -top-3 text-3xl text-gray-600 hover:text-red-500"><i class="fa-solid fa-circle-xmark"></i></button>
                        <p class="text-center font-semibold text-xl">Tambah Kategori</p>
                        <form action="<?= action("/admin/category/create") ?>" method="POST" class="flex flex-col gap-6">
                            <div class="flex flex-col gap-2">
                                <label for="name" class="text-sm">Kategori</label>
                                <input type="text" name="name" id="name" class="border border-gray-300 focus:outline focus:outline-gray-400 w-full py-1 px-2 rounded-lg text-sm" placeholder="Masukan nama kategori">
                            </div>
                            <div class="w-full flex justify-center">
                                <button class="w-1/2 py-1 rounded-lg bg-green-500 text-white">Simpan <i class="fa-solid fa-floppy-disk"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div id="formUpdate" class="hidden z-2 fixed inset-0 bg-gray-300/25 backdrop-blur-xs">
                <div class="w-full h-full flex items-center justify-center">
                    <div class="w-1/5 bg-white shadow-xl border border-gray-300 px-4 py-8 rounded-xl flex flex-col gap-8 relative">
                        <button onclick="closeUpdate()" class="absolute -right-3 -top-3 text-3xl text-gray-600 hover:text-red-500"><i class="fa-solid fa-circle-xmark"></i></button>
                        <p class="text-center font-semibold text-xl">Ubah Kategori</p>
                        <form action="<?= action("/admin/category/update") ?>" method="POST" class="flex flex-col gap-6">
                            <input type="hidden" name="id" id="idUpdate">
                            <div class="flex flex-col gap-2">
                                <label for="nameUpdate" class="text-sm">Kategori</label>
                                <input type="text" name="name" id="nameUpdate" class="border border-gray-300 focus:outline focus:outline-gray-400 w-full py-1 px-2 rounded-lg text-sm" placeholder="Masukan nama kategori">
                            </div>
                            <div class="w-full flex justify-center">
                                <button class="w-1/2 py-1 rounded-lg bg-green-500 text-white">Simpan <i class="fa-solid fa-floppy-disk"></i></button>
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
    let idUpdate = document.getElementById("idUpdate")
    let nameUpdate = document.getElementById("nameUpdate")

    function openCreate() {
        formCreate.classList.remove("hidden")
    }

    function closeCreate() {
        formCreate.classList.add("hidden")
    }

    function openUpdate(data = {}) {
        formUpdate.classList.remove("hidden")
        idUpdate.value = data.id
        nameUpdate.value = data.name
    }

    function closeUpdate() {
        formUpdate.classList.add("hidden")
    }
</script>