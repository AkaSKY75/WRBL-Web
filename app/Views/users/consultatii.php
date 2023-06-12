
<div class="row">
		 
	<!-- Chats widget -->
            
	<div class="col-md-12">
	
		<div class="col-md-6">
			
			<div class="col-md-2"></div>
			
			<div class="col-md-8" style="margin-left:13%"><h1 >{nume} {prenume}</h1><a style="color:white; " href="{SITE_URL}/medic/view_pacient/{id}"><button type="submit" style="background: #074486; " class="btn btn-orange submit em">Vezi fisa pacientului</button></a><a style="color:white; padding-left: 1%;" href="{SITE_URL}/medic/view_consultatii_pacient/{id}"><button type="submit" style="background: #074486; " class="btn btn-orange submit em">Vezi consultatii</button></a><a style="color:white; padding-left: 1%;" href="{SITE_URL}/medic/adauga_consultatie/{id}"><button type="submit" style="background:#074486; " class="btn btn-orange submit em">Adauga consultație</button></a></div>
		
		</div>
		
		<div class="col-md-6"></div>
			
	</div>
			
	<div class="col-md-12">
			
		<div class="col-md-6" style="margin-left:3%">
			
			</br></br></br>
						
			<table align="center" cellpadding="0" cellspacing="0" border="0">

				<thead>

					<tr align="center">
					
						<td  style="background:#eef1f8 color:black">MOTIVUL PREZENTĂRII</td>
												
						<td style="background:#eef1f8 color:black;">SIMPTOME</td>

						<td style="background:#eef1f8 color:black;">DIAGNOSTIC ICD_10</td>
						
						<td style="background:#eef1f8 color:black;">TRATAMENT</td>

						<td style="background:#eef1f8 color:black;">OBSERVATII</td>

						<td style="background:#eef1f8 color:black;">CREAT LA DATA</td>

						<td style="background:#eef1f8 color:black;">ULTIMA MODIFICARE LA DATA</td>
					
						<td style="background:#eef1f8 color:black;">ȘTERS LA DATA</td>

						<td style="background:#eef1f8 color:black;">ACȚIUNI</td>

					</tr>

				</thead>

				<tbody>

					{CONSULTATII}

						<tr align="center" {culoare}>

							<td style="background:#eef1f8 color:black;">{motivul_prezentarii}</td>

							<td style="background:#eef1f8 color:black;">{simptome}</td>

							<td style="background:#eef1f8 color:black;">{diagnostic_icd_10}</td>
											
							<td style="background:#eef1f8 color:black;">{tratament}</td>

							<td style="background:#eef1f8 color:black;">{observatii}</td>

							<td style="background:#eef1f8 color:black;">{created_at}</td>

							<td style="background:#eef1f8 color:black;">{updated_at}</td>

							<td style="background:#eef1f8 color:black;">{deleted_at}</td>

							<td style="background:#074486; color:white;">
													
								<a style="color:white" class="link" href="{SITE_URL}/medic/view_consultatie/{id}">Vezi detalii</a>&nbsp;&nbsp;&nbsp;	
													
							</td>
												
						</tr>	

					{/CONSULTATII}

				</tbody>

			</table>
                              
		</div>
				
    </div>
				
</div>			
			
            