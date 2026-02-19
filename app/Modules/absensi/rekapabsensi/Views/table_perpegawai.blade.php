<?php
    $jml_hari = date('t',strtotime($tahun.'-'.$bulan.'-01'));
    $pegawai = \PegawaiModel::where('nip','=',$nip)->first();
?>
<div class="table-responsive" style="margin-top: 10px">
    <div class="box-body no-padding">
        <table class="table table-striped table-hover table-condensed table-bordered" id='tabel'>
            <thead class="bg-primary">
                <tr>
                    <th class="text-center">Tanggal</th>
                    <th class="text-center">Hari</th>
                    <th class="text-center">Jam Datang<br>Mode Absensi</th>
                    <th class="text-center">Jam Siang<br>Mode Absensi</th>
                    <th class="text-center">Jam Pulang<br>Mode Absensi</th>
                    <th class="text-center">Keterlambatan (menit)</th>
                    <th class="text-center">Pulang Cepat (menit)</th>
                </tr>
            </thead>   
            <tbody>
                @for($i=1; $i<=$jml_hari; $i++)
                    <?php
                        $tanggal = $tahun.'-'.sprintf("%02d", $bulan).'-'.sprintf("%02d", $i);
                        $hari = date('D', strtotime($tanggal));
                        $libur = \HariliburModel::where('tanggal','=',$tanggal)->first();

                        $absen = \RekapabsensiModel::
                                    where('nip','=',$pegawai->nip)
                                    ->whereDate('tanggal','=',$tanggal)
                                    ->first();

                        $absen->jam_datang = $absen->jam_datang=='00:00:00'?'-':$absen->jam_datang;
                        $absen->jam_tengah = $absen->jam_tengah=='00:00:00'?'-':$absen->jam_tengah;
                        $absen->jam_pulang = $absen->jam_pulang=='00:00:00'?'-':$absen->jam_pulang;

                        if($absen->kurang_datang>0 || $absen->kurang_pulang>0) {
                            $bg = 'lightcoral';
                        } else {
                            $bg = 'lightgreen';
                        }
                    ?>
                    @if($absen->is_libur==1)
                        <tr>
                            <td><b>{!!tanggal($tanggal)!!}</b></td>
                            <td><b>{!!konversi_hari($hari)!!}</b></td>
                            @if($libur)
                                <td colspan="6"><b>{!!$libur->keterangan!!}</b></td>
                            @else 
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            @endif
                        </tr>
                    @else
                        <?php
                            $verif_datang = getVerifyMode($absen->verif_datang);
                            $verif_tengah = getVerifyMode($absen->verif_tengah);
                            $verif_pulang = getVerifyMode($absen->verif_pulang);
                        ?>
                        <tr style="background-color: {!!$bg!!}">
                            <td>{!!tanggal($tanggal)!!}</td>
                            <td>{!!konversi_hari($hari)!!}</td>
                            <td class="text-center">{!!$absen->jam_datang!!}<br>{!!$verif_datang!!}</td>
                            <td class="text-center">{!!$absen->jam_tengah!!}<br>{!!$verif_tengah!!}</td>
                            <td class="text-center">{!!$absen->jam_pulang!!}<br>{!!$verif_pulang!!}</td>
                            <td class="text-center">{!!$absen->kurang_datang!!}</td>
                            <td class="text-center">{!!$absen->kurang_pulang!!}</td>
                        </tr>
                    @endif
                @endfor
            </tbody>
        </table>
    </div>
</div>   
