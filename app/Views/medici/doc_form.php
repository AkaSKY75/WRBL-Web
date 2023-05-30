		<div class="row">

            <div class="col-md-12">
			<div class="row">
				<form class="form-horizontal" role="form" method="post" action="{SITE_URL}/admin/add_done1/" enctype="multipart/form-data">

                              <input type="hidden" name="source" value="{source}" />


								<div class="form-group">

                                  <label class="col-lg-2 control-label">Nume</label>

                                  <div class="col-lg-5">

                                    <input id="nume_medic" name="nume_medic" type="text" placeholder="Nume" class="form-control" required data-parsley-error-message="Campul este obligatoriu"> 

                                  </div>

                                </div>
		 

							  <div class="form-group">

                                  <label class="col-lg-2 control-label">Prenume</label>

                                  <div class="col-lg-5">

									<input id="prenume_medic" name="prenume_medic" type="text" placeholder="Prenume" class="form-control" required data-parsley-error-message="Campul este obligatoriu"> 

                                  </div>

                                </div>

							  <div class="form-group" >

                                  <label class="col-lg-2 control-label">CNP</label>

                                  <div class="col-lg-5">

									<input id="cnp" name="cnp" type="text"  placeholder="CNP" class="form-control" onkeyup="validateCNP()" required data-parsley-error-message="Campul este obligatoriu"> 

                                  </div>

                                </div>

								<div class="form-group">

                                  <label class="col-lg-2 control-label">Specializare</label>

                                  <div class="col-lg-5">

									<input id="specializare" name="specializare" type="text" placeholder="Specializare" class="form-control" required data-parsley-error-message="Campul este obligatoriu"> 

                                  </div>

                                </div>

								
								
							
									<div class="form-group">

                                  <label class="col-lg-2 control-label">Telefon</label>

                                  <div class="col-lg-5">

									<input id="telefon" name="telefon" type="text" placeholder="Telefon" class="form-control" required data-parsley-error-message="Campul este obligatoriu"> 

                                  </div>

                                </div>
                               
							
							

							  

								
				    

				                        <div class="form-group" style="padding-left: 25%;">
                                  <div class="col-lg-5">
									<input type="submit" class="buton_sumbit" id="" name="project_save" class="project_save" value="Adauga">
                                  </div>
                                </div>									 

                              </form>
              </div>  



            </div>



          </div>
		  
		  <script>
		  function validateCNP () {
			  var value = document.getElementById('cnp').value;
	var re = /^\d{1}\d{2}(0[1-9]|1[0-2])(0[1-9]|[12]\d|3[01])(0[1-9]|[1-4]\d| 5[0-2]|99)\d{4}$/,
		bigSum = 0,
		rest = 0,
		ctrlDigit = 0,
		control = '279146358279',
		i = 0;
	if (re.test(value)) {
		for (i = 0; i < 12; i++) {
			bigSum += value[i] * control[i];
		}
		ctrlDigit = bigSum % 11;
		if (ctrlDigit === 10) {
			ctrlDigit = 1;
		}

		if (ctrlDigit !== parseInt(value[12], 10)) {
			return false;
		} else {
			return true;
		}
	}
	return false;
};
		  </script>