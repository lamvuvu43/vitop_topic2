
@extends('theme_master.layout.master')

@section('show_table_ttsp')
    <style>
        #customers {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;

        }

        #customers td, #customers th {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        #customers tr:nth-child(even){background-color: #f2f2f2;}

        #customers tr:hover {background-color: #ddd;}

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: center;
            background-color: #4CAF50;
            color: white;
        }
        #customers td img{
            width: 50px;
            height: auto;
            padding: 0px;
            margin: 0px;
        }
        #title{
            text-align: center;
        }
    </style>
    <script>
        function bigImg(x) {
            x.style.height = "auto";
            x.style.width = "200px";
        }

        function smallImg(x) {
            x.style.height = "auto";
            x.style.width = "50px";
        }
    </script>
    <h2 id="title">Thông tin sản phẩm</h2>
    <table id="customers">

        <th>STT</th><th>Mã SP</th><th>Tên SP</th><th>Hình ảnh</th><th>Mô tả</th><th>Sửa</th><th>Xoá</th>

            @foreach($ThongTinSanPhams as $ThongTinSanPham)

               <tr>
                   <td> {{$i++ }}</td>
                   <td>{{$ThongTinSanPham->ttsp_id}}</td>
                   <td>{{$ThongTinSanPham->ttsp_tensp}}</td>
                   <td><img onmouseover="bigImg(this)" onmouseout="smallImg(this)" src="theme_master/production/images/{{$ThongTinSanPham->ttsp_hinhanhsp}}"  ></td>
                   <td>{{$ThongTinSanPham->ttsp_motasp}}</td>
                   <td >
                       <a href="{{ url('topic2/'.$ThongTinSanPham->ttsp_id).'/edit' }}"><i class="fa fa-pencil-square" aria-hidden="true"></i></a>
                   </td>
{{--                   <td><a href="/topic2/{{$ThongTinSanPham->ttsp_id}}/delete"><img src="/theme_master/production/images/icon_delete.png" width="30px"></a></td>--}}
                   <td >
                       <button style="border: none;"  class="deleteRecord" data-id="{{$ThongTinSanPham->ttsp_id}}"><i class="fa fa-trash" aria-hidden="true"></i></button>
{{--                       <form action="{{url('topic2/'.$ThongTinSanPham->ttsp_id)}}" method="post">--}}
{{--                           @method('DELETE')--}}
{{--                           @csrf--}}

{{--                       --}}
{{--                       </form>--}}
                   </td>
               </tr>
                @endforeach

    </table>

@endsection

@section('script')
    <script>
       $(document).ready(function () {
           $(".deleteRecord").click(function(){
               var id = $(this).data("id");
               var token = $("meta[name='csrf-token']").attr("content");

               $.ajax(
                   {
                       url: "topic2/"+id,
                       type: 'DELETE',
                       data: {
                           "id": id,
                           "_token": token,
                       },
                       success: function (){
                           console.log("it Works");
                       }
                   });

           });
           $(document).ajaxStop(function(){
               window.location.reload();
           });


       });
    </script>
    @endsection