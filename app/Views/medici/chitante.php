    <div class="row">

            <div class="col-md-12">
			<div class="col-md-6">
			<div class="col-md-2">
			<img src="http://nemobit.ro/app/images/iconita_profil.png"></div><div class="col-md-6"><h1 >Pop Andrei</h1><a style="color:white; " href="{SITE_URL}/users/edit/{CNP}"><button type="submit" style="background: #6d81c0; " class="btn btn-orange submit">Editeaza profil</button></a><a style="color:white; padding-left:1%" href="{SITE_URL}/users/cursuri_student/{CNP}"><button type="submit" style="background: #6d81c0; " class="btn btn-orange submit">Cursuri</button></a><a style="color:white; padding-left:1%" href="{SITE_URL}/users/restante_student/{CNP}"><button type="submit" style="background: #6d81c0; " class="btn btn-orange submit">Restante</button></a>
			</div>
			</div>
			</div>
<div class="col-md-12">
   <div class="col-md-6">
			<div class="form-horizontal" style="width:150%;">
			<h2 style="padding-left:13%; padding-top:20px">Chitante</h2>
			
			<table align="center" cellpadding="0" cellspacing="0" border="0"  >

					<thead>

											<tr align="center">
												<td  style="backgr	ound:#eef1f8; color:black">Data</td>
												<td style="background:#eef1f8 color:black"> Suma</td>
												<td style="background:#eef1f8 color:black">Actiuni          </td>&nbsp;&nbsp;&nbsp;


											</tr>

										</thead>

										<tbody>

												
{CHITANTE}

												<tr align="center" {culoare}>
													<td style="background:grey; color:white;">{suma}</td>
													<td style="background:#eef1f8 color:black;">{data_plata}</td>

													<td style="background:#6d81c0; color:white;">

													<a style="color:white" class="link" href="{SITE_URL}/users/view_chitanta/{id_plata}">Vezi chitanta</a>&nbsp;&nbsp;&nbsp;	

													<a  style="color:white" class="link" href="{SITE_URL}/users/delete/{CNP}" onclick='return confirm("Doriti stergerea cursantului {prenume} {nume}?")'>Sterge</a>	

													</td>

												</tr>	

												{/CHITANTE}
										

										</tbody>

									</table>	
									
							  							
								
								<!--<div style="padding-left: 120%;padding-top: 13%;">
								<a style="color:white; padding-left: 13%;padding-top: 13%;" href="{SITE_URL}/users/senzori/{CNP}"><button type="submit" style="background: #6d81c0; " class="btn btn-orange submit">Istoric senzori</button></a>
                               </div>-->
									</div>
			</div>

              </div>  

              

            </div>

