<?php

namespace App\Http\Controllers\SalesManagement;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(10);
        return view('admin.users.index')->withUsers($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create')->withRoles($roles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $all = $request->only(['first_name','last_name','birthday','sex','phone','email','password','role','photo','detail','ward','district','province']);
        $msgs = [
            'first_name.required'=>'Vui lòng nhập họ.',
            'last_name.required'=>'Vui lòng nhập tên.',
            'birthday.required'=>'Vui lòng nhập ngày sinh.',
            'sex.required'=>'Vui lòng chọn giới tính.',
            'photo.required'=>'Vui lòng chọn hình đại diện.',
            'photo.image'=>'Ảnh đại diện không đúng định dạng yêu cầu.',
            'photo.mimes'=>'Ảnh đại diện phải có định dạng jpg, jpeg, png.',
            'phone.required'=>'Vui lòng nhập số điện thoại.',
            'email.required'=>'Vui lòng nhập địa chỉ email.',
            'email.email'=>'Địa chỉ email không đúng.',
            'password.min'=>'Mật khẩu phải có ít nhất 6 ký tự.',
            'role.required'=>'Vui lòng chọn vai trò.',
            'detail.required'=>'Vui lòng nhập số nhà, tên đường.',
            'ward.required'=>'Vui lòng chọn phường, xã.',
            'district.required'=>'Vui lòng chọn quận, huyện.',
            'province.required'=>'Vui lòng chọn tỉnh, thành phố.'
        ];
        $validator = Validator::make($all,[
            'first_name'=>'required|string',
            'last_name'=>'required|string',
            'birthday'=>'required|date_format:d-m-Y',
            'sex'=>'required|in:MALE,FEMALE',
            'photo'=>'required|image|mimes:jpg,jpeg,png',
            'phone'=>'required|regex:/(0)[0-9]{9,10}/',
            'email'=>'required|email',
            'role'=>'required',
            'password'=>'nullable|min:6',
            'detail'=>'required',
            'district'=>'required',
            'province'=>'required'
        ],$msgs);
        if(!$validator->fails()){
            $image = $request->file('photo');
            $image_name = 'dl-'.time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('/uploads'),$image_name);
            $all['photo'] = 'uploads/'.$image_name;
            if(!empty($request->password)){
                $all['password'] = bcrypt('password');
            }else{
                $all['password'] = bcrypt($request->password);
            }
            $all['address'] = $request->detail.', '.$request->ward.', '.$request->district.', '.$request->province;
            $all['birthday'] = date('Y-m-d',strtotime($all['birthday']));
            $all = collect($all);
            $all = $all->except(['detail','ward','district','province','role']);
            $user = User::create($all->toArray());
            $role = Role::find($request->role);
            $user->attachRole($role);
            return redirect()->route('users.index')->withMessages(['create-user'=>'Thêm mới nhân viên thành công.']);
        }
        return redirect()->back()->withErrors($validator)->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        if($user){
            return view('admin.users.show')->withUser($user);
        }
        return redirect()->back()->withErrors(['show-users'=>'Nhân viên không tồn tại.']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        if($user){
            return view('admin.users.show')->withUser($user);
        }
        return redirect()->back()->withErrors(['show-users'=>'Nhân viên không tồn tại.']);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
