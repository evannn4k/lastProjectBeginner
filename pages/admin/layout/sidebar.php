    <nav class="overflow-y-auto w-1/6 h-screen bg-white shadow-2xl z-1">
        <div>
            <div class="bg-[url(<?= asset("/bgprofile.jpg") ?>)] bg-cover bg-center bg-no-repeat h-44">
                <div class="h-full flex flex-col justify-between p-4 relative">
                    <button onclick="openMenu()">
                        <img src="<?= asset("/profile.png") ?>" alt="profile_picture.jpg" class="w-20">
                    </button>

                    <div id="menu" class="top-26 hidden items-start gap-1">
                        <div class="bg-white rounded-lg p-3 w-50 border border-gray-300 shadow-xl z-3 flex flex-col gap-4">
                            <div class="w-full flex justify-center py-4 bg-gray-100 border border-gray-300 rounded-lg">
                                <img src="<?= asset("/profile.png") ?>" alt="profile_picture.jpg" class="w-14">
                            </div>
                            <a href="<?= action("/auth/logout") ?>" class="flex items-center hover:bg-red-100 px-2 py-1 rounded-lg">
                                <div class="w-8 text-left">
                                    <i class="fa-solid fa-arrow-right-from-bracket"></i>
                                </div>
                                Logout
                            </a>
                        </div>

                        <button onclick="closeMenu()" class="text-red-300 text-3xl"><i class="fa-solid fa-circle-xmark"></i></button>
                    </div>

                    <div id="profile" class="flex flex-col">
                        <p class="text-base text-white font-medium">Master admin</p>
                        <p class="text-sm text-white font-medium"><?= $_SESSION["email"] ?></p>
                    </div>
                </div>
            </div>

            <div class="w-full flex flex-col">
                <p class="text-lg px-4 py-2 font-semibold mt-4">Navigasi</p>

                <div class="w-full flex flex-col gap-1 py-4 px-4">
                    <a href="<?= redirectTo("/admin/index") ?>" class="<?= ($view == "/admin/index") ? "bg-gradient-to-t from-violet-200 to-violet-100 text-violet-700 hover:text-violet-800 hover:from-violet-300 hover:to-violet-200" : "text-gray-700 hover:text-violet-700" ?> flex items-center gap-3 w-full px-4 py-2 text-base  font-semibold rounded-xl hover:scale-101 ease-in-out duration-100">
                        <i class="fa-solid fa-house"></i>
                        Berada
                    </a>
                    <a href="<?= redirectTo("/admin/costumer") ?>" class="<?= ($view == "/admin/costumer") ? "bg-gradient-to-t from-violet-200 to-violet-100 text-violet-700 hover:text-violet-800 hover:from-violet-300 hover:to-violet-200" : "text-gray-700 hover:text-violet-700" ?> flex items-center gap-3 w-full px-4 py-2 text-base font-semibold rounded-xl hover:scale-101 ease-in-out duration-100">
                        <i class="fa-solid fa-people-group"></i>
                        Pembeli
                    </a>
                    <a href="<?= redirectTo("/admin/product") ?>" class="<?= ($view == "/admin/product") ? "bg-gradient-to-t from-violet-200 to-violet-100 text-violet-700 hover:text-violet-800 hover:from-violet-300 hover:to-violet-200" : "text-gray-700 hover:text-violet-700" ?> flex items-center gap-3 w-full px-4 py-2 text-base font-semibold rounded-xl hover:scale-101 ease-in-out duration-100">
                        <i class="fa-solid fa-boxes-packing"></i>
                        Produk
                    </a>
                    <a href="<?= redirectTo("/admin/category") ?>" class="<?= ($view == "/admin/category") ? "bg-gradient-to-t from-violet-200 to-violet-100 text-violet-700 hover:text-violet-800 hover:from-violet-300 hover:to-violet-200" : "text-gray-700 hover:text-violet-700" ?> flex items-center gap-3 w-full px-4 py-2 text-base font-semibold rounded-xl hover:scale-101 ease-in-out duration-100">
                        <i class="fa-solid fa-list"></i>
                        Kategori
                    </a>
                    <a href="<?= redirectTo("/admin/seller") ?>" class="<?= ($view == "/admin/seller") ? "bg-gradient-to-t from-violet-200 to-violet-100 text-violet-700 hover:text-violet-800 hover:from-violet-300 hover:to-violet-200" : "text-gray-700 hover:text-violet-700" ?> flex items-center gap-3 w-full px-4 py-2 text-base font-semibold rounded-xl hover:scale-101 ease-in-out duration-100">
                        <i class="fa-solid fa-user-tie"></i>
                        Penjual
                    </a>
                </div>

                <p class="text-lg px-4 mt-4 font-semibold">Penjualan</p>

                <div class="w-full flex flex-col gap-1 py-4 px-4">
                    <a href="<?= redirectTo("/admin/create-order") ?>" class="<?= ($view == "/admin/create-order") ? "bg-gradient-to-t from-violet-200 to-violet-100 text-violet-700 hover:text-violet-800 hover:from-violet-300 hover:to-violet-200" : "text-gray-700 hover:text-violet-700" ?> flex items-center gap-3 w-full px-4 py-2 text-base font-semibold rounded-xl hover:scale-101 ease-in-out duration-100">
                        <i class="fa-solid fa-cart-plus"></i>
                        Buat Pesanan
                    </a>
                    <a href="<?= redirectTo("/admin/history-order") ?>" class="<?= ($view == "/admin/history-order") ? "bg-gradient-to-t from-violet-200 to-violet-100 text-violet-700 hover:text-violet-800 hover:from-violet-300 hover:to-violet-200" : "text-gray-700 hover:text-violet-700" ?> flex items-center gap-3 w-full px-4 py-2 text-base font-semibold rounded-xl hover:scale-101 ease-in-out duration-100">
                        <i class="fa-solid fa-clock-rotate-left"></i>
                        Riwayat Penjualan
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <script>
        let menu = document.getElementById("menu")
        let profile = document.getElementById("profile")

        function openMenu() {
            menu.className = "top-26 flex items-start gap-1"
            profile.className = "hidden flex-col"
        }
        
        function closeMenu() {
            menu.className = "top-26 hidden items-start gap-1"
            profile.className = "flex flex-col"
        }
    </script>