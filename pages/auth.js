function _auth(){
    let _user=document.getElementById("email").value;
    let _password = document.getElementById("pass").value;

    if(_user == "khalidelasri@gmail.com"&& _password=="123456"){
        window.location.href ='../index.html';
        alert("True");
    }else{
        alert("Email or Password Error");
    }

}