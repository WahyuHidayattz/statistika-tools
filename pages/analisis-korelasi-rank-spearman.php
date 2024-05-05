<!-- back end -->
<?php

$input_x     = '';
$input_y     = '';

function calculateRank($array)
{
    rsort($array);
    $rank = array();
    $counts = array_count_values($array);
    $current_rank = 1;
    $prev_value = null;
    foreach ($array as $value) {
        if ($value !== $prev_value) {
            $rank[$value] = $current_rank + ($counts[$value] - 1) / 2; // Menambahkan nilai tengah jika ada nilai yang sama
            $current_rank += $counts[$value]; // Menambahkan jumlah kemunculan nilai saat ini ke peringkat
            $prev_value = $value;
        }
    }
    return $rank;
}

if (isset($_POST['submit'])) {
    $input_x        = $_POST['input_x'];
    $input_y        = $_POST['input_y'];
    $output             = false;
    if ($input_x != '' && $input_y != '') {
        $output             = true;
        $arrray_x           = explode(",", $input_x);
        $arrray_y           = explode(",", $input_y);
        $nilai_rho          = 0;
        $kategori_rho       = '';
        $nilai_ujikdr       = 0;
        if (count($arrray_x) == count($arrray_y)) {
            $rank_x             = calculateRank($arrray_x);
            $rank_y             = calculateRank($arrray_y);
            $data               = [];
            $totals             = [];
            $total_n            = 0;
            foreach ($arrray_x as $index => $d) {
                $var_x = $d;
                $var_y = $arrray_y[$index];
                $var_x_rank = $rank_x[$var_x];
                $var_y_rank = $rank_y[$var_y];
                $var_di     = $var_x_rank - $var_y_rank;
                $var_di_2   = $var_di * $var_di;
                $data[] = [
                    $index + 1, $var_x, $var_y, $var_x_rank, $var_y_rank, $var_di, $var_di_2
                ];
                @$totals['NO'] = 'Total';
                @$totals['X'] += $var_x;
                @$totals['Y'] += $var_y;
                @$totals['RankX'] += $var_x_rank;
                @$totals['RankY'] += $var_y_rank;
                @$totals['di'] += $var_di;
                @$totals['di2'] += $var_di_2;
                $total_n = $index + 1;
            }

            $nilai_rho = 1 - round((6 * $totals['di2']) / ($total_n * (($total_n * $total_n) - 1)), 2);
            if ($nilai_rho >= 0.9 || $nilai_rho <= -0.9) {
                $kategori_rho = "Sangat Kuat";
            } else if ($nilai_rho >= 0.7 || $nilai_rho <= -0.7) {
                $kategori_rho = "Kuat";
            } else if ($nilai_rho >= 0.5 || $nilai_rho <= -0.5) {
                $kategori_rho = "Moderat";
            } else if ($nilai_rho >= 0.3 || $nilai_rho <= -0.3) {
                $kategori_rho = "Lemah";
            } else if ($nilai_rho >= 0 || $nilai_rho <= 0) {
                $kategori_rho = "Sangat Lemah";
            }

            $nilai_ujikdr = round(($nilai_rho * $nilai_rho) * 100, 0);
        }
    }
}
?>

<!-- fron end -->
<div class="flex flex-col gap-6">
    <form action="" method="post" class="flex flex-col gap-4 p-0 m-0">
        <div class="flex flex-col gap-1">
            <label for="input_x">Data X</label>
            <input class="input" name="input_x" id="input_x" rows="2" placeholder="Masukan Data, Pisahkan dengan Koma" value="<?= $input_x; ?>" />
        </div>
        <div class="flex flex-col gap-1">
            <label for="input_y">Data Y</label>
            <input class="input" name="input_y" id="input_y" rows="2" placeholder="Masukan Data, Pisahkan dengan Koma" value="<?= $input_y; ?>" />
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
                    <h2 class="info">Data Table</h2>
                    <div class="table-container">
                        <table class="border border-slate-300">
                            <thead class="text-white bg-blue-500">
                                <tr class="*:px-2 *:py-2 *:border *:border-blue-400 *:text-center">
                                    <td>NO</td>
                                    <td>X</td>
                                    <td>Y</td>
                                    <td>Rank X</td>
                                    <td>Rank Y</td>
                                    <td>di</td>
                                    <td>di<sup>2</sup></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($data as $dat) : ?>
                                    <tr class="*:px-2 *:py-2 *:border *:border-slate-200 *:bg-white *:text-center">
                                        <?php foreach ($dat as $d) : ?>
                                            <td><?= $d; ?></td>
                                        <?php endforeach; ?>
                                    </tr>
                                <?php endforeach; ?>
                                <tr class="*:px-2 *:py-2 *:border *:border-blue-400 *:text-center bg-blue-500 text-white">
                                    <?php foreach ($totals as $tot) : ?>
                                        <td><?= $tot; ?></td>
                                    <?php endforeach; ?>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <h2 class="info">a. Uji Korelasi Rank Spearman</h2>
                    <div class="table-container">
                        <table class="table-data">
                            <tbody>
                                <tr>
                                    <td class="pl-4">rho</td>
                                    <td>=</td>
                                    <td class="w-full">
                                        <div class="flex flex-row items-center gap-2 text-center ">
                                            <span>1 -</span>
                                            <div class="flex flex-col gap-1">
                                                <span>
                                                    <var>6</var><big>∑</big>di<sup>2</sup>
                                                </span>
                                                <div class="w-full border-b border-slate-800"></div>
                                                <span>n (n<sup>2</sup> - 1)</span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pl-4">rho</td>
                                    <td>=</td>
                                    <td class="w-full">
                                        <div class="flex flex-row items-center gap-2 text-center ">
                                            <span>1 -</span>
                                            <div class="flex flex-col gap-1">
                                                <span>
                                                    6 * <?= $totals['di2']; ?>
                                                </span>
                                                <div class="w-full border-b border-slate-800"></div>
                                                <span><?= $total_n; ?> (<?= $total_n; ?><sup>2</sup> - 1)</span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pl-4">rho</td>
                                    <td>=</td>
                                    <td class="w-full">
                                        <div class="flex flex-row items-center gap-2 text-center ">
                                            <span>1 -</span>
                                            <div class="flex flex-col gap-1">
                                                <span>
                                                    <?= 6 * $totals['di2']; ?>
                                                </span>
                                                <div class="w-full border-b border-slate-800"></div>
                                                <span><?= $total_n; ?> (<?= ($total_n * $total_n) - 1; ?>)</span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pl-4">rho</td>
                                    <td>=</td>
                                    <td class="w-full">
                                        <div class="flex flex-row items-center gap-2 text-center ">
                                            <span>1 -</span>
                                            <div class="flex flex-col gap-1">
                                                <span>
                                                    <?= 6 * $totals['di2']; ?>
                                                </span>
                                                <div class="w-full border-b border-slate-800"></div>
                                                <span><?= $total_n * (($total_n * $total_n) - 1); ?></span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pl-4">rho</td>
                                    <td>=</td>
                                    <td class="w-full">
                                        <div class="flex flex-col items-start justify-start text-center ">
                                            <span>1 - <?= round((6 * $totals['di2']) / ($total_n * (($total_n * $total_n) - 1)), 2); ?></span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pl-4">rho</td>
                                    <td>=</td>
                                    <td class="w-full">
                                        <div class="flex flex-col items-start justify-start text-center ">
                                            <span><?= 1 - round((6 * $totals['di2']) / ($total_n * (($total_n * $total_n) - 1)), 2); ?></span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pl-4">rho</td>
                                    <td>=</td>
                                    <td class="w-full">
                                        <span>Karena hasil rho adalah <strong><?= $nilai_rho; ?></strong> maka termasuk kategori <strong><?= $kategori_rho; ?></strong> pada tabel interpretasi data korelasi rank spearman.</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <h2 class="info">b. Uji Koefisien Determinasi</h2>
                    <div class="table-container">
                        <table class="table-data">
                            <tbody>
                                <tr>
                                    <td class="pl-4">KD = R</td>
                                    <td>=</td>
                                    <td class="w-full">
                                        <span>
                                            rho<sup>2</sup> x 100%
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pl-4">KD = R</td>
                                    <td>=</td>
                                    <td class="w-full">
                                        <span>
                                            (<?= $nilai_rho; ?>)<sup>2</sup> x 100%
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pl-4">KD = R</td>
                                    <td>=</td>
                                    <td class="w-full">
                                        <span>
                                            <?= $nilai_rho * $nilai_rho; ?> x 100%
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pl-4">KD = R</td>
                                    <td>=</td>
                                    <td class="w-full">
                                        <span>
                                            <?= round(($nilai_rho * $nilai_rho) * 100, 0); ?>%
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>=</td>
                                    <td>Artinya variabel kinerja dipengaruhi oleh variabel kedisiplinan senilai <?= round(($nilai_rho * $nilai_rho) * 100, 0); ?>% sisanya adalah <?= round(100 - (($nilai_rho * $nilai_rho) * 100), 0); ?>% dipengaruhi oleh variabel yang lain.</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <h2 class="info">c. Uji Hipotesis</h2>
                    <div class="table-container">
                        <table class="table-data">
                            <tbody>
                                <tr>
                                    <td class="pl-4">z hitung</td>
                                    <td>=</td>
                                    <td class="w-full">
                                        <div class="flex flex-col items-start justify-start">
                                            <div class="flex flex-col items-center justify-center gap-1">
                                                <span>rho</span>
                                                <div class="w-full border-b border-slate-800"></div>
                                                <span>1</span>
                                                <div class="w-full border-b border-slate-800"></div>
                                                <span>√n - 1</span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pl-4">z hitung</td>
                                    <td>=</td>
                                    <td class="w-full">
                                        <div class="flex flex-col items-start justify-start">
                                            <div class="flex flex-col items-center justify-center gap-1">
                                                <span><?= $nilai_rho; ?></span>
                                                <div class="w-full border-b border-slate-800"></div>
                                                <span>1</span>
                                                <div class="w-full border-b border-slate-800"></div>
                                                <span>√<?= $total_n; ?> - 1</span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pl-4">z hitung</td>
                                    <td>=</td>
                                    <td class="w-full">
                                        <span>
                                            <?= round($nilai_rho / 1 / sqrt($total_n - 1), 2); ?>
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pl-4">Kesimpulan</td>
                                    <td>=</td>
                                    <td class="w-full">
                                        <span>
                                            Lupa cara baca tabel Z :(
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
</div>