<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng ký</title>
    
    {{-- Google font --}}
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <!-- Font -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('frontend/fonts/themify-icons/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/fonts/linearicons/style.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/fonts/linea/styles.css')}}">

    <!-- CSS only -->
    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}" type="text/css">
    <style>
      .vh-100 {
        height: 100vh !important;
      }
      .h-custom {
        height: calc(100% - 73px);
      }
      @media (max-width: 450px) {
        .h-custom {
          height: 100%;
        }
      }
      .divider:after,
      .divider:before {
        content: "";
        flex: 1;
        height: 1px;
        background: #eee;
      }
      body {
        font-family: 'Roboto', sans-serif;
      }
      
    </style>
</head>
<body>
    <section class="vh-100" style="height: 100vh !important;">
        <div class="container-fluid h-custom">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
              <img src="https://mdbootstrap.com/img/Photos/new-templates/bootstrap-login-form/draw2.png" class="img-fluid"
                alt="Sample image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                @if(Session::has('success'))
                <div class="alert alert-success" role="alert">
                  {{Session::get('success')}}
                </div>
              @endif 
              @if(Session::has('error'))
                <div class="alert alert-danger" role="alert">
                  {{Session::get('error')}}
                </div>
              @endif
              <form action="{{ route('user.register') }}" method="POST" novalidate="">
                @csrf
                <div class="d-flex flex-column align-items-start justify-content-start justify-content-lg-start">
                  <h2 class="mb-2">Đăng ký</h2>
                  <p>Vui lòng điền vào biểu mẫu này để tạo một tài khoản.</p>
                  <div class="alert alert-danger">
                    <small>Khi bạn đăng ký mà trong hộp thư đến không có thông tin xác thực, bạn vui lòng kiểm tra thư rác để xác thực.</small>
                  </div>
                  {{-- <p class="lead fw-normal mb-0 me-3">Đăng ký</p> --}}
                  
                </div>
      
                {{-- <div class="divider d-flex align-items-center my-4">
                  <p class="text-center fw-bold mx-3 mb-0">Hoặc</p>
                </div> --}}
                
                <div class="form-outline mb-4">
                 <label class="form-label" for="fullname">Họ và tên</label>
                 <input type="text" name="fullname" id="fullname" class="form-control form-control-lg"
                  placeholder="Nhập họ tên" />
                  <div class="invalid-feedback">Họ tên không được bỏ trống.</div>
                  @error('fullname')
                    <small class="text-danger">{{$message}}</small>
                  @enderror
                </div>

                <!-- Email input -->
                <div class="form-outline mb-4">
                  <label class="form-label" for="form3Example3">Địa chỉ Email</label>
                  <input type="email" name="email" id="form3Example3" class="form-control form-control-lg"
                    placeholder="Nhập địa chỉ Email" />
                    <div class="invalid-feedback">Email không được bỏ trống.</div>
                    @error('email')
                            <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
      
                <!-- Password input -->
                <div class="form-outline mb-3">
                  <label class="form-label" for="form3Example4">Mật khẩu</label>
                  <input type="password" name="password" id="form3Example4" class="form-control form-control-lg"
                    placeholder="Nhập mật khẩu" />
                    <div class="invalid-feedback">Mật khẩu không được bỏ trống.</div>
                    @error('password')
                      <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-outline mb-3">
                    @error('password_confirmation')
                            <small class="help-block">{{$message}}</small>
                    @enderror
                    <input type="password" name="password_confirmation" id="form3Example4" class="form-control form-control-lg"
                      placeholder="Nhập lại mật khẩu" />
                    <label class="form-label" for="form3Example4">Nhập lại mật khẩu</label>
                  </div>    
                <div class="text-center text-lg-start mt-4 pt-2">
                  <button type="submit" class="btn btn-primary btn-lg"
                    style="padding-left: 2.5rem; padding-right: 2.5rem;">Đăng ký</button>
                  <p class="small fw-bold mt-2 pt-1 mb-0">Bạn Đã có tài khoản! <a href="{{ route('home.login') }}"
                      class="link-danger">Đăng nhập ngay</a></p>
                </div>
      
              </form>
            </div>
          </div>
        </div>
      </section>
    
</body>
</html>