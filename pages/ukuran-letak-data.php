<!-- back end -->
<?php

$input_deret        = '';
$input_interval     = '';


if (isset($_POST['submit'])) {
    $input_deret        = $_POST['input_deret'];
    $output             = false;
    if ($input_deret != '') {
        $output             = true;
        $sorted_data        = explode(",", $input_deret);
        asort($sorted_data);
        $text_data          = implode(",", $sorted_data);
        $jumlah_data        = count($sorted_data);

        $array_quertil  = [1, 2, 3];
        $data_array     = [];
        foreach ($array_quertil as $nilai) {
            $q1                 = ($nilai * ($jumlah_data + 1)) / 4;
            $q1_1               = floor($q1);
            $q1_2               = $q1_1 + 1;
            $q1_pengali         = $q1 - $q1_1;

            $data_1             = $sorted_data[$q1_1 - 1];
            $data_2             = $sorted_data[$q1_2 - 1];
            $hasil              = $data_1 + $q1_pengali * ($data_2 - $data_1);

            $data_array[$nilai]['letak_q'] = ($nilai * ($jumlah_data + 1)) / 4;
            $data_array[$nilai]['data_1'] = floor($q1);
            $data_array[$nilai]['data_2'] = $q1_1 + 1;
            $data_array[$nilai]['pengali'] = $q1 - $q1_1;
            @$data_array[$nilai]['letak'][1] = "$nilai (n+1) / 4";
            @$data_array[$nilai]['letak'][2] = "$nilai ($jumlah_data+1) / 4";
            @$data_array[$nilai]['letak'][3] = "$nilai (" . ($jumlah_data + 1) . ") / 4";
            @$data_array[$nilai]['letak'][4] = ($nilai * ($jumlah_data + 1)) . " / 4";
            @$data_array[$nilai]['letak'][5] = ($nilai * ($jumlah_data + 1)) / 4;
            @$data_array[$nilai]['quartil'][1] = "X$q1_1 + $q1_pengali (X$q1_2 - X$q1_1)";
            @$data_array[$nilai]['quartil'][2] = "$data_1 + $q1_pengali ($data_2 - $data_1)";
            @$data_array[$nilai]['quartil'][3] = "$data_1 + $q1_pengali" . " * " . ($data_2 - $data_1);
            @$data_array[$nilai]['quartil'][4] = $hasil;
        }
    }
}
?>

<!-- fron end -->
<div class="flex flex-col gap-8">
    <form action="" method="post" class="flex flex-col gap-6 p-0 m-0">
        <div class="flex flex-col gap-2">
            <label for="input_deret">Deret Angka</label>
            <textarea class="input" name="input_deret" id="input_deret" rows="2" placeholder="Masukan Deret Angka, Pisahkan dengan koma, Contoh : 1,4,6,7,8,... dst"><?= $input_deret; ?></textarea>
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
                                    <td>=</td>
                                    <td class="w-full"><?= $text_data; ?></td>
                                </tr>
                                <tr>
                                    <td>Jumlah Data (n)</td>
                                    <td>=</td>
                                    <td class="w-full"><?= count($sorted_data); ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <?php foreach ($data_array as $nilai => $d) : ?>
                        <h2 class="info">Q<?= $nilai; ?></h2>
                        <div class="table-container">
                            <table class="table-data">
                                <tbody>
                                    <?php foreach ($d['letak'] as $l) : ?>
                                        <tr>
                                            <td>Letak Q<?= $nilai;?></td>
                                            <td>=</td>
                                            <td class="w-full">
                                                <span><?= $l;?></span>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    <?php foreach ($d['quartil'] as $l) : ?>
                                        <tr>
                                            <td>Q<?= $nilai;?></td>
                                            <td>=</td>
                                            <td class="w-full">
                                                <span><?= $l;?></span>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
</div>