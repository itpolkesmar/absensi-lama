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
                <th>Unit</th>
                <th>Jenis Ijin</th>
				<th>Tanggal Mulai</th>
                <th>Tanggal Selesai</th>
				<th>File</th>
				<th>Keterangan</th>
                <th>Tanggal Upload</th>
                <th>Act.</th>
            </tr>
            </thead>   
            
            <tbody>
            <?php
                $berkasijins = \BerkasijinModel::
                                leftJoin('mst_pegawai','mst_pegawai.nip','=','tr_ijin.nip')
                                ->leftJoin('mst_unit','mst_unit.id','=','mst_pegawai.id_unit')
                                ->leftJoin('mst_ijin','mst_ijin.id','=','tr_ijin.jns_ijin')
                                ->select('mst_unit.nama as unit',
                                    'mst_pegawai.nama as pegawai','mst_pegawai.nip',
                                    'tr_ijin.*','mst_ijin.nama as ijin')
                                ->where(function($query) use ($tahun,$bulan)
                                    {
                                        $query->orWhere(function($query) use ($tahun,$bulan)
                                                    {
                                                        $query
                                                            ->where(\DB::Raw('YEAR(tanggal_selesai)'),'=',$tahun)
                                                            ->where(\DB::Raw('MONTH(tanggal_selesai)'),'=',$bulan);
                                                    })
                                              ->orWhere(function($query) use ($tahun,$bulan)
                                                    {
                                                        $query
                                                            ->where(\DB::Raw('YEAR(tanggal_mulai)'),'=',$tahun)
                                                            ->where(\DB::Raw('MONTH(tanggal_mulai)'),'=',$bulan);
                                                    });
                                    });

                if($id_unit>0) {
                    $berkasijins = $berkasijins->where('id_unit','=',$id_unit);
                }
                $berkasijins = $berkasijins->get();
            ?>
            @foreach ($berkasijins as $berkasijin)
            <tr>
				<td>{!!$berkasijin->pegawai!!}</td>
                <td>{!!$berkasijin->nip!!}</td>
                <td>{!!$berkasijin->unit!!}</td>
                <td>{!!$berkasijin->ijin!!}</td>
				<td>{!!tanggal($berkasijin->tanggal_mulai)!!}</td>
                <td>{!!tanggal($berkasijin->tanggal_selesai)!!}</td>
				<td><a href="{!!url()!!}/packages/upload/berkas/ijin/{!!$berkasijin->file!!}" target="_blank">File Ijin</a> </td>
				<td>{!!$berkasijin->keterangan!!}</td>
                <td>{!!tanggal($berkasijin->created_at)!!}</td>
                <td>
                {!! ClaravelHelpers::btnEdit($berkasijin->id) !!}
                &nbsp;
                {!! ClaravelHelpers::btnDelete($berkasijin->id) !!}
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
{!! Form::close() !!}       


{!!modal(true,'konten_modal')!!}
<script>
    $(document).ready(function(){
        var index_page = '{!!url()!!}/absensi/berkasijin';

        $('#buat').on('click',function(e){
            e.preventDefault();
            claravel_modal('Tambah Ijin','Harap tunggu...','konten_modal');
            $.ajax({
                url : index_page+'/create',
                type : 'get',
                success:function(html){
                    $('#konten_modal .modal-body').html(html);
                }
            });
        });
        $('#tabel').on('click','#hapus',function(e){
            e.preventDefault();
            var $this =$(this);
            bootbox.confirm('Hapus?',function(a){
                if(a == true){
                    $.ajax({
                        url : index_page + '/delete',
                        type : 'post',
                        data: {'id' : $this.attr('recid'), '_token' : '{!!csrf_token()!!}'},
                        success:function(html){
                            if(html==9) {
                                notification('Berhasil Dihapus','success');
                                $this.closest('tr').fadeOut(300,function(){
                                    $(this).remove();
                                });   
                            }
                        }
                    });
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
