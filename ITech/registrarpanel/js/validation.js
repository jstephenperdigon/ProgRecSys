function validate() {
	var valid = true;
	$(".info").html('');

	if (!$("#name").val()) {
		$("#name-info").html("required.");
		valid = false;
	}
	if (!$("#code").val()) {
		$("#code-info").html("required.");
		valid = false;
	}
	if (!$("#category").val()) {
		$("#category-info").html("required.");
		valid = false;
	}
	if (!$("#price").val()) {
		$("#price-info").html("required.");
		valid = false;
	}
	if (!$("#stock_count").val()) {
		$("#stock-count-info").html("required.");
		valid = false;
	}
	return valid;
}