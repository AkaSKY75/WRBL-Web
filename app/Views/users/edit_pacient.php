
<div class="row" style="padding-left: 3%;">
		 
  <!-- Chats widget -->
  
  <div class="col-md-12">
	
    <div class="col-md-6">
			
      <div class="col-md-2"></div>
    
      <div class="col-md-6" style="margin-left:7%"><h1 >{nume} {prenume}</h1><a style="color:white; " href="{SITE_URL}/users/view_profile/{cnp}"><button type="submit" style="background: #074486; " class="btn btn-orange submit em">Vezi fisa pacientului</button></a><a style="color:white; padding-left:1%" href="{SITE_URL}/users/view_consultatii_pacient/{cnp}"><button type="submit" style="background: #074486; " class="btn btn-orange submit em">Vezi consultatii</button></a></div>
		
      <div class="col-md-6"></div>
		
    </div>
		
    <div class="col-md-12"></div>
		
    <div class="col-md-12">
    
      <div class="col-md-8">
        
        <div class="form-horizontal"></br></br></br></br>
    
          <form class="form-horizontal" role="form" method="post" action="{SITE_URL}/medic/edit_done/{id}/" enctype="multipart/form-data">

            <input type="hidden" name="source" value="{source}" />

            <div class="form-group">

              <label class="col-lg-2 control-label">NUME</label>

              <div class="col-lg-5">

                <input id="nume" name="nume" type="text" placeholder="{nume}" value="{nume}" class="form-control"> 

              </div>

            </div>
  
            <div class="form-group">

              <label class="col-lg-2 control-label">PRENUME</label>

              <div class="col-lg-5">

                <input id="prenume" name="prenume" type="text" placeholder="{prenume}" value="{prenume}" class="form-control"> 

              </div>

            </div>

            <div class="form-group">
            
              <label class="col-lg-2 control-label">VÂRSTA</label>
              
              <div class="col-lg-5">
              
                <input id="varsta" name="varsta" type="text" placeholder="{varsta}" value="{varsta}" class="form-control"> 
                              
              </div>
                            
            </div>

            <div class="form-group">
            
              <label class="col-lg-2 control-label">CNP</label>
              
              <div class="col-lg-5">
              
                <input id="cnp" name="cnp" type="text" placeholder="{cnp}" value="{cnp}" class="form-control"> 
                              
              </div>
                            
            </div>

            <div class="form-group">
            
              <label class="col-lg-2 control-label">LOCALITATE</label>
              
                <div class="col-lg-5">
              
                  <input id="localitate" name="localitate" type="text" placeholder="{localitate}" value="{localitate}" class="form-control"> 
                              
                </div>
                            
            </div>
            
            <div class="form-group">
            
              <label class="col-lg-2 control-label">JUDEȚ</label>
                              
              <div class="col-lg-5">
              
                <input id="judet" name="judet" type="text" placeholder="{judet}" value="{judet}" class="form-control"> 
                              
              </div>
                            
            </div>
            
            <div class="form-group">
              
              <label class="col-lg-2 control-label">STRADA</label>
                              
              <div class="col-lg-5">
              
                <input id="strada" name="strada" type="text" placeholder="{strada}" value="{strada}" class="form-control"> 
              
              </div>
            
            </div>
            
            <div class="form-group">
            
              <label class="col-lg-2 control-label">BLOC</label>
                              
              <div class="col-lg-5">
              
                <input id="bloc" name="bloc" type="text" placeholder="{bloc}" value="{bloc}" class="form-control"> 
                
              </div>
                            
            </div>
            
            <div class="form-group">
            
              <label class="col-lg-2 control-label">SCARA</label>
              
              <div class="col-lg-5">
              
                <input id="scara" name="scara" type="text" placeholder="{scara}" value="{scara}" class="form-control"> 
                              
              </div>
                            
            </div>
            
            <div class="form-group">
            
              <label class="col-lg-2 control-label">ETAJ</label>
                              
              <div class="col-lg-5">
              
                <input id="etaj" name="etaj" type="text" placeholder="{etaj}" value="{etaj}" class="form-control"> 
              
              </div>
                            
            </div>
            
            <div class="form-group">
                              
              <label class="col-lg-2 control-label">APARTAMENT</label>
              
              <div class="col-lg-5">
            
                <input id="apartament" name="apartament" type="text" placeholder="{apartament}" value="{apartament}" class="form-control"> 
                              
              </div>

            </div>

            <div class="form-group">
                              
              <label class="col-lg-2 control-label">NUMĂR</label>
                              
              <div class="col-lg-5">

                <input id="numar" name="numar" type="text" placeholder="{numar}" value="{numar}" class="form-control"> 
                              
              </div>
                            
            </div>

            <div class="form-group">
                              
              <label class="col-lg-2 control-label">TELEFON</label>
                              
              <div class="col-lg-5">

                <input id="telefon" name="telefon" type="text" placeholder="{telefon}" value="{telefon}" class="form-control"> 
                              
              </div>
                            
            </div>

            <div class="form-group">
                              
              <label class="col-lg-2 control-label">E-MAIL</label>
                              
              <div class="col-lg-5">

                <input id="email" name="email" type="email" placeholder="{email}" value="{email}" class="form-control"> 
                              
              </div>
                            
            </div>

            <div class="form-group">
                              
              <label class="col-lg-2 control-label">PROFESIE</label>
                              
              <div class="col-lg-5">

                <input id="profesie" name="profesie" type="text" placeholder="{profesie}" value="{profesie}" class="form-control"> 
                              
              </div>
                            
            </div>

            <div class="form-group">
                              
              <label class="col-lg-2 control-label">LOC DE MUNCĂ</label>
                              
              <div class="col-lg-5">

                <input id="loc_de_munca" name="loc_de_munca" type="text" placeholder="{loc_de_munca}" value="{loc_de_munca}" class="form-control"> 
                              
              </div>
                            
            </div>

            <div class="form-group">
                              
              <label class="col-lg-2 control-label">ISTORIC MEDICAL</label>
                              
              <div class="col-lg-5">
                
                <textarea id="istoric_medical" name="istoric_medical" rows="4" placeholder="{istoric_medical}" class="form-control" >{istoric_medical}</textarea>
              
              </div>
                            
            </div>

            <div class="form-group">
                              
              <label class="col-lg-2 control-label">ALERGII</label>
                              
              <div class="col-lg-5">
                
                <textarea id="alergii" name="alergii" rows="2" placeholder="{alergii}" class="form-control" >{alergii}</textarea>
              
              </div>
                            
            </div>
            
            <div class="form-group" style="padding-left: 25%;">
            
              <div class="col-lg-5">
              
                <input type="submit" class="buton_sumbit" id="" name="project_save" class="project_save" value="Salvează">
                              
              </div>
                            
            </div>

          </form>
      
        </div>
      
      </div>

      <div class="col-md-6"></div>
                
    </div>
				
  </div> 
            
</div>
			
			
            