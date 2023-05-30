<div class="ignitiondeck">
	<div class="id-fes-form-wrapper" >
<form class="form-horizontal" method="post" action="{SITE_URL}/users/process/{id_user}">
<fieldset>
<input type="hidden" name="source" value="{source}" />
<ul>
<li class="form-row half" > <div class="fes_section"><h3 >
User projects</h3></div>
</li>
<table class="lista">
<tr>
	<td>#</td>
	<td>Title</td>
	<td>Amount</td>
	<td>Start date</td>
	<td>End date</td>
	<td>Category</td>
	<td>Status</td>
	<td>Photo</td>
	<td>Video</td>
	<td>Location</td>
	<td>Financed</td>
</tr>
{PROJECTS}
<tr>
	<td>{id_project}</td>
	<td>{project_title}</td>
	<td>{project_amount}</td>
	<td>{project_start_date}</td>
	<td>{project_end_date}</td>
	<td>{id_category	}</td>
	<td>{project_status}</td>
	<td>{project_photo}</td>
	<td>{project_video}</td>
	<td>{project_location}</td>
	<td>{financed}</td>
	<td>
	<a class="link" href="{SITE_URL}/users/edit/{id_user}">Edit</a><br/>	
	<a class="link" href="{SITE_URL}/users/suspend/{id_user}">Suspend</a>	
	</td>
</tr>	
{/PROJECTS}
</table>
</div>
</fieldset>
</form>
</ul>
</div>
</div>