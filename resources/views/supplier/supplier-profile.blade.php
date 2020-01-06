@include('supplier.includes.top-header')
<body class="hold-transition light-skin sidebar-mini theme-rosegold onlyheader">
	<div class="wrapper">
		@include('supplier.includes.top-nav')
		<div class="content-wrapper">
			<div class="container-full clearfix position-relative">
				@include('supplier.includes.nav')
				<div class="content">
					<!-- Content Header (Page header) -->
					<div class="content-header">
						<div class="d-flex align-items-center">
							<div class="mr-auto">
								<h3 class="page-title">My Profile</h3>
								<div class="d-inline-block align-items-center">
									<nav>
										<ol class="breadcrumb">
											<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
											<li class="breadcrumb-item" aria-current="page">Home</li>
											<li class="breadcrumb-item active" aria-current="page">My Profile
											</li>
										</ol>
									</nav>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<div class="box">
								<div class="box-body">
									<div class="row">
										<div class="col-md-3">
											<label for="supplier_name"><strong>SUPPLIER NAME :</strong></label>
										</div>
										<div class="col-md-9">
											<p class="" id="supplier_name"> @if($get_supplier->supplier_name!="" && $get_supplier->supplier_name!="0" && $get_supplier->supplier_name!=null){{$get_supplier->supplier_name}} @else No Data Available @endif </p>
										</div>
									</div>
									<div class="row">
										<div class="col-md-3">
											<label for="company_name"><strong>COMPANY NAME :</strong></label>
										</div>
										<div class="col-md-9">
											<p class="" id="company_name"> @if($get_supplier->company_name!="" && $get_supplier->company_name!="0" && $get_supplier->company_name!=null){{$get_supplier->company_name}} @else No Data Available @endif </p>
										</div>
									</div>
									<div class="row">
										<div class="col-md-3">
											<label for="company_email"><strong>EMAIL ID :</strong></label>
										</div>
										<div class="col-md-9">
											<p class="" id="company_email"> @if($get_supplier->company_email!="" && $get_supplier->company_email!="0" && $get_supplier->company_email!=null){{$get_supplier->company_email}} @else No Data Available @endif </p>
										</div>
									</div>
									<div class="row">
										<div class="col-md-3">
											<label for="company_contact"><strong>CONTACT NUMBER :</strong></label>
										</div>
										<div class="col-md-9">
											<p class="" id="company_contact"> @if($get_supplier->company_contact!="" && $get_supplier->company_contact!="0" && $get_supplier->company_contact!=null){{$get_supplier->company_contact}} @else No Data Available @endif </p>
										</div>
									</div>
									<div class="row">
										<div class="col-md-3">
											<label for="company_fax"><strong>FAX ADDRESS :</strong></label>
										</div>
										<div class="col-md-9">
											<p class="" id="company_fax"> @if($get_supplier->company_fax!="" && $get_supplier->company_fax!=null){{$get_supplier->company_fax}} @else No Data Available @endif </p>
										</div>
									</div>
									<div class="row">
										<div class="col-md-3">
											<label for="address"><strong>ADDRESS :</strong></label>
										</div>
										<div class="col-md-9">
											<p class="" id="address"> @if($get_supplier->address!="" && $get_supplier->address!=null){{$get_supplier->address}} @else No Data Available @endif </p>
										</div>
									</div>
									<div class="row">
										<div class="col-md-3">
											<label for="supplier_country"><strong>COUNTRY :</strong></label>
										</div>
										<div class="col-md-9">
											<p class="" id="supplier_country"> @if($get_supplier->supplier_country!="" && $get_supplier->supplier_country!=null){{$get_supplier->supplier_country}} @else No Data Available @endif </p>
										</div>
									</div>
									<div class="row">
										<div class="col-md-3">
											<label for="supplier_city"><strong>CITY :</strong></label>
										</div>
										<div class="col-md-9">
											<p class="" id="supplier_city"> @if($get_supplier->supplier_city!="" && $get_supplier->supplier_city!=null){{$get_supplier->supplier_city}} @else No Data Available @endif </p>
										</div>
									</div>
									<div class="row">
										<div class="col-md-3">
											<label for="corporate_reg_no"><strong>CORPORATE REG NO :</strong></label>
										</div>
										<div class="col-md-9">
											<p class="" id="corporate_reg_no"> @if($get_supplier->corporate_reg_no!="" && $get_supplier->corporate_reg_no!=null){{$get_supplier->corporate_reg_no}} @else No Data Available @endif </p>
										</div>
									</div>
									<div class="row">
										<div class="col-md-3">
											<label for="corporate_desc"><strong>CORPORATE DESCRIPTION :</strong></label>
										</div>
										<div class="col-md-9">
											<p class="" id="corporate_desc"> @if($get_supplier->corporate_desc!="" && $get_supplier->corporate_desc!=null){{$get_supplier->corporate_desc}} @else No Data Available @endif </p>
										</div>
									</div>
									<div class="row">
										<div class="col-md-3">
											<label for="skype_id"><strong>SKYPE ID :</strong></label>
										</div>
										<div class="col-md-9">
											<p class="" id="skype_id"> @if($get_supplier->skype_id!="" && $get_supplier->skype_id!=null){{$get_supplier->skype_id}} @else No Data Available @endif </p>
										</div>
									</div>
									<div class="row">
										<div class="col-md-3">
											<label for="operating_hrs_from"><strong>OPERATING HOURS :</strong></label>
										</div>
										<div class="col-md-9">
											<p class="" id="operating_hrs_from"> @if($get_supplier->operating_hrs_from!="" && $get_supplier->operating_hrs_from!=null){{$get_supplier->operating_hrs_from}} @else No Data Available @endif
												To
											@if($get_supplier->operating_hrs_to!="" && $get_supplier->operating_hrs_to!=null){{$get_supplier->operating_hrs_to}} @else No Data Available @endif </p>
										</div>
									</div>
									<div class="row">
										<div class="col-md-3">
											<label for="operating_weekdays"><strong>WORKING DAYS :</strong></label>
										</div>
										<div class="col-md-9">
											<p class="" id="operating_weekdays"> @if($get_supplier->operating_weekdays!="" && $get_supplier->operating_weekdays!=null)
												@php
												$weekdays=unserialize($get_supplier->operating_weekdays);
												$show_days=array();
												foreach($weekdays as $key=>$value)
												{
												if($value=="yes")
												{
												array_push($show_days,ucfirst($key));
												}
												}
												echo implode(" ,",$show_days);
												@endphp
												@else No Data Available @endif
											</p>
										</div>
									</div>
									<div class="row">
										<div class="col-md-3">
											<label for="certificate_corp"><strong>CERTIFICATE OF CORPORATION :</strong></label>
										</div>
										<div class="col-md-9">
											@if($get_supplier->certificate_corp!="" && $get_supplier->certificate_corp!=null)
											<a href="{{ asset('assets/uploads/supplier_certificates/')}}/{{$get_supplier->certificate_corp}}" target="_blank"><img src="{{ asset('assets/uploads/supplier_certificates/')}}/{{$get_supplier->certificate_corp}}" style="width:200px;height:200px"></a>
											@else No Data Available @endif
										</div>
									</div>
									<div class="row">
										<div class="col-md-3">
											<label for="supplier_logo"><strong>LOGO OF CORPORATION :</strong></label>
										</div>
										<div class="col-md-9">
											@if($get_supplier->supplier_logo!="" && $get_supplier->supplier_logo!=null)
											<a href="{{ asset('assets/uploads/supplier_logos/')}}/{{$get_supplier->supplier_logo}}" target="_blank"><img src="{{ asset('assets/uploads/supplier_logos/')}}/{{$get_supplier->supplier_logo}}"  style="width:200px;height:200px"></a>
											@else No Data Available @endif
										</div>
									</div>
									<div class="row mb-10">
										<div class="col-md-12">
											<h4 class="box-header with-border" style="padding: 10px;border-color: #c3c3c3;" >
											<i class="fa fa-minus-circle" id="country_operation"></i> COUNTRY OF OPERATION
											</h4>
										</div>
									</div>
									<div id="country_operation_details">
										@if($get_supplier->supplier_opr_countries!="" && $get_supplier->supplier_opr_countries!=null)
										<div class="row">
											@php
											$opr_countries=explode(',',$get_supplier->supplier_opr_countries);
											for($i=0;$i< count($opr_countries);$i++)
											{
											@endphp
											@foreach($countries as $country)
											@if($country->country_id==$opr_countries[$i])
											<div class="col-md-6">
												<div class="row">
													<div class="col-md-6">
														<label for="country_name{{$i}}"><strong>COUNTRY:</strong></label>
													</div>
													<div class="col-md-6">
														<p class="" id="country_name{{$i}}">{{$country->country_name}} </p>
													</div>
													<div class="col-md-6">
														<label for="country_code{{$i}}"><strong>COUNTRY CODE :</strong></label>
													</div>
													<div class="col-md-6">
														<p class="" id="country_code{{$i}}">{{$country->country_sortname}} </p>
													</div>
												</div>
											</div>
											@endif
											
											@endforeach
											@php
											}
											@endphp
										</div>
										@else
										No Data Available
										@endif
									</div>
									<div class="row mb-10">
										<div class="col-md-12">
											<h4 class="box-header with-border" style="padding: 10px;border-color: #c3c3c3;" >
											<i class="fa fa-minus-circle" id="currency_operation"></i> SUPPLIER CURRENCY
											</h4>
										</div>
									</div>
									<div id="currency_operation_details">
										@if($get_supplier->supplier_opr_currency!="" && $get_supplier->supplier_opr_currency!=null)
										<div class="row">
											@php
											$opr_currencies=explode(',',$get_supplier->supplier_opr_currency);
											for($cur=0;$cur< count($opr_currencies);$cur++)
											{
											@endphp
											@foreach($currency as $currencies)
											@if($currencies->code==$opr_currencies[$cur])
											<div class="col-md-6">
												<div class="row">
													<div class="col-md-6">
														<label for="currency_name{{$cur}}"><strong>NAME:</strong></label>
													</div>
													<div class="col-md-6">
														<p class="" id="currency_name{{$cur}}">{{$currencies->name}} </p>
													</div>
													<div class="col-md-6">
														<label for="currency_code{{$cur}}"><strong>CURRENCY CODE :</strong></label>
													</div>
													<div class="col-md-6">
														<p class="" id="currency_code{{$cur}}">{{$currencies->code}} </p>
													</div>
													<div class="col-md-6">
														<label for="currency_code{{$cur}}"><strong>SYMBOL :</strong></label>
													</div>
													<div class="col-md-6">
														<p class="" id="currency_code{{$cur}}">{{$currencies->symbol}} </p>
													</div>
												</div>
											</div>
											@endif
											
											@endforeach
											@php
											}
											@endphp
										</div>
										@else
										No Data Available
										@endif
									</div>
									<div class="row mb-10">
										<div class="col-md-12">
											<h4 class="box-header with-border" style="padding: 10px;border-color: #c3c3c3;" >
											<i class="fa fa-minus-circle" id="blackout_days"></i> BLACKOUT DAYS
											</h4>
										</div>
									</div>
									<div id="blackout_days_details">
										@if($get_supplier->blackout_dates!="" && $get_supplier->blackout_dates!=null)
										<div class="row">
											@php
											$blackout_dates=explode(',',$get_supplier->blackout_dates);
											
											for($black=0;$black< count($blackout_dates);$black++)
											{
											@endphp
											
											<div class="col-md-2">
												<label for="blackout_dates{{$black}}"><strong>DAY {{($black+1)}} :</strong></label>
											</div>
											<div class="col-md-2">
												<p class="" id="blackout_dates{{$black}}">
													@php
													echo date('d-m-Y',strtotime($blackout_dates[$black]));
												@endphp </p>
											</div>
											@php
											}
											@endphp
										</div>
										@else
										No Data Available
										@endif
									</div>
									<div class="row mb-10">
										<div class="col-md-12">
											<h4 class="box-header with-border" style="padding: 10px;border-color: #c3c3c3;" >
											<i class="fa fa-minus-circle" id="bank_details"></i> BANK DETAILS
											</h4>
										</div>
									</div>
									<div id="supplier_bank_details">
										@if($get_supplier->supplier_bank_details!="" && $get_supplier->supplier_bank_details!=null)
										<div class="row">
											@php
											$bank_details=unserialize($get_supplier->supplier_bank_details);
											for($bank_count=0;$bank_count< count($bank_details);$bank_count++)
											{
											@endphp
											<div class="col-md-3">
												<label for="bank_details{{$bank_count}}"><strong><u>BANK DETAILS {{($bank_count+1)}} :</u></strong></label>
											</div>
											<div class="col-md-9">
												<p class="" id="bank_details{{$bank_count}}">
													<strong>ACCOUNT NUMBER:</strong>  {{$bank_details[$bank_count]['account_number']}}
													<br>
													<strong>BANK NAME:</strong>  {{$bank_details[$bank_count]['bank_name']}}
													<br>
													<strong>BANK SWIFT:</strong>  {{$bank_details[$bank_count]['bank_ifsc']}}
													<br>
													<strong>BANK IBAN:</strong>  {{$bank_details[$bank_count]['bank_iban']}}
													<br>
													<strong>BANK CURRENCY:</strong>  {{$bank_details[$bank_count]['bank_currency']}}
													
												</p>
											</div>
											@php
											}
											@endphp
										</div>
										@else
										No Data Available
										@endif
									</div>
									<div class="row mb-10">
										<div class="col-md-12">
											<h4 class="box-header with-border" style="padding: 10px;border-color: #c3c3c3;" >
											<i class="fa fa-minus-circle" id="service_details"></i> SERVICE TYPE DETAILS
											</h4>
										</div>
									</div>
									<div id="service_type_details">
										@if($get_supplier->supplier_service_type!="" && $get_supplier->supplier_service_type!=null)
										<div class="row">
											@php
											$service_details=explode(',',$get_supplier->supplier_service_type);
											@endphp
											<div class="col-md-3">
												<label for="service_details"><strong>TYPE:</strong></label>
											</div>
											<div class="col-md-9">
												<ul id="service_details">
													@foreach($service_details as $services)
													<li>{{$services}}</li>
													@endforeach
												</ul>
											</div>
											
										</div>
										@else
										No Data Available
										@endif
									</div>
									<div class="row mb-10">
										<div class="col-md-12">
											<h4 class="box-header with-border" style="padding: 10px;border-color: #c3c3c3;" >
											<i class="fa fa-minus-circle" id="contact_details"></i> CONTACT PERSONS
											</h4>
										</div>
									</div>
									<div id="supplier_contact_details">
										@if($get_supplier->contact_persons!="" && $get_supplier->contact_persons!=null)
										<div class="row">
											@php
											$contact_details=unserialize($get_supplier->contact_persons);
											for($cont_count=0;$cont_count< count($contact_details);$cont_count++)
											{
											@endphp
											<div class="col-md-3">
												<label for="contact_details{{$cont_count}}"><strong><u>CONTACT PERSON {{($cont_count+1)}} :</u></strong></label>
											</div>
											<div class="col-md-9">
												<p class="" id="contact_details{{$cont_count}}">
													<strong>NAME:</strong>  {{$contact_details[$cont_count]['contact_person_name']}}
													<br>
													<strong>CONTACT:</strong>  {{$contact_details[$cont_count]['contact_person_number']}}
													<br>
													<strong>EMAIL ID:</strong>  {{$contact_details[$cont_count]['contact_person_email']}}
													
												</p>
											</div>
											@php
											}
											@endphp
										</div>
										@else
										No Data Available
										@endif
									</div>
									<!-- /.row -->
								</div>
								<!-- /.box-body -->
							</div>
							<!-- /.box -->
						</div>
					</div>
				</div>
			</div>
		</div>
		@include('supplier.includes.footer')
		@include('supplier.includes.bottom-footer')
		<script>
			$(document).on("click","#country_operation",function()
			{
				if($(this).hasClass('fa-minus-circle'))
				{
					$(this).removeClass('fa-minus-circle').addClass('fa-plus-circle');
				}
				else
				{
					$(this).removeClass('fa-plus-circle').addClass('fa-minus-circle');
				}
				$("#country_operation_details").toggle();
			});
			$(document).on("click","#currency_operation",function()
			{
				if($(this).hasClass('fa-minus-circle'))
				{
					$(this).removeClass('fa-minus-circle').addClass('fa-plus-circle');
				}
				else
				{
					$(this).removeClass('fa-plus-circle').addClass('fa-minus-circle');
				}
				$("#currency_operation_details").toggle();
			});
			$(document).on("click","#blackout_days",function()
			{
				if($(this).hasClass('fa-minus-circle'))
				{
					$(this).removeClass('fa-minus-circle').addClass('fa-plus-circle');
				}
				else
				{
					$(this).removeClass('fa-plus-circle').addClass('fa-minus-circle');
				}
				$("#blackout_days_details").toggle();
			});
			$(document).on("click","#bank_details",function()
			{
				if($(this).hasClass('fa-minus-circle'))
				{
					$(this).removeClass('fa-minus-circle').addClass('fa-plus-circle');
				}
				else
				{
					$(this).removeClass('fa-plus-circle').addClass('fa-minus-circle');
				}
				$("#supplier_bank_details").toggle();
			});
			$(document).on("click","#service_details",function()
			{
				if($(this).hasClass('fa-minus-circle'))
				{
					$(this).removeClass('fa-minus-circle').addClass('fa-plus-circle');
				}
				else
				{
					$(this).removeClass('fa-plus-circle').addClass('fa-minus-circle');
				}
				$("#service_type_details").toggle();
			});
			$(document).on("click","#contact_details",function()
			{
				if($(this).hasClass('fa-minus-circle'))
				{
					$(this).removeClass('fa-minus-circle').addClass('fa-plus-circle');
				}
				else
				{
					$(this).removeClass('fa-plus-circle').addClass('fa-minus-circle');
				}
				$("#supplier_contact_details").toggle();
			});
		</script>
	</body>
</html>