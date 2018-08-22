<html lang="en" >
    <!-- begin::Head -->
    <head>
        <meta charset="utf-8" />
        <title>
            Login
        </title>
        <meta name="description" content="Latest updates and statistic charts">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!--begin::Web font -->
        <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
        <script>
          WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
          });
        </script>
        <!--end::Web font -->

        @include('shared/head')

        <link rel="shortcut icon" href="{!!Asset('images/users/media/img/logos/favicon.ico')!!}" />
    </head>

    <body  class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">
        <div class="m-grid m-grid--hor m-grid--root m-page">
            <div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor m-login m-login--signin m-login--2 m-login-2--skin-2" id="m_login" style="background-image: url({!!Asset('images/users/media/img//bg/bg-3.jpg')!!}">
                <div class="m-grid__item m-grid__item--fluid m-login__wrapper">
                    <div class="m-login__container">
                        <div class="m-login__logo">
                            <a href="#">
                                <img src="{!!Asset('images/users/media/img//logos/logo-1.png')!!}" alt="logo-header-login">
                            </a>
                        </div>
                        <div class="m-login__signin">
                            <div class="m-login__head">
                                <h3 class="m-login__title">
                                    Sign In To Admin
                                </h3>
                            </div>
                            {{-- action="{{ URL::to('/api/user/login') }}" --}}
                            <form class="m-login__form m-form" method="POST"  aria-label="{{ __('Login') }}" id="form-login">
                                <!-- insert input token with type hidden-->
                                {{-- @csrf --}}

                                <div class="form-group m-form__group">
                                    <div id="show-error"></div>
                                </div>

                                <!-- start input Email --->
                                <div class="form-group m-form__group">
                                    <input class="form-control m-input {{ $errors->has('username') ? ' is-invalid' : '' }}"   type="text" placeholder="Username" name="username" autocomplete="off" value="{{ old('username') }}">
                                    <span id="username-error" class="invalid-feedback-line"></span>
                                </div>
                                <!-- end Input Email -->

                                <!-- start Input Password-->
                                <div class="form-group m-form__group">
                                    <input class="form-control m-input m-login__form-input--last {{ $errors->has('password') ? ' is-invalid' : '' }}" type="password" placeholder="Password" name="password">
                                    <span id="password-error" class="invalid-feedback-line"></span>
                                </div>
                                <!-- end Input Email -->
                                <div class="m-login__form-action">
                                    <button id="m_login_signin_submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn m-login__btn--primary" type="submit">
                                        Sign In
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    @include('shared/scripts')
    {!!Html::script('app/components/users/userForm.js?v='.time())!!}
</html>
