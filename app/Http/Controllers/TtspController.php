<?php

namespace App\Http\Controllers;
use App\Model\ThongTinSanPham;
use DB;
use Illuminate\Http\Request;


class TtspController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $ThongTinSanPhams =DB::table('ThongTinSanPham')->get();
          $ThongTinSanPhams=ThongTinSanPham::all(); //lấy từ model ra trực tiếp lun
         $i=1;

        return view('theme_master.table',compact('ThongTinSanPhams','i'));

//           App\Model\ThongTinSanPham::all();
//        $thongtinsanpams= ThongTinSanPham::all();
//            return view('theme_master.table',compact('ThongTinSanPhams','i'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Set timezone
//        date_default_timezone_set("Asia/Ho_Chi_Minh");
        //Lấy giá trị đã nhập
        if($request ->hasFile('imagesp')){
            $allRequest  = $request->all();

            $filename =$request->imagesp->getClientOriginalName();

            $request->imagesp->move('theme_master/production/images',$filename);

//            $thongtinsanpham = new ThongTinSanPham();

//
            //đưa các giá trị vào mạng ứng với tên cột trong bảng cần thêm.
            $namesp  = $allRequest['namesp'];
            $detailsp = $allRequest['detailsp'];
            $dataInsertToDatabase = array(
                'ttsp_tensp'  => $namesp,
                'ttsp_hinhanhsp' => $filename,
                'ttsp_motasp'=>$detailsp,

            );

            $insertdate = ThongTinSanPham::create($dataInsertToDatabase);

            //Thực hiện chuyển trang
            return redirect('/topic2');
        }
        //        --------------------------------phần source chưa có thêm hình ảnh--------------------------------------------------
//        $allRequest  = $request->all();
//        $namesp  = $allRequest['namesp'];
//        $imagesp = $allRequest['imagesp'];
//        $detailsp = $allRequest['detailsp'];

        //Gán giá trị vào array
//        $dataInsertToDatabase = array(
//            'ttsp_tensp'  => $namesp,
//            'ttsp_hinhanhsp' => $imagesp,
//            'ttsp_motasp'=>$detailsp,
//            'created_at' => date('Y-m-d H:i:s'),
//            'updated_at' => date('Y-m-d H:i:s'),
//        );

//        $insertdata =DB::table('ThongTinSanPham')->insert($dataInsertToDatabase);
//          $insertdate = ThongTinSanPham::create($dataInsertToDatabase); // có thể thay create bằng insert nhưng created nó sẽ tối ưu và tự đông cập nhật
        //Kiểm tra Insert để trả về một thông báo
//        if ($insertdata) {
//            Session::flash('success', 'Thêm mới học sinh thành công!');
//        }else {
//            Session::flash('error', 'Thêm thất bại!');
//        }
//
//        //Thực hiện chuyển trang
//        return redirect('/topic2');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($ttsp_id)
    {
//        $edit_ttsp=DB::table('ThongTinSanPham')->select('ttsp_id','ttsp_tensp','ttsp_hinhanhsp','ttsp_motasp')->where('ttsp_id',$ttsp_id)->first(); //lấy thủ công
        $edit_ttsp=ThongTinSanPham::where('ttsp_id',$ttsp_id)->first(); // lấy từ model

        return view('theme_master.form_edit')->with('data_edit',$edit_ttsp);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $ttsp_id)
    {

        if($request ->hasFile('imagesp')){
            $allRequest  = $request->all();

            $filename  =$request->imagesp->getClientOriginalName();

            $request->imagesp->move('theme_master/production/images',$filename);
//
            //đưa các giá trị vào mạng ứng với tên cột trong bảng cần thêm.
            $namesp  = $allRequest['namesp'];
            $detailsp = $allRequest['detailsp'];
//            $dataInsertToDatabase = array(
//                'ttsp_tensp'  => $namesp,
//                'ttsp_hinhanhsp' => $filename,
//                'ttsp_motasp'=>$detailsp,
//
//            );

            $insertdate = ThongTinSanPham::where('ttsp_id',$ttsp_id)->update([
                'ttsp_tensp'  => $namesp,
                'ttsp_hinhanhsp' => $filename,
                'ttsp_motasp'=>$detailsp,
                ]);

            //Thực hiện chuyển trang
            return redirect('/topic2');
        }else{
            $updateData = ThongTinSanPham::where('ttsp_id',$ttsp_id)->update([
                'ttsp_tensp' => $request->namesp,
                'ttsp_motasp'=>$request->detailsp,
            ]);
            return redirect('topic2');
        }

//        $updateData = DB::table('ThongTinSanPham')->where('ttsp_id', $ttsp_id)->update([
//            'ttsp_tensp' => $request->namesp,
//            'ttsp_hinhanhsp' => $request->imagesp,
//            'ttsp_motasp'=>$request->detailsp,
//        ]);


//        return redirect('topic2');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($ttsp_id)
    {
//        DB::table('ThongTinSanPham')->where('ttsp_id','=', $ttsp_id)->delete();
        ThongTinSanPham::destroy('ttsp_id',$ttsp_id);

        return redirect('topic2');
    }
}
