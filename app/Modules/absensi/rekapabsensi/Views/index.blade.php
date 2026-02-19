<section class="content-header">
    <h1>
        Rekap Absensi
    </h1>
    <ol class="breadcrumb">
        <li><a href="{!!url()!!}"> Dashboard</a></li>
        <li class="active">Rekap Absensi</li>
    </ol>
</section>
<section class="content">
    <div class="box box-primary">
      <div class="row">
        <div class="col-md-12">
            {!! Form::open(array('url' => '', 'method' => 'POST', 'class'=>'form-horizontal form-'.\Config::get('claravel::ajax'),'id'=>'tampil')) !!}
            <div class="box-body">
<!-- diganti -->               <div class="form-group">
                    {!! Form::label('var', 'Jenis Laporan:', array('class' => 'col-sm-2 control-label')) !!}
                    <div class="col-sm-4">
                        {!! Form::select('var', array('rekap_perbulan'=> 'Rekap Per Bulan','rekap_pp'=>'Rekap PP 53'), null, array('style'=>'width:100%')) !!}
                    </div>
                </div> <!-- diganti -->
                <div class="form-group">
                    {!! Form::label('id_unit', 'Unit Kerja:', array('class' => 'col-sm-2 control-label')) !!}
                    <div class="col-sm-5">
                        {!! \UnitModel::getSelectAll('id_unit', \Session::get('id_unit')) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('nip', 'Pegawai:', array('class' => 'col-sm-2 control-label')) !!}
                    <div class="col-sm-5" id="konten_pegawai">
                        {!! Form::select('nip', array(''=> 'Semua Pegawai'),null,array('style'=>'width:100%')) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('bulan', 'Bulan:', array('class' => 'col-sm-2 control-label')) !!}
                    <div class="col-sm-5">
                        {!! getSelectBulan('bulan', \Session::get('bulan')) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('tahun', 'Tahun:', array('class' => 'col-sm-2 control-label')) !!}
                    <div class="col-sm-5">
                        {!! Form::text('tahun', \Session::get('tahun'), array('class'=> 'form-control')) !!}
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        {!! ClaravelHelpers::btnSave(false,'Tampil') !!}
                        {!! Form::close() !!}
                    </div>
                </div> 
            </div>
        </div>
        <div class="col-sm-12" id="konten"></div>
      </div>
    </div>
</section>

{!! modal(true,'modal_rekap') !!}
<script>
    $(document).ready(function(){
        $('select').select2();
        var index_page = '{!!url()!!}/absensi/rekapabsensi'; 
        
        loading('konten_pegawai');
        $.ajax({
            url  : index_page + '/pegawai',
            type : 'get',
            data : 'id_unit='+$('#id_unit').val(),
            success:function(html){
                $('#konten_pegawai').html(html);   
                $('select').select2();
            }
        });          

        $('#id_unit').on('change',function(e){
            e.preventDefault();
            loading('konten_pegawai');
            $.ajax({
                url  : index_page + '/pegawai',
                type : 'get',
                data : 'id_unit='+$('#id_unit').val(),
                success:function(html){
                    $('#konten_pegawai').html(html);      
                    $('select').select2();
                }
            });          
        });

        $('#tampil').on('submit',function(e){
            e.preventDefault();
            var $this = $(this);
            loading('konten');
            if($('#nip').val()>0) {
                // $.ajax({
                //     url  : index_page + '/posting',
                //     type : 'get',
                //     data : $this.serialize(),
                //     success:function(html){
                        $.ajax({
                            url  : index_page + '/tampilperpegawai',
                            type : 'get',
                            data : $this.serialize(),
                            success:function(html){
                                $('#konten').html(html);   
                            }
                        });   
                //     }
                // });   
            } else {
                $.ajax({
                    url  : index_page + '/posting',
                    type : 'get',
                    data : $this.serialize(),
                    success:function(html){
                        $.ajax({
                            url  : index_page + '/tampil',
                            type : 'get',
                            data : $this.serialize(),
                            success:function(html){
                                $('#konten').html(html);   
                            }
                        });   
                    }
                });  
            }          
        });
    });
</script>
