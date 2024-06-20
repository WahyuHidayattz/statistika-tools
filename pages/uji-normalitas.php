<!-- back end -->
<?php

// ini_set('display_errors', '1');
// ini_set('display_startup_errors', '1');
// error_reporting(E_ALL);


$input_data = '';
$input_fi = '';

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

function cariNilaiZ($z)
{
    // Z-Table
    $zTable = [
        [0.0000, 0.0040, 0.0080, 0.0120, 0.0160, 0.0199, 0.0239, 0.0279, 0.0319, 0.0359],
        [0.0398, 0.0438, 0.0478, 0.0517, 0.0557, 0.0596, 0.0636, 0.0675, 0.0714, 0.0753],
        [0.0793, 0.0832, 0.0871, 0.0910, 0.0948, 0.0987, 0.1026, 0.1064, 0.1103, 0.1141],
        [0.1179, 0.1217, 0.1255, 0.1293, 0.1331, 0.1368, 0.1406, 0.1443, 0.1480, 0.1517],
        [0.1554, 0.1591, 0.1628, 0.1664, 0.1700, 0.1736, 0.1772, 0.1808, 0.1844, 0.1879],
        [0.1915, 0.1950, 0.1985, 0.2019, 0.2054, 0.2088, 0.2123, 0.2157, 0.2190, 0.2224],
        [0.2257, 0.2291, 0.2324, 0.2357, 0.2389, 0.2422, 0.2454, 0.2486, 0.2517, 0.2549],
        [0.2580, 0.2611, 0.2642, 0.2673, 0.2703, 0.2734, 0.2764, 0.2794, 0.2823, 0.2852],
        [0.2881, 0.2910, 0.2939, 0.2967, 0.2995, 0.3023, 0.3051, 0.3078, 0.3106, 0.3133],
        [0.3160, 0.3186, 0.3212, 0.3238, 0.3264, 0.3289, 0.3315, 0.3340, 0.3365, 0.3389],
        [0.3413, 0.3438, 0.3461, 0.3485, 0.3508, 0.3531, 0.3554, 0.3577, 0.3599, 0.3621],
        [0.3643, 0.3665, 0.3686, 0.3708, 0.3729, 0.3749, 0.3770, 0.3790, 0.3810, 0.3830],
        [0.3849, 0.3869, 0.3888, 0.3907, 0.3925, 0.3944, 0.3962, 0.3980, 0.3997, 0.4015],
        [0.4032, 0.4049, 0.4066, 0.4082, 0.4099, 0.4115, 0.4131, 0.4147, 0.4162, 0.4177],
        [0.4192, 0.4207, 0.4222, 0.4236, 0.4251, 0.4265, 0.4279, 0.4292, 0.4306, 0.4319],
        [0.4332, 0.4345, 0.4357, 0.4370, 0.4382, 0.4394, 0.4406, 0.4418, 0.4429, 0.4441],
        [0.4452, 0.4463, 0.4474, 0.4484, 0.4495, 0.4505, 0.4515, 0.4525, 0.4535, 0.4545],
        [0.4554, 0.4564, 0.4573, 0.4582, 0.4591, 0.4599, 0.4608, 0.4616, 0.4625, 0.4633],
        [0.4641, 0.4649, 0.4656, 0.4664, 0.4671, 0.4678, 0.4686, 0.4693, 0.4699, 0.4706],
        [0.4713, 0.4719, 0.4726, 0.4732, 0.4738, 0.4744, 0.4750, 0.4756, 0.4761, 0.4767],
        [0.4772, 0.4778, 0.4783, 0.4788, 0.4793, 0.4798, 0.4803, 0.4808, 0.4812, 0.4817],
        [0.4821, 0.4826, 0.4830, 0.4834, 0.4838, 0.4842, 0.4846, 0.4850, 0.4854, 0.4857],
        [0.4861, 0.4864, 0.4868, 0.4871, 0.4875, 0.4878, 0.4881, 0.4884, 0.4887, 0.4890],
        [0.4893, 0.4896, 0.4898, 0.4901, 0.4904, 0.4906, 0.4909, 0.4911, 0.4913, 0.4916],
        [0.4918, 0.4920, 0.4922, 0.4925, 0.4927, 0.4929, 0.4931, 0.4932, 0.4934, 0.4936],
        [0.4938, 0.4940, 0.4941, 0.4943, 0.4945, 0.4946, 0.4948, 0.4949, 0.4951, 0.4952],
        [0.4953, 0.4955, 0.4956, 0.4957, 0.4959, 0.4960, 0.4961, 0.4962, 0.4963, 0.4964],
        [0.4965, 0.4966, 0.4967, 0.4968, 0.4969, 0.4970, 0.4971, 0.4972, 0.4973, 0.4974],
        [0.4974, 0.4975, 0.4976, 0.4977, 0.4977, 0.4978, 0.4979, 0.4979, 0.4980, 0.4981],
        [0.4981, 0.4982, 0.4982, 0.4983, 0.4984, 0.4984, 0.4985, 0.4985, 0.4986, 0.4986],
        [0.4987, 0.4987, 0.4987, 0.4988, 0.4988, 0.4989, 0.4989, 0.4989, 0.4990, 0.4990],
        [0.4990, 0.4991, 0.4991, 0.4991, 0.4992, 0.4992, 0.4992, 0.4992, 0.4993, 0.4993],
        [0.4993, 0.4993, 0.4994, 0.4994, 0.4994, 0.4994, 0.4995, 0.4995, 0.4995, 0.4995],
        [0.4995, 0.4996, 0.4996, 0.4996, 0.4996, 0.4996, 0.4997, 0.4997, 0.4997, 0.4997],
        [0.4997, 0.4997, 0.4997, 0.4998, 0.4998, 0.4998, 0.4998, 0.4998, 0.4998, 0.4998],
        [0.4998, 0.4998, 0.4999, 0.4999, 0.4999, 0.4999, 0.4999, 0.4999, 0.4999, 0.4999],
        [0.4999, 0.4999, 0.4999, 0.4999, 0.5000, 0.5000, 0.5000, 0.5000, 0.5000, 0.5000],
    ];

    // Menghapus tanda negatif jika ada
    $z = abs($z);

    // Mendapatkan baris dan kolom dari z-tabel
    $row = floor($z * 10);
    $col = round(($z * 100) % 10);

    if ($row >= count($zTable) || $col >= count($zTable[0])) {
        return null; // Nilai Z berada di luar jangkauan tabel
    }

    return $zTable[$row][$col];
}

function ambil3desimal($number)
{
    $hasil = 0;
    if ($number < 0) {
        $hasil = substr($number, 0, 5);
    } else {
        $hasil = substr($number, 0, 4);
    }
    return $hasil;
}

function nilai_x_tabel($row, $colom) {
    // Tabel distribusi chi-square
    $tabel = array(
        '1' => array(
            '0.995' => 0.000,
            '0.99' => 0.000,
            '0.975' => 0.001,
            '0.95' => 0.004,
            '0.9' => 0.016,
            '0.1' => 2.706,
            '0.05' => 3.841,
            '0.025' => 5.024,
            '0.01' => 6.635,
            '0.005' => 7.879
        ),
        '2' => array(
            '0.995' => 0.010,
            '0.99' => 0.020,
            '0.975' => 0.051,
            '0.95' => 0.103,
            '0.9' => 0.211,
            '0.1' => 4.605,
            '0.05' => 5.991,
            '0.025' => 7.378,
            '0.01' => 9.210,
            '0.005' => 10.597
        ),
        '3' => array(
            '0.995' => 0.072,
            '0.99' => 0.115,
            '0.975' => 0.216,
            '0.95' => 0.352,
            '0.9' => 0.584,
            '0.1' => 6.251,
            '0.05' => 7.815,
            '0.025' => 9.348,
            '0.01' => 11.345,
            '0.005' => 12.838
        ),
        '4' => array(
            '0.995' => 0.207,
            '0.99' => 0.297,
            '0.975' => 0.484,
            '0.95' => 0.711,
            '0.9' => 1.064,
            '0.1' => 7.779,
            '0.05' => 9.488,
            '0.025' => 11.143,
            '0.01' => 13.277,
            '0.005' => 14.860
        ),
        '5' => array(
            '0.995' => 0.412,
            '0.99' => 0.554,
            '0.975' => 0.831,
            '0.95' => 1.145,
            '0.9' => 1.610,
            '0.1' => 9.236,
            '0.05' => 11.070,
            '0.025' => 12.833,
            '0.01' => 15.086,
            '0.005' => 16.750
        ),
        '6' => array(
            '0.995' => 0.676,
            '0.99' => 0.872,
            '0.975' => 1.237,
            '0.95' => 1.635,
            '0.9' => 2.204,
            '0.1' => 10.645,
            '0.05' => 12.592,
            '0.025' => 14.449,
            '0.01' => 16.812,
            '0.005' => 18.548
        ),
        '7' => array(
            '0.995' => 0.989,
            '0.99' => 1.239,
            '0.975' => 1.690,
            '0.95' => 2.167,
            '0.9' => 2.833,
            '0.1' => 12.017,
            '0.05' => 14.067,
            '0.025' => 16.013,
            '0.01' => 18.475,
            '0.005' => 20.278
        ),
        '8' => array(
            '0.995' => 1.344,
            '0.99' => 1.646,
            '0.975' => 2.180,
            '0.95' => 2.733,
            '0.9' => 3.490,
            '0.1' => 13.362,
            '0.05' => 15.507,
            '0.025' => 17.535,
            '0.01' => 20.090,
            '0.005' => 21.955
        ),
        '9' => array(
            '0.995' => 1.735,
            '0.99' => 2.088,
            '0.975' => 2.700,
            '0.95' => 3.325,
            '0.9' => 4.168,
            '0.1' => 14.684,
            '0.05' => 16.919,
            '0.025' => 19.023,
            '0.01' => 21.666,
            '0.005' => 23.589
        ),
        '10' => array(
            '0.995' => 2.156,
            '0.99' => 2.558,
            '0.975' => 3.247,
            '0.95' => 3.940,
            '0.9' => 4.865,
            '0.1' => 15.987,
            '0.05' => 18.307,
            '0.025' => 20.483,
            '0.01' => 23.209,
            '0.005' => 25.188
        )
    );

    if (array_key_exists($row, $tabel)) {
        $keys = array_keys($tabel[$row]);
        if ($colom <= $keys[0]) {
            return $tabel[$row][$keys[0]];
        } elseif ($colom >= $keys[count($keys) - 1]) {
            return $tabel[$row][$keys[count($keys) - 1]];
        } else {
            for ($i = 0; $i < count($keys) - 1; $i++) {
                if ($colom > $keys[$i] && $colom < $keys[$i + 1]) {
                    $x1 = $keys[$i];
                    $x2 = $keys[$i + 1];
                    $y1 = $tabel[$row][$x1];
                    $y2 = $tabel[$row][$x2];
                    return round(((($y2 - $y1) / ($x2 - $x1)) * ($colom - $x1)) + $y1, 3);
                }
            }
        }
    } else {
        return "Nilai row tidak valid.";
    }
}

if (isset($_POST['submit'])) {
    $input_data = $_POST['input_data'];
    $input_fi = $_POST['input_fi'];
    $parse_data = explode(",", $input_data);
    $data_fi = explode(",", $input_fi);
    $array = [];
    $totals = [];
    foreach ($parse_data as $index => $d) {
        $nilai_x_array = explode("-", $d);
        $nilai_xi = ($nilai_x_array[0] + $nilai_x_array[1]) / 2;
        $nilai_fi = $data_fi[$index];
        $nilai_fixi = $nilai_xi * $nilai_fi;
        $nilai_xi2 = $nilai_xi * $nilai_xi;
        $nilai_fixi2 = $nilai_fi * $nilai_xi2;
        $array[] = [
            "data" => $d,
            "xi" => $nilai_xi,
            "fi" => $nilai_fi,
            "fixi" => $nilai_fixi,
            "xi2" => $nilai_xi2,
            "fixi2" => $nilai_fixi2
        ];
        @$totals['data'] = "Total";
        @$totals['xi'] += $nilai_xi;
        @$totals['fi'] += $nilai_fi;
        @$totals['fixi'] += $nilai_fixi;
        @$totals['xi2'] += $nilai_xi2;
        @$totals['fixi2'] += $nilai_fixi2;
    }
    $banyaknya_kelas = count($array);
    $output = true;
}
?>

<!-- fron end -->
<div class="flex flex-col gap-6">
    <form action="" method="post" class="flex flex-col gap-4 p-0 m-0">
        <div class="flex flex-col gap-1">
            <label for="input_data">Data Range</label>
            <input class="input" name="input_data" id="input_data" rows="2" placeholder="Masukan Data, Pisahkan dengan Koma (cth. 10-20,21-30..." value="<?= $input_data; ?>" required />
        </div>
        <div class="flex flex-col gap-1">
            <label for="input_fi">Input fi (Jumlah)</label>
            <input class="input" name="input_fi" id="input_fi" rows="2" placeholder="Masukan Data, Pisahkan dengan Koma" value="<?= $input_fi; ?>" required />
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
                    <h2 class="info">Tabel Distribusi Frekuensi</h2>
                    <div class="table-container">
                        <table class="border border-slate-300">
                            <thead class="text-white bg-blue-500">
                                <tr class="*:px-2 *:py-2 *:border *:border-blue-400 *:text-center">
                                    <td>Data</td>
                                    <td>Xi</td>
                                    <td>fi</td>
                                    <td>fiXi</td>
                                    <td>Xi<sup>2</sup></td>
                                    <td>fixi<sup>2</sup></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($array as $dat) : ?>
                                    <tr class="*:px-2 *:py-2 *:border *:border-slate-200 *:bg-white *:text-center">
                                        <?php foreach ($dat as $key => $d) : ?>
                                            <td><?php
                                                if ($key == "data") echo $d;
                                                else echo number_format($d);
                                                ?></td>
                                        <?php endforeach; ?>
                                    </tr>
                                <?php endforeach; ?>
                                <tr class="*:px-2 *:py-2 *:border *:border-blue-400 *:text-center bg-blue-500 text-white">
                                    <?php foreach ($totals as $key => $d) : ?>
                                        <td><?php
                                            if ($key == "data") echo $d;
                                            else echo number_format($d);
                                            ?></td>
                                    <?php endforeach; ?>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <h2 class="info">Langkah 1 : Merumuskan Hipotesis</h2>
                    <div class="table-container">
                        <table class="table-data">
                            <tbody>
                                <tr>
                                    <td class="pl-4">H0</td>
                                    <td>=</td>
                                    <td class="w-full">Data berdistribusi normala</td>
                                </tr>
                                <tr>
                                    <td class="pl-4">H1</td>
                                    <td>=</td>
                                    <td class="w-full">Data tidak berdistribusi normal</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <h2 class="info">Langkah 2 : Menentukan nilai uji statistic</h2>
                    <h2 class="info">Rata-rata</h2>
                    <table class="table-data">
                        <tbody>
                            <tr>
                                <td class="pl-4">X rata-rata</td>
                                <td>=</td>
                                <td class="w-full">∑fixi / ∑fi</td>
                            </tr>
                            <tr>
                                <td class="pl-4">X rata-rata</td>
                                <td>=</td>
                                <td class="w-full"><?= number_format($totals['fixi']) . " / " . number_format($totals['fi']); ?></td>
                            </tr>
                            <tr>
                                <td class="pl-4">X rata-rata</td>
                                <td>=</td>
                                <td class="w-full"><?php $x_rata_rata = $totals['fixi'] / $totals['fi'];
                                                    echo number_format($x_rata_rata, 2); ?></td>
                            </tr>
                        </tbody>
                    </table>

                    <h2 class="info">Standar Deviasi</h2>
                    <table class="table-data">
                        <tbody>
                            <tr>
                                <td class="pl-4">SD</td>
                                <td>=</td>
                                <td class="w-full">√∑fixi/n - (∑fixi/n)<sup>2</sup></td>
                            </tr>
                            <tr>
                                <td class="pl-4">SD</td>
                                <td>=</td>
                                <td class="w-full">√<?= number_format($totals['fixi2']); ?>/<?= number_format($totals['fi']); ?> - (<?= number_format($totals['fixi']); ?>/<?= number_format($totals['fi']); ?>)<sup>2</sup></td>
                            </tr>
                            <tr>
                                <td class="pl-4">SD</td>
                                <td>=</td>
                                <td class="w-full"><?php $sd = sqrt(($totals['fixi2'] / $totals['fi']) - (($totals['fixi'] / $totals['fi']) * ($totals['fixi'] / $totals['fi'])));
                                                    echo number_format($sd, 2); ?></td>
                            </tr>
                        </tbody>
                    </table>


                    <?php
                    $array2 = [];
                    $total_ei_lanjutan = 0;
                    foreach ($array as $d) {
                        $parse_data = explode("-", $d['data']);
                        $data_1 = $parse_data[0];
                        $data_2 = $parse_data[1];
                        $bt1    = $data_1 - 0.5;
                        $bt2    = $data_2 + 0.5;
                        $nilaiz_1 = (number_format($bt1, 1) - number_format($x_rata_rata, 2)) / number_format($sd, 2);
                        $nilaiz_2 = (number_format($bt2, 1) - number_format($x_rata_rata, 2)) / number_format($sd, 2);
                        $nilaiz_1 = number_format($nilaiz_1,2);
                        $nilaiz_2 = number_format($nilaiz_2,2);
                        $hasilz_1 = cariNilaiZ($nilaiz_1);
                        $hasilz_2 = cariNilaiZ($nilaiz_2);
                        $luas_tiap_interval = 0;
                        $symbol = "";
                        if (($nilaiz_1 >= 0 && $nilaiz_2 >= 0) || ($nilaiz_1 < 0 && $nilaiz_2 < 0)) {
                            $luas_tiap_interval = $hasilz_1 - $hasilz_2;
                            $symbol = "-";
                        } else {
                            $luas_tiap_interval = $hasilz_1 + $hasilz_2;
                            $symbol = "+";
                        }
                        $oi = $d['fi'];
                        $ei = $luas_tiap_interval * $totals['fi'];
                        $oi_ei = $oi-$ei;
                        $oi_ei2 = $oi_ei * $oi_ei;
                        $ei_lanjutan = $oi_ei2 / $ei;
                        $total_ei_lanjutan += $ei_lanjutan;
                        $array2[] = [
                            "data" => $d['data'],
                            "oi" => $d['fi'],
                            "batas_kelas" => number_format($bt1, 1) . "-" . number_format($bt2, 1),
                            "nilai_z" => $nilaiz_1 . " dan " . $nilaiz_2,
                            "data_z" => $hasilz_1 . "$symbol" . $hasilz_2,
                            "luas_tiap_interval" => $luas_tiap_interval,
                            "ei" => $luas_tiap_interval * $totals['fi'],
                            "ei_lanjutan" => number_format($ei_lanjutan,4)
                        ];
                    }
                    ?>

                    <h2 class="info">Membuat tabel frekuensi ekspektasi dan pengamatan</h2>
                    <div class="table-container">
                        <table class="border border-slate-300">
                            <thead class="text-white bg-blue-500">
                                <tr class="*:px-2 *:py-2 *:border *:border-blue-400 *:text-center">
                                    <td>Data</td>
                                    <td>Oi</td>
                                    <td>Batas Kelas</td>
                                    <td>Nilai z</td>
                                    <td>Data z</td>
                                    <td>Luas tiap k. interval</td>
                                    <td>Ei</td>
                                    <td>(Oi-Ei)<sup>2</sup> / Ei</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($array2 as $d) : ?>
                                    <tr class="*:px-2 *:py-2 *:border *:border-slate-200 *:bg-white *:text-center">
                                        <?php foreach ($d as $row) : ?>
                                            <td>
                                                <?= $row; ?>
                                            </td>
                                        <?php endforeach; ?>
                                    </tr>
                                <?php endforeach; ?>
                                <tr class="*:px-2 *:py-2 *:border *:border-blue-400 *:text-center bg-blue-500 text-white">
                                    <td>Total</td>
                                    <td><?= $totals['fi']; ?></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>X<sup>2</sup></td>
                                    <td><?= number_format($total_ei_lanjutan,4); ?></td>
                                </tr>
                            </tbody>
                        </table>
                        <?php $x_hitung = $total_ei_lanjutan;?>
                    </div>

                    <h2 class="info">Menentukan a</h2>
                    <table class="table-data">
                        <tbody>
                            <tr>
                                <td class="pl-4">a</td>
                                <td>=</td>
                                <td class="w-full">5%</td>
                            </tr>
                        </tbody>
                    </table>

                    <h2 class="info">Menentukan derajat bebas</h2>
                    <table class="table-data">
                        <tbody>
                            <tr>
                                <td class="pl-4">DK</td>
                                <td>=</td>
                                <td class="w-full">Banyaknya kelas - 3</td>
                            </tr>
                            <tr>
                                <td class="pl-4">DK</td>
                                <td>=</td>
                                <td class="w-full"><?= $banyaknya_kelas;?> - 3</td>
                            </tr>
                            <tr>
                                <td class="pl-4">DK</td>
                                <td>=</td>
                                <td class="w-full"><?php $dk = $banyaknya_kelas-3;
                                echo $dk;?></td>
                            </tr>
                        </tbody>
                    </table>

                    <h2 class="info">Menentukan X<sup>2</sup> tabel</h2>
                    <table class="table-data">
                        <tbody>
                            <tr>
                                <td class="pl-4">X<sup>2</sup>tabel</td>
                                <td>=</td>
                                <td class="w-full">X<sup>2</sup>(5%,<?=$dk;?>)</td>
                            </tr>
                            <tr>
                                <td class="pl-4">X<sup>2</sup>tabel</td>
                                <td>=</td>
                                <td class="w-full">Lihat taabel X (baris 5, kolom <?= $dk;?>) : <?php $x_tabel = nilai_x_tabel($dk, 0.05);
                                echo $x_tabel;?></td>
                            </tr>
                        </tbody>
                    </table>

                    <h2 class="info">Menentukan kriteria pengujian hipotesis</h2>
                    <table class="table-data">
                        <tbody>
                            <tr>
                                <td class="pl-4">H0</td>
                                <td>=</td>
                                <td class="w-full">Ditolak jika X<sup>2</sup>hitung >= X<sup>2</sup>tabel</td>
                            </tr>
                            <tr>
                                <td class="pl-4">H0</td>
                                <td>=</td>
                                <td class="w-full">Diterima jika X<sup>2</sup>hitung <   X<sup>2</sup>tabel</td>
                            </tr>
                            <tr>
                                <td class="pl-4"></td>
                                <td>=</td>
                                <td class="w-full"><?php
                                $keterangan = "";
                                if($x_hitung>=$x_tabel){
                                    $keterangan = "Karena Xhitung >= Xtabel, maka H0 ditolak";
                                }else {
                                    $keterangan = "Karena Xhitung < Xtabel, maka H0 diterima, artinya data berdistribusi normal";
                                }
                                echo $keterangan;
                                ?></td>
                            </tr>
                        </tbody>
                    </table>

                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
</div>