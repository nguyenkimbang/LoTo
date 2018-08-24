@extends('app')
@section('title')
Config | Create
@stop
@section('contents')
<div class="m-portlet m-portlet--tab col-xs-12">
	{{-- <div class="m-portlet__head">
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
	</div> --}}
	<div class="header-config-form">
		<div style="text-align: center; font-size: 30px; margin-top: 60px;">
			Create Config Form
		</div>
		<div class="col-xs-12" style="text-align: center; margin-top: 20px; font-size: 20px;">
			<div class="" id="show-error-config"></div>
		</div>
	</div>
	<div class="content-config-form">
	<!--begin::Form-->
		<form class="m-form m-form--fit m-form--label-align-right" action="" id="config-form">
			<div class="" style="width: 50%; margin-top: 5px; float:left">


					<div class="form-group m-form__group">
						<label for="example-text-input">
							Code
						</label>
						@if(isset($config) && isset($config['Code']))
							<div class="form-control m-input m-input--air">{{$config['Code']}}</div>
							<input class="form-control m-input m-input--air" type="hidden" placeholder="{{ __('Ex: PR1') }}" name="Code" required value="{{$config['Code']}}">
						@else
						   <input class="form-control m-input m-input--air" type="text" placeholder="{{ __('Ex: PR1') }}" name="Code" autocomplete="off" required>
						@endif
					</div>
					<div class="form-group m-form__group">
						<label for="example-text-input">
							Description
						</label>
						@if(isset($config) && isset($config['Description']))
							<textarea class="form-control m-input m-input--air" placeholder="{{ __('') }}" name="Description" required>{{$config['Description']}}</textarea>
						@else
						   <textarea class="form-control m-input m-input--air" placeholder="{{ __('') }}" name="Description" required></textarea>
						@endif

					</div>

					<div class="form-group m-form__group">
						<label for="example-text-input">
							Value
						</label>
						@if(isset($config) && isset($config['Value']))
							<input class="form-control m-input m-input--air" type="number" placeholder="{{ __('Ex: 0-100') }}" name="Value" autocomplete="off" required value="{{$config['Value']}}">
						@else
						   <input class="form-control m-input m-input--air" type="number" placeholder="{{ __('Ex: 0-100') }}" name="Value" autocomplete="off" required>
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

					<input type="hidden" name="mod" value="update_config">
					<input type="hidden" name="isCreate" value="true">
			</div>
			<div class="" style="width: 50%; margin-top: 5px; float:left">
					<div class="form-group m-form__group">
						<label for="example-text-input">
							Type
						</label>
						@if(isset($config) && isset($config['Type']))
							<input class="form-control m-input m-input--air" type="number" placeholder="{{ __('Ex: 1') }}" name="Type" autocomplete="off" required value="{{$config['Type']}}">
						@else
						   <input class="form-control m-input m-input--air" type="number" placeholder="{{ __('Ex: 1') }}" name="Type" autocomplete="off" required>
						@endif

					</div>
					<div class="form-group m-form__group">
						<label for="example-text-input">
							Parent code
						</label>
						@if(isset($config) && isset($config['Parent_Code']))
							<input class="form-control m-input m-input--air" type="hidden" placeholder="{{ __('')}}" name="Code" required value="{{$config['Code']}}">
							<select class="form-control m-input m-input--air" name="Parent_Code" required>
								@if ($config['Parent_Code'] == 0)
								    <option value="0" selected="">Parent</option>
								@endif
								@foreach($listParentCode as $key => $parentCode)
								<option value="{{$parentCode}}" {{$config['Parent_Code'] == $parentCode ? 'selected="selected"' : ''}}>{{$parentCode}}</option>
								@endforeach
							</select>
						@else
						   <select class="form-control m-input m-input--air" name="Parent_Code" required>
								<option value="">Choose parent code...</option>
								@foreach($listParentCode as $key => $parentCode)
								<option value="{{$parentCode}}">{{$parentCode}}</option>
								@endforeach
							</select>
						@endif

						{{-- <input class="form-control m-input m-input--air" type="number" placeholder="{{ __('Parent_Code (Ex: 0)') }}" name="Parent_Code" autocomplete="off"> --}}
					</div>

					<div class="form-group m-form__group">
						<label for="example-text-input">
							Game code
						</label>
						@if(isset($config) && isset($config['Game_Code']))
							<input class="form-control m-input m-input--air" type="text" placeholder="{{ __('Ex: 4x20') }}"  name="Game_Code" autocomplete="off" size = '50'" required value="{{$config['Game_Code']}}">
						@else
						   <input class="form-control m-input m-input--air" type="text" placeholder="{{ __('Ex: 4x20') }}" name="Game_Code" autocomplete="off" size = '50'" required>
						@endif

					</div>

					<div class="form-group m-form__group">
						<label for="example-text-input">
							ETH address
						</label>
						@if(isset($config) && isset($config['ETH_Address']))
							<input class="form-control m-input m-input--air" type="text" placeholder="{{ __('') }}" name="ETH_Address" autocomplete="off" required value="{{$config['ETH_Address']}}">
						@else
						   <input class="form-control m-input m-input--air" type="text" placeholder="{{ __('') }}" name="ETH_Address" autocomplete="off" required>
						@endif

					</div>

			</div>
			<div style="clear: both;"></div>
			<div class="m-portlet__foot m-portlet__foot--fit">
				<div class="m-form__actions" style="text-align: right;">
					<button type="submit" class="btn btn-success" id="{{isset($config['Code']) ? 'edit' : 'add'}}">
						Submit
					</button>
					<button type="reset" class="btn btn-default">
						Cancel
					</button>
				</div>
			</div>
		</form>
	</div>
	<!--end::Form-->
</div>
@section('scripts')
{!!Html::script('app/components/configs/jquery-config.js?v='.time())!!}
@stop
@stop
