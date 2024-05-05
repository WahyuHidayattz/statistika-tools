<?php

$menu = json_decode(file_get_contents("content.json"));
$title = "Statistika Tool";
if (isset($_GET['page'])) {
    $title = ucwords(str_replace("-", " ", $_GET['page']));
}

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistika Tool</title>
    <link rel="stylesheet" href="assets/app.css">
    <script src="assets/alpinejs/alpinejs.js"></script>
</head>

<body>
    <div class="relative flex flex-col w-full min-h-screen bg-white text-slate-700">

        <!-- navbar -->
        <div class="sticky top-0 text-white bg-blue-500 shadow-md">
            <div class="container flex flex-row items-center justify-between px-6 py-4">
                <div class="flex flex-row items-center gap-2">
                    <?php if (isset($_GET['page'])) : ?>
                        <a href="index.php" class="p-2 transition duration-300 rounded-full hover:bg-white/20">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-left">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M5 12l14 0" />
                                <path d="M5 12l6 6" />
                                <path d="M5 12l6 -6" />
                            </svg>
                        </a>
                    <?php endif; ?>
                    <span class="text-lg font-semibold"><?= $title; ?></span>
                </div>

                <div class="relative" x-data="{ open: false }" @click.outside="open = false" @close.stop="open = false">
                    <div @click="open = ! open">
                        <button class="p-2 transition duration-300 rounded-full hover:bg-white/20">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-dots-vertical">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                <path d="M12 19m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                <path d="M12 5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                            </svg>
                        </button>
                    </div>

                    <div x-show="open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95" class="absolute z-50 w-48 mt-2 rounded-md shadow-lg ltr:origin-top-right rtl:origin-top-left end-0" style="display: none;" @click="open = false">
                        <div class="py-1 bg-white rounded-md ring-1 ring-black ring-opacity-5 text-slate-600">
                            <a href="?page=tentang-app" class="flex flex-row items-center w-full gap-2 px-4 py-2 transition duration-300 hover:bg-gray-100">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-info-circle">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                                    <path d="M12 9h.01" />
                                    <path d="M11 12h1v4h1" />
                                </svg>
                                <span>Tentang App</span>
                            </a>
                            <button class="flex flex-row items-center w-full gap-2 px-4 py-2 transition duration-300 hover:bg-gray-100">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-heart">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                                </svg>
                                <span>Donasi</span>
                            </button>
                            <a href="https://github.com/wahyuhidayattz" target="_blank" class="flex flex-row items-center w-full gap-2 px-4 py-2 transition duration-300 hover:bg-gray-100">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-brand-github">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M9 19c-4.3 1.4 -4.3 -2.5 -6 -3m12 5v-3.5c0 -1 .1 -1.4 -.5 -2c2.8 -.3 5.5 -1.4 5.5 -6a4.6 4.6 0 0 0 -1.3 -3.2a4.2 4.2 0 0 0 -.1 -3.2s-1.1 -.3 -3.5 1.3a12.3 12.3 0 0 0 -6.2 0c-2.4 -1.6 -3.5 -1.3 -3.5 -1.3a4.2 4.2 0 0 0 -.1 3.2a4.6 4.6 0 0 0 -1.3 3.2c0 4.6 2.7 5.7 5.5 6c-.6 .6 -.6 1.2 -.5 2v3.5" />
                                </svg>
                                <span>Kunjungi Github</span>
                            </a>
                        </div>
                    </div>
                </div>


            </div>
        </div>
        <!-- end navbar -->

        <div class="container flex flex-col flex-1 gap-8 p-4">

            <?php
            $page = 'pages/main.php';
            if (isset($_GET['page'])) {
                $page = "pages/" . $_GET['page'] . ".php";
            }
            include $page;
            ?>

        </div>
        <div class="container">
            <div class="flex flex-col items-center justify-center px-6 py-6 text-sm text-slate-500">
                <span class="text-center">&copy; 2024 - Wahyu Hidayat</span>
                <a href="https://github.com/wahyuhidayattz" class="text-center text-blue-500 hover:underline" target="_blank">https://github.com/wahyuhidayattz</a>
            </div>
        </div>
    </div>

</body>

</html>