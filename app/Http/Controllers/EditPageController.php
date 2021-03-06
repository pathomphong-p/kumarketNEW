<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use app\User;
use Illuminate\Support\Facades\Hash;
class EditPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $listUser = User::all()->where('isAdmin',null)->sortBy('lock', SORT_NATURAL|SORT_FLAG_CASE);
        
        $listAdmin = User::all()->where('isAdmin',1)->sortBy('lock', SORT_NATURAL|SORT_FLAG_CASE);

        return view('edit.edit',compact('listUser','listAdmin'));
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
        //
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
    public function edit($id)
    {
        if($id !== ''){
            $list = User::find($id);
            /*
            $data = array(
                'list' => $list
            );*/
            return view('edit.editform', compact('list'));
        }
    }

        /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editAdmin($id)
    {
        if($id !== ''){
            $list = User::find($id);
            /*
            $data = array(
                'list' => $list
            );*/
            return view('edit.editadmin', compact('list'));
        }
    }

        public function editPassword($id)
    {
        if($id !== ''){
            $list = User::find($id);
            /*
            $data = array(
                'list' => $list
            );*/
            return view('edit.editpassword', compact('list'));
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   


        $request->validate([
            'name'=>'required',
            'surname'=>'required',
            'email'  =>  'required|unique:users,email,'.$id,  
            'tel'=> 'required',
            'store_name'=>'required',
            'lock'  =>  'required|unique:users,lock,'.$id,  
            'count'=>'required|integer',
        ],
        [   
            'name.required' => 'กรุณากรอกชื่อให้ถูกต้อง',
            'surname.required' => 'กรุณากรอกนามสกุลให้ถูกต้อง',
            'email.required' => 'กรุณากรอกบัตรประชาชนให้ถูกต้อง',
            'email.unique' => 'ข้อมูลบัตรประชาชนซ๊ำ',
            'tel.required' => 'กรุณากรอกเบอร์โทรศัพท์ให้ถูกต้อง',
            'store_name.required' => 'กรุณากรอกชื่อร้านค้าให้ถูกต้อง',
            'lock.required' => 'กรุณากรอกหมายเลขล็อคให้ถูกต้อง',
            'lock.unique' => 'ข้อมูเลขล็อกซ๊ำ',
            'count.required' => 'กรุณากรอกจำนวนครั้งที่ขาดให้ถูกต้อง',
            'count.integer' => 'กรุณากรอกจำนวนครั้งที่ขาดให้ถูกต้อง',
        ]);

        //dd($request);
        $list = User::find($id);

        $list->name = $request->get('name');
        $list->surname = $request->get('surname');
        $list->email = $request->get('email');
        $list->tel = $request->get('tel');
        $list->store_name = $request->get('store_name');
        $list->lock = $request->get('lock');
        $list->come = $request->get('come');
        $list->count = $request->get('count');
        $list->ban = $request->get('ban');

        $list->save();
        return redirect('edit'); 
        // ->with('success', 'แก้ไขสำเร็จ')
    }

    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $list = User::find($id);
        $list->delete();
        //Session::flash('message','Delete Success');
        return redirect('edit');
        
    }

    public function MOS()  //by number
    {
        $list = User::all()->where('isAdmin',null)->sortBy(function ($product, $key) {
            return strlen($product['lock']);
        });
        return view('testSort', ['User' => $list]);
    }

    public function MOSs() //by char and number 
    {
        $list = User::all()->where('isAdmin',null)->sortBy('lock', SORT_NATURAL|SORT_FLAG_CASE);
        return view('testSort', ['User' => $list]);
    }



    public function search(Request $request)
        {
          $searchData = $request->searchData;
          $listUser = User::where('lock','like','%'.$searchData.'%')
                ->orwhere('name','like','%'.$searchData.'%')
                ->orwhere('surname','like','%'.$searchData.'%')
                ->orderBy('lock', 'ASC')
                ->get();

         $listAdmin = User::all()->where('isAdmin',1)->sortBy('lock', SORT_NATURAL|SORT_FLAG_CASE);
          
          return view('edit.edit',compact('listAdmin','listUser'));
        }

    public function updateAdmin(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'email'  =>  'required|unique:users,email,'.$id,
        ],
        [   
            'name.required' => 'กรุณากรอกชื่อผู้ดูแลระบบให้ถูกต้อง',
            'email.required' => 'กรุณากรอกข้อมูลชื่อสำหรับเข้าระบบ',
            'email.unique' => 'ข้อมูลชื่อสำหรับเข้าระบบซ๊ำ',
        ]);

        //dd($request);
        $list = User::find($id);

        $list->name = $request->get('name');
        $list->email = $request->get('email');

        $list->save();
        return redirect('edit'); 
        // ->with('success', 'แก้ไขสำเร็จ')
    }

    public function updatePassword(Request $request, $id)
    {
        $request->validate([
            'password' => ['required', 'string', 'confirmed'],
        ],
        [
            'password.confirmed' => 'รหัสผ่านยืนยันไม่สอดคล้องกับรหัสผ่านใหม่',
        ]);

        //dd($request);
        $list = User::find($id);

        $list->password = Hash::make($request->get('password'));

        $list->save();
        return redirect('edit'); 
        // ->with('success', 'แก้ไขสำเร็จ')
    }



    public function destroyAdmin($id)
    {   
        $count = User::where('isAdmin','=','1')->count();
        $list = User::find($id);
        if ($count > 1){
            $list->delete();
            // test
        }
        return redirect('edit');
        
    }

}
