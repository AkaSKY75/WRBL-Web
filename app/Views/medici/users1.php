    <div class="row">

            <div class="col-md-12">



              <!--div class="widget">

                <div class="widget-head">

                  <div class="pull-left">Medici</div>

                  <div class="widget-icons pull-right">

					

                    <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a> 

                    <a href="#" class="wclose"><i class="fa fa-times"></i></a>

                  </div>  

                  <div class="clearfix"></div>

                </div>

                <div class="widget-content">

                  <div class="padd">                    

							<!-- Table Page -->

							<!--div class="page-tables">

								<!-- Table -->

								<!--div class="table-responsive"-->

									<table class="tabel_nemo" cellpadding="0" cellspacing="0" border="0"  width="100%" >

										<thead>

											<tr align="center">

												<td  style="background:#eef1f8 color:black;">Nume si prenume</td>
												<td style="background:#eef1f8 color:black;"> CNP</td>

												

												<td style="background:#eef1f8 color:black;">Data nasterii</td>	

												<td style="background:#eef1f8 color:black;">Localitate</td>

												<td style="background:#eef1f8 color:black;">Telefon</td>
												<td style="background:#eef1f8 color:black;">Grad didactic</td>
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

													<td style="background:#eef1f8 color:black;">{grad_didactic}</td>

													

													

													<td style="background:#6d81c0; color:white;">

													<a style="color:white" class="link" href="{SITE_URL}/users/view_profile_doc/{CNP}">Vezi profil</a>&nbsp;&nbsp;&nbsp;	

													<a style="color:white" class="link" href="{SITE_URL}/users/edit_profesor/{CNP}">Editeaza</a>&nbsp;&nbsp;&nbsp;

													

													<a style="color:white" class="link" href="{SITE_URL}/users/delete_doctor/{CNP}" onclick='return confirm("Doriti stergerea cursantului {prenume} {nume}?")'>Sterge</a>	

													</td>

												</tr>	

												{/USERS}

										</tbody>

									</table>

									<div class="clearfix"></div>

								</div>

							</div>

						</div>

                  </div>

                  <div class="widget-foot">

                    <!-- Footer goes here -->

                  </div>

                </div>

              </div>  

              

            </div>

