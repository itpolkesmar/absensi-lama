<section class="content-header">
    <h1>
        Input Manual
    </h1>
    <ol class="breadcrumb">
        <li><a href="{!!url()!!}"> Dashboard</a></li>
        <li class="active">Input Manual</li>
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
                        {!! \AturmatilampuModel::getSelect('id_mati_lampu',\Session::get('id_mati_lampu')) !!}
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
        $('.tgl').datetimepicker({'format': 'DD-MM-YYYY'});

        var index_page = '{!!url()!!}/absensi/inputmanual'; 
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
