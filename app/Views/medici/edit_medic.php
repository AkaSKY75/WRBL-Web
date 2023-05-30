
          <div class="row" style="padding-left: 10%;">
		 
            <!-- Chats widget -->
            <div class="col-md-12">
			<div class="col-md-6">
			<div class="col-md-2">
			</div><div class="col-md-6" style="margin-left:6%"><h1 >{nume_medic} {prenume_medic}</h1><a style="color:white; " href="{SITE_URL}/admin/view_profile/{id_medic}"><button type="submit" style="background: #074486; min-width: 110px;" class="btn btn-orange submit em">Vezi profil</button></a><!--<a style="color:white; padding-left:1%" href="{SITE_URL}/users/view_consultatii_pacient/{cnp}"><button type="submit" style="background: #6d81c0; " class="btn btn-orange submit">Vezi consultatii</button></a>-->
			</div>
			<div class="col-md-6">
			
			</div>
			</div>
			<div class="col-md-12"></div>
			<div class="col-md-12">
			<div class="col-md-8">
			
<div class="form-horizontal"></br></br>
<h2 style="padding-left:17%; padding-top:20px">Editare date medic</h2></br>
			<form class="form-horizontal" role="form" method="post" action="{SITE_URL}/admin/edit_done/{id_medic}/" enctype="multipart/form-data">

                              <input type="hidden" name="source" value="{source}" />


								<div class="form-group">

                                  <label class="col-lg-2 control-label">Nume</label>

                                  <div class="col-lg-5">

                                    <input id="nume_medic" name="nume_medic" type="text" placeholder="{nume_medic}" value="{nume_medic}" class="form-control" > 

                                  </div>

                                </div>
		 

							  <div class="form-group">

                                  <label class="col-lg-2 control-label">Prenume</label>

                                  <div class="col-lg-5">

									<input id="prenume_medic" name="prenume_medic" type="text" placeholder="{prenume_medic}" value="{prenume_medic}" class="form-control" > 

                                  </div>

                                </div>

							  
<div class="form-group">
                                      <label class="col-lg-2 control-label">CNP</label>
                                  <div class="col-lg-5">
									<input id="cnp" name="cnp" type="text" placeholder="{cnp}" value="{cnp}" class="form-control" > 
                                  </div>
                                </div>
							  
							  <div class="form-group">
                                  <label class="col-lg-2 control-label">Telefon</label>
                                  <div class="col-lg-5">
									<input id="telefon" name="telefon" type="text" placeholder="{telefon}" value="{telefon}" class="form-control" > 
                                  </div>
                                </div>
								
								
								<div class="form-group">
                                  <label class="col-lg-2 control-label">Specializare</label>
                                  <div class="col-lg-5">
									<input id="specializare" name="specializare" type="text" placeholder="{specializare}" value="{specializare}" class="form-control" > 
                                  </div>
                                </div>

								  

				    

				                        <div class="form-group" style="padding-left: 17%;">
                                  <div class="col-lg-5">
									<input type="submit" class="buton_sumbit" id="" name="project_save" class="project_save" value="Salveaza">
                                  </div>
                                </div>									 

                              </form>
				</div></div>
				<div class="col-md-6">
			
			</div>
                  
                </div>
				

              </div> 
            </div>
			
			
            