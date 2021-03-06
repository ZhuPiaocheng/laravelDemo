@extends('common/layouts')

@section('content')
    @include('common/message')
    <!-- 自定义内容区域 -->
    <div class="panel panel-default">
        <div class="panel-heading">学生列表</div>
        <table class="table table-striped table-hover table-responsive">
            <thead>
            <tr>
                <th>ID</th>
                <th>姓名</th>
                <th>年龄</th>
                <th>性别</th>
                <th>添加时间</th>
                <th width="120">操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($students as $student)
            <tr>
                <th scope="row">{{$student->id}}</th>
                <td>{{$student->name}}</td>
                <td>{{$student->age}}</td>
                @if($student->sex == 0)
                <td>未知</td>
                @elseif($student->sex == 1)
                <td>男</td>
                @elseif($student->sex == 2)
                <td>女</td>
                @endif
                <td>{{date('Y-m-d H:i:s',$student->created_at)}}</td>
                <td>
                    <a href="{{url('student/detail',['id' => $student->id])}}">详情</a>
                    <a href="{{url('student/update',['id' => $student->id])}}">修改</a>
                    <a href="{{url('student/delete',['id' => $student->id])}}"
                       onclick="if(confirm('你确定要删除吗？') == false) return false;">
                        删除</a>
                </td>
            </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- 分页  -->
    <div>
        <div class="pull-right">
            {{$students -> render()}}
        </div>
    </div>
@stop