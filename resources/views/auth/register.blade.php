<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Responsive Login Form | CodingLab </title>
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  </head>
  <body>
    <section class="bg-light p-3 p-md-4 p-xl-5">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-6 col-xxl-6 d-flex align-items-center justify-content-center">
            <div class="card border-light-subtle shadow-sm">
              <div class="row g-0">
                <div class="col-12 col-md-12 d-flex align-items-center justify-content-center">
                  <div class="col-12 col-lg-11 col-xl-10 ">
                    <div class="card-body p-3 p-md-4 p-xl-5 ">
                      <div class="row">
                        <div class="col-12">
                          <div class="mb-5">
                            <div class="text-center mb-4">
                              <a href="#!">
                                <img src="assets/img/D.png" alt="BootstrapBrain Logo" width="175" height="157" style="border-radius: 50%">
                              </a>
                            </div>
                            <h4 class="text-center">Đăng Ký</h4>
                          </div>
                        </div>
                      </div>
                      <form action="{{route('store')}}" method="post">
                        @csrf
                        <div class="row gy-3 overflow-hidden">
                          <div class="col-12">
                            <div class="form-floating mb-3">
                              <input type="text" class="form-control" name="username" id="username" placeholder="name@example.com" required>
                              <label for="username" class="form-label">Họ Và Tên</label>
                              @if ($errors->has('username'))
                              <span class="" style="color: red ; font-size:14px">{{ $errors->first('username') }}</span>
                             @endif
                            </div>
                          </div>
                          <div class="col-12">
                            <div class="form-floating mb-3">
                              <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com" required>
                              <label for="email" class="form-label">Email</label>
                              @if ($errors->has('email'))
                              <span class="" style="color: red ; font-size:14px">{{ $errors->first('email') }}</span>
                             @endif
                            </div>
                          </div>
                          <div class="col-12">
                            <div class="form-floating mb-3">
                              <input type="password" class="form-control" name="password" id="password" value="" placeholder="Password" required>
                              <label for="password" class="form-label">Mật Khẩu</label>
                              @if ($errors->has('password'))
                              <span class="" style="color: red ; font-size:14px" >{{ $errors->first('password') }}</span>
                             @endif
                            </div>
                          </div>
                          <div class="col-12">
                            <div class="form-floating mb-3">
                              <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" value="" placeholder="Password" required>
                              <label for="password" class="form-label">Xác Nhận Mật Khẩu</label>
                              @if ($errors->has('password'))
                              <span class="" style="color: red ; font-size:14px">{{ $errors->first('password') }}</span>
                             @endif
                            </div>
                          </div>
                          <div class="col-12">
                            <div class="d-grid">
                              <button class="btn btn-primary btn-lg" type="submit">Đăng Ký</button>
                            </div>
                          </div>
                        </div>
                      </form>
                      <div class="row">
                        <div class="col-12">
                          <p class="text-center mt-3 mb-2">hoặc</p>
                          <div class="d-flex gap-3 flex-column">
                            <a href="#!" class="btn btn-lg btn-outline-dark">
                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-google" viewBox="0 0 16 16">
                                <path d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.689 7.689 0 0 1 5.352 2.082l-2.284 2.284A4.347 4.347 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.792 4.792 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.702 3.702 0 0 0 1.599-2.431H8v-3.08h7.545z" />
                              </svg>
                              <span class="ms-2 fs-6">Đăng nhập bằng Google</span>
                            </a>
                          </div>
                         
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-12">
                          <div class="d-flex gap-2 gap-md-4 flex-column flex-md-row justify-content-md-center mt-5">
                            <a href="{{asset('login')}}" class="link-secondary text-decoration-none">Đăng Nhập Ngay </a>
                            <a href="{{asset('/')}}" class="link-secondary text-decoration-none">Quay lại</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </body>
</html>