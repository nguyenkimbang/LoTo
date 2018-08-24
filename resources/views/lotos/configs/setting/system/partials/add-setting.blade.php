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
			<div>
				<div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover" aria-expanded="true">
					<a href="#" class="m-portlet__nav-link btn btn-lg btn-secondary  m-btn m-btn--outline-2x m-btn--air m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle">
						<i class="la la-plus m--hide"></i>
						<i class="la la-ellipsis-h"></i>
					</a>
					<div class="m-dropdown__wrapper">
						<span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
						<div class="m-dropdown__inner">
							<div class="m-dropdown__body">
								<div class="m-dropdown__content">
									<ul class="m-nav">
										<li class="m-nav__section m-nav__section--first m--hide">
											<span class="m-nav__section-text">Quick Actions</span>
										</li>
										<li class="m-nav__item">
											<a href="" class="m-nav__link">
												<i class="m-nav__link-icon flaticon-share"></i>
												<span class="m-nav__link-text">Activity</span>
											</a>
										</li>
										<li class="m-nav__item">
											<a href="" class="m-nav__link">
												<i class="m-nav__link-icon flaticon-chat-1"></i>
												<span class="m-nav__link-text">Messages</span>
											</a>
										</li>
										<li class="m-nav__item">
											<a href="" class="m-nav__link">
												<i class="m-nav__link-icon flaticon-info"></i>
												<span class="m-nav__link-text">FAQ</span>
											</a>
										</li>
										<li class="m-nav__item">
											<a href="" class="m-nav__link">
												<i class="m-nav__link-icon flaticon-lifebuoy"></i>
												<span class="m-nav__link-text">Support</span>
											</a>
										</li>
										<li class="m-nav__separator m-nav__separator--fit">
										</li>
										<li class="m-nav__item">
											<a href="#" class="btn btn-outline-danger m-btn m-btn--pill m-btn--wide btn-sm">Submit</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
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
							<form class="m-form" action="" id="category-form">
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
