@extends('common/layouts')

@section('content')
    <!-- 中间内容区局 -->
            <!-- 右侧内容区域 -->
            <div class="col-md-9">
                <!-- 自定义内容区域 -->
                <div class="panel panel-default">
                    <div class="panel-heading">学生详情</div>

                    <table class="table table-bordered table-striped table-hover ">
                        <tbody>
                        <tr>
                            <td width="50%">ID</td>
                            <td>{{$student->id}}</td>
                        </tr>
                        <tr>
                            <td>姓名</td>
                            <td>{{$student->name}}</td>
                        </tr>
                        <tr>
                            <td>年龄</td>
                            <td>{{$student->age}}</td>
                        </tr>
                        <tr>
                            <td>性别</td>
                            @if($student->sex == 0)
                                <td>未知</td>
                            @elseif($student->sex == 1)
                                <td>男</td>
                            @elseif($student->sex == 2)
                                <td>女</td>
                            @endif
                        </tr>
                        <tr>
                            <td>添加日期</td>
                            <td>{{date('Y-m-d H:i:s',$student->created_at)}}</td>
                        </tr>
                        <tr>
                            <td>最后修改</td>
                            <td>{{date('Y-m-d H:i:s',$student->created_at)}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
@stop