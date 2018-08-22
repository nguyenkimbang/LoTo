@extends('app')
@section('title')
User List
@stop

@section('contents')
<div class="m-grid__item m-grid__item--fluid m-wrapper">
	<!-- BEGIN: Subheader -->
	<!-- <div class="m-subheader ">
		<div class="d-flex align-items-center">
			<div class="mr-auto">
				<h3 class="">
					User Manager
				</h3>
			</div>
		</div>
	</div> -->
	<!-- END: Subheader -->
	<div class="m-content">
		<div class="m-portlet m-portlet--mobile">
			<div class="m-portlet__head">
				<div class="m-portlet__head-caption">
					<div class="m-portlet__head-title">
						<h3 class="m-portlet__head-text">
							List Users
						</h3>
					</div>
				</div>
				<div class="m-portlet__head-tools">
					<ul class="m-portlet__nav">
						<li class="m-portlet__nav-item">
							<a href="{!!URL::to('/admin/user/create')!!}" class="btn btn-accent m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air">
								<span>
									<i class="la la-plus"></i>
									<span>
										Add User
									</span>
								</span>
							</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="m-portlet__body">
				<!--begin: Datatable -->
				<table id="user-table" class="table table-striped- table-bordered table-hover table-checkable" cellspacing="0" width="100%">
					<thead>
						<tr>
			                <th>Username</th>
			                <th>Fullname</th>
			                <th>Rote Code</th>
			                <th>Avatar</th>
			                <th></th>
			                
			            </tr>
					</thead>
			    </table>
			</div>
		
		</div>
	</div>
</div>
@stop
@section('scripts')
{!!Html::script('app/components/users/user-tabledit-jquery.js?v='.time())!!}
@stop
