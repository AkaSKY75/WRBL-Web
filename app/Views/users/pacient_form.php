<div class="row">

  <div class="col-md-12">
    
    <div class="row">
				
      <form class="form-horizontal" role="form" method="post" action="{SITE_URL}/medic/add_done1/" enctype="multipart/form-data">

        <input type="hidden" name="source" value="{source}" />

          <div class="form-group">

            <label class="col-lg-2 control-label">NUME</label>

            <div class="col-lg-5">

              <input id="nume" name="nume" type="text" value="{nume}" placeholder="Nume" class="form-control" required data-parsley-error-message="Campul este obligatoriu"> 

            </div>

          </div>
		 
          <div class="form-group">

            <label class="col-lg-2 control-label">PRENUME</label>

            <div class="col-lg-5">

              <input id="prenume" name="prenume" type="text" value="{prenume}" placeholder="Prenume" class="form-control" required data-parsley-error-message="Campul este obligatoriu"> 

            </div>

          </div>

          <div class="form-group">

            <label class="col-lg-2 control-label">VÂRSTA</label>

            <div class="col-lg-5">

              <input id="varsta" name="varsta" type="text" value="{varsta}" placeholder="Vârsta" class="form-control" required data-parsley-error-message="Campul este obligatoriu"> 

            </div>

          </div>

          <div class="form-group">

            <label class="col-lg-2 control-label">CNP</label>

            <div class="col-lg-5">

						  <input id="cnp" name="cnp" type="text" value="{cnp}" placeholder="CNP" class="form-control" onkeyup="validateCNP()" required data-parsley-error-message="Campul este obligatoriu"> 

            </div>

          </div>

					<div class="form-group">

            <label class="col-lg-2 control-label">LOCALITATE</label>

            <div class="col-lg-5">

						  <input id="localitate" name="localitate" type="text" value="{localitate}" placeholder="Localitate" class="form-control" required data-parsley-error-message="Campul este obligatoriu"> 

            </div>

          </div>

					<div class="form-group">

            <label class="col-lg-2 control-label">JUDEȚ</label>

            <div class="col-lg-5">

					    <input id="judet" name="judet" type="text" value="{judet}" placeholder="Județ" class="form-control" required data-parsley-error-message="Campul este obligatoriu"> 

            </div>

          </div>
								
					<div class="form-group">

            <label class="col-lg-2 control-label">STRADA</label>

              <div class="col-lg-5">

								<input id="strada" name="strada" type="text" value="{strada}" placeholder="Strada" class="form-control" required data-parsley-error-message="Campul este obligatoriu"> 

              </div>
            
          </div>

					<div class="form-group">

            <label class="col-lg-2 control-label">BLOC</label>

              <div class="col-lg-5">

								<input id="bloc" name="bloc" type="text" value="{bloc}" placeholder="Bloc" class="form-control" required data-parsley-error-message="Campul este obligatoriu"> 

              </div>
            
          </div>

					<div class="form-group">

            <label class="col-lg-2 control-label">SCARA</label>

              <div class="col-lg-5">

								<input id="scara" name="scara" type="text" value="{scara}" placeholder="Scara" class="form-control" required data-parsley-error-message="Campul este obligatoriu"> 

              </div>
            
          </div>

					<div class="form-group">

            <label class="col-lg-2 control-label">ETAJ</label>

              <div class="col-lg-5">

								<input id="etaj" name="etaj" type="text" value="{etaj}" placeholder="Etaj" class="form-control" required data-parsley-error-message="Campul este obligatoriu"> 

              </div>
            
          </div>

					<div class="form-group">

            <label class="col-lg-2 control-label">APARTAMENT</label>

              <div class="col-lg-5">

								<input id="apartament" name="apartament" type="text" value="{apartament}" placeholder="Apartament" class="form-control" required data-parsley-error-message="Campul este obligatoriu"> 

              </div>
            
          </div>

					<div class="form-group">

            <label class="col-lg-2 control-label">NUMĂR</label>

              <div class="col-lg-5">

								<input id="numar" name="numar" type="text" value="{numar}" placeholder="Apartament" class="form-control" required data-parsley-error-message="Campul este obligatoriu"> 

              </div>
            
          </div>
									
          <div class="form-group">

            <label class="col-lg-2 control-label">TELEFON</label>

            <div class="col-lg-5">

						  <input id="telefon" name="telefon" type="text" value="{telefon}" placeholder="Telefon" class="form-control" required data-parsley-error-message="Campul este obligatoriu"> 

            </div>

          </div>
                               
				  <div class="form-group">

            <label class="col-lg-2 control-label">E-MAIL</label>

            <div class="col-lg-5">

					    <input id="email" name="email" type="email" value="{email}"  placeholder="E-mail" class="form-control" > 

            </div>

          </div>
								
          <div class="form-group">

            <label class="col-lg-2 control-label">PROFESIE</label>

              <div class="col-lg-5">

								<input id="profesie" name="profesie" type="text" value="{profesie}"  placeholder="Profesie" class="form-control" > 

              </div>

          </div>

          <div class="form-group">

            <label class="col-lg-2 control-label">LOC DE MUNCĂ</label>

              <div class="col-lg-5">

								<input id="loc_de_munca" name="loc_de_munca" type="text" value="{loc_de_munca}"  placeholder="Loc de muncă" class="form-control">

              </div>

          </div>

          <div class="form-group">

            <label class="col-lg-2 control-label">ISTORIC MEDICAL</label>

              <div class="col-lg-5">

                <textarea id="istoric_medical" name="istoric_medical" rows=4 placeholder="Istoric medical" class="form-control" required>{istoric_medical}</textarea>

              </div>

          </div>

					<div class="form-group">

            <label class="col-lg-2 control-label">ALERGII</label>

            <div class="col-lg-5">

						  <textarea id="alergii" name="alergii" rows=2 placeholder="Alergii" class="form-control" required>{alergii}</textarea>

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