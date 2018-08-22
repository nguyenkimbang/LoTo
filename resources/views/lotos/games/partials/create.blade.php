@extends('app')
@section('title')
Game | Create
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
					<form class="m-login__form m-form" action="" id="game-form" enctype="multipart/form-data">
						<input type="hidden" name="mod" value="update_game">
						<div class="form-group m-form__group">
							<input class="form-control m-input" type="text" placeholder="{{ __('Code') }}" name="code" >
						</div>
						<div class="form-group m-form__group">
							<input class="form-control m-input" type="number" placeholder="{{ __('Picked no') }}" name="picked_no" autocomplete="off" required>
						</div>

						<div class="form-group m-form__group">
							<input class="form-control m-input" type="number" placeholder="{{ __('Collection no') }}" name="collection_no" autocomplete="off" required>
						</div>

						<div class="form-group m-form__group">
							<input class="form-control m-input" type="text" placeholder="{{ __('Name') }}" name="name" autocomplete="off" required>
						</div>

						<div class="form-group m-form__group">
							<input class="form-control m-input" type="number" placeholder="{{ __('Price') }}" name="price" autocomplete="off" required>
						</div>

						<div class="form-group m-form__group">
							<input class="form-control m-input" type="file" placeholder="{{ __('Image') }}" id="image" name="image" autocomplete="off" size = '50'" required>
						</div>

						<div class="form-group m-form__group">
							<input class="form-control m-input" type="text" placeholder="{{ __('Color') }}" name="color" autocomplete="off" required>
						</div>

						<div class="form-group m-form__group">
							<input class="form-control m-input" type="text" placeholder="{{ __('Expire time') }}" name="expire_time" autocomplete="off" required>
						</div>

						<div class="form-group m-form__group">
							<input class="form-control m-input" type="text" placeholder="{{ __('Draw time') }}" name="draw_time" autocomplete="off" required>
						</div>

						<div class="form-group m-form__group">
							<input class="form-control m-input" type="text" placeholder="{{ __('Status') }}" name="status" autocomplete="off" required>
						</div>
						<div class="m-login__form-action">
							<button type="submit" id="m_login_signup_submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air  m-login__btn">
								{{ __('Create game') }}
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@section('scripts')
{!!Html::script('app/components/games/jquery-game.js?v='.time())!!}
@stop
@stop
