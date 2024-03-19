<!-- back end -->
<?php

$input_deret        = '';
$input_interval     = '';

function hitungFrekuensiDistribusi($data, $interval)
{
    $frekuensi = array();
    $batasBawah = min($data);
    $batasAtas = $batasBawah + $interval - 1;
    while ($batasBawah <= max($data)) {
        $count = 0;
        foreach ($data as $nilai) {
            if ($nilai >= $batasBawah && $nilai <= $batasAtas) {
                $count++;
            }
        }
        $frekuensi["$batasBawah-$batasAtas"] = $count;
        $batasBawah = $batasAtas + 1;
        $batasAtas += $interval;
    }
    return $frekuensi;
}

if (isset($_POST['submit'])) {
    $input_deret        = $_POST['input_deret'];
    $input_interval     = $_POST['input_interval'];
    $output             = false;
    if ($input_deret != '' && $input_interval != '') {
        $output             = true;

        $data_deret         = explode(",", $input_deret);
        asort($data_deret);
        $sorted_data        = implode(",", $data_deret);
        $data_max           = max($data_deret);
        $data_min           = min($data_deret);
        $data_lenth         = count($data_deret);

        $hasil              = hitungFrekuensiDistribusi($data_deret, $input_interval);
        $hasil_text         = '';
        foreach ($hasil as $k => $d) {
            $hasil_text .= $k . " : " . $d . "<br>";
        }
    }
}
?>

<!-- fron end -->
<div class="flex flex-col gap-8">
    <form action="" method="post" class="flex flex-col gap-6 p-0 m-0">
        <div class="flex flex-col gap-2">
            <label for="input_deret">Deret Nomor</label>
            <textarea class="input" name="input_deret" id="input_deret" rows="2" placeholder="Masukan Deret Nomor, Pisahkan dengan koma, Contoh : 1,4,6,7,8,... dst"><?= $input_deret; ?></textarea>
        </div>
        <div class="flex flex-col gap-2">
            <label for="input_interval">Interval</label>
            <input type="text" id="input_interval" name="input_interval" class="input" placeholder="Masukan Interval (Angka)" value="<?= $input_interval; ?>">
        </div>
        <div class="flex flex-row items-center justify-end gap-4">
            <button class="button" type="submit" name="submit">Hitung</button>
        </div>
    </form>

    <div class="flex flex-col gap-6 py-4 border-t border-t-slate-300">
        <span class="text-2xl font-semibold">Output : </span>
        <div class="flex flex-col leading-loose">
            <?php if (isset($output)) : ?>
                <?php if ($output == false) : ?>
                    <span>Error, Pastikan Semua Form di Input dengan benar</span>
                <?php endif; ?>
                <?php if ($output == true) : ?>
                    <h2 class="info">Informasi Data</h2>
                    <div class="table-container">
                        <table class="table-data">
                            <tbody>
                                <tr>
                                    <td>Sorted Data</td>
                                    <td>:</td>
                                    <td class="w-full">
                                        <?= $sorted_data; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Banyaknya Data (n)</td>
                                    <td>:</td>
                                    <td>
                                        <?= $data_lenth; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Data Terkecil (Min)</td>
                                    <td>:</td>
                                    <td>
                                        <?= $data_min; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Data Terbesar (Max)</td>
                                    <td>:</td>
                                    <td>
                                        <?= $data_max; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Interval</td>
                                    <td>:</td>
                                    <td>
                                        <?= $input_interval; ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <h2 class="mt-4 info">Distribusi Frekuensi</h2>
                    <div class="table-container">
                        <table class="table-data">
                            <tbody>
                                <?php foreach ($hasil as $k => $d) : ?>
                                    <tr>
                                        <td><?= $k; ?></td>
                                        <td>:</td>
                                        <td class="w-full"><?= $d; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
</div>