<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            会員情報
        </h2>
    </x-slot>
    <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header d-flex justify-content-between">
                <div>会員情報</div>
                <a href="{{ route('user.edit', ['user' => $user->id]) }}">
                <div>編集</div>
                </a>
              </div>
              
              <div class="card-body">
                <div class="form-group row">
                  <label for="name" class="col-md-4 col-form-label text-md-right">お名前</label>
                    <div class="col-md-6">
                      <span class="">{{$user->name}}</span>
                        <input type="hidden" name="name" value="{{$user->name}}">
                    </div>
                </div>
      
                <div class="form-group row">
                  <label for="name_pronunciation" class="col-md-4 col-form-label text-md-right">フリガナ</label>
                    <div class="col-md-6">
                      <span class="">{{$user->name_pronunciation}}</span>
                        <input type="hidden" name="name_pronunciation" value="{{$user->name_pronunciation}}">
                    </div>
                </div>
      
                <div class="form-group row">
                  <label for="email" class="col-md-4 col-form-label text-md-right">メールアドレス</label>
                    <div class="col-md-6">
                      <span class="">{{$user->email}}</span>
                        <input type="hidden" name="email" value="{{$user->email}}">
                    </div>
                </div>
      
                <div class="form-group row">
                  <label for="zipcode" class="col-md-4 col-form-label text-md-right">郵便番号</label>
                    <div class="col-md-6">
                      <span class="">{{$user->zipcode}}</span>
                        <input type="hidden" name="zipcode" value="{{$user->zipcode}}">
                    </div>
                </div>
      
                <div class="form-group row">
                  <label for="city" class="col-md-4 col-form-label text-md-right">住所</label>
                    <div class="col-md-6">
                      <span class="">{{$user->city}}</span>
                        <input type="hidden" name="city" value="{{$user->city}}">
                    </div>
                </div>
      
                <div class="form-group row">
                  <label for="tel" class="col-md-4 col-form-label text-md-right">電話番号</label>
                    <div class="col-md-6">
                      <span class="">{{$user->tel}}</span>
                        <input type="hidden" name="tel" value="{{$user->tel}}">
                    </div>
                </div>
      
                <div class="form-group row">
                  <label for="age" class="col-md-4 col-form-label text-md-right">生年月日</label>
                    <div class="col-md-6">
                      <span class="">{{$user->birth_year}}年</span>
                      <input type="hidden" name="age" class="d-flex align-items-end" value="{{$user->birth_year}}">
                      <span class="">{{$user->birth_month}}月</span>
                      <input type="hidden" name="age" value="{{$user->birth_month}}">
                      <span class="">{{$user->birth_day}}日</span>
                      <input type="hidden" name="age" value="{{$user->birth_day}}">
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
</x-app-layout>