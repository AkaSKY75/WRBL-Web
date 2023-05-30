<style>
#myInput {
  background-image: url('{BASE_URL}/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
  margin-left: -1%;
}
</style>  

<div class="row">
  <div class="col-md-12">
    <div class="row" style="margin-left: 16%;">
			<div class="col-md-10">
        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Cauta.." title="Cautare">
      </div>
		</div>
    <table align="center" cellpadding="0" cellspacing="0" border="0" id="myTable">
      <thead style="font-weight: bold;">
        <tr align="center">
          <td onclick="sortTable(0)"style="background:#eef1f8 color:black">NUME</td>
          <td style="background:#eef1f8 color:black;">PRENUME</td>
					<td style="background:#eef1f8 color:black;">CNP</td><
          <td style="background:#eef1f8 color:black;">LOCALITATE</td>
					<td style="background:#eef1f8 color:black;">JUDET</td>
          <td style="background:#eef1f8 color:black;">STRADA</td>
          <td style="background:#eef1f8 color:black;">BLOC</td>
          <td style="background:#eef1f8 color:black;">SCARA</td>
          <td style="background:#eef1f8 color:black;">ETAJ</td>
          <td style="background:#eef1f8 color:black;">APARTAMENT</td>
          <td style="background:#eef1f8 color:black;">NUMAR</td>
          <td style="background:#eef1f8 color:black;">TELEFON</td>
          <td style="background:#eef1f8 color:black;">EMAIL</td>
          <td style="background:#eef1f8 color:black;">CALIFICARE</td>
          <td style="background:#eef1f8 color:black;">ADAUGAT LA</td>
          <td style="background:#eef1f8 color:black;">ULTIMA MODIFICARE</td>
          <td style="background:#eef1f8 color:black;">STERS LA</td>
        </tr>
      </thead>
      <tbody>
        {USERS}
          <tr align="center" class="rand" >
	          <td  class="np" style="background:#eef1f8; color:#fe0000;">{nume}</td>
            <td  class="np" style="background:#eef1f8; color:#fe0000;">{prenume}</td>
            <td  class="np" style="background:#eef1f8; color:#fe0000;">{cnp}</td>
            <td  class="np" style="background:#eef1f8; color:#fe0000;">{localitate}</td>
            <td  class="np" style="background:#eef1f8; color:#fe0000;">{judet}</td>
            <td  class="np" style="background:#eef1f8; color:#fe0000;">{strada}</td>
            <td  class="np" style="background:#eef1f8; color:#fe0000;">{bloc}</td>
            <td  class="np" style="background:#eef1f8; color:#fe0000;">{scara}</td>
            <td  class="np" style="background:#eef1f8; color:#fe0000;">{etaj}</td>
            <td  class="np" style="background:#eef1f8; color:#fe0000;">{apartament}</td>
            <td  class="np" style="background:#eef1f8; color:#fe0000;">{numar}</td>
            <td  class="np" style="background:#eef1f8; color:#fe0000;">{telefon}</td>
            <td  class="np" style="background:#eef1f8; color:#fe0000;">{email}</td>
            <td  class="np" style="background:#eef1f8; color:#fe0000;">{calificare}</td>
            <td  class="np" style="background:#eef1f8; color:#fe0000;">{created_at}</td>
            <td  class="np" style="background:#eef1f8; color:#fe0000;">{updated_at}</td>
            <td  class="np" style="background:#eef1f8; color:#fe0000;">{deleted_at}</td>
						<td class="actiuni" style="background:#074486; color:white;" >													
						  <a style="color:white" class="link" href="{SITE_URL}/admin/view_profile/{id}">Vezi detalii</a>&nbsp;&nbsp;&nbsp;	
						  <a  style="color:white" class="link" href="{SITE_URL}/admin/edit_medic/{id}">Editeaza</a>&nbsp;&nbsp;&nbsp;													
						  <a style="color:white" class="link dezactiveaza" href="{SITE_URL}/admin/dezactiveaza/{id}">Dezactiveaza</a>
						  <a style="color:white" class="link activeaza" href="{SITE_URL}/admin/activeaza/{id}">Activeaza</a>
            </td>
          </tr>	
        {/USERS}
      </tbody>
    </table>
  </div>  
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(function() {
 
  $("tbody").children("#1").each(function(){
	  $(this).find('.activeaza').css('display','none');
	  $(this).find('.np').css('color','#007239 !important');
  });
  
  $("tbody").children("#0").each(function(){
	  $(this).find('.dezactiveaza').css('display','none');

  });
  
    
});

</script>
<script>

function myFunction() {
  var input, filter, table, tr, td, i;
  //myInput este id-ul input-ului de cautare din care ia string-ul pe care il cauta
  input = document.getElementById("myInput");
  //filter e valoarea din input
  filter = input.value.toUpperCase();
  //myTable este id-ul tabelului in care va cauta string-ul
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  //cauta pe fiecare rand
  for (i = 1; i < tr.length; i++) { 
    // de la primul rand (1), nu din header, header-ul e 0
    tr[i].style.display = "";
    var found = false; 
    //cauta in fiecare coloana de pe rand
    for (j = 0; j < tr[i].getElementsByTagName("td").length; j++) {
      var td = tr[i].getElementsByTagName("td")[j];
      if (td) {
        if (td.innerHTML.toUpperCase().indexOf(filter) > -1) { //daca se potriveste macar partial
          found = true;
        }
      }
    }
    //daca a gasit valoarea 
    if (found) {
      tr[i].style.display = ""; //ramane vizibila
    } else {
      tr[i].style.display = "none"; //altfel nu o afiseaza
    }
    
  }
}


function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("myTable");
  switching = true;
  //am setat tipul de sortare
  dir = "asc"; 
  
  while (switching) {
    //presupunem ca nu s-a inversat nici o valoare
    switching = false;
    rows = table.rows;
    /*trece prin toate randurile, in afara de header, care are indexul 0*/
    for (i = 1; i < (rows.length - 1); i++) {
      //presupunem ca nu trebuiesc schimbate elementele
      shouldSwitch = false;
      /*comparam elementele din randuri consecutive*/
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      /*verificam in fucntie de directia sortarii, ascendent sau descendent*/
      if (dir == "asc") {
		  //daca trbeuiesc schimbate
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          //le marcam pentru schimbare si intrerupem for-ul
          shouldSwitch= true;
          break;
        }
      } else if (dir == "desc") {
		  //la fel pentru descrescator
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          shouldSwitch = true;
          break;
        }
      }
    }
	//daca elemntele trebuiesc schimbate intre ele
    if (shouldSwitch) {
      /*le interschimbam si marcam faptul ca am facut o schmbare*/
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      //de fiecare data cand schimbam, marim un contor
      switchcount ++;      
    } else {
      /*daca nu s-a facut nici os chimbare si directia e ascendenta, o schimbam in descendenta, 
	  inseamna ca utilizatorul a apasat a sa sorteze din nou*/
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}
</script>