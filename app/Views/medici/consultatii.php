
          <div class="row">
		 
            <!-- Chats widget -->
            <div class="col-md-12">
			<div class="col-md-6">
			<div class="col-md-2">
			</div><div class="col-md-8"><h1 >{nume} {prenume}</h1><a style="color:white; " href="{SITE_URL}/users/view_profile/{cnp}"><button type="submit" style="background: #6d81c0; " class="btn btn-orange submit">Vezi fisa pacientului</button></a><a style="color:white; padding-left: 1%;" href="{SITE_URL}/users/view_consultatii_pacient/{cnp}"><button type="submit" style="background: #6d81c0; " class="btn btn-orange submit">Vezi consultatii</button></a><a style="color:white; padding-left: 1%;" href="{SITE_URL}/users/adauga_consult/{cnp}"><button type="submit" style="background: #6d81c0; " class="btn btn-orange submit">Adauga consult</button></a></div>
			</div>
			<div class="col-md-6">
			
			</div>
			</div>
			<div class="col-md-12">
			<div class="col-md-6">
		
			</br></br>
               <h2 style="padding-left:17%; padding-top:20px">Consultatii</h2></br>
						<table align="center" cellpadding="0" cellspacing="0" border="0" >

										<thead>

											<tr align="center">
												<td  style="background:#eef1f8 color:black">Data consult</td>
												<td style="background:#eef1f8 color:black;">Diagnostic</td>

												<td style="background:#eef1f8 color:black;">Actiuni</td>	
												

											</tr>

										</thead>

										<tbody>

												{USERS}

												<tr align="center" {culoare}>

													<td style="background:#eef1f8 color:black;">{data_consult}</td>

													

													<td style="background:#eef1f8 color:black;">{denumire_diagnostic}</td>
													
<td style="background:#6d81c0; color:white;" >
													<a style="color:white" class="link" href="{SITE_URL}/users/view_consult/{id_consult}">Vezi detalii</a>&nbsp;&nbsp;&nbsp;	
													</td>
												</tr>	

												{/USERS}

										</tbody>

									</table>
                              
								      
		 
			</div>
				
                  
                </div>
				

              </div> 
            </div>
			
			
            