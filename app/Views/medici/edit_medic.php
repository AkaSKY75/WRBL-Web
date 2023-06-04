
  <div class="row" style="padding-left: 10%;">
		 
  <!-- Chats widget -->
  <div class="col-md-12">
	  
    <div class="col-md-6">
			
      <div class="col-md-2"></div>
      
      <div class="col-md-6" style="margin-left:6%"><h1 >{nume} {prenume}</h1><a style="color:white; " href="{SITE_URL}/admin/view_profile/{id}"><button type="submit" style="background: #074486; min-width: 110px;" class="btn btn-orange submit em">Vezi profil</button></a><!--<a style="color:white; padding-left:1%" href="{SITE_URL}/users/view_consultatii_pacient/{cnp}"><button type="submit" style="background: #6d81c0; " class="btn btn-orange submit">Vezi consultatii</button></a>-->
      </div>
			
      <div class="col-md-6"></div>
			
    </div>
			
    <div class="col-md-12"></div>
			
    <div class="col-md-12">
			
      <div class="col-md-8">
			
        <div class="form-horizontal"></br></br>
          
          <h2 style="padding-left:17%; padding-top:20px">Editare date medic</h2></br>
			    
          <form class="form-horizontal" role="form" method="post" action="{SITE_URL}/admin/edit_done/{id}/" enctype="multipart/form-data">

            <input type="hidden" name="source" value="{source}" />

            <div class="form-group">
              
              <label class="col-lg-2 control-label">NUME</label>
                
                <div class="col-lg-5">

                  <input id="nume" name="nume" type="text" placeholder="{nume}" value="{nume}" class="form-control" > 

                </div>

            </div>
            
            <div class="form-group">

              <label class="col-lg-2 control-label">PRENUME</label>

              <div class="col-lg-5">

                <input id="prenume" name="prenume" type="text" placeholder="{prenume}" value="{prenume}" class="form-control"> 

              </div>

            </div>

            <div class="form-group">
            
              <label class="col-lg-2 control-label">CNP</label>
              
              <div class="col-lg-5">
                
                <input id="cnp" name="cnp" type="text" placeholder="{cnp}" value="{cnp}" class="form-control" > 
              
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
                
                  <input id="telefon" name="telefon" type="text" placeholder="{telefon}" value="{telefon}" class="form-control" > 
                
                </div>
            
            </div>

            <div class="form-group">
                                
              <label class="col-lg-2 control-label">EMAIL</label>
                                
                <div class="col-lg-5">
                
                  <input id="email" name="email" type="email" placeholder="{email}" value="{email}" class="form-control" > 
                
                </div>
            
            </div>
              
              
            <div class="form-group">
                                
              <label class="col-lg-2 control-label">CALIFICARE</label>
              
              <div class="col-lg-5">
                
                <input id="calificare" name="calificare" type="text" placeholder="{calificare}" value="{calificare}" class="form-control" > 

              </div>
            
            </div>

            <div class="form-group" style="padding-left: 17%;">
            
              <div class="col-lg-5">
                
                <input type="submit" class="buton_sumbit" id="" name="project_save" class="project_save" value="Salveaza">
              
              </div>

            </div>

          </form>
				
        </div>
      
      </div>
				
      <div class="col-md-6"></div>
                  
    </div>
	
  </div> 

</div>
			
			
            