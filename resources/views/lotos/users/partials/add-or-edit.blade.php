@extends('app')
@section('title')
User | Add
@stop

@section('contents')
<div class="m-grid m-grid--hor m-grid--root m-page">
	<div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor m-login m-login--signin m-login--2 m-login-2--skin-2" id="m_regis" style="background-image: url({!!Asset('images/users/media/img//bg/bg-3.jpg')!!}">
		<div class="m-grid__item m-grid__item--fluid m-login__wrapper">
			<div class="m-login__container">
				<div class="m-login__logo">
					<a href="#">
						<img src="{!!Asset('images/users/media/img//logos/logo-1.png')!!}" alt="logo-header-regis">
					</a>
				</div>
				<div class="m-login__signup">
					<div class="m-login__head">
						<h3 class="m-login__title">
							Create Account
						</h3>
					</div>
					<form class="m-login__form m-form" action="" id="user-form">
						<div class="form-group m-form__group">
							<input class="form-control m-input" type="text" placeholder="{{ __('Username') }}" name="Username" >
							@if ($errors->has('Username'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('Username') }}</strong>
                                </span>
                            @endif
						</div>
						<div class="form-group m-form__group">
							<input class="form-control m-input" type="text" placeholder="{{ __('FullName') }}" name="Full_Name" autocomplete="off">
							@if ($errors->has('Full_Name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('Full_Name') }}</strong>
                                </span>
                            @endif
						</div>

						<div class="form-group m-form__group">
							<input class="form-control m-input" type="text" placeholder="{{ __('Role Code') }}" name="Role_Code" autocomplete="off">
							@if ($errors->has('Role_Code'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('Role_Code') }}</strong>
                                </span>
                            @endif
						</div>

						<div class="form-group m-form__group">
							<input class="form-control m-input" type="password" placeholder="{{ __('Password') }}" name="password">
							@if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
						</div>
						<div class="m-login__form-action">
							<button id="m_login_signup_submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air  m-login__btn" type="submit">
								{{ __('Sign up') }}
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@stop
@section('scripts')
{!!Html::script('app/components/users/jquery-user.js?v='.time())!!}
@stop
