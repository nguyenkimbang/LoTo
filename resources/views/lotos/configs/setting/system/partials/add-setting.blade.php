@extends('app')
@section('title')
Config | Create Setting
@stop
@section('contents')
<div class="m-grid__item m-grid__item--fluid m-wrapper">
	<div class="m-subheader ">
		<div class="d-flex align-items-center">
			<div class="mr-auto">
				<h3 class="m-subheader__title m-subheader__title--separator">Create Setting Form</h3>
				<ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
					<li class="m-nav__item m-nav__item--home">
						<a href="{{URL::to('/dashboard')}}" class="m-nav__link m-nav__link--icon">
							<i class="m-nav__link-icon la la-home"></i>
						</a>
					</li>
					<li class="m-nav__separator">-</li>
					<li class="m-nav__item">
						<a href="{{URL::to('/admin/config/setting')}}" class="m-nav__link">
							<span class="m-nav__link-text">Setting System</span>
						</a>
					</li>
					<li class="m-nav__separator">-</li>
					<li class="m-nav__item">
						<a href="{{URL::to('/admin/config/setting/create')}}" class="m-nav__link">
							<span class="m-nav__link-text">Setting & Add</span>
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
							<form class="m-form" action="" id="category-form" novalidate="">
								<div class="m-portlet__body">
									<div class="m-form__section m-form__section--first">
										<div class="form-group m-form__group">
											<label for="example-text-input">
												Code
											</label>
											@if(isset($setting) && isset($setting['Code']))
											<div class="form-control m-input">{{$setting['Code']}}</div>
											<input class="form-control m-input" type="hidden" placeholder="{{ __('') }}" name="Code" required value="{{$setting['Code']}}">
											@else
											<input class="form-control m-input" type="text" placeholder="{{ __('') }}" name="Code" autocomplete="off" required>
											@endif
										</div>
										<div class="form-group m-form__group">
											<label for="example-text-input">
												Value
											</label>
											@if(isset($setting) && isset($setting['Value']))
											<input class="form-control m-input" type="text" placeholder="{{ __('') }}" name="Value" autocomplete="off" required value="{{$setting['Value']}}">
											@else
											<input class="form-control m-input" type="text" placeholder="{{ __('') }}" name="Value" autocomplete="off" required>
											@endif
										</div>
										<div class="form-group m-form__group">
											<label for="example-text-input">
												Description
											</label>
											@if(isset($setting) && isset($setting['Description']))
											<textarea class="form-control m-input" placeholder="{{ __('') }}" name="Description" required>{{$setting['Description']}}</textarea>
											@else
											<textarea class="form-control m-input" placeholder="{{ __('') }}" name="Description" required rows="6"></textarea>
											@endif
										</div>
									</div>
								</div>
								<div class="m-portlet__foot m-portlet__foot--fit">
									<div class="m-form__actions" style="text-align: right;">
										<button type="submit" class="btn btn-success" id="{{isset($category['Code']) ? 'edit' : 'add'}}" style="margin-right: 8px">
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
@section('scripts')
{!!Html::script('app/components/configs/settings/jquery-system-setting.js?v='.time())!!}
@stop
@stop
