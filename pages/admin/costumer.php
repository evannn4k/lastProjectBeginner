<?php
require "system/query/admin/costumer.php";
if (empty($_POST["search"])) {
    $costumers = Costumer::findAll();
} else {
    $costumers = Costumer::search();
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
                    <p class="text-lg font-semibold">Data pembeli</p>
                </div>

                <div class="p-4 bg-white rounded-lg flex gap-4">
                    <div class="flex-1 flex flex-col gap-4">
                        <div class="border-b border-gray-400 pb-4 flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <form action="" method="POST" class="relative">
                                    <input type="text" name="search"
                                        class="border border-gray-400 rounded-md text-sm py-1 px-2 w-74 focus:outline-violet-600"
                                        placeholder="Cari nama" value="<?= (!empty($_POST["search"])) ? $_POST["search"] : "" ?>">
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

                            <a href="<?= redirectTo("/admin/form/costumer-create") ?>" class="bg-blue-600 py-1 px-3 text-white rounded-lg duration-100 ease-in-out hover:scale-101 active:scale-99">Tambah <i
                                    class="fa-solid fa-plus"></i></a>
                        </div>
                        <div class="w-full border-t-3 border-violet-500 rounded-t-xl overflow-hidden">
                            <table class="w-full">
                                <thead class="bg-gradient-to-t from-violet-500 to-violet-300 text-white">
                                    <tr>
                                        <th class="p-1 w-12 text-center border-e border-gray-400">No</th>
                                        <th class="p-1">Nama</th>
                                        <th class="p-1">Email</th>
                                        <th class="p-1">Kelamin</th>
                                        <th class="p-1">Verify</th>
                                        <th class="p-1">Pesanan</th>
                                        <th class="p-1">Pengeluaran</th>
                                        <th class="p-1">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($costumers as $costumer) {
                                    ?>
                                        <tr class="border-b border-gray-300 text-sm hover:bg-gray-100">
                                            <td class="p-1 text-center border-e border-gray-400"><?= $no++ ?></td>
                                            <td class="p-1"><?= $costumer["name"] ?></td>
                                            <td class="p-1"><?= $costumer["email"] ?></td>
                                            <td class="p-1"><?= $costumer["gender"] ?></td>
                                            <td class="p-1"><?= $costumer["created_at"] ?></td>
                                            <td class="p-1">1</td>
                                            <td class="p-1">1</td>
                                            <td class="p-1 flex justify-center gap-2">
                                                <a href="<?= redirectTo("/admin/form/costumer-update") ?>&id=<?= $costumer["id"] ?>" class="text-white bg-green-500 p-2 rounded-lg hover:scale-101 hover:bg-green-600 duration-100 ease-in-out active:scale-99"><i class="fa-solid fa-pen-to-square"></i></a>
                                                <a href="<?= action("/admin/costumer/delete") ?>?id=<?= $costumer['id'] ?>" class="text-white bg-red-500 p-2 rounded-lg hover:scale-101 hover:bg-red-600 duration-100 ease-in-out active:scale-99"><i class="fa-solid fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="w-1/4">
                        <div class="bg-gray-100 border border-gray-300 shadow-xl h-auto p-4 rounded-xl w-full flex flex-col gap-4">
                            <div class="bg-white shadow-lg border border-gray-300 py-6 px-auto text-center rounded-lg">
                                <i class="fa-solid fa-circle-user text-8xl"></i>
                            </div>
                            <p class="text-2xl font-light text-center">Data Pembeli</p>
                            <div class="bg-white shadow-lg border border-gray-300 px-auto rounded-lg p-4">
                                <div class="flex flex-col gap-2">
                                    <p class="font-semibold">Pengguna Laki-laki :</p>
                                    <p class="text-sm"><?= Costumer::countMale()->fetch()["total"] ?> total pengguna</p>
                                </div>
                                <hr class="my-4 text-gray-300">
                                <div class="flex flex-col gap-2">
                                    <p class="font-semibold">Pengguna Perempuan :</p>
                                    <p class="text-sm"><?= Costumer::countFemale()->fetch()["total"] ?> total pengguna</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </main>

    </div>
</div>