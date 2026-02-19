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
<style type="text/css">
    .modal .modal-body {
    max-height: 420px;
    overflow-y: auto;
}
</style>

<?php
    $jml_hari = date('t',strtotime($tahun.'-'.$bulan.'-01'));
?>

<div class="table-responsive">
    <div class="box-body no-padding">
        <table class="table table-striped table-hover table-condensed table-bordered" id='tabel' style="font-size: 9.5pt;">
            <thead class="bg-primary">
                <tr>
                    <th rowspan="2">Pegawai</th>
    			    <th colspan="{!!$jml_hari!!}">Tanggal</th>
                    <th rowspan="2">Act.</th>
                </tr>
                <tr>
                    @for($i=1; $i<=$jml_hari; $i++)
                        <th class="text-center">{!!$i!!}</th>
                    @endfor
                </tr>
            </thead>   
            <?php
                $data = \PegawaiModel::where('is_shift','=',1)->orderBy('id_unit');
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
                $data = $data->paginate($_ENV['configurations']['list-limit']);
            ?>
            <tbody>
            @foreach ($data as $row)
                <tr>
    				<td>{!!$row->nama!!}<br>{!!$row->nip!!}</td>
                    @for($i=1; $i<=$jml_hari; $i++)
                        <?php
                            $jadwal = '';
                            $shift = \JadwalshiftModel::
                                        leftJoin('mst_shift','mst_shift.id','=','tr_jadwal_shift.id_shift')
                                        ->select('mst_shift.singkatan')
                                        ->where('nip','=',$row->nip)
                                        ->whereDate('tanggal','=',$tahun.'-'.str_pad($bulan, 2,0,STR_PAD_LEFT).'-'.str_pad($i, 2,0,STR_PAD_LEFT))
                                        ->orderBy('jam_datang','asc')
                                        ->get();
                            foreach ($shift as $s) {
                                $jadwal .= $s->singkatan.'<br>';
                            }
                        ?>
                        <td class="text-center">{!!$jadwal!!}</td>
                    @endfor
                    <td>
                        <a href="" id="edit" class="btn btn-success btn-sm" nip="{!!$row->nip!!}">Edit</a>
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
        var index_page = '{!!url()!!}/absensi/jadwalshift'; 

        $('#tabel').on('click','#edit',function(e){
            e.preventDefault();
            var $this =$(this);
            bootbox.confirm('Edit?',function(a){
                if(a == true){
                    $.ajax({
                        url : index_page + '/edit',
                        type : 'get',
                        data:'nip=' + $this.attr('nip')+
                                '&bulan={!!$bulan!!}'+
                                '&tahun={!!$tahun!!}',
                        success:function(html){
                            claravel_modal('Edit Jadwal Shift',html,'modal_absensi');
                        }
                    });
                }
            });
        });
        $('#cari').on('submit',function(e){
            e.preventDefault();
            loading('konten');
            $.ajax({
                url : index_page + '/daftar',
                data:$(this).serialize(),
                type : 'get',
                success:function(html){
                    $('#konten').html(html);
                }
            });
        });

    });
</script>
