<div class="table-responsive">
    <div class="box-body no-padding">
        <table class="table table-striped table-hover table-condensed table-bordered" id='tabel'>
            <thead class="bg-primary" style="font-size: 10pt">
                <?php
                    $jml_hari = date('t',strtotime($tahun.'-'.$bulan.'-01'));
                ?>
                <tr>
                    <th rowspan="2">Pegawai</th>
                    <th rowspan="2">NIP</th>
                    <th colspan="{!!$jml_hari!!}">Tanggal</th>
                    <th rowspan="2">Act.</th>
                </tr>
                <tr>
                    @for($i=1; $i<=$jml_hari; $i++)
                        <th>{!!$i!!}</th> 
                    @endfor
                </tr>
            </thead>  
            <tbody style="font-size: 9pt">
            <?php
                $data = \PegawaikhususModel::
                            leftJoin('mst_pegawai','mst_pegawai.id','=','mst_pegawai_khusus.id_pegawai')
                            ->leftJoin('mst_unit','mst_unit.id','=','mst_pegawai.id_unit')
                            ->select('mst_pegawai_khusus.*',
                                'mst_pegawai.nama as pegawai','mst_pegawai.nip','mst_pegawai.pin');
                if(isset($id_unit) && $id_unit>0) {
                    $data = $data->where('mst_pegawai.id_unit','=',$id_unit);        
                }
                $data = $data->get();
            ?>
            @foreach ($data as $row)
                <?php
                    $tanggal = $tahun.'-'.sprintf("%02d", $bulan).'-'.sprintf("%02d", $i);
                    $waktu = \LogabsensiModel::getLog($row->pin,$tanggal);
                ?>
                <tr>
    				<td>{!!$row->pegawai!!}</td>
                    <td>{!!$row->nip!!}</td>
                    @for($i=1; $i<=$jml_hari; $i++)
                        <td>P
                            <!-- {!!\Form::select('shift',array('-'=>'-','P'=>'P','S'=>'S','M'=>'M'),null)!!} -->
                        </td> 
                    @endfor
                    <td>
                        <a id='edit' href='' id_pegawai='{!!$row->nip!!}' class='text-info'><i class='fa fa-pencil-square-o'></i> Edit</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>


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
