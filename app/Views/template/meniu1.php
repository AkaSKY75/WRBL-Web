

<div class="sidebar-dropdown"><a href="#">Navigation</a></div>



        <!--- Sidebar navigation -->

        <!-- If the main navigation has sub navigation, then add the class "has_sub" to "li" of main navigation. -->

        <ul id="nav" style="visibility: hidden;">

          <!-- Main menu with font awesome icon -->

          <li class="{clswelcome}"><a href="{SITE_URL}/users"><i class="fa fa-home"></i> Acasa</a>           

          </li>

       
		<li class="has_sub {clsusers}"><a href="#"><i class="fa fa-users"></i> Pacienti  <span class="pull-right"><i class="fa fa-chevron-right"></i></span></a>

            <ul>

              <li><a href="{SITE_URL}/users/index">Lista medici</a></li>             
              <li><a href="{SITE_URL}/users/adauga_pacient">Adauga medic</a></li> 
			  
				

            </ul>

          </li>
		  

		  <li class="{clswelcome}"><a href="{SITE_URL}/login/logout"><i class="fa fa-sign-out"></i> Logout</a>           

          </li>  

        </ul>