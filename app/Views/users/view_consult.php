<div class="row">
		 
	<!-- Chats widget -->
            
		<div class="col-md-12">
			
			<div class="col-md-6">
			
				<div class="col-md-2"></div>
				
				<div class="col-md-8" style="margin-left:13%">
					
					<h1>{nume} {prenume}</h1>
					
					<a style="color:white; " href="{SITE_URL}/medic/edit_pacient/{id_pacient}">
					
						<button type="submit" style="background: #074486;" class="btn btn-orange submit em">Editeaza date</button>
					
					</a>
					
					<a style="color:white; padding-left: 1%;" href="{SITE_URL}/medic/view_consultatii_pacient/{id}">
					
						<button type="submit" style="background: #074486; " class="btn btn-orange submit em">Vezi consultatii</button>
					
					</a>
					
					<a style="color:white; padding-left: 1%;" href="{SITE_URL}/medic/adauga_consultatie/{id_pacient}">
					
						<button type="submit" style="background: #074486; " class="btn btn-orange submit em">Adaugă consultație</button>
					
					</a>
				
				</div>
			
			</div>
			
			<div class="col-md-6"></div>

		</div>
			
		<div class="col-md-12">
			
			<div class="col-md-6" style="margin-left:7%">
				
				<div class="form-horizontal">

					</br></br>
               
					<div style="margin-top: -5%;" class="form-group">
							
						</br></br></br>
                                      
						<label class="col-lg-2 control-label">MOTIVUL PREZENTĂRII</label>
                                  
						<div class="col-lg-5">
									
							<div class="form-control">{motivul_prezentarii}</div>
                                  
						</div>
                                
					</div>
								
					<div style="margin-top: -5%;" class="form-group">
							
						</br></br></br>
                                      
						<label class="col-lg-2 control-label">SIMPTOME</label>
                                  
						<div class="col-lg-5">
									
							<div class="form-control">{simptome}</div>
                                  
						</div>
                                
					</div>

					<div style="margin-top: -5%;" class="form-group">
							
						</br></br></br>
                                      
						<label class="col-lg-2 control-label">DIAGNOSTIC (ICD 10)</label>
                                  
						<div class="col-lg-5">
									
							<div class="form-control">{diagnostic_icd_10}</div>
                                  
						</div>
                                
					</div>
								
					<div style="margin-top: -5%;" class="form-group">
							
						</br></br></br>
                                      
						<label class="col-lg-2 control-label">TRATAMENT</label>
                                  
						<div class="col-lg-5">
									
							<div class="form-control">{tratament}</div>
                                  
						</div>
                                
					</div>

					<div style="margin-top: -5%;" class="form-group">
							
						</br></br></br>
                                      
						<label class="col-lg-2 control-label">OBSERVAȚII</label>
                                  
						<div class="col-lg-5">
									
							<div class="form-control">{observatii}</div>
                                  
						</div>
                                
					</div>

					<div style="margin-top: -5%;" class="form-group">
							
							</br></br></br>
										  
							<label class="col-lg-2 control-label">SEMNĂTURA</label>
									  
							<div class="col-lg-5">
										
								<div class="form-control"></div>
									  
							</div>
									
					</div>

		 		</div>
			</div>
		
		</div>
				
	</div> 
            
</div>
			
			
            