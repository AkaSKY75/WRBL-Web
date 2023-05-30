
          <div class="row" style="padding-left: 10%;">
		 
            <!-- Chats widget -->
            <div class="col-md-12">
			<div class="col-md-6">
			<div class="col-md-2">
			</div><div class="col-md-6"><h1 >{nume} {prenume}</h1><a style="color:white; " href="{SITE_URL}/users/view_profile/{cnp}"><button type="submit" style="background: #6d81c0; " class="btn btn-orange submit">Vezi fisa pacientului</button></a><a style="color:white; padding-left:1%" href="{SITE_URL}/users/view_consultatii_pacient/{cnp}"><button type="submit" style="background: #6d81c0; " class="btn btn-orange submit">Vezi consultatii</button></a>
			</div>
			<div class="col-md-6">
			
			</div>
			</div>
			<div class="col-md-12"></div>
			<div class="col-md-12">
			<div class="col-md-8">
			
<div class="form-horizontal"></br></br>
<h2 style="padding-left:17%; padding-top:20px">Editare date pacient</h2></br>
			<form class="form-horizontal" role="form" method="post" action="{SITE_URL}/clienti/edit_done/{id_client}/" enctype="multipart/form-data">

                              <input type="hidden" name="source" value="{source}" />


								<div class="form-group">

                                  <label class="col-lg-2 control-label">Nume</label>

                                  <div class="col-lg-5">

                                    <input id="nume" name="nume" type="text" placeholder="{nume}" value="{nume}" class="form-control" > 

                                  </div>

                                </div>
		 

							  <div class="form-group">

                                  <label class="col-lg-2 control-label">Prenume</label>

                                  <div class="col-lg-5">

									<input id="prenume" name="prenume" type="text" placeholder="{prenume}" value="{prenume}" class="form-control" > 

                                  </div>

                                </div>

							  
<div class="form-group">
                                      <label class="col-lg-2 control-label">CNP</label>
                                  <div class="col-lg-5">
									<input id="cnp" name="cnp" type="text" placeholder="{cnp}" value="{cnp}" class="form-control" > 
                                  </div>
                                </div>
							  <div class="form-group">
                                  <label class="col-lg-2 control-label">Sex</label>
                                  <div class="col-lg-5">
									<input id="sex" name="sex" type="text" placeholder="{sex}" value="{sex}" class="form-control" > 
                                  </div>
                                </div>
								<div class="form-group">
                                  <label class="col-lg-2 control-label">Judet</label>
                                  <div class="col-lg-5">
									<input id="judet" name="judet" type="text" placeholder="{judet}" value="{judet}" class="form-control" > 
                                  </div>
                                </div>
								<div class="form-group">
                                  <label class="col-lg-2 control-label">Localitate</label>
                                  <div class="col-lg-5">
									<input id="localitate" name="localitate" type="text" placeholder="{localitate}" value="{localitate}" class="form-control" > 
                                  </div>
                                </div>
								<div class="form-group">
                                  <label class="col-lg-2 control-label">Adresa</label>
                                  <div class="col-lg-5">
									<input id="adresa" name="adresa" type="text" placeholder="{adresa}" value="{adresa}" class="form-control" > 
                                  </div>
                                </div>
							  <div class="form-group">
                                  <label class="col-lg-2 control-label">Telefon</label>
                                  <div class="col-lg-5">
									<input id="telefon" name="telefon" type="text" placeholder="{telefon}" value="{telefon}" class="form-control" > 
                                  </div>
                                </div>
								
								<div class="form-group">
                                  <label class="col-lg-2 control-label">Greutate</label>
                                  <div class="col-lg-5">
									<input id="greutate" name="greutate" type="text" placeholder="{greutate}" value="{greutate}" class="form-control" > 
                                  </div>
                                </div>
								<div class="form-group">
                                  <label class="col-lg-2 control-label">Inaltime</label>
                                  <div class="col-lg-5">
								<input id="inaltime" name="inaltime" type="text" placeholder="{inaltime}" value="{inaltime}" class="form-control" > 
                                  </div>
                                </div>
								<div class="form-group">
                                  <label class="col-lg-2 control-label">Alergii</label>
                                  <div class="col-lg-5">
									<input id="alergii" name="alergii" type="text" placeholder="{alergii}" value="{alergii}" class="form-control" > 
                                  </div>
                                </div>
								<div class="form-group">
                                  <label class="col-lg-2 control-label">Boli cronice</label>
                                  <div class="col-lg-5">
									<input id="boli_cronice" name="boli_cronice" type="text" placeholder="{boli_cronice}" value="{boli_cronice}" class="form-control" > 
                                  </div>
                                </div>

								  

				    

				                        <div class="form-group" style="padding-left: 25%;">
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
			
			
            