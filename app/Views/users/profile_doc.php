
          <div class="row">
		 
            <!-- Chats widget -->
            <div class="col-md-12">
			<div class="col-md-6">
			<div class="col-md-2" >
			</div><div class="col-md-8"  style="margin-left:13%"><h1 >{nume} {prenume}</h1><a style="color:white; " href="{SITE_URL}/users/edit_pacient/{cnp}"><button type="submit" style="background: #074486; " class="btn btn-orange submit em">Editeaza date</button></a><a style="color:white; padding-left: 1%;" href="{SITE_URL}/users/view_consultatii_pacient/{cnp}"><button type="submit" style="background: #074486; " class="btn btn-orange submit em">Vezi consultatii</button></a><a style="color:white; padding-left: 1%;" href="{SITE_URL}/users/adauga_consult/{cnp}"><button type="submit" style="background: #074486; " class="btn btn-orange submit em">Adauga consult</button></a></div>
			</div>
			<div class="col-md-6">
			
			</div>
			</div>
			<div class="col-md-12">
			<div class="col-md-4" style="margin-left:10%">
			

			<div class="form-horizontal">
			</br></br>
               <h2 style="padding-left:17%; padding-top:20px">Date personale</h2>
							<div style="margin-top: -5%;" class="form-group">
							</br></br></br>
                                      <label class="col-lg-2 control-label">CNP</label>
                                  <div class="col-lg-7">
									<div class="form-control" >{cnp} </div>
                                  </div>
                                </div>
							  <div class="form-group">
                                  <label class="col-lg-2 control-label">Sex</label>
                                  <div class="col-lg-7">
									<div class="form-control" >{sex} </div>
                                  </div>
                                </div>
								<div class="form-group">
                                  <label class="col-lg-2 control-label">Domiciliu</label>
                                  <div class="col-lg-7">
									<div class="form-control" >{judet}, {localitate}, {adresa} </div>
                                  </div>
                                </div>
							  <div class="form-group">
                                  <label class="col-lg-2 control-label">Telefon</label>
                                  <div class="col-lg-7">
									<div class="form-control" >{telefon}</div>
                                  </div>
                                </div>
								<div class="form-group">
                                  <label class="col-lg-2 control-label">Data nasterii</label>
                                  <div class="col-lg-7">
                                    <div class="form-control" >{data_nasterii} </div>
                                  </div>
                                </div>
								<div class="form-group">
                                  <label class="col-lg-2 control-label">Varsta</label>
                                  <div class="col-lg-7">
									<div class="form-control" >{varsta} ani</div>
                                  </div>
                                </div>
								<div class="form-group">
                                  <label class="col-lg-2 control-label">Greutate</label>
                                  <div class="col-lg-7">
									<div class="form-control" >{greutate} kg</div>
                                  </div>
                                </div>
								<div class="form-group">
                                  <label class="col-lg-2 control-label">Inaltime</label>
                                  <div class="col-lg-7">
									<div class="form-control" >{inaltime} m</div>
                                  </div>
                                </div>
								<div class="form-group">
                                  <label class="col-lg-2 control-label">Alergii</label>
                                  <div class="col-lg-7">
									<div class="form-control" >{alergii} </div>
                                  </div>
                                </div>
								<div class="form-group">
                                  <label class="col-lg-2 control-label">Istoric medical</label>
                                  <div class="col-lg-7">
									<div class="form-control" style="height: 100px">{istoric_medical} </div>
                                  </div>
                                </div>
								
                              
								      
		 </div>
		</div>
		<div class="col-md-6">
				<div class="col-md-3">
		
			</br></br>
               <h2 style="padding-left:17%; padding-top:20px">Diagnostice</h2></br>
						<table align="center" cellpadding="0" cellspacing="0" border="0" >

										<thead>

											<tr align="center">
												<td  style="background:#eef1f8 color:black">Cod diagnostic</td>
												<td style="background:#eef1f8 color:black;"> Denumire diagnostic</td>

												<td style="background:#eef1f8 color:black;">Data adaugarii</td>	
												

											</tr>

										</thead>

										<tbody>

												{DIAGNOSTIC}

												<tr align="center" {culoare}>

													<td style="background:#eef1f8 color:black;">{cod_diagnostic}</td>

													

													<td style="background:#eef1f8 color:black;">{denumire_diagnostic}</td>
													

													<td style="background:#eef1f8 color:black;">{data_diagnostic}</td>
													
												</tr>	

												{/DIAGNOSTIC}

										</tbody>

									</table>
									
									</br></br>
               
                              
								      
		 
			</div>
			<div class="col-md-5" style="margin-left: 30%;"></br></br>
			<h2 style="padding-left:17%; padding-top:20px">Alerte</h2></br>
						<table align="center" cellpadding="0" cellspacing="0" border="0" >

										<thead>

											<tr align="center">
												<td  style="background:#eef1f8 color:black">Tip alerta</td>
												<td style="background:#eef1f8 color:black;"> Data alerta</td>

												
												

											</tr>

										</thead>

										<tbody>

												{ALERTE}

												<tr align="center" {culoare}>

													<td style="background:#eef1f8 color:black;">{tip_alerta}</td>

													

													<td style="background:#eef1f8 color:black;">{data_alerta}</td>
													

												
													
												</tr>	

												{/ALERTE}

										</tbody>

									</table>
			</div>
			</div>
			<div class="col-md-6">
			<div class="col-md-3"></br></br>
			<h2 style="padding-left:17%; padding-top:20px">Lista activitati</h2></br>
						<table align="center" cellpadding="0" cellspacing="0" border="0" >

										<thead>

											<tr align="center">
												<td  style="background:#eef1f8 color:black"></td>
												<td style="background:#eef1f8 color:black;"> </td>

												
												

											</tr>

										</thead>

										<tbody>

												{ACTIVITATI}

												<tr align="center" {culoare}>

													<td style="background:#eef1f8 color:black;">{tip_alerta}</td>

													

													<td style="background:#eef1f8 color:black;">{data_alerta}</td>
													

												
													
												</tr>	

												{/ACTIVITATI}

										</tbody>

									</table>
			</div>
			<div class="col-md-5" style="margin-left: 30%;"></br></br>
			<h2 style="padding-left:17%; padding-top:20px">Valori nominale senzori</h2></br>
						<table align="center" cellpadding="0" cellspacing="0" border="0" >

										<thead>

											<tr align="center">
												<td  style="background:#eef1f8 color:black"></td>
												<td style="background:#eef1f8 color:black;"> </td>

												
												

											</tr>

										</thead>

										<tbody>

												{VALORI}

												<tr align="center" {culoare}>

													<td style="background:#eef1f8 color:black;">{tip_alerta}</td>

													

													<td style="background:#eef1f8 color:black;">{data_alerta}</td>
													

												
													
												</tr>	

												{/VALORI}

										</tbody>

									</table>
			</div>
			</div>
                  
                </div>
				

              </div> 
            </div>
			
			
            