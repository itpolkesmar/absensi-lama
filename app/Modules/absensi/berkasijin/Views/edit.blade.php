
{!! Form::model($berkasijin, array('url' => '', 'method' => 'POST', 'class'=>'form-horizontal form-'.\Config::get('claravel::ajax') ,'id'=>'simpan')) !!}
{!! Form::hidden('id') !!}
<div class="box-body">
    <div class="form-group">
        {!! Form::label('id_pegawai', 'Pegawai:', array('class' => 'col-sm-3 control-label')) !!}
        <div class="col-sm-8">
            {!! \PegawaiModel::getSelect('nip',$berkasijin->nip) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('jns_ijin', 'Jenis:', array('class' => 'col-sm-3 control-label')) !!}
        <div class="col-sm-8">
            {!! \BerkasijinModel::getSelectIjin('jns_ijin',$berkasijin->jns_ijin) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('tanggal_mulai', 'Tanggal Mulai:', array('class' => 'col-sm-3 control-label')) !!}
        <div class="col-sm-8">
            {!! Form::text('tanggal_mulai', date('d-m-Y',strtotime($berkasijin->tanggal_mulai)), array('class'=> 'form-control tgl')) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('tanggal_akhir', 'Tanggal Selesai:', array('class' => 'col-sm-3 control-label')) !!}
        <div class="col-sm-8">
            {!! Form::text('tanggal_selesai', date('d-m-Y',strtotime($berkasijin->tanggal_selesai)), array('class'=> 'form-control tgl')) !!}
        </div>
    </div>

    <?php
        $ijin = \BerkasijinModel::where('id','=',$berkasijin->id)->first();
        $file = '<a href="'.url().'/packages/upload/berkas/ijin/'.$ijin->file.'" target="_blank">File Ijin Sebelumnya</a>';
    ?>

    <div class="form-group">
        {!! Form::label('file', 'File:', array('class' => 'col-sm-3 control-label')) !!}
        <div class="col-sm-8">
            {!! Form::file('file') !!}<br>
            {!!$file!!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('keterangan', 'Keterangan:', array('class' => 'col-sm-3 control-label')) !!}
        <div class="col-sm-8">
            {!! Form::textarea('keterangan', null, array('rows'=>'3','class'=> 'form-control')) !!}
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

	
<script>
    $(document).ready(function(){
        var index_page = '{!!url()!!}/absensi/berkasijin';
        $('select').select2();
        $('.tgl').datetimepicker({'format': 'DD-MM-YYYY'});

        $('#simpan').on('submit',function(e){
            var $this = $(this);
            e.preventDefault();
            var formData = new FormData(this);
            bootbox.confirm('Simpan data?',function(a){
                if (a == true){
                    $.ajax({
                        url : index_page + '/edit' ,
                        type : 'POST',
                        data : formData,
                        contentType: false,
                        processData: false,
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
