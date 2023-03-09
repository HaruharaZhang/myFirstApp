@extends('layouts.app')

@section('title', 'Animals')

@section('content')
<p>Swansea Zoo will soon be opening many food outlets - stay tuned!</p>

<style>
    table,
    th,
    td {
        border: 1px solid black;
    }
</style>
<table style="width:100%">
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Weight</th>
        <th>Enclosure Id</th>
        <th>Create at</th>
        <th>Update at</th>
    </tr>
    <tr>
        <!--<ul> -->
        @foreach($animals as $animal)
    <tr>
        <td>
            <li>{{ $animal -> id }}</li>
        </td>
        <td>
            <li><a href="/animals/{{$animal->id}}"> {{ $animal -> name }}</a></li>
        </td>
        <td>
            <li>{{ $animal -> weight }}</li>
        </td>
        <td>
            <li>{{ $animal -> enclosure_id }}</li>
        </td>
        <td>
            <li>{{ $animal -> created_at }}</li>
        </td>
        <td>
            <li>{{ $animal -> updated_at }}</li>
        </td>
    </tr>
    @endforeach
    <!--</ul> -->
    </tr>
</table>
<!-- 如果在web.php 中定义了route的名字的话，就可以在这边使用自定义的名字来生成东西了
不过老师这边不是很建议这样子操作
因为到了后面会有成千上万的名字，就非常难记
不如按照从大到小的命名规则来弄好
具体代码这里删掉了，因为就算是注释，也是会执行的
代码可以看 ppt lecture 9 no:39
-->
@endsection