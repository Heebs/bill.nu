<?php

if (!isset($GLOBALS['index']))
	header("Location: ..");

?><!doctype html>
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
						<div class="step">
							<div class="step-indicator">
								<span class="step-indicator-tick"></span>
							</div>
							<div class="step-name text-center">Send</div>
						</div>
						<div class="step">
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
				<div ui-view="">
					<div class="panel-body text-center">
						<div class="status error"></div>
						<div class="amount">&nbsp;</div>
					</div>
					<div class="panel-body bg-gray text-center error-body">
						<strong>Der er sket en fejl</strong>
						<p>Betalingen blev ikke gennemført</p>
					</div>
					<div class="panel-body text-center">
						<!--button spp-bailout="" class="spp-btn btn-primary">Luk</button-->
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>