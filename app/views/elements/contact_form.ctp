<?php
	/* Contact form for sending via email */

	$ipi = getenv("REMOTE_ADDR");
	$httprefi = getenv ("HTTP_REFERER");
	$httpagenti = getenv ("HTTP_USER_AGENT");
?>
	<fieldset>
		<form action="contact_us" method="post">
			<input type="hidden" name="ip" value="<?php echo $ipi ?>" />
			<input type="hidden" name="httpref" value="<?php echo $httprefi ?>" />
			<input type="hidden" name="httpagent" value="<?php echo $httpagenti ?>" />
			
			<p><label for="name"><span class="labelfont">Full Name</span></label> 									<input 		name="name" class="textareafont" type="text"/></p>
			<p><label for="company"><span class="labelfont">Company</span></label> 									<input 		name="company" class="textareafont" type="text"/></p>
			<p><label for="title"><span class="labelfont">Title</span></label>											<input 		name="title" class="textareafont" type="text"/></p>
			<p><label for="address"><span class="labelfont">Address</span></label>									<textarea name="address" class="textareafont" rows="3" cols="50"></textarea></p>
			<p><label for="telephone"><span class="labelfont">Telephone</span></label>							<input 		name="telephone" class="textareafont" type="text"/></p>
			<p><label for="email"><span class="labelfont">Email</span></label>											<input 		name="email" class="textareafont" type="text"/></p>
			<p><label for="enquiry"><span class="labelfont">Enquiry</span></label>									<textarea name="enquiry" class="textareafont" rows="3"></textarea></p>
			<p><label for="additional"><span class="labelfont">Additional Information</span></label><textarea name="additional" class="textareafont" rows="3"></textarea></p>
			<p class="submit"><label for="dummy"></label><input class="button" type="submit" value="send"/><input class="button" type="reset" value="reset"/></p>
		</form>
	</fieldset>
