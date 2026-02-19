<a id='buat' href='' class='btn btn-primary'><i class='fa fa-plus-square'></i> Tambah Ijin</a>
<br>
{!! Form::open(array('url' => \Request::path().'/delete', 'method' => 'POST', 'class' => 'form-'.\Config::get('claravel::ajax'),'id'=>'data' )) !!}
<div class="table-responsive">
    <div class="box-body no-padding">
        <table class="table table-striped table-hover table-condensed table-bordered" id='tabel'>
            <thead class="bg-primary">
            <tr>
                <th>Pegawai</th>
                <th>NIP</th>
                <th>Jam Datang</th>
				<th>Jam Siang</th>
				<th>Jam Pulang</th>
				<th>Keterangan</th>
                <th>Act.</th>
            </tr>
            </thead>   
            
            <tbody>
            <?php
                $data = \LogabsensiModel::
                            leftJoin('mst_pegawai','mst_pegawai.pin','=','att_log.pin')
                            ->leftJoin('mst_lokasi','mst_lokasi.sn','=','att_log.sn')
                            ->leftJoin('mst_unit','mst_unit.id','=','mst_pegawai.id_unit')
                            ->select('mst_unit.nama as unit',
                                'mst_lokasi.nama as lokasi',
                                'mst_pegawai.nama as pegawai','mst_pegawai.nip',
                                'att_log.*');
                if(isset($id_unit) && $id_unit>0) {
                    $data = $data->where('id_unit','like',$id_unit);        
                }
                $data = $data->where(\DB::Raw('YEAR(scan_date)'),'=',$tahun)
                            ->where(\DB::Raw('MONTH(scan_date)'),'=',$bulan)
                            ->orderBy('mst_pegawai.id','asc')
                            ->get();
            ?>
            @foreach ($data as $row)
                @if(strlen($row->pegawai)>0)
                    <tr>
        				<td>{!!$row->pegawai!!}</td>
                        <td>{!!$row->nip!!}</td>
                        <td>{!!$row->unit!!}</td>
                        <td>{!!tanggal($row->scan_date)!!}</td>
                        <td>{!!waktu($row->scan_date)!!}</td>
                        <td>{!!waktu($row->scan_date)!!}</td>
                        <td>{!!waktu($row->scan_date)!!}</td>
                        <td>{!!$row->keterangan!!}</td>
                        <td>
                            <a id='edit' href='' recid='{!!$row->id!!}' class='text-info'><i class='fa fa-pencil-square-o'></i> Edit Keterangan</a>
                        </td>
                    </tr>
                @endif
            @endforeach
            </tbody>
        </table>
    </div>
</div>
{!! Form::close() !!}       


{!!modal(true,'konten_modal')!!}
<script>
    $(document).ready(function(){
        var index_page = '{!!url()!!}/absensi/logabsensi';

        $('#tabel').on('click','#edit',function(e){
            e.preventDefault();
            var $this =$(this);
            bootbox.confirm('Edit?',function(a){
                if(a == true){
                    claravel_modal('Edit Ijin','Harap tunggu...','konten_modal');
                    $.ajax({
                        url : index_page + '/edit',
                        type : 'get',
                        data:'id=' + $this.attr('recid'),
                        success:function(html){
                            $('#konten_modal .modal-body').html(html);
                        }
                    });
                }
            });
        });
    });
</script>
