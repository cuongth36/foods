<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Notifications\RegisterUser;
use Illuminate\Support\Facades\Log;

class CustomerController extends Controller
{
    // Hiển thị form đăng ký
    public function create() 
    {
        // Gọi form đăng ký trong thư mục resouce/views
        return view('register');
    }

    // Thực hiển đăng ký user
    public function store(Request $request)
    {
        try {
            // Validate thông tin tên, email, password
            $request->validate([
                'fullname' => 'required|string|max:255',  // validate thông tin họ tên bắt buộc phải nhập
                'email' => '|unique:users|required|email', // validate định dạng email và kiểm tra email đã tồn tại hay chưa
                'password' => ['required', 'string', 'min:8', 'confirmed'], // validate thông tin password bắt buộc nhập và phải từ 8 ký tự trở lên
            ],
            [
                'required' => ':attribute không được bỏ trống',
                'fullname.max' => 'Độ dài tối đa của tên là 255 ký tự ',
                'string' => 'Chuỗi',
                'unique' => 'Email đã tồn tại',
                'confirmed' => 'Mật khẩu không khớp',
                'min' => 'Độ dài tối thiếu của mật khẩu là 6 ký tự'
            ],
            [
                'fullname' => 'Họ và tên',
                'password' => 'Mật khẩu',
                'email' => 'Email'
            ]);
    
            $active_token = md5($request->input('email').time());
            $customer =  User::create([
                'name'     =>   trim($request->input('fullname')),
                'email'    => trim($request->input('email')),
                'password' => trim(Hash::make($request->input('password'))),
                'active_token' => $active_token,
            ]);
            
            // Link active user
            $linkActive = route('active.user', "active-token=$active_token");
    
            // Tiến hành gửi mail đến user đăng ký
            $customer->notify(new RegisterUser($linkActive));
    
            return redirect()->route('home.register')->with('success', 'Bạn vui lòng kiểm tra email để kích hoạt tài khoản');
        } catch(\Exception $e) {
            Log::error($e->getMessage());

            return redirect()->route('home.register')->with('error', 'Đăng ký không thành công! Bạn vui lòng đăng ký lại sau');
        }

    }

    // Tiến hành active user
    public function activeUser(Request $request) 
    {
        $active_token =$request->input('active-token');
        $num_active_token = User::where('active_token', '=' , "$active_token")->where('is_active', '=', '0')->count();
        if($num_active_token > 0){
             User::where('active_token', '=' , "$active_token")->where('is_active', '=', '0')->update([
                'is_active' => '1'
            ]);
            $user = User::where('active_token', '=',  $active_token)->where('is_active', '=', '1')->first();
            session([
                'login' => true,
                'id'    => $user->id,
                'name'  => $user->name,
            ]);

            return redirect('kich-hoat-thanh-cong');
        } else{
            return abort(404);
        }
    }

    // Di chuyển đến màn hình thông báo active user thành công
    public function activeSuccess() 
    {
        return view('user.active-user-success');
    }

    // Hiển thị form quên mật khẩu
    public function viewForgotPassword()
    {}

    // Kiểm tra thông tin email cần thay đổi mật khẩu
    public function forgotPassword() 
    {
        
    }
}
