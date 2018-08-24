
<!-- script files -->

{!!Html::script('bower_components/global/plugins/jquery.min.js')!!}
{!!Html::script('bower_components/vendors/base/vendors.bundle.js')!!}
{!!Html::script('bower_components/demo/default/base/scripts.bundle.js')!!}
{!!Html::script('bower_components/vendors/custom/fullcalendar/fullcalendar.bundle.js')!!}
{!!Html::script('bower_components/app/js/dashboard.js')!!}
{{-- {!!Html::script('bower_components/global/plugins/bootstrap/js/bootstrap.min.js')!!} --}}
{!!Html::script('bower_components/global/plugins/jquery-validation/js/jquery.validate.min.js')!!}
{!!Html::script('bower_components/global/scripts/metronic.js')!!}
{!!Html::script('bower_components/admin/layout/scripts/layout.js')!!}
{!!Html::script('bower_components/jquery-datatable/js/jquery.dataTables.min.js')!!}
{!!Html::script('bower_components/jquery-tabledit/jquery.tabledit.js?v='.time())!!}
{!!Html::script('ckeditor/ckeditor.js?v='.time())!!}
{!!Html::script('ckfinder/ckfinder.js?v='.time())!!}
{!!Html::script('shared/showErrorStatusCode.js?v='.time())!!}

<script type="text/javascript">
	window.baseUrl = '{!!URL::to('/')!!}';
</script>
