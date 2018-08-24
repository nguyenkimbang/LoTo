@extends('app')
@section('title')
User | Add
@stop
@section('contents')
<div class="m-grid__item m-grid__item--fluid m-wrapper">
	<div class="m-subheader ">
		<div class="d-flex align-items-center">
			<div class="mr-auto">
				<h3 class="m-subheader__title m-subheader__title--separator">Create Config Form</h3>
				<ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
					<li class="m-nav__item m-nav__item--home">
						<a href="{{URL::to('/dashboard')}}" class="m-nav__link m-nav__link--icon">
							<i class="m-nav__link-icon la la-home"></i>
						</a>
					</li>
					<li class="m-nav__separator">-</li>
					<li class="m-nav__item">
						<a href="" class="m-nav__link">
							<span class="m-nav__link-text">Add Config</span>
						</a>
					</li>
				</ul>
			</div>
			<div>
			</div>
		</div>
		<div class="m-content">
			<div class="row">
				<div class="col-lg-12">
					<!--begin::Portlet-->
					<div class="col-lg-4"></div>
					<div class="col-lg-8" style="margin: 0 auto">
						<div class="m-portlet">
							<div class="m-portlet__head">
								<div class="m-portlet__head-caption">
									<div class="m-portlet__head-title">
										<span class="m-portlet__head-icon m--hide">
											<i class="la la-gear"></i>
										</span>
										<h3 class="m-portlet__head-text">
										Create Config Form
										</h3>
									</div>
								</div>
							</div>
							<form class="m-form" action="" id="user-form" method="post" novalidate="">
								<div class="m-portlet__body">
									<div class="m-form__section m-form__section--first">
										<div class="form-group m-form__group">
											<label for="example-text-input">
												Username
											</label>
											@if(isset($user) && isset($user['Username']))
											<input class="form-control m-input" type="text" placeholder="{{ __('Enter User Name')}}" name="Username" required value="{{$user['Username']}}">
											@else
											<input class="form-control m-input" type="text" placeholder="{{ __('Enter Username')}}" name="Username" required>
											@endif
										</div>
										<div class="form-group m-form__group">
											<label for="example-text-input">
												Fullname
											</label>
											@if(isset($user) && isset($user['Full_Name']))
											<input class="form-control m-input" type="text" placeholder="{{ __('Enter Fullname')}}" name="Full_Name" required value="{{$user['Full_Name']}}">
											@else
											<input class="form-control m-input" type="text" placeholder="{{ __('Enter Fullname')}}" name="Full_Name" required>
											@endif
										</div>
										<div class="form-group m-form__group">
											<label for="example-text-input">
												Role Code
											</label>
											@if(isset($user) && isset($user['Role_Code']))
											<input class="form-control m-input" type="text" placeholder="{{ __('Enter Role Code')}}" name="Role_Code" required value="{{$user['Role_Code']}}">
											@else
											<input class="form-control m-input" type="text" placeholder="{{ __('Enter Role Code')}}" name="Role_Code" required>
											@endif
										</div>
										<div class="form-group m-form__group">
											<label for="example-text-input">
												Avatar
											</label>
											@if(isset($user) && isset($user['Image']))
											<input class="form-control m-input" type="file" placeholder="{{ __('Choose Image...') }}" id="image" name="Avatar" autocomplete="off" size = '50'" required value="{{$game['Image']}}">
											@else
											<input class="form-control m-input" type="file" placeholder="{{ __('Chosse Image...') }}" id="image" name="Avatar" autocomplete="off" size = '50'" required>
											@endif
										</div>
										@if(!isset($user))
										<div class="form-group m-form__group">
											<label for="example-text-input">
												Password
											</label>
											@if(isset($user) && isset($user['Password']))
											<input class="form-control m-input" type="password" placeholder="{{ __('Enter Password')}}" name="Password" required value="{{$user['Password']}}">
											@else
											<input class="form-control m-input" type="password" placeholder="{{ __('Enter Password')}}" name="Password" required>
											@endif
										</div>
										@endif
									</div>
								</div>
								<div class="m-portlet__foot m-portlet__foot--fit">
									<div class="m-form__actions" style="text-align: right;">
										<button type="button" class="btn btn-success" id="{{isset($user['ID']) ? 'edit' : 'add'}}" style="margin-right: 8px">
										Submit
										</button>
										<button type="reset" class="btn btn-default">
										Cancel
										</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop
@section('scripts')
{!!Html::script('app/components/users/jquery-user.js?v='.time())!!}
@stop