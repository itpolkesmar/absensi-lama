<section class="content">
  <div class="box box-primary">
    <?php
      $rpos = strrpos(\Request::path(), '/'); 
      $uri = substr(\Request::path(), 0, $rpos);
    ?>
    <div class="row">
      <div class="col-md-12">
        {!! Form::model($jatahcuti, array('url' => $uri, 'method' => 'POST', 'class'=>'form-horizontal form-'.\Config::get('claravel::ajax') ,'id'=>'simpan')) !!}
        {!! Form::hidden('id') !!}
        <div class="box-body">
				<div class="form-group">
					{!! Form::label('tahun', 'Tahun:', array('class' => 'col-sm-3 control-label')) !!}
					<div class="col-sm-9">
						{!! Form::text('tahun', null, array('class'=> 'form-control','readonly'=>'readonly')) !!}
					</div>
				</div>
                <?php
                    $pegawai = \PegawaiModel::where('nip','=',$jatahcuti->nip)->first();
                ?>
				<div class="form-group">
					{!! Form::label('nip', 'Pegawai:', array('class' => 'col-sm-3 control-label')) !!}
					<div class="col-sm-9">
						{!! Form::text('nip', $pegawai->nip.' - '.$pegawai->nama, array('class'=>'form-control','disabled'=>'disabled')) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('jumlah', 'Jumlah Cuti:', array('class' => 'col-sm-3 control-label')) !!}
					<div class="col-sm-9">
						{!! Form::text('jumlah', null, array('class'=> 'form-control')) !!}
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
        var index_page = '{!!url()!!}/masterdata/jatahcuti';
        $('#simpan').on('submit',function(e){
            var $this = $(this);
            e.preventDefault();
            bootbox.confirm('Simpan data?',function(a){
                if (a == true){
                    $.ajax({
                        url : index_page + '/edit' ,
                        type : 'POST',
                        data : $this.serialize(),
                        beforeSend: function(){
                            preloader.on();
                        },
                        success:function(html){
                            if(html=='4'){
                                notification('Berhasil Disimpan','success');
                                claravel_modal_close('konten_modal');
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
