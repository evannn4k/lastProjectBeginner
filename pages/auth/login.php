<div class="bg-gradient-to-t from-violet-300 to-violet-200 h-screen w-full flex">
    <div class="flex-1 flex justify-center items-center">
        <form action="<?= action("/auth/login") ?>" method="POST" class="bg-gradient-to-t from-fuchsia-500 to-violet-600 w-1/2 rounded-2xl overflow-hidden shadow-xl">
            <div class="bg-[url(<?= asset("/circle.png") ?>)] bg-contain bg-right bg-no-repeat w-full flex">
                <div class="px-4 py-12 bg-white rounded-2xl w-1/2">
                    <div class="flex flex-col gap-8">
                        <p class="text-center font-medium text-2xl">Login</p>
                        <div class="flex flex-col gap-4">
                            <div class="flex flex-col gap-1">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" placeholder="Masukan email" class="border border-gray-300 py-1 px-2 rounded-lg outline-violet-500 duration-150">
                            </div>
                            <div class="flex flex-col gap-1">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" placeholder="Masukan password" class="border border-gray-300 py-1 px-2 rounded-lg outline-violet-500 duration-150">
                                <div class="flex items-center gap-1 px-1">
                                    <input type="checkbox" id="showPw">
                                    <label for="showPw" class="text-blue-500 text-sm">Lihat password</label>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="py-1 w-full bg-gradient-to-tr from-violet-600 to-fuchsia-400 text-white rounded-full duration-150 ease-in-out hover:scale-101 active:scale-99">login</button>
                    </div>
                </div>
                <div class="px-4 py-12 text-white w-1/2 flex justify-center flex-col gap-2">
                    <p class="font-light text-xl">Hai, Admin!🖐🖐</p>
                    <p class="font-light text-sm">Demi kenyamanan dan keamanan data, silakan login menggunakan akun admin Anda untuk mengakses dashboard dan menjalankan pengelolaan sistem.</p>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    document.getElementById("showPw").addEventListener("change", function() {
        let password = document.getElementById("password")

        if (password.type == "password") {
            password.type = "text"
        } else {
            password.type = "password"
        }
    })
</script>