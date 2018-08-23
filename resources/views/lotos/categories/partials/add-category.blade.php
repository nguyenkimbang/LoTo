@extends('app')
@section('title')
Config | Create Category
@stop
@section('contents')
<div class="m-portlet m-portlet--tab col-xs-12">
{{-- 	<div class="m-portlet__head">
		<div class="m-portlet__head-caption">
			<div class="m-portlet__head-title">
				<span class="m-portlet__head-icon m--hide">
					<i class="la la-gear"></i>
				</span>
				<h3 class="m-portlet__head-text">
					Create System Setting Form
				</h3>
			</div>
		</div>
	</div> --}}
	<!--begin::Form-->
	<div class="" style="width: 50%; margin: 60px auto">
		<div style="text-align: center; font-size: 30px;">
			Create Category Form
		</div>
		<form class="m-form m-form--fit m-form--label-align-right" action="" id="category-form">
			<div class="col-xs-12" style="text-align: center; margin-top: 20px; font-size: 20px;">
				<div class="" id="show-error-config"></div>
			</div>

			<div class="form-group m-form__group row">
				<label for="example-text-input">
					Code
				</label>
				@if(isset($category['Code']))
					<div class="form-control m-input m-input--air">{{$category['Code']}}</div>
					<input class="form-control m-input m-input--air" type="hidden" placeholder="{{ __('')}}" name="Code" required value="{{$category['Code']}}">
				@else
				   <input class="form-control m-input m-input--air" type="text" placeholder="{{ __('')}}" name="Code" required>
				@endif
			</div>
			<div class="form-group m-form__group row">
				<label for="example-text-input">
					Title seo
				</label>
				@if(isset($category['Title_Seo']))
					<input class="form-control m-input m-input--air" type="text" placeholder="{{ __('')}}" name="Title_Seo" required value="{{$category['Title_Seo']}}">
				@else
				   <input class="form-control m-input m-input--air" type="text" placeholder="{{ __('')}}" name="Title_Seo" required>
				@endif
			</div>

			<div class="form-group m-form__group row">
				<label for="example-text-input">
					Description seo
				</label>
				@if(isset($category['Description_Seo']))
					<textarea class="form-control m-input m-input--air" placeholder="{{ __('') }}" name="Description_Seo" required>{{$category['Description_Seo']}}</textarea>
				@else
					<textarea class="form-control m-input m-input--air" placeholder="{{ __('') }}" name="Description_Seo" required ></textarea>
				@endif
				
			</div>

			<div class="form-group m-form__group row">
				<label for="example-text-input">
					Parent code
				</label>
				@if(isset($category['Parent_Code']))
					<select class="form-control m-input m-input--air" name="Parent_Code" required>
						@if ($category['Parent_Code'] == 0)
						    <option value="0" selected="">Parent</option>
						@endif
						@foreach($listParentCode as $key => $parentCode)
						<option value="{{$parentCode}}" {{$category['Parent_Code'] == $parentCode ? 'selected="selected"' : ''}}>{{$parentCode}}</option>
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
				
			</div>

			<div class="m-portlet__foot m-portlet__foot--fit">
				<div class="m-form__actions" style="text-align: right;">
					<button type="submit" class="btn btn-success" id="{{isset($category['Code']) ? 'edit' : 'add'}}">
						Submit
					</button>
					<button type="reset" class="btn btn-default">
						Cancel
					</button>
				</div>
			</div>
		</form>
		<div style="clear: both"></div>
	</div>
	<!--end::Form-->
</div>
@section('scripts')
{!!Html::script('app/components/lotos/categories/jquery-category.js?v='.time())!!}
@stop
@stop
