<x-authlayout>
    <x-bannerPrimary :Image="'https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/profile-layout-header.jpg'" class="top-0" />
    <x-stickyNavbar />
    <main class="main-content  mt-0">
        <section>
            <div class="page-header min-vh-100">
                <div class="container">
                    <div class="row d-flex justify-content-center">
                        <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
                            <div class="card card-plain">
                                <div class="card-header pb-0 text-start">
                                    <h4 class="font-weight-bolder">Inter Account Transfer</h4>
                                    <p class="mb-0">Select Accounts and Amount to Transfer</p>
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="{{ route('post.transfer.interAccount') }}">
                                        @csrf
                                        <div class="mb-3">
                                            <select class="form-select form-control-lg" aria-label="From"
                                                name="from">
                                                <option value="">From</option>

                                                @foreach ($accounts as $account)
                                                    <option value="{{ $account->id }}">
                                                        {{ $account->name }} - <span>{{ $account->balance }}pkr</span>
                                                    </option>
                                                @endforeach

                                            </select>
                                            @error('type')
                                                <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <select class="form-select form-control-lg" aria-label="to" name="to">
                                                <option value="">To</option>

                                                @foreach ($accounts as $account)
                                                    <option value="{{ $account->id }}">
                                                        {{ $account->name }} - <span>{{ $account->balance }}pkr</span>
                                                    </option>
                                                @endforeach

                                            </select>
                                            @error('type')
                                                <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <input type="text" class="form-control form-control-lg" name="amount"
                                                placeholder="Amount" aria-label="Amount" value="{{ old('amount') }}">
                                            @error('amount')
                                                <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <input type="text" class="form-control form-control-lg" name="fee"
                                                placeholder="Fee" aria-label="Fee" value="{{ old('fee') }}">
                                            @error('fee')
                                                <span class="text-danger text-xs mt-1">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="text-center">
                                            <button type="submit"
                                                class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Transfer</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</x-authlayout>
