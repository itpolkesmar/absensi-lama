<section class="content">
  <div class="box box-primary">
    <div class="row">
      <div class="col-md-12">
        {!! Form::open(array('url' => '', 'method' => 'POST', 'class'=>'form-horizontal form-'.\Config::get('claravel::ajax'),'id'=>'simpan')) !!}
        {!! Form::hidden('nip',$nip) !!}
        {!! Form::hidden('bulan',$bulan) !!}
        {!! Form::hidden('tahun',$tahun) !!}
        <div class="box-body">
            <?php
                $pegawai = \PegawaiModel::where('nip','=',$nip)->first();
                $pegawai = $pegawai->nip.' - '.$pegawai->nama;

                $bulan_tahun = getBulan($bulan).' '.$tahun;
                $jml_hari = date('t',strtotime($tahun.'-'.$bulan.'-01'));
                $kolom1 = ceil($jml_hari/2);
            ?>
		    <div class="form-group">
				{!! Form::label('', 'Pegawai:', array('class' => 'col-sm-3 control-label')) !!}
				<div class="col-sm-7">
					{!! Form::text('', $pegawai, array('class'=> 'form-control','disabled'=>'disabled')) !!}
				</div>
			</div>
            <div class="form-group">
                {!! Form::label('', 'Bulan:', array('class' => 'col-sm-3 control-label')) !!}
                <div class="col-sm-7">
                    {!! Form::text('', $bulan_tahun, array('class'=> 'form-control','disabled'=>'disabled')) !!}
                </div>
            </div>
            <div class="col-sm-12">
                <div class="col-sm-6"> 
                    @for($i=1;$i<=$kolom1;$i++)
                        <?php
                            $tanggal = str_pad($i, 2,0,STR_PAD_LEFT).'-'.str_pad($bulan, 2,0,STR_PAD_LEFT).'-'.$tahun;
                            $shift = array();
                            $data_shift = \JadwalshiftModel::
                                            where('nip','=',$nip)
                                            ->where('tanggal','=',date('Y-m-d',strtotime($tanggal)))
                                            ->get();
                            foreach ($data_shift as $ds) {
                                array_push($shift, $ds->id_shift);
                            }
                        ?>
                        <div class="form-group">
                            {!! Form::label('', $tanggal, array('class' => 'col-sm-4 control-label')) !!}
                            <div class="col-sm-7">
                                {!! \ShiftModel::getSelectMultiple('id_shift['.$i.'][]', $shift) !!}
                            </div>
                        </div>
                    @endfor
                </div>
                <div class="col-sm-6"> 
                    @for($i=($kolom1+1);$i<=$jml_hari;$i++)
                        <?php
                            $tanggal = str_pad($i, 2,0,STR_PAD_LEFT).'-'.str_pad($bulan, 2,0,STR_PAD_LEFT).'-'.$tahun;
                            $data_shift = \JadwalshiftModel::
                                            where('nip','=',$nip)
                                            ->where('tanggal','=',date('Y-m-d',strtotime($tanggal)))
                                            ->get();
                            foreach ($data_shift as $ds) {
                                array_push($shift, $ds->id_shift);
                            }
                        ?>
                        <div class="form-group">
                            {!! Form::label('', $tanggal, array('class' => 'col-sm-4 control-label')) !!}
                            <div class="col-sm-7">
                                {!! \ShiftModel::getSelectMultiple('id_shift['.$i.'][]', $shift) !!}
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        </div>
        <div class="box-footer">
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-7">
                    {!! ClaravelHelpers::btnSave() !!}
                </div>
            </div> 
        </div>
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</section>
	
<script>
    $(document).ready(function(){
        var index_page = '{!!url()!!}/absensi/jadwalshift'; 

        $('#simpan').on('submit',function(e){
            var $this = $(this);
            e.preventDefault();
            bootbox.confirm('Simpan data?',function(a){
                if (a == true){
                    $.ajax({
                        url : index_page+'/edit',
                        type : 'POST',
                        data : $this.serialize(),
                        beforeSend: function(){
                            preloader.on();
                        },
                        success:function(html){
                            if(html=='1'){
                                notification('Berhasil Disimpan','success');
                                claravel_modal_close('modal_absensi');
                                $('#tampil').trigger('submit');
                            }else{
                                notification(html,'danger');
                            }
                        }
                    });
                }
            });
        });
    });
</script>
