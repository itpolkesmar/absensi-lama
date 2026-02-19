{!!modal(true,'modal_absensi')!!}
<div class="box-header with-border">
    &nbsp;
    <div class="box-tools pull-right">
        {!! Form::open(array('url' => \Request::path(), 'method' => 'GET', 'class' => 'form-'.\Config::get('claravel::ajax'),'id' => 'cari' )) !!}
        {!! Form::hidden('id_unit',$id_unit) !!}
        {!! Form::hidden('bulan',$bulan) !!}
        {!! Form::hidden('tahun',$tahun) !!}
        {!!csrf_field()!!}
        <div class="input-group" style="width: 400px;">
            <input type="text" class="form-control" name="search" value="{!! \Input::get('search')!!}" placeholder="Input Nama / NIP">
            <span class="input-group-btn">
                <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span> Cari</button>
            </span>
        </div>
        {!! Form::close() !!}
    </div>
</div>

<a href="" id="rekap" class="btn btn-primary"><span class="glyphicon glyphicon-print"></span> Cetak Rekap Absensi</a>
&nbsp;

@if(get_role()<=3)
	<!-- <a href="" id="proses" class="btn btn-primary">Proses Rekap Absensi</a>
    &nbsp; -->
    <a href="" id="blangko" class="btn btn-primary"><span class="glyphicon glyphicon-print"></span> Cetak Blangko LP</a>
    &nbsp;
    <a href="" id="rekap_potongan" class="btn btn-primary"><span class="glyphicon glyphicon-print"></span> Cetak Rekap Potongan Remun</a>
    &nbsp;
@endif

<br>
<br>
<a href="" id="sinkron" class="btn btn-warning" id_unit="{{$id_unit}}" bulan="{{$bulan}}" tahun="{{$tahun}}"><span class="glyphicon glyphicon-refresh"></span> Sinkronisasi</a>
&nbsp;
<p style="font-size: 11pt"><b>Tekan tombol ini apabila ada data yang tidak sesuai atau setelah melakukan perubahan jadwal shift</b></p>

<?php
    $jml_hari = date('t',strtotime($tahun.'-'.$bulan.'-01'));
?>
<!-- 
<h4>Data dibawah ini adalah data yang sudah di <b>Proses Rekap</b> (bukan data realtime)
<br>
Mohon Klik pada <b>Proses Rekap Absensi</b> untuk mengupdate data rekap absensi yang terbaru</h4>
 -->

<!-- <h4>Rekap Absensi masih dalam perbaikan, untuk melihat data absensi realtime bisa diakses melalui menu Log Absensi</h4> -->

<div class="table-responsive" style="font-size: 9.5pt;margin-top: 10px">
    <div class="box-body no-padding">
        <table class="table table-striped table-hover table-condensed table-bordered" id='tabel'>
            <thead class="bg-primary">
                <tr>
                    <th class="text-center" rowspan="2">No</th>
                    <th class="text-center" rowspan="2">Nama / NIP</th>
                    <th class="text-center" colspan="{!!$jml_hari!!}">TANGGAL / ABSENSI</th>
                    <th class="text-center" colspan="5">Keterangan</th>
                    <th class="text-center" rowspan="2">Act.</th>
                </tr>
                <tr>
                    @for($i=1; $i<=$jml_hari; $i++)
                        <th class="text-center">{!!$i!!}</th>
                    @endfor
                    <th class="text-center">S</th>
                    <th class="text-center">I</th>
                    <th class="text-center">TK</th>
                    <th class="text-center">CT</th>
                    <th class="text-center">DL</th>
                </tr>
            </thead>   

            <tbody style="font-size: 9pt">
            <?php 
                $data = \PegawaiModel::orderBy('id_unit');
                if($id_unit>0) {
                    $data = $data->where('id_unit','=',$id_unit);
                }
                if(isset($search) && strlen($search)>0) {
                    $data = $data->where(function($query) use ($search)
                                {
                                    $query->orwhere('nama', 'like', '%'.$search.'%')
                                          ->orwhere('nip', 'like', '%'.$search.'%');
                                });   
                }
                $data = $data
                            ->orderBy('mst_pegawai.pin','asc')
                            ->paginate($_ENV['configurations']['list-limit']);
                $page = isset($page)?$page:1;
                $no = ($_ENV['configurations']['list-limit']*$page)-$_ENV['configurations']['list-limit']+1;
            ?>
            @foreach ($data as $row)
                <?php
                    $sakit = 0;
                    $ijin = 0;
                    $tanpa_ket = 0;
                    $cuti = 0;
                    $dinas_luar = 0;
                ?>
                <tr>
                    <td class="text-center">{!!$no++!!}</td>
                    <td>
                        {!!$row->nama!!}<br>
                        {!!$row->nip!!}<br>
                        {!!$row->pin!!}
                    	@if($row->is_shift==1)
                    	<br>(Shift)
                    	@endif 
                    </td>
                    @for($i=1; $i<=$jml_hari; $i++)
                        <?php
                            $tanggal = $tahun.'-'.sprintf("%02d", $bulan).'-'.sprintf("%02d", $i);
                            $hari = date('D', strtotime($tanggal));
                            $libur = \HariliburModel::where('tanggal','=',$tanggal)->first();
                        ?>
                    	@if($row->is_shift==1) 
                            <?php
                                $cek_ijin = \DB::table('tr_ijin')
                                            ->leftJoin('mst_ijin','mst_ijin.id','=','tr_ijin.jns_ijin')
                                            ->select('tr_ijin.*','mst_ijin.nama as ijin','mst_ijin.singkatan')
                                            ->where('nip','=',$row->nip)
                                            ->whereDate('tanggal_mulai','<=',$tanggal)
                                            ->whereDate('tanggal_selesai','>=',$tanggal)
                                            ->first();
                            ?>
                            @if($cek_ijin)
                                <td class="text-center" style="font-size: 7pt;background-color: lightblue;">
                                    {!!$cek_ijin->ijin!!}
                                </td>
                                <?php
                                    if($cek_ijin->singkatan=='I') {
                                        $ijin++;
                                    }elseif($cek_ijin->singkatan=='DL') {
                                        $dinas_luar++;
                                    }elseif($cek_ijin->singkatan=='C') {
                                        $cuti++;
                                    }elseif($cek_ijin->singkatan=='S') {
                                        $sakit++;
                                    }
                                ?>
                            @else
                        		<?php
    								$shift = \JadwalshiftModel::
    											leftJoin('mst_shift','mst_shift.id','=','tr_jadwal_shift.id_shift')
    											->select('mst_shift.*')
    											->where('nip','=',$row->nip)
    											->where('tanggal','=',$tanggal)
    											->get();

    								$arr_absen = array();
    								$arr_shift = array();

    								$arr_kurang_datang = array();
    								$arr_kurang_pulang = array();

                                    $temp_jam_pulang = '';

                    				$shift_ke = 0;
                    				$index_ke = 0;

                    				if(count($shift)==0) {
    									echo '<td></td>';
                    				} else {
    									foreach ($shift as $s) {
    										$jns_shift = $s->singkatan;
    					                    $batas_datang = intval(substr($s->jam_datang,0,2))-2;
    					                    $batas_pulang = intval(substr($s->jam_pulang,0,2))+2;

    					                    //jika ada 2/lebih yang nyambung jam nya maka disela2 jam tidak perlu absen
    					                    if($temp_jam_pulang==$s->jam_datang) {
    					                        $arr_kurang_datang[$shift_ke] = 0;
    					                        $arr_kurang_pulang[$shift_ke-1] = 0;       
    	                                        $arr_absen[$index_ke-1] = '====='; 
    	                                        array_push($arr_absen, '=====');
    	                                        array_push($arr_shift, $jns_shift);                                   
    					                    } else {
    					                        //ambil absen datang untuk shift tsb itu
    					                        $datang = \DB::table('tr_shift_absen')
    					                                    ->where('nip','=',$row->nip)
    					                                    ->where('tanggal','=',$tanggal)
    					                                    ->where(\DB::Raw('CAST(substring(jam,1,2) AS UNSIGNED)'),'>=',$batas_datang)
    					                                    ->orderBy('jam','asc')
    					                                    ->first();

    	                                        //array push utk menyimpan ke dalam array dan dicetak setelah loopuing shift
    	                                        if($datang) {                
    	                                            array_push($arr_absen, $datang->jam);
    	                                        } else {
    	                                            array_push($arr_absen, '-');
    	                                        }
    	                                        array_push($arr_shift, $jns_shift);   
    					                    }

    					                    //jika shift malam makanya pulangnya ambil di tanggal berikutnya
    					                    $tanggal_berikutnya = date('Y-m-d',strtotime($tanggal. "+1 days"));
    					                    if($jns_shift=='M') {                                        
    					                        //ambil absen pulang untuk shift tsb itu
    					                        $pulang = \DB::table('tr_shift_absen')
    					                                    ->where('nip','=',$row->nip)
    					                                    ->where('tanggal','=',$tanggal_berikutnya)
    					                                    ->where(\DB::Raw('CAST(substring(jam,1,2) AS UNSIGNED)'),'<=',$batas_pulang)
    					                                    ->orderBy('jam','desc')
    					                                    ->first();
    					                    } else {          
    					                        //ambil absen pulang untuk shift tsb itu
    					                        $pulang = \DB::table('tr_shift_absen')
    					                                    ->where('nip','=',$row->nip)
    					                                    ->where('tanggal','=',$tanggal)
    					                                    ->where(\DB::Raw('CAST(substring(jam,1,2) AS UNSIGNED)'),'<=',$batas_pulang)
    					                                    ->orderBy('jam','desc')
    					                                    ->first();
    					                    }
    					                    

    	                                    //array push utk menyimpan ke dalam array dan dicetak setelah loopuing shift
    	                                    if($pulang && !in_array($pulang->jam, $arr_absen)) {
    	                                        array_push($arr_absen, $pulang->jam);
    	                                    } else {
    	                                        array_push($arr_absen, '-');
    	                                    }
    	                                    array_push($arr_shift, $jns_shift);

    					                    $jam_kerja_datang = strtotime($s->jam_datang);
    					                    $jam_kerja_pulang = strtotime($s->jam_pulang);

    					                    if($datang && $pulang) {
    					                        //mengecek jika ada terlambat atau pulang cepat
    					                        $str_jam_datang = strtotime($datang->jam);
    					                        $str_jam_pulang = strtotime($pulang->jam);
    					                        if($temp_jam_pulang!=$s->jam_datang) {
    					                            $arr_kurang_datang[$shift_ke] = ($str_jam_datang - $jam_kerja_datang)/60<0?0:($str_jam_datang-$jam_kerja_datang)/60;
    					                        }
    					                        $arr_kurang_pulang[$shift_ke] = ($str_jam_pulang - $jam_kerja_pulang)/60>0?0:($jam_kerja_pulang-$str_jam_pulang)/60;
    					                    } elseif($jns_shift=='M') { 
    					                        if($temp_jam_pulang!=$s->jam_datang) {
    					                            $arr_kurang_datang[$shift_ke] = 
    					                                round(abs(strtotime(date('H:i:s',strtotime('23:59:00'))) - $jam_kerja_datang)/60,2)
    					                                    + round(abs($jam_kerja_pulang - strtotime(date('H:i:s',strtotime('00:00:00'))))/60,2)
    					                                    + 1;
    					                        }
    					                    } else {
    					                        if($temp_jam_pulang!=$s->jam_datang) {
    					                            $arr_kurang_datang[$shift_ke] = round(abs($jam_kerja_pulang - $jam_kerja_datang)/60,2);
    					                        }
    					                    }
    					                    $index_ke++;
    					                    $shift_ke++;
    					                    $temp_jam_pulang = $s->jam_pulang;
    					                
    	                                    if(count($arr_absen)==2 && $datang && $pulang) {
    	                                        //mengecek jika ada terlambat atau pulang cepat
    	                                        $jam_kerja_datang = strtotime($s->jam_datang);
    	                                        $jam_kerja_pulang = strtotime($s->jam_pulang);
    	                                        $str_jam_datang = strtotime($datang->jam);
    	                                        $str_jam_pulang = strtotime($pulang->jam);
    	                                        if($temp_jam_pulang!=$s->jam_datang) {
    	                                            $arr_kurang_datang[$shift_ke] = ($str_jam_datang - $jam_kerja_datang)/60<0?0:($str_jam_datang-$jam_kerja_datang)/60;
    	                                        }
    	                                        $arr_kurang_pulang[$shift_ke] = ($str_jam_pulang - $jam_kerja_pulang)/60>0?0:($jam_kerja_pulang-$str_jam_pulang)/60;
    	                                    }
    	                                    $index_ke++;
    	                                    $shift_ke++;
    	                                    $temp_jam_pulang = $s->jam_pulang;
    	                                }
    	                                if(in_array('-',$arr_absen)) {
    	                                    $bg = 'background-color:lightcoral';
    	                                } elseif (array_sum($arr_kurang_datang)>0 || array_sum($arr_kurang_pulang)>0) {
    	                                    $bg = 'background-color:lightgoldenrodyellow';
    	                                } else {
    	                                    $bg = 'background-color:lightgreen';
    	                                }

    	                                echo '<td class="text-center" style="white-space: nowrap;font-size: 7pt;'.$bg.'">';
    	                                for($j=0;$j<count($arr_shift);$j++) {
    	                                    echo '<b>'.$arr_shift[$j].'</b> '.substr($arr_absen[$j],0,5).'<br>';
    	                                }
    	                                echo '</td>';
    	                            }
                        		?>
                            @endif
                    
                            <td class="text-center"></td>
                        @else
                            <?php
                                $cek = \RekapabsensiModel::
                                            where('nip','=',$row->nip)
                                            ->where('tanggal','=',$tanggal)
                                            ->first();

                                $jam_kerja = \JamkerjaModel::where('tahun','=',$tahun)
                                                ->where('hari','=',$hari)
                                                ->first();
                                $cek_ijin = \DB::table('tr_ijin')
                                            ->leftJoin('mst_ijin','mst_ijin.id','=','tr_ijin.jns_ijin')
                                            ->select('tr_ijin.*','mst_ijin.nama as ijin','mst_ijin.singkatan')
                                            ->where('nip','=',$row->nip)
                                            ->whereDate('tanggal_mulai','<=',$tanggal)
                                            ->whereDate('tanggal_selesai','>=',$tanggal)
                                            ->first();

                            ?>
                            @if($cek_ijin)
                                <td class="text-center" style="font-size: 7pt;background-color: lightblue;">
                                    {!!$cek_ijin->ijin!!}
                                </td>
                                <?php
                                    if($cek_ijin->singkatan=='I') {
                                      $ijin++; } 
                                    elseif                                   
                                    ($cek_ijin->singkatan=='DL') {
                                        $dinas_luar++;
                                    }elseif($cek_ijin->singkatan=='C') {
                                        $cuti++;
                                    }elseif($cek_ijin->singkatan=='S') {
                                        $sakit++;
                                    }
                                ?>
                            @else
                                <?php
                                	$bg = '';
                                	if($cek) {
                                		if($cek->jam_datang=='00:00:00' && $cek->jam_pulang=='00:00:00') {
                                            $bg = 'lightgray';
                                            $tanpa_ket++;
                                        } elseif($cek->jam_datang=='00:00:00' || $cek->jam_pulang=='00:00:00') {
                                        	$bg = 'lightcoral';
                                        } elseif($cek->kurang_datang>0 || $cek->kurang_pulang>0) {
                                        	$bg = 'gold';
                                        } else {
                                        	$bg = 'lightgreen';
                                        }
                                    }
                                ?>
                                <td class="text-center" style="font-size: 7pt;background-color:{!!$bg!!};">
                                	@if($cek)
	                                    {!!substr($cek->jam_datang,0,5)!!}<br>
	                                    {!!substr($cek->jam_pulang,0,5)!!}
                                    @else
	                                    -<br>-
                                    @endif
                                </td>
                            @endif
                        @endif
                    @endfor
                    <td class="text-center">{!! $sakit !!}</td>
                    <td class="text-center">{!! $ijin !!}</td>
                    <td class="text-center">{!! $tanpa_ket !!}</td>
                    <td class="text-center">{!! $cuti !!}</td>
                    <td class="text-center">{!! $dinas_luar !!}</td>
                    <td style="white-space: nowrap">
                        <a id='detail' href='' recid='{!!$row->nip!!}' class='text-info'>Detail</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="konten">{!!$data->appends(array('search' => Input::get('search'),'bulan' => $bulan, 'tahun' => $tahun,'id_unit' => $id_unit))->render()!!}</div>
    </div>
</div>   

<script>
    $(document).ready(function(){
        var index_page = '{!!url()!!}/absensi/rekapabsensi';

        $('#rekap').on('click',function(e){
            e.preventDefault();
            window.open(index_page+'/xls/rekap/{!!$id_unit!!}/{!!$bulan!!}/{!!$tahun!!}','_blank');
        });

        $('#blangko').on('click',function(e){
            e.preventDefault();
            window.open(index_page+'/xls/blangko/{!!$id_unit!!}/{!!$bulan!!}/{!!$tahun!!}','_blank');
        });

        $('#rekap_potongan').on('click',function(e){
            e.preventDefault();
            window.open(index_page+'/xls/rekap_potongan/{!!$id_unit!!}/{!!$bulan!!}/{!!$tahun!!}','_blank');
        });


        $('#proses').on('click',function(e){
        	e.preventDefault();
            var $this =$(this);
        	claravel_modal('Proses Rekap Absensi','<center><h3>Harap Tunggu</h3><div id="progres"></div><br><h3 id="konten_progres"</h3></center>','modal_rekap');
        	loading('progres');
            var prog = setInterval(function(){
                $.getJSON(index_page + '/progress', function(data) {
                    if(data[0]!==null) {
                        $('#konten_progres').html('Proses Generate : <b>'+data[0]+' %</b>');
                        if(data[0]>=95) {
                            clearInterval(prog);   
                            $('#konten_progres').html('<b>Proses Rekap Absensi Selesai</b>');
		                    claravel_modal_close('modal_rekap');
		                    notification('Proses Rekap Absensi Selesai','success'); 
		                    $('#tampil').trigger('submit');
                        }   
                    }
                });
            },500);
            $.get(
                index_page + '/posting',
                $('#tampil').serialize(),
                function() {
                    clearInterval(prog);   
                    $('#konten_progres').html('<b>Proses Rekap Absensi Selesai</b>');
                    claravel_modal_close('modal_rekap');
                    notification('Proses Rekap Absensi Selesai','success'); 
                    $('#tampil').trigger('submit');
                }
            );

        });

        $('#tabel').on('click','#detail',function(e){
            e.preventDefault();
            var $this =$(this);
            $.ajax({
                url : index_page + '/detail',
                type : 'get',
                data:'nip=' + $this.attr('recid') +
                        '&bulan={!!$bulan!!}' +
                        '&tahun={!!$tahun!!}',
                success:function(html){
                    claravel_modal('Detail Absensi',html,'modal_absensi');
                }
            });
        });
        
        $('#cari').on('submit',function(e){
            e.preventDefault();
            loading('konten');
            $.ajax({
                url : index_page + '/tampil',
                data:$(this).serialize(),
                type : 'get',
                success:function(html){
                    $('#konten').html(html);
                }
            });
        });

        $('#sinkron').on('click',function(e){
            e.preventDefault();
            loading('konten');
            $.ajax({
                url : index_page + '/posting',
                data:'id_unit={!!$id_unit!!}' +
                        '&bulan={!!$bulan!!}' +
                        '&tahun={!!$tahun!!}' +
                        '&sinkron=ya'+
                        '&nip=0',
                type : 'get',
                success:function(html){
                    $.ajax({
                        url  : index_page + '/tampil',
                        type : 'get',
                        data:'id_unit={!!$id_unit!!}' +
                                '&bulan={!!$bulan!!}' +
                                '&tahun={!!$tahun!!}' +
                                '&nip=0',
                        success:function(html){
                            $('#konten').html(html);   
                        }
                    });   
                }
            });
        });
    });
</script>