<section class="content-header">
    <h1>
        Jatah Cuti
    </h1>
    <ol class="breadcrumb">
        <li><a href="{!!url()!!}"> Dashboard</a></li>
        <li class="active">Jatah Cuti</li>
    </ol>
</section>
<section class="content">
    <div class="box box-primary">
      <div class="row">
        <div class="col-md-12">
            {!! Form::open(array('url' => \Request::path(), 'method' => 'POST', 'class'=>'form-horizontal form-'.\Config::get('claravel::ajax'),'id'=>'tampil')) !!}
            <div class="box-body">
                <div class="form-group">
                    {!! Form::label('id_unit', 'Unit:', array('class' => 'col-sm-2 control-label')) !!}
                    <div class="col-sm-5">
                        {!! \UnitModel::getSelectAll('id_unit', \Session::get('id_unit')) !!}
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
                    <div class="col-sm-offset-2 col-sm-5">
                        {!! ClaravelHelpers::btnSave(false,'Tampil') !!}
                    </div>
                </div> 
            </div>
          {!! Form::close() !!}
        </div>
        <div class="col-sm-12" id="konten"></div>
      </div>
    </div>
</section>

<script>
    $(document).ready(function(){
        $('select').select2();
        var index_page = '{!!url()!!}/masterdata/jatahcuti'; 
        $('#tampil').on('submit',function(e){
            e.preventDefault();
            var $this = $(this);
            loading('konten');
            $.ajax({
                url  : index_page + '/daftar',
                type : 'get',
                data : $this.serialize(),
                success:function(html){
                    $('#konten').html(html);
                }
            });            
        });
    });
</script>
