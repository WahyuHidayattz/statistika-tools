<?php

$menu = json_decode(file_get_contents("content.json"));

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistika Tool</title>
    <link rel="stylesheet" href="assets/app.css">
</head>

<body>
    <div class="relative flex flex-col w-full min-h-screen bg-gray-100 text-slate-700">
        <div class="sticky top-0 bg-indigo-500">
            <div class="container flex flex-row items-center justify-between gap-6 px-4 py-4 text-white">
                <a href="index.php" class="text-xl font-semibold">Statistika Tools</a>
                <span class="text-xs text-white/80">Created by Wahyu Hidayat</span>
            </div>
        </div>
        <div class="container flex flex-col flex-1 gap-8 p-4">

            <?php if (isset($_GET['page'])) : ?>
                <div class="container">
                    <div class="w-full px-6 py-3 overflow-hidden text-center text-white bg-indigo-500 rounded-lg">
                        <div class="flex flex-row items-center gap-4">
                            <a href="index.php" class="flex flex-row items-center gap-3 py-2 transition duration-300 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-left">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M5 12l14 0" />
                                    <path d="M5 12l6 6" />
                                    <path d="M5 12l6 -6" />
                                </svg>
                                <span>Kembali</span>
                            </a>
                        </div>
                        <div class="py-12">
                            <span class="text-3xl font-semibold">
                                <?= strtoupper(str_replace("-"," ",$_GET['page'])); ?>
                            </span>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php
            $page = 'pages/main.php';
            if (isset($_GET['page'])) {
                $page = "pages/" . $_GET['page'] . ".php";
            }
            include $page;
            ?>

        </div>
        <div class="container flex flex-col items-center justify-center py-6 border-t border-t-slate-300">
            <span class="text-xs">&copy; 2024 - Wahyu Hidayat - <a href="https://github.com/wahyuhidayattz" target="_blank" class="underline text-blue">My Github</a></span>
        </div>
    </div>

</body>

</html>