<!-- back end -->
<?php

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
    $datas = $_POST;
    $array = [];
    $array_gabungan = [];
    $totlals = [];
    $max_data = 0;
    $index = 0;

    $nilai_x_kuadrat    = 0;
    $nilai_jkr          = 0;
    $nilai_jka          = 0;
    $nilai_jkd          = 0;
    $jumlah_kelompok    = 0;
    $nilai_dkdk         = 0;
    $nilai_dka          = 0;
    $nilai_dkantarkel   = 0;
    $nilai_rk_ratarata  = 0;
    $nilai_rka          = 0;
    $nilai_rkd          = 0;
    $nilai_f_hitung     = 0;

    foreach ($datas as $name => $posting) {
        if ($name !== "submit") {
            $jumlah_kelompok++;
            $index++;
            if ($extract = explode(",", $posting)) {
                $array[] = $extract;
                foreach ($extract as $e) {
                    $nilai_x_kuadrat += $e * $e;
                }
                @$totlals['jumlah']['data_' . $index] = count($extract);
                @$totlals['total']['data_' . $index] = array_sum($extract);
                @$totlals['rata_rata']['data_' . $index] = round(array_sum($extract) / count($extract), 2);
                $output = true;
            } else {
                $output = false;
            }
        }
    }
    $max_data = $totlals['total']['data_1'];
    $jumlah_data = $index;
    $index = 0;

    for ($i = 0; $i < count($array[0]); $i++) {
        $tempArray = [];
        for ($j = 0; $j < count($array); $j++) {
            $tempArray[] = $array[$j][$i];
        }
        $array_gabungan[] = $tempArray;
    }

    $total_n        = array_sum($totlals['jumlah']);
    $total_total    = array_sum($totlals['total']);
}
?>

<!-- fron end -->
<div class="flex flex-col gap-6">
    <form action="" method="post" class="flex flex-col gap-4 p-0 m-0">
        <div id="container" class="flex flex-col gap-4">
            <div class="flex flex-col gap-1">
                <label for="data_1">Data 1</label>
                <input class="input" name="data_1" id="data_1" rows="2" placeholder="Masukan Data, Pisahkan dengan Koma" />
            </div>
            <div class="flex flex-col gap-1">
                <label for="data_2">Data 2</label>
                <input class="input" name="data_2" id="data_2" rows="2" placeholder="Masukan Data, Pisahkan dengan Koma" />
            </div>
        </div>
        <div class="flex flex-row items-center justify-end gap-4">
            <button id="tambah" class="button" type="submit" name="submit">Tambah Data</button>
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
                    <h2 class="info">1. Uji atau asumsikan data diambil secara acak</h2>
                    <h2 class="info">2. Uji atau asumsikan data berdistribusi normal</h2>
                    <h2 class="info">3. Uji atau asumsikan data masing-masing homogeny</h2>
                    <h2 class="info">4. Tulis hipotesis penelitiannya</h2>
                    <div class="table-container">
                        <table class="table-data">
                            <tbody>
                                <tr>
                                    <td class="pl-4">Ha</td>
                                    <td>=</td>
                                    <td>Terdapat perbedaan yang signifikan antara prosedur A, B, dan C</td>
                                </tr>
                                <tr>
                                    <td class="pl-4">Ho</td>
                                    <td>=</td>
                                    <td>Tidak Terdapat perbedaan yang antara prosedur A, B, dan C</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <h2 class="info">5. Tulis hipotesis statistiknya</h2>
                    <div class="table-container">
                        <table class="table-data">
                            <tbody>
                                <tr>
                                    <td class="pl-4">Ha</td>
                                    <td>=</td>
                                    <td>Salah satu ada yang tidak sama !=</td>
                                </tr>
                                <tr>
                                    <td class="pl-4">Ho</td>
                                    <td>=</td>
                                    <td>Ma = Mb = Bc</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <h2 class="info">6. Membuat Tabel Penolong</h2>
                    <div class="table-container">
                        <table class="border border-slate-300">
                            <thead class="text-white bg-blue-500">
                                <tr class="*:px-2 *:py-2 *:border *:border-blue-400 *:text-center">
                                    <td rowspan="2">#</td>
                                    <td colspan="<?= $jumlah_data; ?>">Prosedur yang dicobakan</td>
                                    <td rowspan="2">Total</td>
                                </tr>
                                <tr class="*:px-2 *:py-2 *:border *:border-blue-400 *:text-center">
                                    <?php for ($i = 0; $i < $jumlah_data; $i++) : ?>
                                        <td><?= $i + 1; ?></td>
                                    <?php endfor; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="*:px-2 *:py-2 *:border *:border-slate-200 *:bg-white *:text-center">
                                    <td rowspan="<?= $max_data; ?>">Data Yang Dihasilkan</td>
                                </tr>
                                <?php foreach ($array_gabungan as $d) : ?>
                                    <tr class="*:px-2 *:py-2 *:border *:border-slate-200 *:bg-white *:text-center">
                                        <?php foreach ($d as $a) : ?>
                                            <td><?= $a; ?></td>
                                        <?php endforeach; ?>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot class="text-white bg-blue-500">
                                <tr class="*:px-2 *:py-2 *:border *:border-blue-400 *:text-center">
                                    <td>Jumlah (n)</td>
                                    <?php foreach ($totlals['jumlah'] as $jum) : ?>
                                        <td><?= $jum; ?></td>
                                    <?php endforeach; ?>
                                    <td><?= array_sum($totlals['jumlah']); ?></td>
                                </tr>
                                <tr class="*:px-2 *:py-2 *:border *:border-blue-400 *:text-center">
                                    <td>Total</td>
                                    <?php foreach ($totlals['total'] as $jum) : ?>
                                        <td><?= $jum; ?></td>
                                    <?php endforeach; ?>
                                    <td><?= array_sum($totlals['total']); ?></td>
                                </tr>
                                <tr class="*:px-2 *:py-2 *:border *:border-blue-400 *:text-center">
                                    <td>Rata-rata</td>
                                    <?php foreach ($totlals['rata_rata'] as $jum) : ?>
                                        <td><?= $jum; ?></td>
                                    <?php endforeach; ?>
                                    <td></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    <h2 class="info">7. Menghitung jumlah kuadrat rata-rata</h2>
                    <div class="table-container">
                        <table class="table-data">
                            <tbody>
                                <tr>
                                    <td class="pl-4">JKR</td>
                                    <td>=</td>
                                    <td class="w-full">
                                        <div class="flex flex-row items-center gap-2 text-center ">
                                            <span>1 -</span>
                                            <div class="flex flex-col gap-1">
                                                <span>
                                                    (∑x1 + ∑x2 + ∑x3 ...)<sup>2</sup>
                                                </span>
                                                <div class="w-full border-b border-slate-800"></div>
                                                <span>n1 + n2 + n3 ...</span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pl-4">JKR</td>
                                    <td>=</td>
                                    <td class="w-full">
                                        <div class="flex flex-row items-center gap-2 text-center ">
                                            <div class="flex flex-col gap-1">
                                                <span>
                                                    (<?= implode("+", $totlals['total']); ?>)<sup>2</sup>
                                                </span>
                                                <div class="w-full border-b border-slate-800"></div>
                                                <span>
                                                    <?= implode("+", $totlals['jumlah']); ?>
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pl-4">JKR</td>
                                    <td>=</td>
                                    <td class="w-full">
                                        <div class="flex flex-row items-center gap-2 text-center ">
                                            <div class="flex flex-col gap-1">
                                                <span>
                                                    <?= array_sum($totlals['total']) * array_sum($totlals['total']); ?>
                                                </span>
                                                <div class="w-full border-b border-slate-800"></div>
                                                <span>
                                                    <?= array_sum($totlals['jumlah']); ?>
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pl-4">JKR</td>
                                    <td>=</td>
                                    <td class="w-full">
                                        <span>
                                            <?php
                                            $hasil = (array_sum($totlals['total']) * array_sum($totlals['total'])) / (array_sum($totlals['jumlah']));
                                            $nilai_jkr = $hasil;
                                            echo round($hasil,2);
                                            ?>
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <h2 class="info">8. Jumlah kuadrat antar kelompok</h2>
                    <div class="table-container">
                        <table class="table-data">
                            <tbody>
                                <tr>
                                    <td class="pl-4">JKA</td>
                                    <td>=</td>
                                    <td class="w-full">
                                        <span>
                                            (∑x1)<sup>2</sup>/n1 + (∑x2)<sup>2</sup>/n2 + (∑x3)<sup>2</sup>/n3 ... - (Total ∑)<sup>2</sup>/(Total N)
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pl-4">JKA</td>
                                    <td>=</td>
                                    <td class="w-full">
                                        <span>
                                            <?php
                                            $hasil = '';
                                            foreach ($totlals['total'] as $index => $total) {
                                                $hasil .= $total . "<sup>2</sup> / " . $totlals['jumlah'][$index] . " + ";
                                            }
                                            $hasil = substr($hasil, 0, -2) . " - " . $total_total . "<sup>2</sup> /" . $total_n;
                                            echo $hasil;
                                            ?>
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pl-4">JKA</td>
                                    <td>=</td>
                                    <td class="w-full">
                                        <span>
                                            <?php
                                            $hasil = '';
                                            foreach ($totlals['total'] as $index => $total) {
                                                $hasil .= $total * $total . "/" . $totlals['jumlah'][$index] . " + ";
                                            }
                                            $hasil = substr($hasil, 0, -2) . " - " . $total_total * $total_total . " /" . $total_n;
                                            echo $hasil;
                                            ?>
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pl-4">JKA</td>
                                    <td>=</td>
                                    <td class="w-full">
                                        <span>
                                            <?php
                                            $hasil = '';
                                            foreach ($totlals['total'] as $index => $total) {
                                                $hasil .= round(($total * $total) / $totlals['jumlah'][$index], 2) . " + ";
                                            }
                                            $hasil = substr($hasil, 0, -2) . " - " . round(($total_total * $total_total) / $total_n, 2);
                                            echo $hasil;
                                            ?>
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pl-4">JKA</td>
                                    <td>=</td>
                                    <td class="w-full">
                                        <span>
                                            <?php
                                            $hasil = 0;
                                            foreach ($totlals['total'] as $index => $total) {
                                                $hasil += ($total * $total) / $totlals['jumlah'][$index];
                                            }
                                            $hasil = $hasil - ($total_total * $total_total) / $total_n;
                                            $nilai_jka = $hasil;
                                            echo round($hasil,2);
                                            ?>
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <h2 class="info">9. Jumlah kuadrat dalam kelompok</h2>
                    <div class="table-container">
                        <table class="table-data">
                            <tbody>
                                <tr>
                                    <td class="pl-4">JKD</td>
                                    <td>=</td>
                                    <td class="w-full">
                                        <span>
                                            ∑x<sup>2</sup> - JKR - JKA
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pl-4">JKD</td>
                                    <td>=</td>
                                    <td class="w-full">
                                        <span>
                                            <?= $nilai_x_kuadrat; ?> - <?= round($nilai_jkr,2); ?> - <?= round($nilai_jka,2); ?>
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pl-4">JKD</td>
                                    <td>=</td>
                                    <td class="w-full">
                                        <span>
                                            <?php
                                            $hasil = $nilai_x_kuadrat - $nilai_jkr -  $nilai_jka;
                                            $nilai_jkd = $hasil;
                                            echo $hasil;
                                            ?>
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <h2 class="info">10. Derajat bebas rata-rata</h2>
                    <div class="table-container">
                        <table class="table-data">
                            <tbody>
                                <tr>
                                    <td class="pl-4">DK rata-rata</td>
                                    <td>=</td>
                                    <td class="w-full">
                                        <span>
                                            1
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <h2 class="info">11. Derajat bebas antar kelompok</h2>
                    <div class="table-container">
                        <table class="table-data">
                            <tbody>
                                <tr>
                                    <td class="pl-4">DK antar kelompok</td>
                                    <td>=</td>
                                    <td class="w-full">
                                        <span>
                                            K - 1
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pl-4">DK antar kelompok</td>
                                    <td>=</td>
                                    <td class="w-full">
                                        <span>
                                            <?= $jumlah_kelompok; ?> - 1
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pl-4">DK antar kelompok</td>
                                    <td>=</td>
                                    <td class="w-full">
                                        <span>
                                            <?php
                                            $hasil = $jumlah_kelompok - 1;
                                            $nilai_dkantarkel = $hasil;
                                            echo $hasil; ?>
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <h2 class="info">12. Derajat bebas dalam kelompok</h2>
                    <div class="table-container">
                        <table class="table-data">
                            <tbody>
                                <tr>
                                    <td class="pl-4">DK dalam kelompok</td>
                                    <td>=</td>
                                    <td class="w-full">
                                        <span>
                                            N - K
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pl-4">DK dalam kelompok</td>
                                    <td>=</td>
                                    <td class="w-full">
                                        <span>
                                            <?= $total_n; ?> - <?= $jumlah_kelompok; ?>
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pl-4">DK dalam kelompok</td>
                                    <td>=</td>
                                    <td class="w-full">
                                        <span>
                                            <?php
                                            $hasil = $total_n - $jumlah_kelompok;
                                            $nilai_dkdk = $hasil;
                                            echo $hasil; ?>
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <h2 class="info">13. Rata-rata jumlah kuadrat antar kelompok</h2>
                    <div class="table-container">
                        <table class="table-data">
                            <tbody>
                                <tr>
                                    <td class="pl-4">RK rata-rata</td>
                                    <td>=</td>
                                    <td class="w-full">
                                        <span>
                                            JKR / DKR
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pl-4">RK rata-rata</td>
                                    <td>=</td>
                                    <td class="w-full">
                                        <span>
                                            <?= round($nilai_jkr,2); ?> / 1
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pl-4">RK rata-rata</td>
                                    <td>=</td>
                                    <td class="w-full">
                                        <span>
                                            <?php
                                            $hasil = $nilai_jkr / 1;
                                            $nilai_rk_ratarata = $hasil;
                                            echo round($hasil,2); ?>
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <h2 class="info">14. Rata-rata jumlah kuadrat antar</h2>
                    <div class="table-container">
                        <table class="table-data">
                            <tbody>
                                <tr>
                                    <td class="pl-4">RKA</td>
                                    <td>=</td>
                                    <td class="w-full">
                                        <span>
                                            JKA / DKA
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pl-4">RKA</td>
                                    <td>=</td>
                                    <td class="w-full">
                                        <span>
                                            <?= round($nilai_jka,2); ?> / <?= $nilai_dkantarkel; ?>
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pl-4">RKA</td>
                                    <td>=</td>
                                    <td class="w-full">
                                        <span>
                                            <?php
                                            $hasil = $nilai_jka / $nilai_dkantarkel;
                                            $nilai_rka = $hasil;
                                            echo round($hasil,2); ?>
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <h2 class="info">15. Rata-rata jumlah kuadrat dalam kelompok</h2>
                    <div class="table-container">
                        <table class="table-data">
                            <tbody>
                                <tr>
                                    <td class="pl-4">RKD</td>
                                    <td>=</td>
                                    <td class="w-full">
                                        <span>
                                            JKD / DKD
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pl-4">RKD</td>
                                    <td>=</td>
                                    <td class="w-full">
                                        <span>
                                            <?= $nilai_jkd; ?> / <?= $nilai_dkdk; ?>
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pl-4">RKD</td>
                                    <td>=</td>
                                    <td class="w-full">
                                        <span>
                                            <?php
                                            $hasil = $nilai_jkd / $nilai_dkdk;
                                            $nilai_rkd = $hasil;
                                            echo round($hasil,2); ?>
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <h2 class="info">16. Cari F Hitung</h2>
                    <div class="table-container">
                        <table class="table-data">
                            <tbody>
                                <tr>
                                    <td class="pl-4">F hitung</td>
                                    <td>=</td>
                                    <td class="w-full">
                                        <span>
                                            RKA / RKD
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pl-4">F hitung</td>
                                    <td>=</td>
                                    <td class="w-full">
                                        <span>
                                            <?= round($nilai_rka,2); ?> / <?= round($nilai_rkd,2); ?>
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pl-4">F hitung</td>
                                    <td>=</td>
                                    <td class="w-full">
                                        <span>
                                            <?php
                                            $hasil = $nilai_rka / $nilai_rkd;
                                            $nilai_f_hitung = $hasil;
                                            echo round($hasil,2); ?>
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <h2 class="info">17. Taraf signifikasi (a = 5%)</h2>

                    <?php $nilai_taraf_siginifikasi = 0.05; ?>

                    <h2 class="info">18. Mencari F tabel</h2>
                    <div class="table-container">
                        <table class="table-data">
                            <tbody>
                                <tr>
                                    <td class="pl-4">F tabel</td>
                                    <td>=</td>
                                    <td class="w-full">
                                        <span>
                                            (5%, K-1, Total N-Jumlah Percobaan)
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pl-4">F tabel</td>
                                    <td>=</td>
                                    <td class="w-full">
                                        <span>
                                            (0.05, <?= $nilai_dkantarkel; ?>, <?= $total_n - $jumlah_kelompok; ?>)
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pl-4">F tabel</td>
                                    <td>=</td>
                                    <td class="w-full">
                                        <span>
                                            Ada di kolom ke-<?= $nilai_dkantarkel; ?>, dan baris ke-<?= $total_n - $jumlah_kelompok; ?>)
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pl-4">F tabel</td>
                                    <td>=</td>
                                    <td class="w-full">
                                        <span>
                                            <?php
                                            $nilai_f_tabel = cariNilaiF($total_n - $jumlah_kelompok, $nilai_dkantarkel);
                                            echo $nilai_f_tabel;
                                            ?>
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <h2 class="info">19. Buat Tabel ANOVA</h2>
                    <div class="table-container">
                        <table class="tabel">
                            <thead>
                                <tr>
                                    <td>Jumlah Variasi</td>
                                    <td>Jumlah Kuadrat (JK)</td>
                                    <td>Dk</td>
                                    <td>Rata-rata kuadrat (RK)</td>
                                    <td>F</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Rata-rata</td>
                                    <td><?= round($nilai_jkr,2);?></td>
                                    <td>1</td>
                                    <td><?= round($nilai_rk_ratarata,2);?></td>
                                    <td rowspan="3"><?= round($nilai_f_hitung,2);?></td>
                                </tr>
                                <tr>
                                    <td>Antar Kel.</td>
                                    <td><?= round($nilai_jka,2);?></td>
                                    <td><?= round($nilai_dkantarkel,2);?></td>
                                    <td><?= round($nilai_rka,2);?></td>
                                </tr>
                                <tr>
                                    <td>Dalam Kel.</td>
                                    <td><?= round($nilai_jkd,2);?></td>
                                    <td><?= round($nilai_dkdk,2);?></td>
                                    <td><?= round($nilai_rkd,2);?></td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td>Jumlah</td>
                                    <td><?= $nilai_jkr+$nilai_jka+$nilai_jkd;?></td>
                                    <td><?= 1+$nilai_dkantarkel+$nilai_dkdk;?></td>
                                    <td><?= round($nilai_rk_ratarata + $nilai_dkantarkel + $nilai_rkd,2);?></td>
                                    <td></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    <h2 class="info">20. Kriteria Pengujian</h2>
                    <div class="table-container">
                        <table class="table-data">
                            <tbody>
                                <tr>
                                    <td class="pl-4">H0</td>
                                    <td>=</td>
                                    <td class="w-full">
                                        <span>
                                            Signifikan
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pl-4">H1</td>
                                    <td>=</td>
                                    <td class="w-full">
                                        <span>
                                            Tidak Signifikan
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pl-4">Kriteria</td>
                                    <td>=</td>
                                    <td class="w-full">
                                        <span>
                                            Jika F hitung <= F tabel
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <?php
                    $text = '';
                    $kesimpulan = '';
                    if($nilai_f_hitung<=$nilai_f_tabel){
                        $text = "Karena F hitung <= F tabel, yaitu " . round($nilai_f_hitung,2) . " <= " . round($nilai_f_tabel,2) . ", Maka H0 diterima";
                        $kesimpulan = "Tidak terdapat perbedaan yang signifikan pada " . $jumlah_kelompok . " prosedur tersebut";
                    }else {
                        $text = "Karena F hitung >= F tabel, yaitu " . round($nilai_f_hitung,2) . " >= " . round($nilai_f_tabel,2) . ", Maka H1 diterima";
                        $kesimpulan = "Terdapat perbedaan yang signifikan pada " . $jumlah_kelompok . " prosedur tersebut";
                    }
                    ?>

                    <h2 class="info">21. <?= $text;?></h2>
                    <h2 class="info">22. Kesimpulan</h2>
                    <div class="table-container">
                        <table class="table-data">
                            <tbody>
                                <tr>
                                    <td class="pl-4"><?=$kesimpulan;?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
</div>
<script>
    let tambah = document.getElementById('tambah');
    let container = document.getElementById('container');
    let number = 2;
    tambah.addEventListener('click', function(e) {
        number++;
        e.preventDefault();
        console.log('Number : ' + number);
        container.innerHTML += `<div class="flex flex-col gap-1">
                <label for="data_${number}">Data ${number}</label>
                <input class="input" name="data_${number}" id="data_${number}" rows="2" placeholder="Masukan Data, Pisahkan dengan Koma" />
            </div>`;
    })
</script>