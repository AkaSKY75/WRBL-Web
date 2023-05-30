    <div class="row">

            <div class="col-md-12">



    <table align="center" cellpadding="0" cellspacing="0" border="0" >

										<thead>

											<tr align="center">
												<td  style="background:#eef1f8 color:black">Nume si prenume</td>
												<td style="background:#eef1f8 color:black;"> CNP</td>

												<td style="background:#eef1f8 color:black;">Data nasterii</td>	

												<td style="background:#eef1f8 color:black;">Localitate</td>

												<td style="background:#eef1f8 color:black;">Telefon</td>
												
												<td style="background:#eef1f8 color:black;">Numar fisa</td>
												<td style="background:#eef1f8 color:black;">Data inscrierii</td>
													<td style="background:#eef1f8 color:black;">Numar restante</td>
												<td style="background:#eef1f8 color:black;">Actiuni</td>

											</tr>

										</thead>

										<tbody>

												{USERS}

												<tr align="center" {culoare}>
<td style="background:grey; color:white;">{nume} {prenume}</td>
													<td style="background:#eef1f8 color:black;">{CNP}</td>

													

													<td style="background:#eef1f8 color:black;">{data_nasterii}</td>
													<td style="background:#eef1f8 color:black;">{localitate}</td>

													<td style="background:#eef1f8 color:black;">{telefon}</td>
													<td style="background:#eef1f8 color:black;">{numar_fisa}</td>

													<td style="background:#eef1f8 color:black;">{data_inscrierii}</td>
													<td style="background:#eef1f8 color:black;">{nr_restante}</td>

													

													

													<td style="background:#6d81c0; color:white;" >

													<a style="color:white" class="link" href="{SITE_URL}/users/view_profile/{CNP}">Vezi profil</a>&nbsp;&nbsp;&nbsp;	

													<a  style="color:white" class="link" href="{SITE_URL}/users/edit/{CNP}">Editeaza</a>&nbsp;&nbsp;&nbsp;

													<a  style="color:white" class="link" href="{SITE_URL}/users/delete/{CNP}" onclick='return confirm("Doriti stergerea cursantului {prenume} {nume}?")'>Sterge</a>	

													</td>

												</tr>	

												{/USERS}

										</tbody>

									</table>

              </div>  

              

            </div>

