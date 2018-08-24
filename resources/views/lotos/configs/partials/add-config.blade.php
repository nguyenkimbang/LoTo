@extends('app')
@section('title')
Config | Create
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
							<form class="m-form" action="" id="config-form" novalidate="">
								<div class="m-portlet__body">
									<div class="m-form__section m-form__section--first">
										<div class="form-group m-form__group">
											<label for="example-text-input">
												Code
											</label>
											@if(isset($config) && isset($config['Code']))
											<div class="form-control m-input">{{$config['Code']}}</div>
											<input class="form-control m-input" type="hidden" placeholder="Enter Code" name="Code" required value="{{$config['Code']}}">
											@else
											<input class="form-control m-input" type="text" placeholder="{{ __('Enter Code') }}" name="Code" autocomplete="off" required>
											@endif
										</div>
										<div class="form-group m-form__group">
											<label for="example-text-input">
												Game code
											</label>
											@if(isset($config) && isset($config['Game_Code']))
											<input class="form-control m-input" type="text" placeholder="{{ __('Enter Game Code') }}"  name="Game_Code" autocomplete="off" size = '50'" required value="{{$config['Game_Code']}}">
											@else
											<input class="form-control m-input" type="text" placeholder="{{ __('Enter Game Code') }}" name="Game_Code" autocomplete="off" size = '50'" required>
											@endif
										</div>
										<div class="form-group m-form__group">
											<label for="example-text-input">
												Value
											</label>
											@if(isset($config) && isset($config['Value']))
											<input class="form-control m-input" type="number" placeholder="{{ __('Enter Value') }}" name="Value" autocomplete="off" required value="{{$config['Value']}}">
											@else
											<input class="form-control m-input" type="number" placeholder="{{ __('Enter Value') }}" name="Value" autocomplete="off" required>
											@endif
										</div>
										<div class="form-group m-form__group">
											<label for="example-text-input">
												ETH address
											</label>
											@if(isset($config) && isset($config['ETH_Address']))
											<input class="form-control m-input" type="text" placeholder="{{ __('Enter ETH Address') }}" name="ETH_Address" autocomplete="off" required value="{{$config['ETH_Address']}}">
											@else
											<input class="form-control m-input" type="text" placeholder="{{ __('Enter ETH Address') }}" name="ETH_Address" autocomplete="off" required>
											@endif
										</div>
										<input type="hidden" name="mod" value="update_config">
										@if(!isset($config))
											<input type="hidden" name="isCreate" value="true">
										@endif
										<div class="form-group m-form__group">
											<label for="example-text-input">
												Type
											</label>
											@if(isset($config) && isset($config['Type']))
											<input class="form-control m-input" type="number" placeholder="{{ __('Type') }}" name="Type" autocomplete="off" required value="{{$config['Type']}}">
											@else
											<input class="form-control m-input" type="number" placeholder="{{ __('Type') }}" name="Type" autocomplete="off" required>
											@endif
										</div>
										<div class="form-group m-form__group">
											<label for="example-text-input">
												Parent code
											</label>
											@if(isset($config) && isset($config['Parent_Code']))
											<select class="form-control m-input" name="Parent_Code" required>
												@if ($config['Parent_Code'] === 0)
												<option value="0" selected="">Parent</option>
												@endif
												@foreach($listParentCode as $key => $parentCode)
												<option value="{{$parentCode}}" {{$config['Parent_Code'] == $parentCode ? 'selected="selected"' : ''}}>{{$parentCode}}</option>
												@endforeach
											</select>
											@else
											<select class="form-control m-input" name="Parent_Code" required>
												<option value="">Choose parent code...</option>
												@foreach($listParentCode as $key => $parentCode)
												<option value="{{$parentCode}}">{{$parentCode}}</option>
												@endforeach
											</select>
											@endif
											{{-- <input class="form-control m-input" type="number" placeholder="{{ __('Parent_Code (Ex: 0)') }}" name="Parent_Code" autocomplete="off"> --}}
										</div>
										<div class="form-group m-form__group">
											<label for="example-text-input">
												Description
											</label>
											@if(isset($config) && isset($config['Description']))
											<textarea class="form-control m-input" placeholder="{{ __('') }}" name="Description" required rows="8">{{$config['Description']}}</textarea>
											@else
											<textarea class="form-control m-input" placeholder="{{ __('') }}" name="Description" required rows="8"></textarea>
											@endif
										</div>
										<div class="form-group m-form__group">
											<label for="example-text-input">
												Status
											</label>
											@if(isset($config) && isset($config['Status']))
											<div>
												<span class="m-switch m-switch--icon m-switch--success">
													<label>
														<input type="checkbox" {{$config['Status'] ? 'checked="checked"' : ''}} name="Status" required="">
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
									<div class="m-portlet__foot m-portlet__foot--fit">
										<div class="m-form__actions" style="text-align: right;">
											<button type="submit" class="btn btn-success" id="{{isset($config['Code']) ? 'edit' : 'add'}}" style="margin-right: 8px">
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
</div>
@section('scripts')
{!!Html::script('app/components/configs/jquery-config.js?v='.time())!!}
@stop
@stop
