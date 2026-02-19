<div class="box-header with-border">
    &nbsp;
    <div class="box-tools pull-right">
        {!! Form::open(array('url' => \Request::path(), 'method' => 'GET', 'class' => 'form-'.\Config::get('claravel::ajax'),'id' => 'cari' )) !!}
        {!! Form::hidden('id_unit',$id_unit) !!}
        {!! Form::hidden('tanggal',$tanggal) !!}
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
<!-- <a id='buat' href='' class='btn btn-primary'><i class='fa fa-plus-square'></i> Tambah Ijin</a> -->
<br>
{!! Form::open(array('url' => \Request::path().'/delete', 'method' => 'POST', 'class' => 'form-'.\Config::get('claravel::ajax'),'id'=>'data' )) !!}
<div class="table-responsive">
    <div class="box-body no-padding">
        <table class="table table-striped table-hover table-condensed table-bordered" id='tabel'>
            <thead class="bg-primary">
            <tr>
                <th class="text-center">Pin</th>
                <th>Pegawai</th>
                <!-- <th>NIP</th> -->
                <th>Unit</th>
                <th class="text-center">Jam Datang</th>
				<th class="text-center">Jam Siang</th>
				<th class="text-center">Jam Pulang</th>
				<th>Keterangan</th>
                <th>Act.</th>
            </tr>
            </thead>   
            <tbody>
            @foreach ($data as $row)
                @if(strlen($row->pegawai)>0)
                    <?php
                        $waktu = \LogabsensiModel::getLog($row->pin,$tanggal);
                    ?>
                    <tr>
                        <td class="text-center">{!!$row->pin!!}</td>
        				<td>{!!$row->pegawai!!}<br>{!!$row->nip!!}</td>
                        <td>{!!$row->unit!!}</td>
                        <td class="text-center">{!!waktu($waktu['datang'])!!}</td>
                        <td class="text-center">{!!waktu($waktu['tengah'])!!}</td>
                        <td class="text-center">{!!waktu($waktu['pulang'])!!}</td>
                        <td>{!!$row->keterangan!!}</td>
                        <td>
                            <a id='edit' href='' recid='{!!$row->id!!}' class='text-info'><i class='fa fa-pencil-square-o'></i> Edit Keterangan</a>
                        </td>
                    </tr>
                @endif
            @endforeach
            </tbody>
        </table>
        <div class="konten">{!!$data->appends(array('search' => Input::get('search'),'tanggal' => $tanggal,'id_unit' => $id_unit))->render()!!}</div>

    </div>
</div>
{!! Form::close() !!}       


{!!modal(true,'konten_modal')!!}
<script>
    $(document).ready(function(){
        var index_page = '{!!url()!!}/absensi/logabsensi';

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
