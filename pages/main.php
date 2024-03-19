<div class="flex flex-col justify-center gap-8 h-full flex-1">
    <?php foreach ($menu as $data) : ?>
        <div class="flex flex-col gap-4">
            <span class="text-black text-lg font-semibold"><?= $data->title; ?></span>
            <div class="flex flex-col gap-6 md:grid md:grid-cols-2 lg:grid-cols-3">
                <?php foreach ($data->page as $p) : ?>
                    <a href="?page=<?= $p->path; ?>" class="rounded-md bg-white p-6 shadow-md shadow-black/10 transition duration-300 hover:shadow-xl"><?= $p->title; ?></a>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endforeach; ?>
</div>