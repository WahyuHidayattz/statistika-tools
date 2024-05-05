<!-- back end -->
<?php

$input_deret        = '';
$input_interval     = '';

if (isset($_POST['submit'])) {
    $input_deret        = $_POST['input_deret'];
    $output             = false;
    if ($input_deret != '') {
        $output             = true;

        $data_deret         = explode(",", $input_deret);
        $data_max           = max($data_deret);
        $data_min           = min($data_deret);
        $data_lenth         = count($data_deret);

        // A. Jangkauan
        $hasil_jangkauan    = $data_max - $data_min;

        // B. Simpangan Rata-rata
        $simpangan_render_1     = "(" . implode("+", $data_deret) . ") / " . $data_lenth;
        $simpangan_total_1      = array_sum($data_deret);
        $simpangan_render_2     = $simpangan_total_1 . " / " . $data_lenth;
        $simpangan_total_2      = round($simpangan_total_1 / $data_lenth, 2);

        $text_simpangan_1       = '';
        $text_simpangan_2       = '';
        $simpangan_total_3      = 0;
        foreach ($data_deret as $der) {
            $text_simpangan_1 .= "|" . $der . " - " . $simpangan_total_2 . "| + ";
            $nil                = $der - $simpangan_total_2;
            if ($nil < 0) {
                $nil = $nil * -1;
            }
            $simpangan_total_3 += $nil;
            $text_simpangan_2 .= "|" . $nil . "| +";
        }
        $text_simpangan_1 = "(" . substr($text_simpangan_1, 0, -2) . ") / " . $data_lenth;
        $text_simpangan_2 = "(" . substr($text_simpangan_2, 0, -2) . ") / " . $data_lenth;
        $text_simpangan_3 = "(" . $simpangan_total_3 . ") / " . $data_lenth;
        $simpangan_total_4 = round($simpangan_total_3 / $data_lenth, 2);

        // C. Ragam
        $text_ragam_1 = '';
        $text_ragam_2 = '';
        $text_ragam_3 = '';
        $total_ragam_1 = 0;
        foreach ($data_deret as $der) {
            $text_ragam_1 .= "($der-$simpangan_total_2)<sup>2</sup> + ";
            $var1 = $der - $simpangan_total_2;
            if ($var1 < 0) {
                $var1 = $var1 * -1;
            }
            $var2 = $var1 * $var1;
            $total_ragam_1 += $var2;
            $text_ragam_2 .= "($var1)^2 + ";
            $text_ragam_3 .= $var2 . " + ";
        }
        $text_ragam_1 = "(" . substr($text_ragam_1, 0, -2) . ") / " . $data_lenth;
        $text_ragam_2 = "(" . substr($text_ragam_2, 0, -2) . ") / " . $data_lenth;
        $text_ragam_3 = "(" . substr($text_ragam_3, 0, -2) . ") / " . $data_lenth;
        $text_ragam_4 = $total_ragam_1 . " / " . $data_lenth;
        $total_ragam_2 = round($total_ragam_1 / $data_lenth, 2);

        $total_final = sqrt($total_ragam_2);
        $total_final = round($total_final, 2);
    }
}
?>

<!-- fron end -->
<div class="flex flex-col gap-6">
    <form action="" method="post" class="flex flex-col gap-4 p-0 m-0">
        <div class="flex flex-col gap-1">
            <label for="input_deret">Deret Angka</label>
            <textarea class="input" name="input_deret" id="input_deret" rows="2" placeholder="Masukan Data, Pisahkan dengan Koma"><?= $input_deret; ?></textarea>
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
                                    <td>Banyaknya Data (n)</td>
                                    <td>:</td>
                                    <td class="w-full"><?= $data_lenth; ?></td>
                                </tr>
                                <tr>
                                    <td>Data Terkecil (Min)</td>
                                    <td>:</td>
                                    <td class="w-full"><?= $data_min; ?></td>
                                </tr>
                                <tr>
                                    <td>Data Terbesar (Max)</td>
                                    <td>:</td>
                                    <td class="w-full"><?= $data_max; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <h2 class="info">A. Jangkauan</h2>
                    <div class="table-container">
                        <table class="table-data">
                            <tbody>
                                <tr>
                                    <td>Jangkauan</td>
                                    <td>=</td>
                                    <td class="w-full">
                                        <span>Max - Min</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Jangkauan</td>
                                    <td>=</td>
                                    <td class="w-full">
                                        <span><?= $data_max; ?> - <?= $data_min; ?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Jangkauan</td>
                                    <td>=</td>
                                    <td class="w-full">
                                        <span><?= $hasil_jangkauan; ?></span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <h2 class="info">B. Simpangan Rata-Rata</h2>
                    <div class="table-container">
                        <table class="table-data">
                            <tbody>
                                <tr>
                                    <td>Rata-rata (χ)</td>
                                    <td>=</td>
                                    <td class="w-full"><span><?= $simpangan_render_1; ?></span></td>
                                </tr>
                                <tr>
                                    <td>Rata-rata (χ)</td>
                                    <td>=</td>
                                    <td>
                                        <span><?= $simpangan_render_2; ?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Rata-rata (χ)</td>
                                    <td>=</td>
                                    <td>
                                    <span><?= $simpangan_total_2; ?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>SR</td>
                                    <td>=</td>
                                    <td>
                                    <span><?= $text_simpangan_1; ?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>SR</td>
                                    <td>=</td>
                                    <td>
                                    <span><?= $text_simpangan_2; ?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>SR</td>
                                    <td>=</td>
                                    <td>
                                    <span><?= $text_simpangan_3; ?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>SR</td>
                                    <td>=</td>
                                    <td>
                                    <span><?= $simpangan_total_4; ?></span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <h2 class="info">C. Ragam</h2>
                    <div class="table-container">
                        <table class="table-data">
                            <tbody>
                                <tr>
                                    <td>Ragam (S<sup>2</sup>)</td>
                                    <td>=</td>
                                    <td class="w-full">
                                    <span><?= $text_ragam_1; ?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Ragam (S<sup>2</sup>)</td>
                                    <td>=</td>
                                    <td class="w-full">
                                    <span><?= $text_ragam_2; ?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Ragam (S<sup>2</sup>)</td>
                                    <td>=</td>
                                    <td class="w-full">
                                    <span><?= $text_ragam_3; ?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Ragam (S<sup>2</sup>)</td>
                                    <td>=</td>
                                    <td class="w-full">
                                    <span><?= $text_ragam_4; ?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Ragam (S<sup>2</sup>)</td>
                                    <td>=</td>
                                    <td class="w-full">
                                    <span><?= $total_ragam_2; ?></span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <h2 class="info">D. Simpangan Baku</h2>
                    <div class="table-container">
                        <table class="table-data">
                            <tbody>
                                <tr>
                                    <td>Simpangan Baku (S)</td>
                                    <td>=</td>
                                    <td class="w-full">
                                    <span>√<?= $total_ragam_2; ?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Simpangan Baku (S)</td>
                                    <td>=</td>
                                    <td class="w-full">
                                    <span><?= $total_final; ?></span>
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