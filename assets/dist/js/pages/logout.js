$("#logout").on("click", function logout() {
	localStorage.removeItem("auth_token");
	window.location.href = window.location.origin + "/LVTNCI-3/login";
});

function redirectLoginPage() {
	window.location.href = window.location.origin + "/LVTNCI-3/login";
}
