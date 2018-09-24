var ADMIN_SUBMIT_BUTTON = $("#login-admin");
var SUBMIT_BUTTON_TEXT = $(".button-text");
var SUBMIT_BUTTON_LOADER = $(".button-loader");
var USER_NAME_VALUE = $("#username");
var PASSWORD_VALUE = $("#password");



var adminAccess = new adminAccessControll();
var isValidate = false;
function adminAccessControll() {}

adminAccessControll.prototype.checkAccess = function(callBack) {
    var requestData;
    var requestType;
    var apiUrl;
    var result;
    var userName = USER_NAME_VALUE.val();
    var password = PASSWORD_VALUE.val();
    adminAccess.validateRequestData(userName, password);
    if(isValidate == true){
        requestData = {
            "access_key": userName,
            "access_value": window.btoa(password)
        };
        apiUrl = "admin/checkLogin";
        requestType = "POST";
        API.apiRequest(requestData, apiUrl, requestType, function(resData){
            if(resData.authendicate == "success"){
                //displayMessage("Login Successfully!", "success");
                setTimeout(function(){
                    window.location=SITE_URL+resData.redirect;
                }, 1000);

                return true;
            }
            else{
                adminAccess.resetLoginButton();
                displayMessage("Invalid Username or Password.", "error");
                return false;
            }
        });
    }
    else
    {
        adminAccess.resetLoginButton();
        displayMessage("Enter username / password.", "error");
    }
};

adminAccessControll.prototype.resetLoginButton = function()
{
    SUBMIT_BUTTON_TEXT.show();
    SUBMIT_BUTTON_LOADER.hide();
    ADMIN_SUBMIT_BUTTON.removeAttr("disabled");
};

adminAccessControll.prototype.validateRequestData = function(userName, password) {
    if (userName.length == 0){
        isValidate = false;
        return false;
    }
    else if (password.length == 0){
        isValidate = false;
        return false;
    }
    else {
        isValidate = true;
        return true;
    }
};
ADMIN_SUBMIT_BUTTON.click(function() {
    SUBMIT_BUTTON_TEXT.hide();
    SUBMIT_BUTTON_LOADER.show();
    ADMIN_SUBMIT_BUTTON.attr("disabled", "true");
    adminAccess.checkAccess(function(){
    });

});



$('#username').on('input', function (e) {
      IsCommonInputBulkUpload(this);
});
$('#password').on('input', function (e) {
    IsCommonInputBulkUpload(this);
});
