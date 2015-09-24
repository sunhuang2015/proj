@extends('tpl.master')
@section('content')

    @if (count($errors) > 0)
        <div class="alert alert-warning alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>

                @endforeach
            </ul>
        </div>
        @endif

                <!-- Model for new department-->

        <!-- Button trigger modal -->
        <button type="button" class="btn  btn-purple btn-xs  " data-toggle="modal" data-target="#myModal">
            <i class="ace-icon fa fa-plus "></i> 新任务
        </button>





        <!-- Modal -->

        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">新任务</h4>
                    </div>
                    {!! Form::open(
                               array(
                               'url'=>'project',
                               'class'=>'form form-horizontal',
                               'files'=>true)
                       ) !!}
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group has-warning">
                                    <label for="" class="col-sm-2 control-label">任务编号</label>
                                    <div class="col-sm-10">
                                        {!! Form::text('req','',['class'=>'form-control col-sm-6',' required autofocus']) !!}
                                    </div>


                                    {!! Form::hidden('step_id',1) !!}

                                </div>
                                <div class="form-group has-info">
                                    <label for="" class="col-xs-2 control-label  ">公司</label>
                                    <div class="col-xs-2">
                                        {!! Form::select('company_id',\App\Company::lists('name','id'),null,['class'=>'form-control input-sm']) !!}
                                    </div>

                                    <label for="" class="col-xs-2 control-label">部门</label>
                                    <div class="col-xs-2">
                                        {!! Form::text('department','' ,['required','class'=>'form-control input-sm'])!!}
                                    </div>

                                    <label for="" class="col-xs-2 control-label">成本中心</label>
                                    <div class="col-xs-2">
                                        {!! Form::text('costcenter','' ,['required','class'=>'form-control input-sm','pattern'=>'[0-9]{4}'])!!}
                                    </div>


                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">申请人</label>
                                    <div class="col-sm-3">
                                        {!! Form::text('applicant','',['class'=>'form-control required input-sm']) !!}
                                    </div>

                                    <label for="" class="col-sm-2 control-label">电话</label>
                                    <div class="col-sm-3">
                                        {!! Form::text('phone','',['class'=>'form-control input-sm','required']) !!}
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">网线</label>
                                    <div class="col-sm-3">
                                        {!! Form::number('network_qty','0',['class'=>'form-control input-sm']) !!}
                                    </div>

                                    <label for="" class="col-sm-2 control-label">电话线</label>
                                    <div class="col-sm-3">
                                        {!! Form::number('telecom_qty','0',['class'=>'form-control input-sm']) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">描述</label>
                                    <div class="col-xs-8">
                                        {!! Form::text('subject','',['class'=>'form-control']) !!}
                                    </div>


                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">详细</label>
                                    <div class="col-xs-8">
                                        <textarea name="description" class="form-control limited" id="form-field-9" maxlength="80"></textarea>

                                    </div>


                                </div>

                                <div class="form-group">
                                    <div class="col-xs-8 col-xs-offset-2">
                                        <!-- #section:custom/file-input -->
                                        <label class="ace-file-input">  {!! Form::file('project_file',['required']) !!}<span class="ace-file-container" data-title="选择"><span class="ace-file-name" data-title="上传附件"><i class=" ace-icon fa fa-upload"></i></span></span><a class="remove" href="#"><i class=" ace-icon fa fa-times"></i></a></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">存盘</button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>

        <!-- end Model-->


        @if (session()->has('message'))
            <div class="alert alert-warning alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

                <p>{!!session('message') !!}</p>

            </div>
        @endif
        <table id="projectTable" class="table table-striped table-bordered table-hover">
            <thead>

            <th>TASK</th>
            <th>公司</th>
            <th>部门</th>

            <th>申请人</th>
            <th>状态</th>
            <th>上次时间</th>
            <th>更新状态</th>

            </thead>
           <tbody>

            @foreach($projects as $project)
                <tr>
                    <td>{!! $project->req !!}</td>
                    <td>{!! $project->company->name !!}</td>
                    <td>{!! $project->department !!}</td>
                    <td>{!! $project->applicant !!}</td>
                    <td>{!! $project->step->name !!}</td>
                    <td>{!! \App\ProjectFile::where('project_id',$project->id)->where('step_id',$project->step_id)->value('project_file')!!}</td>
                    <td><a href="/projectlog"><i class="ace-icon fa fa-bookmark fa-2x"></i></a></td>
                </tr>
            @endforeach
           </tbody>
        </table>

@endsection

@section('javascript')

    <script src="../assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="../assets/js/dataTables/jquery.dataTables.bootstrap.js "></script>
    <script>
        $(document).ready(function(){
            $("#projectTable").wrap("<div class='dataTables_borderWrap' />")
                    .dataTable({
                        bAutoWidth:false//for better responsiveness

                    });
        }); </script>
    </script>
@endsection