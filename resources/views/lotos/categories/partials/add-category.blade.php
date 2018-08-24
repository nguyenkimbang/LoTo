@extends('app')
@section('title')
Config | Create Category
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
							<form class="m-form" action="" id="category-form" novalidate="">
								<div class="m-portlet__body">
									<div class="m-form__section m-form__section--first">
										<div class="form-group m-form__group">
											<label for="example-text-input">
												Code
											</label>
											@if(isset($category['Code']))
											<div class="form-control m-input">{{$category['Code']}}</div>
											<input class="form-control m-input" type="hidden" placeholder="{{ __('Code')}}" name="Code" required value="{{$category['Code']}}">
											@else
											<input class="form-control m-input" type="text" placeholder="{{ __('Code')}}" name="Code" required>
											@endif
										</div>
										<div class="form-group m-form__group">
											<label for="example-text-input">
												Title seo
											</label>
											@if(isset($category['Title_Seo']))
											<input class="form-control m-input" type="text" placeholder="{{ __('Title Seo')}}" name="Title_Seo" required value="{{$category['Title_Seo']}}">
											@else
											<input class="form-control m-input" type="text" placeholder="{{ __('Title Seo')}}" name="Title_Seo" required>
											@endif
										</div>
										<div class="form-group m-form__group">
											<label for="example-text-input">
												Description seo
											</label>
											@if(isset($category['Description_Seo']))
											<textarea class="form-control m-input" placeholder="{{ __('Description Seo') }}" name="Description_Seo" required>{{$category['Description_Seo']}}</textarea>
											@else
											<textarea class="form-control m-input" placeholder="{{ __('Description Seo') }}" name="Description_Seo" required rows="6"></textarea>
											@endif
										</div>
										<div class="form-group m-form__group">
											<label for="example-text-input">
												Parent code
											</label>
											@if(isset($category['Parent_Code']))
											<select class="form-control m-input" name="Parent_Code" required>
												@if ($category['Parent_Code'] === 0)
												<option value="0" selected="">Parent</option>
												@endif
												@foreach($listParentCode as $key => $parentCode)
												<option value="{{$parentCode}}" {{$category['Parent_Code'] == $parentCode ? 'selected="selected"' : ''}}>{{$parentCode}}</option>
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
{!!Html::script('app/components/lotos/categories/jquery-category.js?v='.time())!!}
@stop
@stop