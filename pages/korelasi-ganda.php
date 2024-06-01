<!-- back end -->
<?php

$input_x1 = '';
$input_x2 = '';
$input_y = '';

function cariNilaiF($df1, $df2)
{
    // Tabel distribusi F
    $tabelF = array(
        array(161.4, 199.5, 215.7, 224.6, 230.2, 234, 236.8, 238.9, 240.5, 241.9, 243, 243.9, 244.7, 245.5, 246.1, 246.7, 247.2, 247.7, 248.1, 248.4),
        array(18.51, 19, 19.2, 19.3, 19.3, 19.3, 19.3, 19.3, 19.3, 19.3, 19.3, 19.3, 19.3, 19.3, 19.3, 19.3, 19.3, 19.3, 19.3, 19.3),
        array(10.13, 9.55, 9.28, 9.12, 9.01, 8.94, 8.89, 8.85, 8.81, 8.78, 8.76, 8.74, 8.73, 8.71, 8.7, 8.69, 8.68, 8.67, 8.67, 8.66),
        array(7.71, 6.94, 6.59, 6.39, 6.26, 6.16, 6.09, 6.03, 5.99, 5.95, 5.92, 5.9, 5.88, 5.86, 5.84, 5.83, 5.81, 5.8, 5.79, 5.78),
        array(6.61, 5.79, 5.41, 5.19, 5.05, 4.95, 4.88, 4.82, 4.77, 4.74, 4.7, 4.68, 4.65, 4.63, 4.61, 4.6, 4.58, 4.57, 4.56, 4.55),
        array(5.99, 5.14, 4.76, 4.53, 4.38, 4.27, 4.2, 4.14, 4.1, 4.06, 4.03, 4.01, 3.99, 3.97, 3.95, 3.94, 3.92, 3.91, 3.9, 3.89),
        array(5.59, 4.74, 4.35, 4.11, 3.96, 3.85, 3.77, 3.71, 3.67, 3.63, 3.6, 3.58, 3.56, 3.54, 3.52, 3.51, 3.49, 3.48, 3.47, 3.46),
        array(5.32, 4.47, 4.07, 3.83, 3.68, 3.57, 3.49, 3.43, 3.39, 3.35, 3.32, 3.3, 3.28, 3.26, 3.24, 3.23, 3.21, 3.2, 3.19, 3.18),
        array(5.12, 4.26, 3.86, 3.62, 3.47, 3.35, 3.27, 3.21, 3.16, 3.13, 3.09, 3.07, 3.05, 3.03, 3.01, 3, 2.98, 2.97, 2.96, 2.95),
        array(4.96, 4.09, 3.69, 3.44, 3.29, 3.17, 3.09, 3.03, 2.98, 2.95, 2.91, 2.89, 2.87, 2.85, 2.83, 2.82, 2.8, 2.79, 2.78, 2.77),
        array(4.84, 3.97, 3.57, 3.32, 3.17, 3.05, 2.97, 2.9, 2.85, 2.81, 2.78, 2.75, 2.73, 2.71, 2.69, 2.68, 2.66, 2.65, 2.64, 2.63),
        array(4.75, 3.87, 3.47, 3.21, 3.06, 2.94, 2.85, 2.79, 2.73, 2.7, 2.66, 2.63, 2.61, 2.59, 2.57, 2.56, 2.54, 2.53, 2.52, 2.51),
        array(4.67, 3.79, 3.39, 3.13, 2.98, 2.86, 2.77, 2.71, 2.65, 2.62, 2.58, 2.55, 2.52, 2.5, 2.48, 2.46, 2.45, 2.43, 2.42, 2.41),
        array(4.6, 3.71, 3.31, 3.05, 2.89, 2.77, 2.68, 2.62, 2.56, 2.53, 2.49, 2.46, 2.44, 2.42, 2.4, 2.39, 2.37, 2.36, 2.35, 2.34),
        array(4.54, 3.65, 3.25, 2.99, 2.84, 2.71, 2.63, 2.57, 2.51, 2.48, 2.44, 2.41, 2.39, 2.37, 2.35, 2.34, 2.32, 2.31, 2.3, 2.29),
        array(4.5, 3.61, 3.21, 2.95, 2.79, 2.67, 2.58, 2.52, 2.46, 2.42, 2.38, 2.35, 2.33, 2.31, 2.29, 2.28, 2.26, 2.25, 2.24, 2.23),
        array(4.46, 3.57, 3.16, 2.9, 2.74, 2.61, 2.52, 2.46, 2.4, 2.36, 2.32, 2.29, 2.27, 2.25, 2.23, 2.22, 2.2, 2.19, 2.18, 2.17),
        array(4.43, 3.54, 3.14, 2.87, 2.71, 2.58, 2.49, 2.43, 2.37, 2.34, 2.3, 2.27, 2.25, 2.23, 2.21, 2.19, 2.18, 2.16, 2.15, 2.14),
        array(4.4, 3.52, 3.11, 2.84, 2.68, 2.55, 2.46, 2.4, 2.34, 2.3, 2.26, 2.23, 2.21, 2.19, 2.17, 2.16, 2.14, 2.13, 2.12, 2.11),
        array(4.38, 3.49, 3.08, 2.81, 2.65, 2.52, 2.43, 2.37, 2.31, 2.27, 2.23, 2.2, 2.18, 2.16, 2.14, 2.12, 2.11, 2.09, 2.08, 2.07)
    );

    // Cek apakah input valid
    if ($df1 <= 0 || $df2 <= 0 || $df1 > 20 || $df2 > 20) {
        return "Degree of freedom harus dalam rentang 1-20.";
    }

    // Ambil nilai F dari tabel
    $nilaiF = $tabelF[$df1 - 1][$df2 - 1];

    return $nilaiF;
}


if (isset($_POST['submit'])) {
    $input_x1 = $_POST['input_x1'];
    $input_x2 = $_POST['input_x2'];
    $input_y = $_POST['input_y'];

    $data_x1 = explode(",", $input_x1);
    $data_x2 = explode(",", $input_x2);
    $data_y = explode(",", $input_y);

    $jumlah_data = count($data_x1);

    if (count($data_x1) == count($data_x2)) {
        $totals = [];
        $array = [];
        foreach ($data_x1 as $index => $d) {
            $dt_x1 = $d;
            $dt_x2 = $data_x2[$index];
            $dt_y = $data_y[$index];
            $dt_x1_kuad = $dt_x1 * $dt_x1;
            $dt_x2_kuad = $dt_x2 * $dt_x2;
            $dt_y_kuad = $dt_y * $dt_y;
            $dt_x1_x_y = $dt_x1 * $dt_y;
            $dt_x2_x_y = $dt_x2 * $dt_y;
            $dt_x1_x_x2 = $dt_x1 * $dt_x2;

            @$totals['x1'] += $dt_x1;
            @$totals['x2'] += $dt_x2;
            @$totals['y'] += $dt_y;
            @$totals['x1_kuad'] += $dt_x1_kuad;
            @$totals['x2_kuad'] += $dt_x2_kuad;
            @$totals['y_kuad'] += $dt_y_kuad;
            @$totals['x1_y'] += $dt_x1_x_y;
            @$totals['x2_y'] += $dt_x2_x_y;
            @$totals['x1_x2'] += $dt_x1_x_x2;

            $array[] = [
                "x1" => $dt_x1,
                "x2" => $dt_x2,
                "y" => $dt_y,
                "x1_kuad" => $dt_x1_kuad,
                "x2_kuad" => $dt_x2_kuad,
                "y_kuad" => $dt_y_kuad,
                "x1_y" => $dt_x1_x_y,
                "x2_y" => $dt_x2_x_y,
                "x1_x2" => $dt_x1_x_x2
            ];
        }
        $output = true;
    }
}
?>

<!-- fron end -->
<div class="flex flex-col gap-6">
    <form action="" method="post" class="flex flex-col gap-4 p-0 m-0">
        <div class="flex flex-col gap-1">
            <label for="input_x1">Data X1</label>
            <input class="input" name="input_x1" id="input_x1" rows="2" placeholder="Masukan Data, Pisahkan dengan Koma" value="<?= $input_x1; ?>" />
        </div>
        <div class="flex flex-col gap-1">
            <label for="input_x2">Data X2</label>
            <input class="input" name="input_x2" id="input_x2" rows="2" placeholder="Masukan Data, Pisahkan dengan Koma" value="<?= $input_x2; ?>" />
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
                    <h2 class="info">1. Tabel Penolong</h2>
                    <div class="table-container">
                        <table class="border border-slate-300">
                            <thead class="text-white bg-blue-500">
                                <tr class="*:px-2 *:py-2 *:border *:border-blue-400 *:text-center">
                                    <td>No</td>
                                    <td>X1</td>
                                    <td>X2</td>
                                    <td>Y</td>
                                    <td>X1<sup>2</sup></td>
                                    <td>X2<sup>2</sup></td>
                                    <td>Y<sup>2</sup></td>
                                    <td>X1.Y</td>
                                    <td>X2.Y</td>
                                    <td>X1.X2</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($array as $dat) : ?>
                                    <tr class="*:px-2 *:py-2 *:border *:border-slate-200 *:bg-white *:text-center">
                                        <td><?= $no++; ?></td>
                                        <?php foreach ($dat as $d) : ?>
                                            <td><?= number_format($d); ?></td>
                                        <?php endforeach; ?>
                                    </tr>
                                <?php endforeach; ?>
                                <tr class="*:px-2 *:py-2 *:border *:border-blue-400 *:text-center bg-blue-500 text-white">
                                    <td>Total</td>
                                    <?php foreach ($totals as $tot) : ?>
                                        <td><?= number_format($tot); ?></td>
                                    <?php endforeach; ?>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <h2 class="info">2. Mencari Nilai rx1 x2, rx1y, rx2y</h2>
                    <div class="table-container">
                        <table class="table-data">
                            <tbody>
                                <tr>
                                    <td class="pl-4">a. rx1y</td>
                                    <td>=</td>
                                    <td class="w-full">
                                        <div class="flex flex-row items-center gap-2 text-center ">
                                            <div class="flex flex-col gap-1">
                                                <span>
                                                    <?= $jumlah_data . " * " . number_format($totals['x1_y']) . " - " . number_format($totals['x1']) . " * " . $totals['y']; ?>
                                                </span>
                                                <div class="w-full border-b border-slate-800"></div>
                                                <div class="flex flex-row items-center gap-4">
                                                    <span>√<?= $jumlah_data . " * " . number_format($totals['x1_kuad']) . " - (" . $totals['x1'] . ")<sup>2</sup>"; ?></span>
                                                    <span>√<?= $jumlah_data . " * " . number_format($totals['y_kuad']) . " - (" . $totals['y'] . ")<sup>2</sup>"; ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pl-4">a. rx1y</td>
                                    <td>=</td>
                                    <td class="w-full">
                                        <div class="flex flex-row items-center gap-2 text-center ">
                                            <div class="flex flex-col gap-1">
                                                <span>
                                                    <?= number_format($jumlah_data * $totals['x1_y']) . " - " . number_format($totals['x1'] * $totals['y']); ?>
                                                </span>
                                                <div class="w-full border-b border-slate-800"></div>
                                                <div class="flex flex-row items-center gap-4">
                                                    <span>√<?= number_format($jumlah_data * $totals['x1_kuad']) . " - " . number_format($totals['x1'] * $totals['x1']); ?></span>
                                                    <span>√<?= number_format($jumlah_data * $totals['y_kuad']) . " - " . number_format($totals['y'] * $totals['y']); ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pl-4">a. rx1y</td>
                                    <td>=</td>
                                    <td class="w-full">
                                        <div class="flex flex-row items-center gap-2 text-center ">
                                            <div class="flex flex-col gap-1">
                                                <span>
                                                    <?= number_format($jumlah_data * $totals['x1_y'] - $totals['x1'] * $totals['y']); ?>
                                                </span>
                                                <div class="w-full border-b border-slate-800"></div>
                                                <div class="flex flex-row items-center gap-4">
                                                    <span>√<?= number_format($jumlah_data * $totals['x1_kuad'] - $totals['x1'] * $totals['x1']); ?></span>
                                                    <span>√<?= number_format($jumlah_data * $totals['y_kuad'] - $totals['y'] * $totals['y']); ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pl-4">a. rx1y</td>
                                    <td>=</td>
                                    <td class="w-full">
                                        <div class="flex flex-row items-center gap-2 text-center ">
                                            <div class="flex flex-col gap-1">
                                                <span>
                                                    <?= number_format($jumlah_data * $totals['x1_y'] - $totals['x1'] * $totals['y']); ?>
                                                </span>
                                                <div class="w-full border-b border-slate-800"></div>
                                                <div class="flex flex-row items-center gap-4">
                                                    <span><?= number_format(sqrt($jumlah_data * $totals['x1_kuad'] - $totals['x1'] * $totals['x1'])); ?></span>*
                                                    <span><?= number_format(sqrt($jumlah_data * $totals['y_kuad'] - $totals['y'] * $totals['y'])); ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pl-4">a. rx1y</td>
                                    <td>=</td>
                                    <td class="w-full">
                                        <div class="flex flex-row items-center gap-2 text-center ">
                                            <div class="flex flex-col gap-1">
                                                <span>
                                                    <?= number_format($jumlah_data * $totals['x1_y'] - $totals['x1'] * $totals['y']); ?>
                                                </span>
                                                <div class="w-full border-b border-slate-800"></div>
                                                <div class="flex flex-row items-center gap-4">
                                                    <span><?= number_format(sqrt($jumlah_data * $totals['x1_kuad'] - $totals['x1'] * $totals['x1']) * sqrt($jumlah_data * $totals['y_kuad'] - $totals['y'] * $totals['y'])); ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pl-4">a. rx1y</td>
                                    <td>=</td>
                                    <td class="w-full">
                                        <span>
                                            <?php
                                            $total_a = ($jumlah_data * $totals['x1_y'] - $totals['x1'] * $totals['y']) / (sqrt($jumlah_data * $totals['x1_kuad'] - $totals['x1'] * $totals['x1']) * sqrt($jumlah_data * $totals['y_kuad'] - $totals['y'] * $totals['y']));
                                            echo number_format($total_a, 2);
                                            ?>
                                        </span>
                                    </td>
                                </tr>


                                <tr>
                                    <td class="pl-4">b. rx2y</td>
                                    <td>=</td>
                                    <td class="w-full">
                                        <div class="flex flex-row items-center gap-2 text-center ">
                                            <div class="flex flex-col gap-1">
                                                <span>
                                                    <?= $jumlah_data . " * " . number_format($totals['x2_y']) . " - " . number_format($totals['x2']) . " * " . $totals['y']; ?>
                                                </span>
                                                <div class="w-full border-b border-slate-800"></div>
                                                <div class="flex flex-row items-center gap-4">
                                                    <span>√<?= $jumlah_data . " * " . number_format($totals['x2_kuad']) . " - (" . $totals['x2'] . ")<sup>2</sup>"; ?></span>
                                                    <span>√<?= $jumlah_data . " * " . number_format($totals['y_kuad']) . " - (" . $totals['y'] . ")<sup>2</sup>"; ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pl-4">b. rx2y</td>
                                    <td>=</td>
                                    <td class="w-full">
                                        <div class="flex flex-row items-center gap-2 text-center ">
                                            <div class="flex flex-col gap-1">
                                                <span>
                                                    <?= number_format($jumlah_data * $totals['x2_y']) . " - " . number_format($totals['x2'] * $totals['y']); ?>
                                                </span>
                                                <div class="w-full border-b border-slate-800"></div>
                                                <div class="flex flex-row items-center gap-4">
                                                    <span>√<?= number_format($jumlah_data * $totals['x2_kuad']) . " - " . number_format($totals['x2'] * $totals['x2']); ?></span>
                                                    <span>√<?= number_format($jumlah_data * $totals['y_kuad']) . " - " . number_format($totals['y'] * $totals['y']); ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pl-4">b. rx2y</td>
                                    <td>=</td>
                                    <td class="w-full">
                                        <div class="flex flex-row items-center gap-2 text-center ">
                                            <div class="flex flex-col gap-1">
                                                <span>
                                                    <?= number_format($jumlah_data * $totals['x2_y'] - $totals['x2'] * $totals['y']); ?>
                                                </span>
                                                <div class="w-full border-b border-slate-800"></div>
                                                <div class="flex flex-row items-center gap-4">
                                                    <span>√<?= number_format($jumlah_data * $totals['x2_kuad'] - $totals['x2'] * $totals['x2']); ?></span>
                                                    <span>√<?= number_format($jumlah_data * $totals['y_kuad'] - $totals['y'] * $totals['y']); ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pl-4">b. rx2y</td>
                                    <td>=</td>
                                    <td class="w-full">
                                        <div class="flex flex-row items-center gap-2 text-center ">
                                            <div class="flex flex-col gap-1">
                                                <span>
                                                    <?= number_format($jumlah_data * $totals['x2_y'] - $totals['x2'] * $totals['y']); ?>
                                                </span>
                                                <div class="w-full border-b border-slate-800"></div>
                                                <div class="flex flex-row items-center gap-4">
                                                    <span><?= number_format(sqrt($jumlah_data * $totals['x2_kuad'] - $totals['x2'] * $totals['x2'])); ?></span>*
                                                    <span><?= number_format(sqrt($jumlah_data * $totals['y_kuad'] - $totals['y'] * $totals['y'])); ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pl-4">b. rx2y</td>
                                    <td>=</td>
                                    <td class="w-full">
                                        <div class="flex flex-row items-center gap-2 text-center ">
                                            <div class="flex flex-col gap-1">
                                                <span>
                                                    <?= number_format($jumlah_data * $totals['x2_y'] - $totals['x2'] * $totals['y']); ?>
                                                </span>
                                                <div class="w-full border-b border-slate-800"></div>
                                                <div class="flex flex-row items-center gap-4">
                                                    <span><?= number_format(sqrt($jumlah_data * $totals['x2_kuad'] - $totals['x2'] * $totals['x2']) * sqrt($jumlah_data * $totals['y_kuad'] - $totals['y'] * $totals['y'])); ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pl-4">b. rx2y</td>
                                    <td>=</td>
                                    <td class="w-full">
                                        <span>
                                            <?php
                                            $total_b = ($jumlah_data * $totals['x2_y'] - $totals['x2'] * $totals['y']) / (sqrt($jumlah_data * $totals['x2_kuad'] - $totals['x2'] * $totals['x2']) * sqrt($jumlah_data * $totals['y_kuad'] - $totals['y'] * $totals['y']));
                                            echo number_format($total_b, 2);
                                            ?>
                                        </span>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="pl-4">c. rx2x1</td>
                                    <td>=</td>
                                    <td class="w-full">
                                        <div class="flex flex-row items-center gap-2 text-center ">
                                            <div class="flex flex-col gap-1">
                                                <span>
                                                    <?= $jumlah_data . " * " . number_format($totals['x1_x2']) . " - " . number_format($totals['x2']) . " * " . $totals['x1']; ?>
                                                </span>
                                                <div class="w-full border-b border-slate-800"></div>
                                                <div class="flex flex-row items-center gap-4">
                                                    <span>√<?= $jumlah_data . " * " . number_format($totals['x2_kuad']) . " - (" . $totals['x2'] . ")<sup>2</sup>"; ?></span>
                                                    <span>√<?= $jumlah_data . " * " . number_format($totals['x1_kuad']) . " - (" . $totals['x1'] . ")<sup>2</sup>"; ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pl-4">c. rx2x1</td>
                                    <td>=</td>
                                    <td class="w-full">
                                        <div class="flex flex-row items-center gap-2 text-center ">
                                            <div class="flex flex-col gap-1">
                                                <span>
                                                    <?= number_format($jumlah_data * $totals['x1_x2']) . " - " . number_format($totals['x2'] * $totals['x1']); ?>
                                                </span>
                                                <div class="w-full border-b border-slate-800"></div>
                                                <div class="flex flex-row items-center gap-4">
                                                    <span>√<?= number_format($jumlah_data * $totals['x2_kuad']) . " - " . number_format($totals['x2'] * $totals['x2']); ?></span>
                                                    <span>√<?= number_format($jumlah_data * $totals['x1_kuad']) . " - " . number_format($totals['x1'] * $totals['x1']); ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pl-4">c. rx2x1</td>
                                    <td>=</td>
                                    <td class="w-full">
                                        <div class="flex flex-row items-center gap-2 text-center ">
                                            <div class="flex flex-col gap-1">
                                                <span>
                                                    <?= number_format($jumlah_data * $totals['x1_x2'] - $totals['x2'] * $totals['x1']); ?>
                                                </span>
                                                <div class="w-full border-b border-slate-800"></div>
                                                <div class="flex flex-row items-center gap-4">
                                                    <span>√<?= number_format($jumlah_data * $totals['x2_kuad'] - $totals['x2'] * $totals['x2']); ?></span>
                                                    <span>√<?= number_format($jumlah_data * $totals['x1_kuad'] - $totals['x1'] * $totals['x1']); ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pl-4">c. rx2x1</td>
                                    <td>=</td>
                                    <td class="w-full">
                                        <div class="flex flex-row items-center gap-2 text-center ">
                                            <div class="flex flex-col gap-1">
                                                <span>
                                                    <?= number_format($jumlah_data * $totals['x1_x2'] - $totals['x2'] * $totals['x1']); ?>
                                                </span>
                                                <div class="w-full border-b border-slate-800"></div>
                                                <div class="flex flex-row items-center gap-4">
                                                    <span><?= number_format(sqrt($jumlah_data * $totals['x2_kuad'] - $totals['x2'] * $totals['x2'])); ?></span>*
                                                    <span><?= number_format(sqrt($jumlah_data * $totals['x1_kuad'] - $totals['x1'] * $totals['x1'])); ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pl-4">c. rx2x1</td>
                                    <td>=</td>
                                    <td class="w-full">
                                        <div class="flex flex-row items-center gap-2 text-center ">
                                            <div class="flex flex-col gap-1">
                                                <span>
                                                    <?= number_format($jumlah_data * $totals['x1_x2'] - $totals['x2'] * $totals['x1']); ?>
                                                </span>
                                                <div class="w-full border-b border-slate-800"></div>
                                                <div class="flex flex-row items-center gap-4">
                                                    <span><?= number_format(sqrt($jumlah_data * $totals['x2_kuad'] - $totals['x2'] * $totals['x2']) * sqrt($jumlah_data * $totals['x1_kuad'] - $totals['x1'] * $totals['x1'])); ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pl-4">c. rx2x1</td>
                                    <td>=</td>
                                    <td class="w-full">
                                        <span>
                                            <?php
                                            $total_c = ($jumlah_data * $totals['x1_x2'] - $totals['x2'] * $totals['x1']) / (sqrt($jumlah_data * $totals['x2_kuad'] - $totals['x2'] * $totals['x2']) * sqrt($jumlah_data * $totals['x1_kuad'] - $totals['x1'] * $totals['x1']));
                                            echo number_format($total_c, 2);
                                            ?>
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <h2 class="info">3. Menghitung Koefisien Korelasi</h2>
                    <div class="table-container">
                        <table class="table-data">
                            <tbody>
                                <tr>
                                    <td class="pl-4">Rx1x2y</td>
                                    <td>=</td>
                                    <td class="w-full">
                                        <div class="flex flex-row items-center gap-2 text-center ">
                                            <div class="flex flex-col gap-1">
                                                <span>
                                                    √(rx1y)<sup>2</sup> + (rx2y)<sup>2</sup> - 2rx1y . rx2y . rx1x2
                                                </span>
                                                <div class="w-full border-b border-slate-800"></div>
                                                <span>1-(rx1x2)<sup>2</sup></span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pl-4">Rx1x2y</td>
                                    <td>=</td>
                                    <td class="w-full">
                                        <div class="flex flex-row items-center gap-2 text-center ">
                                            <div class="flex flex-col gap-1">
                                                <span>
                                                    √(<?= number_format($total_a, 2); ?>)<sup>2</sup> + (<?= number_format($total_b, 2); ?>)<sup>2</sup> - 2 * <?= number_format($total_a, 2); ?> * <?= number_format($total_b, 2); ?> * <?= number_format($total_c, 2); ?>
                                                </span>
                                                <div class="w-full border-b border-slate-800"></div>
                                                <span>1-(<?= number_format($total_c, 2); ?>)<sup>2</sup></span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pl-4">Rx1x2y</td>
                                    <td>=</td>
                                    <td class="w-full">
                                        <div class="flex flex-row items-center gap-2 text-center ">
                                            <div class="flex flex-col gap-1">
                                                <span>
                                                    √<?= number_format($total_a * $total_a, 2); ?> + <?= number_format($total_b * $total_b, 2); ?> - 2 * <?= number_format($total_a, 2); ?> * <?= number_format($total_b, 2); ?> * <?= number_format($total_c, 2); ?>
                                                </span>
                                                <div class="w-full border-b border-slate-800"></div>
                                                <span>1-<?= number_format($total_c * $total_c, 2); ?></span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pl-4">Rx1x2y</td>
                                    <td>=</td>
                                    <td class="w-full">
                                        <div class="flex flex-row items-center gap-2 text-center ">
                                            <div class="flex flex-col gap-1">
                                                <span>
                                                    √<?= number_format($total_a * $total_a + $total_b * $total_b - 2 * $total_a * $total_b * $total_c, 2); ?>
                                                </span>
                                                <div class="w-full border-b border-slate-800"></div>
                                                <span>1-<?= number_format($total_c * $total_c, 2); ?></span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pl-4">Rx1x2y</td>
                                    <td>=</td>
                                    <td class="w-full">
                                        <div class="flex flex-row items-center gap-2 text-center ">
                                            <div class="flex flex-col gap-1">
                                                <span>
                                                    <?= number_format(sqrt($total_a * $total_a + $total_b * $total_b - 2 * $total_a * $total_b * $total_c), 2); ?>
                                                </span>
                                                <div class="w-full border-b border-slate-800"></div>
                                                <span><?= number_format(1 - ($total_c * $total_c), 2); ?></span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pl-4">Rx1x2y</td>
                                    <td>=</td>
                                    <td class="w-full">
                                        <span>
                                            <?php
                                            $total_r =  sqrt($total_a * $total_a + $total_b * $total_b - 2 * $total_a * $total_b * $total_c) / (1 - ($total_c * $total_c));
                                            echo number_format($total_r, 2) ?>
                                        </span>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>

                    <h2 class="info">4. Menentukan Taraf Signifikasi (a)</h2>
                    <div class="table-container">
                        <table class="table-data">
                            <tbody>
                                <tr>
                                    <td class="pl-4">a</td>
                                    <td>=</td>
                                    <td class="w-full">
                                        <span>5%</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <h2 class="info">5. Menentukan Kriteria Signifikasi R</h2>
                    <div class="table-container">
                        <table class="table-data">
                            <tbody>
                                <tr>
                                    <td class="pl-4">Ha</td>
                                    <td>=</td>
                                    <td class="w-full">
                                        <span>Tidak Signifikan</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pl-4">Ho</td>
                                    <td>=</td>
                                    <td class="w-full">
                                        <span>Signifikan</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pl-4"></td>
                                    <td>=</td>
                                    <td class="w-full">
                                        <span>Jika F hitung <= F tabel, maka Ho diterima atau korelasinya signifikan</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <h2 class="info">6. Menentukan F hitung Fh</h2>
                    <div class="table-container">
                        <table class="table-data">
                            <tbody>
                                <tr>
                                    <td class="pl-4">Fh</td>
                                    <td>=</td>
                                    <td class="w-full">
                                        <div class="flex flex-row items-center gap-2 text-center ">
                                            <div class="flex flex-col gap-1">
                                                <span>
                                                    R<sup>2</sup>(n-k-1)
                                                </span>
                                                <div class="w-full border-b border-slate-800"></div>
                                                <span>
                                                    K (1-R<sup>2</sup>)
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pl-4">Fh</td>
                                    <td>=</td>
                                    <td class="w-full">
                                        <div class="flex flex-row items-center gap-2 text-center ">
                                            <div class="flex flex-col gap-1">
                                                <span>
                                                    <?= number_format($total_r, 2); ?><sup>2</sup>(<?= $jumlah_data; ?>-2-1)
                                                </span>
                                                <div class="w-full border-b border-slate-800"></div>
                                                <span>
                                                    2 (1-<?= number_format($total_r, 2); ?><sup>2</sup>)
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pl-4">Fh</td>
                                    <td>=</td>
                                    <td class="w-full">
                                        <div class="flex flex-row items-center gap-2 text-center ">
                                            <div class="flex flex-col gap-1">
                                                <span>
                                                    <?= number_format($total_r * $total_r, 2); ?> * <?= $jumlah_data - 2 - 1; ?>
                                                </span>
                                                <div class="w-full border-b border-slate-800"></div>
                                                <span>
                                                    2 (1-<?= number_format($total_r * $total_r, 2); ?>)
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pl-4">Fh</td>
                                    <td>=</td>
                                    <td class="w-full">
                                        <div class="flex flex-row items-center gap-2 text-center ">
                                            <div class="flex flex-col gap-1">
                                                <span>
                                                    <?= number_format(($total_r * $total_r) * ($jumlah_data - 2 - 1), 2); ?>
                                                </span>
                                                <div class="w-full border-b border-slate-800"></div>
                                                <span>
                                                    <?= number_format(2 * (1 - ($total_r * $total_r)), 2); ?>
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pl-4">Fh</td>
                                    <td>=</td>
                                    <td class="w-full">
                                        <span>
                                            <?php
                                            $f_hitung = (($total_r * $total_r) * ($jumlah_data - 2 - 1)) / (2 * (1 - ($total_r * $total_r)));
                                            echo number_format($f_hitung, 2);
                                            ?>
                                        </span>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>

                    <h2 class="info">7. Menentukan F tabel</h2>
                    <div class="table-container">
                        <table class="table-data">
                            <tbody>
                                <tr>
                                    <td class="pl-4">Ftable</td>
                                    <td>=</td>
                                    <td class="w-full">
                                        <span>F(k,n-k-1)</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pl-4">Ftable</td>
                                    <td>=</td>
                                    <td class="w-full">
                                        <span>F(2,<?= $jumlah_data - 2 - 1; ?>)</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pl-4">Ftable</td>
                                    <td>=</td>
                                    <td class="w-full">
                                        <span><?php
                                                $f_tabel = cariNilaiF($jumlah_data - 2 - 1, 2);
                                                echo $f_tabel; ?>
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <h2 class="info">8. Membandingkan F hitung dengan F tabel</h2>
                    <div class="table-container">
                        <table class="table-data">
                            <tbody>
                                <tr>
                                    <td class="pl-4">Kareana</td>
                                    <td>=</td>
                                    <td class="w-full">
                                        <?php
                                        $text = "";
                                        $kesimpulan = "";
                                        if($f_hitung<=$f_tabel){
                                            $text = "Karena F hitung <= F tabel , " . number_format($f_hitung,2) . " <= " . number_format($f_tabel,2) . ", sehingga Ho diterima atau signifikan";
                                            $kesimpulan = "Terdapat hubungan yang signifikan antara variabel x1 secara bersama-sama dengan x2 dengan Y";
                                        }else {
                                            $text = "Karena F hitung > F tabel , " . number_format($f_hitung,2) . " > " . number_format($f_tabel,2) . ", sehingga Ha diterima atau tidak signifikan";
                                            $kesimpulan = "Terdapat hubungan yang tidak signifikan antara variabel x1 secara bersama-sama dengan x2 dengan Y";
                                        }
                                        echo $text;
                                        ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <h2 class="info">9. Kesimpulan</h2>
                    <div class="table-container">
                        <table class="table-data">
                            <tbody>
                                <tr>
                                    <td class="pl-4">Kareana</td>
                                    <td>=</td>
                                    <td class="w-full">
                                        <?= $kesimpulan;?>
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