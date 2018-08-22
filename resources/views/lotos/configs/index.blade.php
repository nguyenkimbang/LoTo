@extends('app')
@section('title')
Game List Admin
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
							List Games
						</h3>
					</div>
				</div>
				<div class="m-portlet__head-tools">
					<ul class="m-portlet__nav">
						<li class="m-portlet__nav-item">
							<a href="{!!URL::to('/admin/config/create')!!}" class="btn btn-accent m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air">
								<span>
									<i class="la la-plus"></i>
									<span>
										Add Config
									</span>
								</span>
							</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="m-portlet__body">
				<div class="col-md-12 col-xs-12 show-note">
					<div class="" id="show-note"></div>
				</div>
				<!--begin: Datatable -->
				<table class="table table-striped- table-bordered table-hover table-checkable" id="config-table">
					<thead>
						<tr>
							<th>
								Code
							</th>
							<th>
								Game_Code
							</th>
							<th>
								Value
							</th>
							<th>
								Type
							</th>
							<th>
								Parent_Code
							</th>
							<th>
								ETH_Address
							</th>
							<th>
								Description
							</th>
							<th>
								Status
							</th>
							<th>Action</th>
						</tr>
					</thead>
				</table>
			</div>
		</div>
	</div>
</div>
@stop

@section('scripts')
{!!Html::script('app/components/configs/jquery-datatable-config.js?v='.time())!!}
@stop

