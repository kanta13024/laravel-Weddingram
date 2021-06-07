@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <span>
                <a href="{{ route('mypage') }}">マイページ</a> > 会員情報の編集
            </span>

            <h1 class="mt-3 mb-3">会員情報の編集</h1>

            <hr>

            <form method="POST" action="/users/mypage" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <div class="form-group">
                    <div class="d-flex justify-content-between">
                        <label for="name" class="text-md-left edit-user-info-label">氏名</label>
                        <span onclick="switchEditUserInfo('.userName', '.editUserName', '.userNameEditLabel');" class="userNameEditLabel user-edit-label">
                            編集
                        </span>
                    </div>
                    <div class="collapse show userName">
                        <h1 class="edit-user-info-value">{{ $user->name }}</h1>
                    </div>
                    <div class="collapse editUserName">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus placeholder="侍 太郎">

                        <button type="submit" class="btn submit-button mt-3 w-25">
                            保存
                        </button>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>氏名を入力してください</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <hr>

                <div class="form-group">
                    <div class="d-flex justify-content-between">
                        <label for="icon" class="text-md-left edit-user-info-label">アイコン</label>
                        <span onclick="switchEditUserInfo('.userIcon', '.editUserIcon', '.userIconEditLabel');" class="userIconEditLabel user-edit-label">
                            編集
                        </span>
                    </div>
                    <div class="collapse show userIcon">
                        <img src="{{ asset('storage/posts/' . $user->icon ) }}" alt="" class="img-thumbnail">
                        <h1 class="edit-user-info-value">{{ $user->icon }}</h1>
                    </div>
                    <div class="collapse editUserIcon">
                        <input id="icon" type="file" class="form-control @error('icon') is-invalid @enderror" name="icon" value="{{ $user->icon }}" required autocomplete="icon" autofocus>

                        <button type="submit" class="btn submit-button mt-3 w-25">
                            保存
                        </button>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>画像を選択してください</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <hr>

                <div class="form-group">
                    <div class="d-flex justify-content-between">
                        <label for="email" class="text-md-left edit-user-info-label">メールアドレス</label>
                        <span onclick="switchEditUserInfo('.userMail', '.editUserMail', '.userMailEditLabel');" class="userMailEditLabel user-edit-label">
                            編集
                        </span>
                    </div>
                    <div class="collapse show userMail">
                        <h1 class="edit-user-info-value">{{ $user->email }}</h1>
                    </div>
                    <div class="collapse editUserMail">
                        <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email" autofocus placeholder="samurai@samurai.com">

                        <button type="submit" class="btn submit-button mt-3 w-25">
                            保存
                        </button>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>メールアドレスを入力してください</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <hr>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    let switchEditUserInfo = (textClass, inputClass, labelClass) => {
        if ($(textClass).css('display') == 'block') {
            $(labelClass).text("キャンセル");
            $(textClass).collapse('hide');
            $(inputClass).collapse('show');
        } else {
            $(labelClass).text("編集");
            $(textClass).collapse('show');
            $(inputClass).collapse('hide');
        }
    }
</script>
@endsection
