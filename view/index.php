<html>
	<head>
		<meta name="description" content="Youth decides Discount Card">
		<meta name="robots" content="index,follow"/>
		<title>Youth Decides | Get your YD Card</title>
		<link rel="shortcut icon" type="image/png" href="images/icon.png"/>
		<link rel="shortcut icon" type="image/png" href="images/icon.png"/>
		<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1"/>
		<!-- Compiled and minified CSS -->
		    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/css/materialize.min.css">
      	<!--Let browser know website is optimized for mobile-->
      		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>

    		<link rel="stylesheet" type="text/css" href="style/style.css">
    		<link rel="stylesheet" type="text/css" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	</head>
	<body style="display:block">
		<script type="text/javascript" src="js/cssrefresh.js"></script>
		<script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.1.4.min.js"></script>
     	<!-- Compiled and minified JavaScript -->
		  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/js/materialize.min.js"></script>
		  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
		  <script type="text/javascript">
		  $( document ).ready(function(){
		  	 $(".button-collapse").sideNav();
		  	 var d = new Date();
			var month = d.getMonth()+1;
			var day = d.getDate();
			var year = d.getFullYear();
		  	 $('.datepicker').pickadate({
    			selectMonths: true, // Creates a dropdown to control month
				selectYears: 60,
				max: new Date(year,12,31),// Creates a dropdown of 15 years to control year
				formatSubmit: 'yyyy-mm-dd',
				format: 'dd-mm-yyyy',
  				hiddenName: false
			  });
		  	  $('.scroll').click(function(){
		  	  	var scrollAncre = $(this).attr('data');
		  	  	var navHeight = $('nav').outerHeight();
		  	  	var scrollTo = $('section[id="'+scrollAncre+'"]').offset().top-navHeight ;
		  	  	$('body ,html').animate( {scrollTop: scrollTo} , 500) ;
		  	  });

		  	  $("#up").hide();
		  	   var topOfOthDiv = $(".page-footer").offset().top-$('.page-footer').outerHeight();


    			$(window).scroll(function() {


        			if($(window).scrollTop() > 1800) { //scrolled past the other div?
            			$("#up").show("slow"); //reached the desired point -- show div
        				}
        			else {
        				$("#up").hide("slow");
        			}
    			});
    			$('.modal-trigger').leanModal({
			      dismissible: true,
			      opacity: 0.5,
			    }
			  );
		  	});

		  </script>
		 <?php include_once'navbar.php' ?>

		<section id="home">
			<div class="container">
				<h1>Youth Decides</h1>
				<p class="flow-text">Notre carte a pour but de vous offrir des avantages qui vous faciliteront <br>
				les taches les plus simples de votre vie quotidienne comme par exemple:  <br>
				 un accés pas chèr a une salle de cinéma...</p>
				<a class="waves-effect waves-light btn scroll" href="#" data="form">Join Us<i class=" large mdi-navigation-expand-more"></i></a>
			</div>

		</section>
		<section id="form">
		<div ng-app="validationApp" ng-controller="mainController">
			<div class="container">
				<div class="row">
					<div class="col s6 m6 l6 offset-s3 offset-m3 offset-l3">
						<form action="../controller/addClient.php" enctype="multipart/form-data" method="POST" id="addClient" class="form" name="myForm" ng-submit="submitForm()" novalidate>

										        <!-- Prenom -->
			        			<div class="row">
								<div class="input-field col s12">
								        <div class="form-group" ng-class="{ 'has-error' : myForm.prenom.$invalid && !myForm.prenom.$pristine }">
								            <input type="text" name="prenom" class="form-control" id="prenom" ng-model="user.prenom" ng-minlength="2" ng-maxlength="15" required>
								            <label for="prenom">Prenom</label>
								            <span style="color:red" ng-show="myForm.prenom.$invalid && !myForm.prenom.$pristine" class="help-block">Ce champ est obligatoire.</span><br>
								            <span style="color:red" ng-show="myForm.prenom.$error.minlength" class="help-block">Votre Prenom est trop court.</span>
								            <span style="color:red" ng-show="myForm.prenom.$error.maxlength" class="help-block">Votre Prenom est trop long.</span>
								        </div>
								    </div>
								</div>
											<!-- Nom -->
						        <div class="row">
								<div class="input-field col s12">
							        <div class="form-group" ng-class="{ 'has-error' : myForm.nom.$invalid && !myForm.nom.$pristine }">
							            <input type="text" name="nom" class="form-control" id="nom" ng-model="user.nom" ng-minlength="2" ng-maxlength="15" required>
							            <label for="nom">Nom</label>
							            <span style="color:red" ng-show="myForm.nom.$invalid && !myForm.nom.$pristine" class="help-block">Ce champ est obligatoire.</span><br>
							            <span style="color:red" ng-show="myForm.nom.$error.minlength" class="help-block">Votre Nom est trop court.</span>
							            <span style="color:red" ng-show="myForm.nom.$error.maxlength" class="help-block">Votre Nom est trop long.</span>
							        </div>
							    </div>
							</div>
											<!-- CIN -->
						        <div class="row">
						        	<div class="input-field col s12">
							        <div class="form-group" ng-class="{ 'has-error' : myForm.cin.$invalid && !myForm.cin.$pristine }">
							            <input type="text" name="cin" class="form-control" id="cin" ng-model="user.cin" ng-pattern="onlyNumbers" ng-minlength="6" ng-maxlength="8" required>
							            <label for="cin">CIN</label>
							            <span style="color:red" ng-show="myForm.cin.$invalid && !myForm.cin.$pristine" class="help-block">Ce champ est obligatoire.</span><br>
							            <span style="color:red" ng-show="myForm.cin.$error.pattern" class="help-block">Cin incorrect.</span><br>
							            <span style="color:red" ng-show="myForm.cin.$error.minlength" class="help-block">Cin trop court.</span>
							            <span style="color:red" ng-show="myForm.cin.$error.maxlength" class="help-block">Cin trop long.</span>
							        </div>
							        </div>
						    	</div>

							<div class="row">
									<div class="col s6 m6 l6">
										<label>Sexe *</label>
									</div>
									<div class="col s6 m6 l6">
										<div class="row">
											<p>
										      <input name="sexe" type="radio" id="homme" value="homme" checked/>
										      <label for="homme">Homme</label>
										    </p>
										</div>
										<div class="row">
											<p>
										      <input name="sexe" type="radio" id="femme" value="femme" />
										      <label for="femme">Femme</label>
										    </p>
										</div>
									</div>
								</div>
										        <!--Date Naissance-->
						        <div class="row">
									<div class="col s12 m12 l12">
											<input type="date" class="datepicker" id="date" name="date_naissance"required>
											<label for="date">Date de naissance</label>

									</div>
								</div>

											<!--Adresse-->
							<div class="row">
								<div class="input-field col s12">
									<div class="form-group" ng-class="{ 'has-error' : myForm.adresse.$invalid && !myForm.adresse.$pristine }">
										<input id="adresse" type="text" class="validate" name="adresse" ng-model="user.adresse" ng-minlength="7" required>
										<label for="adresse">Adresse</label>
										<span style="color:red" ng-show="myForm.cin.$invalid && !myForm.cin.$pristine" class="help-block">Ce champ est obligatoire.</span>
										<span style="color:red" ng-show="myForm.adresse.$error.minlength" class="help-block">Adresse trop courte.</span>
							      		</div>
						        	</div>
						        </div>
						        <div class="row">
								<div class="input-field col s2">
									<div class="form-group" ng-class="{ 'has-error' : myForm.zipcode.$invalid && !myForm.zipcode.$pristine }">
										<input id="zipcode" type="text" class="validate" name="zipcode" ng-pattern="onlyNumbers" ng-model="user.zipcode" ng-minlength="4" ng-maxlength="4" required>
										<label for="zipcode">Code Postal</label>
										<span style="color:red" ng-show="myForm.zipcode.$invalid && !myForm.zipcode.$pristine" class="help-block">Ce champ est obligatoire.</span>
										<span style="color:red" ng-show="myForm.cin.$error.pattern" class="help-block">Code postal incorrect.</span><br>
								            <span style="color:red" ng-show="myForm.zipcode.$error.minlength" class="help-block">Code postal incorrect.</span>
								            <span style="color:red" ng-show="myForm.zipcode.$error.maxlength" class="help-block">Code postal incorrect.</span>
								      </div>
							        </div>

								<div class="input-field col s5">
									<div class="form-group" ng-class="{ 'has-error' : myForm.delegation.$invalid && !myForm.delegation.$pristine }">
										<input id="delegation" type="text" class="validate" name="delegation" ng-model="user.delegation" ng-minlength="3" ng-maxlength="20" required>
										<label for="delegation">Delegation</label>
										<span style="color:red" ng-show="myForm.delegation.$invalid && !myForm.delegation.$pristine" class="help-block">Ce champ est obligatoire.</span>
										<span style="color:red" ng-show="myForm.delegation.$error.minlength" class="help-block">Delegation incorrect.</span>
							            <span style="color:red" ng-show="myForm.delegation.$error.maxlength" class="help-block">Delegation incorrect.</span>
								      </div>
							        </div>

								<div class="input-field col s5">
									<div class="form-group" ng-class="{ 'has-error' : myForm.gouvernorat.$invalid && !myForm.gouvernorat.$pristine }">
										<input id="gouvernorat" type="text" class="validate" name="gouvernorat" ng-model="user.gouvernorat" ng-minlength="7" ng-maxlength="15" required>
										<label for="gouvernorat">Gouvernorat</label>
										<span style="color:red" ng-show="myForm.gouvernorat.$invalid && !myForm.gouvernorat.$pristine" class="help-block">Ce champ est obligatoire.</span>
										<span style="color:red" ng-show="myForm.gouvernorat.$error.minlength" class="help-block">Gouvernorat trop court.</span>
										<span style="color:red" ng-show="myForm.gouvernorat.$error.maxlength" class="help-block">Gouvernorat trop long.</span>
								      </div>
							        </div>
							</div>


							<br>
							<div class="row">
								<div class="col s6 m6 l6">
									<label>Avez-vous une adresse e-mail Youth Decides? *</label>
								</div>
								<div class="col s3 m3 l3">
									<input name="yd_mail" type="radio" id="non" value="0" checked/>
									<label for="non">Non</label>
								</div>
								<div class="col s3 m3 l3">
									<input name="yd_mail" type="radio" id="oui" value="1"/>
									<label for="oui">Oui</label>
								</div>
							</div>
							<div class="row">
								<div class="col s12 m12 l12">
								<label>Si oui veuillez la mentionner ci dessous, sinon veillez inserer votre adresse mail *</label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12">
							          <div class="form-group" ng-class="{ 'has-error' : myForm.email.$invalid && !myForm.email.$pristine }">
								            <input id="email" type="email" name="email" class="form-control" ng-model="user.email" required>
								            <label for="email">Email</label>
								            <span style="color:red" ng-show="myForm.email.$invalid && !myForm.email.$pristine" class="help-block">Ce champ est obligatoire.</span>
								            <span style="color:red" ng-show="myForm.email.$invalid && !myForm.email.$pristine" class="help-block">Entrer un email valid.</span>
								  </div>
						        	</div>
							</div>
							<div class="row">
								<div class="input-field col s12">
									<div class="file-field input-field">
										<input class="file-path validate" type="text"/>
										<div class="btn tooltipped" data-position="left" data-tooltip="Max:1Mo">
											<span>Photo *</span>
											<input type="file" name="file"  id="file-select" class="btn" required/>
										</div>
									</div>
								</div>
							</div>

								<div class="row">
									<div class="col s4 m6 l6">
										<label>Statut *</label>
									</div>
									<div class="col s6 m6 l6">
										<div class="row">
											<p>
										      <input name="statut" type="radio" id="junior" value="junior"  checked/>
										      <label for="junior">Junior(à partir de 30dt)</label>
										    </p>
										</div>
										<div class="row">
											<p>
										      <input name="statut" type="radio" id="senior" value="senior" />
										      <label for="senior">Senior(à partir de 100dt)</label>
										    </p>
										</div>
										<div class="row">
											<p>
										      <input name="statut" type="radio" id="sponsor" value="sponsor" />
										      <label for="sponsor">Sponsor(à partir de 500Dt)</label>
										    </p>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col s6 m6 l6">
										<label>Inclusion *</label>
									</div>
									<div class="col s6 m6 l6">
										<div class="row">
											<p>
		                                    	<input type="checkbox" id="politique" name="inclusion[]" value="politique"/>
		                                        <label for="politique">Inclusion Politique</label>
		                                    </p>
										</div>
										<div class="row">
											<p>
		                                    	<input type="checkbox" id="economique" name="inclusion[]" value="economique"/>
		                                        <label for="economique">Inclusion Economique</label>
		                                    </p>
										</div>
										<div class="row">
											<p>
		                                    	<input type="checkbox" id="sociale" name="inclusion[]" value="social"/>
		                                        <label for="sociale">Inclusion Sociale</label>
		                                    </p>
										</div>
										<div class="row">
											<p>
		                                    	<input type="checkbox" id="culturelle" name="inclusion[]" value="culturelle"/>
		                                        <label for="culturelle">Inclusion Culturelle</label>
		                                    </p>
										</div>
										<div class="row">
											<p>
		                                    	<input type="checkbox" id="technologique" name="inclusion[]" value="technologique"/>
		                                        <label for="technologique">Inclusion Technologique</label>
		                                    </p>
										</div>
									</div>
								</div>
								<div class="row">
									<p>
			                            <input type="checkbox" id="newsletter" name="newsletter" value="oui"checked/>
			                            <label for="newsletter">J accepte de recevoir des emails de la part de Youth Decides</label>
		                            </p>
								</div>
								<div class="row">
									<p>
			                            <input type="checkbox" id="terms" required/>
			                            <label for="terms"><a href="#">Terms&Services</a></label>
		                            </p>
								</div>


									<button class="btn waves-effect waves-light" type="submit" name="action" ng-disabled="myForm.$invalid">Get the Card</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>
		<?php include_once'footer.php' ?>
	</body>
	<script>
// create angular app
	var validationApp = angular.module('validationApp', []);

	// create angular controller
	validationApp.controller('mainController', function($scope) {

		$scope.onlyNumbers = /^\d+$/;
		// function to submit the form after all validation has occurred
		$scope.submitForm = function() {

			// check to make sure the form is completely valid
			if ($scope.myForm.$valid) {
				alert('Votre demande sera traitée dans un délai de 2 "business days". Vous receverais un e-mail contenant votre mot de passe.');
			}

		};

	});
</script>
</html>