    <div class="row">

            <div class="col-md-12">
<div class="col-md-6"><h1 >Total incasari: 32400</h1>


    <table align="center" cellpadding="0" cellspacing="0" border="0" >

										<thead>

											<tr align="center">
												<td  style="background:#eef1f8 color:black">Nume si prenume</td>
												<td style="background:#eef1f8 color:black;"> CNP</td>


												<td style="background:#eef1f8 color:black;">Telefon</td>
												
												<td style="background:#eef1f8 color:black;">Taxa total</td>
												<td style="background:#eef1f8 color:black;">Taxa platita</td>
												<td style="background:#eef1f8 color:black;">Actiuni</td>

											</tr>

										</thead>

										<tbody>

												{USERS}

												<tr align="center" {culoare}>
<td style="background:grey; color:white;">{nume} {prenume}</td>
													<td style="background:#eef1f8 color:black;">{CNP}</td>

													

											

													<td style="background:#eef1f8 color:black;">{telefon}</td>
													

													<td style="background:#eef1f8 color:black;">{taxa}</td>
													<td style="background:#eef1f8 color:black;">{taxa_platita}</td>

													

													

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

