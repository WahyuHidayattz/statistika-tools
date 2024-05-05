<div class="flex flex-col justify-center flex-1 h-full gap-8">
    <?php foreach ($menu as $data) : ?>
        <div class="flex flex-col gap-4">
            <span class="text-lg font-semibold text-black"><?= $data->title; ?></span>
            <div class="flex flex-col gap-4">
                <?php foreach ($data->page as $p) : ?>
                    <a href="?page=<?= $p->path; ?>" class="px-4 py-4 transition duration-300 bg-white border rounded-md shadow-md border-slate-200 hover:text-black hover:shadow-lg"><?= $p->title; ?></a>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endforeach; ?>
</div>