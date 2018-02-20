<form action="" method="post" id="changePassForm">
<input type="text" id="oldPass" name="oldPass" placeholder="Enter current  password" size="60" required><span id="oldPassError"> </span><br><BR>
<input type="password" id="newPassword" name="newPass" size="60" placeholder="Enter new password" required> <span id="newPassError"> </span><br><BR>
<input type="password" id="confirmPassword" name="confirmPass" size="60" placeholder="Confirm new password" required> <span id="confirmPassError"> </span><br><BR>
<input id="changePassSubmit" name="changePassSubmit"  alt="Submit Form"  type="submit" value="Change Password"/><br><br>
</form>
<form id = "cancelForm"action="Home.php">
	<input id="cancelButton" name="cancelButton"  alt="Cancel"  type="submit" value="Cancel"/>
</form>