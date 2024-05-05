<!-- back end -->
<?php

$input_x            = '';
$input_y            = '';

if (isset($_POST['submit'])) {
    $input_x            = $_POST['input_x'];
    $input_y            = $_POST['input_y'];

    $output             = false;
    if ($input_x != '' && $input_y != '') {
        $data_x             = explode(",", $input_x);
        $data_y             = explode(",", $input_y);
        $n                  = count($data_x);
        if (count($data_x) == count($data_y)) {
            $output             = true;
            $data_xy            = [];
            $data_xx            = [];
            $data_yy            = [];
            $data_table         = [];
            $totals             = [];
            foreach ($data_x as $index => $value) {
                $xy             = $data_x[$index] * $data_y[$index];
                $xx             = $data_x[$index] * $data_x[$index];
                $yy             = $data_y[$index] * $data_y[$index];
                $data_xy[$index] = $xy;
                $data_xx[$index] = $xx;
                $data_yy[$index] = $yy;

                @$totals['X'] += $data_x[$index];
                @$totals['Y'] += $data_y[$index];
                @$totals['XY'] += $xy;
                @$totals['XX'] += $xx;
                @$totals['YY'] += $yy;

                $data_table[$index] = [$data_x[$index], $data_y[$index], $xy, $xx, $yy];
            }
        }
        $r                  = round((($n * $totals['XY']) - ($totals['X'] * $totals['Y'])) / round(sqrt((($n * $totals['XX']) - ($totals['X'] * $totals['X'])) * (($n * $totals['YY']) - ($totals['Y'] * $totals['Y']))), 2), 2);
        $grade_r            = 'Sangat Rendah';
        if ($r >= 0.20 && $r <= 0.39) {
            $grade_r        = "Rendah";
        }
        if ($r >= 0.40 && $r <= 0.59) {
            $grade_r        = "Cukup Kuat";
        }
        if ($r >= 0.60 && $r <= 0.79) {
            $grade_r        = "Kuat";
        }
        if ($r >= 0.80) {
            $grade_r        = "Sangat Kuat";
        }
    }
}
?>

<!-- fron end -->
<div class="flex flex-col gap-6">
    <form action="" method="post" class="flex flex-col gap-4 p-0 m-0">
        <div class="flex flex-col gap-1">
            <label for="input_x">Data X</label>
            <input type="text" class="input" name="input_x" id="input_x" rows="2" placeholder="Masukan Data, Pisahkan dengan Koma" value="<?= $input_x; ?>" />
        </div>
        <div class="flex flex-col gap-1">
            <label for="input_y">Data Y</label>
            <input type="text" class="input" name="input_y" id="input_y" rows="2" placeholder="Masukan Data, Pisahkan dengan Koma" value="<?= $input_y; ?>" />
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
                    <span>Error, Pastikan Semua Form di Input dengan benar, dan pastikan Jumlah Data X dan Y sama</span>
                <?php endif; ?>
                <?php if ($output == true) : ?>
                    <h2 class="info">Table Data</h2>
                    <div class="table-container">
                        <table class="border border-slate-300">
                            <thead class="text-white bg-blue-500">
                                <tr class="*:px-2 *:py-2 *:border *:border-blue-400 *:text-center">
                                    <td>NO</td>
                                    <td>X</td>
                                    <td>Y</td>
                                    <td>XY</td>
                                    <td>X<sup>2</sup></td>
                                    <td>Y<sup>2</sup></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($data_table as $tab) : ?>
                                    <tr class="*:px-2 *:py-2 *:border *:border-slate-200 *:bg-white *:text-center">
                                        <td><?= $no++; ?></td>
                                        <?php foreach ($tab as $d) : ?>
                                            <td><?= $d; ?></td>
                                        <?php endforeach; ?>
                                    </tr>
                                <?php endforeach; ?>
                                <tr class="*:px-2 *:py-2 *:border *:border-blue-400 *:text-center bg-blue-500 text-white">
                                    <td>Total</td>
                                    <?php foreach ($totals as $tot) : ?>
                                        <td><?= $tot; ?></td>
                                    <?php endforeach; ?>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <h2 class="info">Informasi Data</h2>
                    <div class="table-container">
                        <table class="table-data">
                            <tbody>
                                <tr>
                                    <td class="whitespace-nowrap">Jumlah Data (n)</td>
                                    <td>=</td>
                                    <td class="w-full"><?= $n; ?></td>
                                </tr>
                                <tr>
                                    <td><big>∑</big>X</td>
                                    <td>=</td>
                                    <td><?= $totals['X']; ?></td>
                                </tr>
                                <tr>
                                    <td><big>∑</big>Y</td>
                                    <td>=</td>
                                    <td><?= $totals['Y']; ?></td>
                                </tr>
                                <tr>
                                    <td>XY</td>
                                    <td>=</td>
                                    <td><?= $totals['XY']; ?></td>
                                </tr>
                                <tr>
                                    <td>X<sup>2</sup></td>
                                    <td>=</td>
                                    <td><?= $totals['XX']; ?></td>
                                </tr>
                                <tr>
                                    <td>Y<sup>2</sup></td>
                                    <td>=</td>
                                    <td><?= $totals['YY']; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <h2 class="info">Korelasi Produk Moment Person (r)</h2>
                    <div class="table-container">
                        <table class="table-data">
                            <tbody>
                                <tr>
                                    <td class="pl-4">r</td>
                                    <td>=</td>
                                    <td class="w-full">
                                        <div class="flex flex-col items-start text-center">
                                            <span class="fraction"><span class="numerator"><var>n</var><big>∑</big><span> </span><var>xy</var><span class="binary-operator">−</span><big>∑</big><span> </span><span> </span><var>x</var><big>∑</big><span> </span><span> </span><span> </span><var>y</var></span>
                                                <div class="w-full border-b border-slate-800"></div>
                                                <span>√{n<big>∑</big>x<sup>2</sup> - (<big>∑</big>x)<sup>2</sup>} {n<big>∑</big>x<sup>2</sup> - (<big>∑</big>x)<sup>2</sup>}</span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pl-4">r</td>
                                    <td>=</td>
                                    <td>
                                        <div class="flex flex-col items-start justify-start text-center">
                                            <div>
                                                <span><?= $n . " * " . $totals['XY'] . " - " . $totals['X'] . " * " . $totals['Y']; ?></span>

                                                <div class="w-full border-b border-slate-800"></div>

                                                <span>√ <?= "{" . $n . " * " . $totals['XX'] . " - (" . $totals['X'] . ")<sup>2</sup>}"; ?>
                                                    <?= "{" . $n . " * " . $totals['YY'] . " - (" . $totals['Y'] . ")<sup>2</sup>}"; ?>
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pl-4">r</td>
                                    <td>=</td>
                                    <td>
                                        <div class="flex flex-col items-start justify-start text-center">
                                            <div>
                                                <span><?= ($n * $totals['XY']) . " - " . ($totals['X'] * $totals['Y']); ?></span>

                                                <div class="w-full border-b border-slate-800"></div>

                                                <span>√ <?= "{" . ($n * $totals['XX']) . " - " . ($totals['X'] * $totals['X']) . "}"; ?>
                                                    <?= "{" . ($n * $totals['YY']) . " - " . ($totals['Y'] * $totals['Y']) . "}"; ?>
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pl-4">r</td>
                                    <td>=</td>
                                    <td>
                                        <div class="flex flex-col items-start justify-start text-center">
                                            <div>
                                                <span><?= (($n * $totals['XY']) - ($totals['X'] * $totals['Y'])); ?></span>

                                                <div class="w-full border-b border-slate-800"></div>

                                                <span>√ <?= "{" . (($n * $totals['XX']) - ($totals['X'] * $totals['X'])) . "}"; ?>
                                                    <?= "{" . (($n * $totals['YY']) - ($totals['Y'] * $totals['Y'])) . "}"; ?>
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pl-4">r</td>
                                    <td>=</td>
                                    <td>

                                        <div class="flex flex-col items-start justify-start text-center">
                                            <div>
                                                <span><?= (($n * $totals['XY']) - ($totals['X'] * $totals['Y'])); ?></span>

                                                <div class="w-full border-b border-slate-800"></div>

                                                <span>√ <?= ((($n * $totals['XX']) - ($totals['X'] * $totals['X'])) * (($n * $totals['YY']) - ($totals['Y'] * $totals['Y']))) ?>
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pl-4">r</td>
                                    <td>=</td>
                                    <td>
                                        <div class="flex flex-col items-start justify-start text-center">
                                            <div>
                                                <span><?= (($n * $totals['XY']) - ($totals['X'] * $totals['Y'])); ?></span>

                                                <div class="w-full border-b border-slate-800"></div>

                                                <span><?= round(sqrt((($n * $totals['XX']) - ($totals['X'] * $totals['X'])) * (($n * $totals['YY']) - ($totals['Y'] * $totals['Y']))), 2) ?>
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pl-4">r</td>
                                    <td>=</td>
                                    <td>
                                        <span>
                                            <?= $r . " ($grade_r) "; ?>
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <h2 class="info">Koefisien Determinasi (R)</h2>
                    <div class="table-container">
                        <table class="table-data">
                            <tbody>
                                <tr>
                                    <td>R</td>
                                    <td>=</td>
                                    <td class="w-full">r<sup>2</sup> x 100 %</td>
                                </tr>
                                <tr>
                                    <td>R</td>
                                    <td>=</td>
                                    <td class="w-full"><?= $r; ?><sup>2</sup> x 100 %</td>
                                </tr>
                                <tr>
                                    <td>R</td>
                                    <td>=</td>
                                    <td class="w-full"><?= $r * $r; ?> x 100 %</td>
                                </tr>
                                <tr>
                                    <td>R</td>
                                    <td>=</td>
                                    <td class="w-full"><?= ($r * $r) * 100; ?> %</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <h2 class="info">Pengajuan Hipotesis (Uji t)</h2>
                    <div class="table-container">
                        <table class="table-data">
                            <tbody>
                                <tr>
                                    <td>t Hitung</td>
                                    <td>=</td>
                                    <td class="w-full">
                                        <div class="flex flex-col items-start justify-start text-center">
                                            <div>
                                                <span>r √n-2</span>
                                                <div class="w-full border-b border-slate-800"></div>
                                                <span>√1 - r<sup>2</sup></span>
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>t Hitung</td>
                                    <td>=</td>
                                    <td class="w-full">
                                        <div class="flex flex-col items-start justify-start text-center">
                                            <div>
                                                <span><?= $r; ?> √<?= $n; ?>-2</span>
                                                <div class="w-full border-b border-slate-800"></div>
                                                <span>√1 - <?= $r; ?><sup>2</sup></span>
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>t Hitung</td>
                                    <td>=</td>
                                    <td class="w-full">
                                        <div class="flex flex-col items-start justify-start text-center">
                                            <div>
                                                <span><?= $r; ?> √<?= $n - 2; ?></span>
                                                <div class="w-full border-b border-slate-800"></div>
                                                <span>√1 - <?= $r * $r; ?></span>
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>t Hitung</td>
                                    <td>=</td>
                                    <td class="w-full">
                                        <div class="flex flex-col items-start justify-start text-center">
                                            <div>
                                                <span><?= $r; ?> * <?= round(sqrt($n - 2), 2); ?></span>
                                                <div class="w-full border-b border-slate-800"></div>
                                                <span>√<?= round(1 - ($r * $r), 2); ?></span>
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>t Hitung</td>
                                    <td>=</td>
                                    <td class="w-full">
                                        <div class="flex flex-col items-start justify-start text-center">
                                            <div>
                                                <span><?= round($r * round(sqrt($n - 2), 2), 2); ?></span>
                                                <div class="w-full border-b border-slate-800"></div>
                                                <span><?= round(sqrt(round(1 - ($r * $r), 2)),2); ?></span>
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>t Hitung</td>
                                    <td>=</td>
                                    <td class="w-full">
                                        <span><?= round(round($r * round(sqrt($n - 2), 2), 2) / round(sqrt(round(1 - ($r * $r), 2)),2),2); ?></span>
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