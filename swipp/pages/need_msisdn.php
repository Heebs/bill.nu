<!doctype html>
<html>
<head>
	<title>Bill payment</title>
	<meta charset="utf-8">
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width">
	<style type="text/css">[uib-typeahead-popup].dropdown-menu{display:block;}</style>
	<style type="text/css">.uib-time input{width:50px;}</style>
	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="stylesheet" href="main.css">
</head>
<body>
	<div class="center-block swipp-container" translate-cloak=""> 
		<div class="panel panel-primary swipp-panel">
			<div class="panel-heading text-center">
				<div style="position: relative">
					<h3 class="panel-title">Swipp</h3>
				</div>
			</div>
			<div ui-view="">
				<div class="panel-body bg-gray text-center" style="padding-bottom: 6px">
					<div class="step-progress">
						<hr class="step-indicator-line">
						<div class="step current" style="">
							<div class="step-indicator">
								<span class="step-indicator-tick"></span>
							</div>
							<div class="step-name text-center">Send</div>
						</div>
						<div class="step" style="">
							<div class="step-indicator">
								<span class="step-indicator-tick"></span>
							</div>
							<div class="step-name text-center">Godkend</div>
						</div>
						<div class="step">
							<div class="step-indicator">
								<span class="step-indicator-tick"></span>
							</div>
							<div class="step-name text-center">Gennemført</div>
						</div>
					</div>
				</div>
				<div>
					<div class="panel-body text-center payment-information">
						<div>
							<div class="company-logo center-block" style="background-image: url('https://integration-pay.swipp.dk/images/placeholder-unknown-merchant.a325af99.png')"></div>
							<div class="amount">1,00 kr.</div>
						</div>
					</div>
					<form action="" method="get" onSubmit="this.msisdn.value = this.country.value + this.number.value;">
						<input type="hidden" name="key" value="abcdabcdabcdabcd">
						<input type="hidden" name="hash" value="cdefcdefcdefcdef">
						<input type="hidden" name="msisdn">
						<div class="panel-body text-center bg-gray payment-input">
							<div style="margin-bottom: 8px">Indtast dit mobilnummer</div>
							<div class="phone-group text-left center-block country-code">
								<select id="country">
									<option value="43">+43</option>
									<option value="44">+44</option>
									<option value="45" selected>+45</option>
								</select>
								<input id="number" type="tel" autocomplete="off" mask="99 99 99 99" mask-restrict="reject" mask-clean="true">
							</div>
							<hr>
							<label for="remember" class="center-block text-center rememberMe">
								<label>
									<input id="remember" type="checkbox">
									<span class="checkbox"></span>
								</label>
								<span>Husk mit nummer</span>
							</label>
						</div>
						<div class="panel-body text-center">
							<button class="spp-btn btn-primary btn-progression">Godkend betaling i Swipp-appen</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>