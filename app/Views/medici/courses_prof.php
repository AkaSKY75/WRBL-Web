    <div class="row">

            <div class="col-md-12">
			<div class="col-md-6">
			<div class="col-md-2">
			<img src="http://nemobit.ro/app/images/iconita_profil.png"></div><div class="col-md-6"><h1 >Andrei Pop</h1><a style="color:white; " href="{SITE_URL}/users/edit/{CNP}"><button type="submit" style="background: #6d81c0; " class="btn btn-orange submit">Editeaza profil</button></a><a style="color:white; padding-left: 1%;" href="{SITE_URL}/users/view_courses_prof/{CNP}"><button type="submit" style="background: #6d81c0; " class="btn btn-orange submit">Vezi cursuri</button></a></div>
			</div>
			<div class="col-md-12">
			
			</div>
			</div>
<div class="col-md-6">
			<div class="form-horizontal" style="width:150%">
			<h2 style="padding-left:15%; padding-top:20px">Cursuri</h2>
    <table class="tabel_nemo" cellpadding="0" cellspacing="0" border="0"  width="100%" >

										<thead>

											<tr align="center">
<td  style="background:#eef1f8 color:black;">Nume curs</td>
												<td style="background:#eef1f8 color:black;"> Numar ore total</td>

												

												

												

												<td style="background:#eef1f8 color:black;">Numar ore efectuate</td>	

												
												

												

												

											</tr>

										</thead>

										<tbody>

												{COURSES}

												<tr align="center" {culoare}>
<td style="background:grey; color:white;">{nume_curs}</td>
													<td style="background:#eef1f8 color:black;">{nr_ore}</td>

													

													<td style="background:#eef1f8 color:black;">{numar_ore_efectuate}</td>
													

													

													

													

													<td style="background:#6d81c0; color:white;">

													<a style="color:white" class="link" href="{SITE_URL}/users/view_profile/{CNP}">Vezi curs</a>&nbsp;&nbsp;&nbsp;	

													<a  style="color:white" class="link" href="{SITE_URL}/users/edit/{CNP}">Editeaza</a>&nbsp;&nbsp;&nbsp;

													

													<a  style="color:white" class="link" href="{SITE_URL}/users/delete/{CNP}" onclick='return confirm("Doriti stergerea cursantului {prenume} {nume}?")'>Sterge</a>	

													</td>

												</tr>	

												{/COURSES}

										</tbody>

									</table>

              </div>  

              

            </div>

