<x-authlayout>
    <x-bannerPrimary :Image="'https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/profile-layout-header.jpg'" class="top-0"/>
    <x-stickyNavbar />
    <main class="main-content  mt-0">
        <section>
          <div class="page-header min-vh-100">
            <div class="container">
              <div class="row d-flex justify-content-center">
                <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
                  <div class="card card-plain">
                    <div class="card-header pb-0 text-start">
                      <h4 class="font-weight-bolder">Add Account</h4>
                      <p class="mb-0">Details to create a new account</p>
                    </div>
                    <div class="card-body">
                      <form method="POST" action="{{route('add.account.store')}}">
                        @csrf
                        <div class="mb-3">
                          <input type="text" class="form-control form-control-lg" name="name" placeholder="Account Name" aria-label="Account Name" value="{{old('name')}}">
                          @error('name')
                                  <span class="text-danger text-xs mt-1">{{$message}}</span>
                          @enderror
                        </div>
                        <div class="mb-3">
                          <input type="text" class="form-control form-control-lg" name="type" placeholder="Account Type (Saving, Current)" aria-label="Account Type" value="{{old('type')}}">
                          @error('type')
                                  <span class="text-danger text-xs mt-1">{{$message}}</span>
                          @enderror
                        </div>
                        <div class="mb-3">
                          <input type="number" class="form-control form-control-lg" name="balance" placeholder="Balance" aria-label="Balance" value="{{old('balance')}}">
                          @error('balance')
                                  <span class="text-danger text-xs mt-1">{{$message}}</span>
                          @enderror
                        </div>
                        <div class="text-center">
                          <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Add Account</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                {{-- <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
                  <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden" style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/signin-ill.jpg');
              background-size: cover;">
                    <span class="mask bg-gradient-primary opacity-6"></span>
                    <h4 class="mt-5 text-white font-weight-bolder position-relative">"Attention is the new currency"</h4>
                    <p class="text-white position-relative">The more effortless the writing looks, the more effort the writer actually put into the process.</p>
                  </div>
                </div> --}}
              </div>
            </div>
          </div>
        </section>
      </main>
</x-authlayout>