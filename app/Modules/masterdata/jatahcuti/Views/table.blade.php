<div class="box-header with-border">
    &nbsp;
    <div class="box-tools pull-right">
        {!! Form::open(array('url' => \Request::path(), 'method' => 'GET', 'class' => 'form-'.\Config::get('claravel::ajax'),'id' => 'cari' )) !!}
        {!! Form::hidden('id_unit',$id_unit) !!}
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
<div class="table-responsive">
    <div class="box-body no-padding">
        <table class="table table-striped table-hover table-condensed table-bordered" id='tabel'>
            <thead class="bg-primary" style="font-size: 10pt">
                <tr>
                    <th>Pegawai</th>
                    <th>NIP</th>
                    <th>Unit</th>
                    <th>Jatah Cuti</th>
                    <th>Act.</th>
                </tr>
            </thead>  
            <tbody>
            <?php
                //create record utk tiap pegawai (default) = 12
                // $pegawai = \PegawaiModel::get();
                // foreach ($pegawai as $peg) {
                //     $cek = \JatahcutiModel::where('nip','=',$peg->nip)
                //             ->where('tahun','=',$tahun)
                //             ->first();
                //     if(!$cek) {
                //         \JatahcutiModel::insert(array(
                //             'nip'   =>  $peg->nip,
                //             'tahun' =>  $tahun,
                //             'jumlah'=>  2));
                //     }
                // }
            ?>
            @foreach ($data as $row)
                <tr>
    				<td>{!!$row->nama!!}</td>
                    <td>{!!$row->nip!!}</td>
                    <td>{!!$row->unit!!}</td>
                    <td>{!!$row->jumlah!!}</td>
                    <td>
                        <a id='edit' href='' recid='{!!$row->id!!}' class='text-info'><i class='fa fa-pencil-square-o'></i> Edit</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>        
        <div class="konten">{!!$data->appends(array('search' => Input::get('search'),'tahun' => $tahun,'id_unit' => $id_unit))->render()!!}</div>
    </div>
</div>

{!! modal(true,'konten_modal')!!}
<script>
    $(document).ready(function(){
        var index_page = '{!!url()!!}/masterdata/jatahcuti';

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
            claravel_modal('Edit Jatah Cuti','Harap tunggu...','konten_modal');
            $.ajax({
                url : index_page + '/edit',
                type : 'get',
                data:'id=' + $this.attr('recid'),
                success:function(html){
                    $('#konten_modal .modal-body').html(html);
                }
            });
        });
    });
</script>
