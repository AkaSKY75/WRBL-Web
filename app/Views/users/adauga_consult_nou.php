				<div class="row">

            <div class="col-md-12">
			<div class="col-md-6">
			<div class="col-md-2">
			</div><!--<div class="col-md-6"   style="margin-left:13%"><a style="color:white; " href="{SITE_URL}/users/view_profile/{cnp}"><button type="submit" style="background: #074486; " class="btn btn-orange submit em">Vezi fisa pacientului</button></a><a style="color:white; padding-left:1%" href="{SITE_URL}/users/view_consultatii_pacient/{cnp}"><button type="submit" style="background: #074486; " class="btn btn-orange submit em">Vezi consultatii</button></a>
			</div>-->
			</div>
			</div>
		<div class="col-md-12" >
		<div class="col-md-6"   style="margin-left:3%">
			<div class="form-horizontal" style="width:150%;">
			<br><br>
			<div class="row">
				<form class="form-horizontal" role="form" method="post" action="{SITE_URL}/users/adauga_consult_nou_done/" enctype="multipart/form-data">

                              <input type="hidden" name="source" value="{source}" />

							  <div class="form-group">

                                  <label class="col-lg-2 control-label">Pacient</label>
									<div class="col-lg-5">
											<select class="form-control" id="cnp" name="cnp">
											<option value="NULL">Alege un pacient</option>
											{PACIENTI}
											<option value="{cnp}">{nume} {prenume}</option>
								  
											{/PACIENTI}
											</select>
									</div>
							</div> 


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

                                  <label class="col-lg-2 control-label">Observatii</label>

                                  <div class="col-lg-5">

									<textarea id="detalii" name="detalii" type="text"  rows=5  class="form-control" > </textarea>

                                  </div>

                                </div>	

								<div class="form-group">

                                  <label class="col-lg-2 control-label">Plan de tratament</label>

                                  <div class="col-lg-5">

									<textarea id="tratament" name="tratament" type="text" rows=5  class="form-control" > </textarea>

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
		
		
		
		
		
		
		
		
		
		
		
		