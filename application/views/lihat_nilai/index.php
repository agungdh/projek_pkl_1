<form method="post">
	NIS : <input type="text" name="nis" value="<?php echo $this->input->post('nis') != null ? $this->input->post('nis') : null; ?>">
	<input type="submit" name="submit" value="Submit">
</form>