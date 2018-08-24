@extends('app')
@section('title')
Game | Create
@stop
@section('contents')
<div class="m-grid__item m-grid__item--fluid m-wrapper">
	<div class="m-subheader ">
		<div class="d-flex align-items-center">
			<div class="mr-auto">
				<h3 class="m-subheader__title m-subheader__title--separator">Create Game Form</h3>
				<ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
					<li class="m-nav__item m-nav__item--home">
						<a href="{{URL::to('/dashboard')}}" class="m-nav__link m-nav__link--icon">
							<i class="m-nav__link-icon la la-home"></i>
						</a>
					</li>
					<li class="m-nav__separator">-</li>
					<li class="m-nav__item">
						<a href="{{URL::to('/admin/game')}}" class="m-nav__link">
							<span class="m-nav__link-text">Game</span>
						</a>
					</li>
					<li class="m-nav__separator">-</li>
					<li class="m-nav__item">
						<a href="{{URL::to('/admin/game/create')}}" class="m-nav__link">
							<span class="m-nav__link-text">Game & Add</span>
						</a>
					</li>
				</ul>
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
										Create Setting Form
										</h3>
									</div>
								</div>
							</div>
							<form class="m-form" id="category-form" novalidate="">
								<div class="m-portlet__body">
									<div class="m-form__section m-form__section--first">
										<div class="form-group m-form__group">
											<label for="example-text-input">
												Code
											</label>
											@if(isset($game) && isset($game['Code']))
											<div class="form-control m-input">{{$game['Code']}}</div>
											<input class="form-control m-input" type="hidden" placeholder="{{ __('Ex: PR1') }}" name="Code" required value="{{$game['Code']}}">
											@else
											<input class="form-control m-input" type="text" placeholder="{{ __('Code') }}" name="Code" autocomplete="off" required>
											@endif
										</div>
										<div class="form-group m-form__group">
											<label for="example-text-input">
												Picked no
											</label>
											@if(isset($game) && isset($game['Picked_No']))
											<input class="form-control m-input" type="number" placeholder="{{ __('Picked no') }}" name="Picked_No" autocomplete="off" required value="{{$game['Picked_No']}}">
											@else
											<input class="form-control m-input" type="number" placeholder="{{ __('Picked no') }}" name="Picked_No" autocomplete="off" required>
											@endif
										</div>
										<div class="form-group m-form__group">
											<label for="example-text-input">
												Collection no
											</label>
											@if(isset($game) && isset($game['Collection_No']))
											<input class="form-control m-input" type="number" placeholder="{{ __('Collection no') }}" name="Collection_No" autocomplete="off" required value="{{$game['Collection_No']}}">
											@else
											<input class="form-control m-input" type="number" placeholder="{{ __('Collection no') }}" name="Collection_No" autocomplete="off" required>
											@endif
										</div>
										<div class="form-group m-form__group">
											<label for="example-text-input">
												Name
											</label>
											@if(isset($game) && isset($game['Name']))
											<input class="form-control m-input" type="text" placeholder="{{ __('Name') }}" name="Name" autocomplete="off" required value="{{$game['Name']}}">
											@else
											<input class="form-control m-input" type="text" placeholder="{{ __('Name') }}" name="Name" autocomplete="off" required>
											@endif
										</div>
										<div class="form-group m-form__group">
											<label for="example-text-input">
												Price
											</label>
											@if(isset($game) && isset($game['Price']))
											<input class="form-control m-input" type="number" placeholder="{{ __('Price') }}" name="Price" autocomplete="off" required value="{{$game['Price']}}">
											@else
											<input class="form-control m-input" type="number" placeholder="{{ __('Price') }}" name="Price" autocomplete="off" required>
											@endif
										</div>
										<div class="form-group m-form__group">
											<label for="example-text-input">
												Image
											</label>
											@if(isset($game) && isset($game['Image']))
											<input class="form-control m-input" type="file" placeholder="{{ __('Image111') }}" id="image" name="Image" autocomplete="off" size = '50'" required value="{{$game['Image']}}">
											@else
											<input class="form-control m-input" type="file" placeholder="{{ __('Image') }}" id="image" name="Image" autocomplete="off" size = '50'" required>
											@endif
										</div>
										<div class="form-group m-form__group">
											<label for="example-text-input">
												Color
											</label>
											@if(isset($game) && isset($game['Color']))
											<input class="form-control m-input" type="text" placeholder="{{ __('Color') }}" name="Color" autocomplete="off" required value="{{$game['Color']}}">
											@else
											<input class="form-control m-input" type="text" placeholder="{{ __('Color') }}" name="Color" autocomplete="off" required>
											@endif
										</div>
										<div class="form-group m-form__group">
											<label for="example-text-input">
												Expire time
											</label>
											@if(isset($game) && isset($game['Expire_Time']))
											<input class="form-control m-input" type="text" placeholder="{{ __('Expire time') }}" name="Expire_Time" autocomplete="off" required value="{{$game['Expire_Time']}}">
											@else
											<input class="form-control m-input" type="text" placeholder="{{ __('Expire time') }}" name="Expire_Time" autocomplete="off" required>
											@endif
										</div>
										<div class="form-group m-form__group">
											<label for="example-text-input">
												Draw time
											</label>
											@if(isset($game) && isset($game['Draw_Time']))
											<input class="form-control m-input" type="text" placeholder="{{ __('Draw time') }}" name="Draw_Time" autocomplete="off" required value="{{$game['Draw_Time']}}">
											@else
											<input class="form-control m-input" type="text" placeholder="{{ __('Draw time') }}" name="Draw_Time" autocomplete="off" required>
											@endif
										</div>
										<div class="form-group m-form__group">
											<label for="example-text-input">
												Status
											</label>
											@if(isset($game) && isset($game['Status']))
											<div>
												<span class="m-switch m-switch--icon m-switch--success">
													<label>
														<input type="checkbox" {{$game['Status'] ? 'checked="checked"' : ''}} name="Status" required="">
														<span></span>
													</label>
												</span>
											</div>
											@else
											<div>
												<span class="m-switch m-switch--icon m-switch--success">
													<label>
														<input type="checkbox" checked="checked" name="Status" required="">
														<span></span>
													</label>
												</span>
											</div>
											@endif
										</div>
									</div>
								</div>
								<div class="m-portlet__foot m-portlet__foot--fit">
									<div class="m-form__actions" style="text-align: right;">
										<button type="button" class="btn btn-success" id="{{isset($category['Code']) ? 'edit' : 'add'}}" style="margin-right: 8px">
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
{!!Html::script('app/components/games/jquery-game.js?v='.time())!!}
@stop
