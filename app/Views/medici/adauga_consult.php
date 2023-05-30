				<div class="row">

            <div class="col-md-12">
			<div class="col-md-6">
			<div class="col-md-2">
			</div><div class="col-md-6"><h1 >{nume} {prenume}</h1><a style="color:white; " href="{SITE_URL}/users/view_profile/{cnp}"><button type="submit" style="background: #6d81c0; " class="btn btn-orange submit">Vezi fisa pacientului</button></a><a style="color:white; padding-left:1%" href="{SITE_URL}/users/view_consultatii_pacient/{cnp}"><button type="submit" style="background: #6d81c0; " class="btn btn-orange submit">Vezi consultatii</button></a>
			</div>
			</div>
			</div>
		<div class="col-md-12">
		<div class="col-md-6">
			<div class="form-horizontal" style="width:150%;">
			<h2 style="padding-left:13%; padding-top:20px">Adauga consult</h2><br><br>
			<div class="row">
				<form class="form-horizontal" role="form" method="post" action="{SITE_URL}/users/adauga_consult_done/{cnp}/" enctype="multipart/form-data">

                              <input type="hidden" name="source" value="{source}" />

							  


	<div class="form-group">

                                  <label class="col-lg-2 control-label">Diagnostic</label>
<div class="col-lg-5">
                                  <select class="form-control" id="cod_diagnostic" name="cod_diagnostic">
							<option value="NULL">Alege un diagnostic</option>
						 {DIAGNOSTIC}
							  <option value="{cod_diagnostic}">{denumire_diagnostic}</option>
								  
						  {/DIAGNOSTIC}
						</select>
					  </div>
					  </div>  

                                 

								<div class="form-group">

                                  <label class="col-lg-2 control-label">Mentiuni speciale</label>

                                  <div class="col-lg-5">

									<input id="detalii" name="detalii" type="text"    class="form-control" > 

                                  </div>

                                </div>	

								<div class="form-group">

                                  <label class="col-lg-2 control-label">Plan de tratament</label>

                                  <div class="col-lg-5">

									<input id="tratament" name="tratament" type="text"  class="form-control" > 

                                  </div>

                                </div> 

					 
									
				    

				                        <div class="form-group" style="padding-left: 25%;">
                                  <div class="col-lg-5">
									<input type="submit" class="buton_sumbit" id="" name="project_save" class="project_save" value="Salveaza">
                                  </div>
                                </div>									 

                              </form>
              </div>  



            </div>



          </div>
		
		
		
		
		
		
		
		
		
		
		
		