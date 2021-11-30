const dismiseit = (e) => {
  document.getElementById(e).classList.remove("d-block");
  document.getElementById(e).classList.add("d-none");
};

const displayit = (e) => {
  document.getElementById(e).classList.remove("d-none");
  document.getElementById(e).classList.add("d-block");
};

const __id = (e) => document.getElementById(e);

const toggledis = (a, b) => {
  dismiseit(a);
  displayit(b);
};

const btn_resp = (btn, messagge) =>
  (document.getElementById(btn).innerHTML = messagge);
const u_innerHTML = (id, messagge) =>
  (document.getElementById(id).innerHTML = messagge);

const alllogin = () => {
  event.preventDefault();
  const loginemail = __id("loginemail");
  const loginpassword = __id("loginpassword");
  const loginbtn = __id("loginbtn");

  const logindata = new FormData();

  logindata.append("loginemail", loginemail.value);
  logindata.append("loginpassword", loginpassword.value);
  logindata.append("loginbtn", loginbtn);

  const url = "inc/php/login_validate.php";

  const loginajax = new XMLHttpRequest();
  loginajax.onload = (res) => {
    res = loginajax.responseText;
    console.log(res);
    const result = JSON.parse(res);
    if (result) {
      if (result.result == "logged In") {
        swal({
          title: "Sucess",
          text: "You are successful logged in",
          icon: "success",
        });
        setTimeout(() => {
          window.location = "account";
        }, 1500);
      } else {
        swal({
          title: "Failed",
          text: result.result,
          icon: "error",
        });
      }
    } else {
      swal({
        title: "Failed",
        text: res,
        icon: "error",
      });
    }
  };
  loginajax.open("POST", url);
  loginajax.send(logindata);
};

const checkpassword = () => {
  const onepassword = __id("onepassword");
  const twopassword = __id("twopassword");

  // if (onepassword.value.length < 6) {
  //   twopassword.style.border = "1px solid red";
  //   __id("resone").innerHTML = "password must be atleast 6 characters";
  //   __id("resone").style.color = "red";
  //   // return false;
  // }

  if (onepassword.value !== twopassword.value) {
    onepassword.style.border = "1px solid red";
    twopassword.style.border = "1px solid red";
    __id("resone").innerHTML = "password did not match";
    __id("restwo").innerHTML = "password did not match";
    __id("resone").style.color = "red";
    __id("restwo").style.color = "red";
    // return false;
  } else {
    onepassword.style.border = "1px solid green";
    twopassword.style.border = "1px solid green";
    __id("resone").innerHTML = "";
    __id("restwo").innerHTML = "";
  }
};

const reg_user = () => {
  event.preventDefault();

  const onepassword = __id("onepassword");
  const twopassword = __id("twopassword");

  if (onepassword.value.length < 6) {
    twopassword.style.border = "1px solid red";
    __id("resone").innerHTML = "password must be atleast 6 characters";
    __id("resone").style.color = "red";
    return false;
  }

  if (onepassword.value !== twopassword.value) {
    onepassword.style.border = "1px solid red";
    twopassword.style.border = "1px solid red";
    __id("restwo").innerHTML = "password did not match";
    __id("resone").style.color = "red";
    __id("restwo").style.color = "red";
    return false;
  } else {
    onepassword.style.border = "1px solid green";
    twopassword.style.border = "1px solid green";
    __id("resone").innerHTML = "";
    __id("restwo").innerHTML = "";
  }

  const name = __id("username");
  const phone = __id("userphone");
  const email = __id("useremail");
  // const address = __id("useraddress");
  // const btc = __id("btcaddress");
  const btc = "0000000112312";

  const userbutton = __id("userbutton");

  const userdata = new FormData();

  userdata.append("username", name.value);
  userdata.append("userphone", phone.value);
  userdata.append("useremail", email.value);
  userdata.append("onepassword", onepassword.value);
  userdata.append("twopassword", twopassword.value);
  userdata.append("btcaddress", btc);
  userdata.append("userbutton", userbutton);

  const url = "inc/php/reg";

  // console.log(name.value + phone.value + email.value + twopassword.value);

  const ajax = new XMLHttpRequest();

  ajax.onload = () => {
    console.log(ajax.responseText);
    res = JSON.parse(ajax.responseText);
    if (res.resp == "registered") {
      swal({
        title: "Successful",
        text: "Your registration was successful",
        icon: "success",
      });
      setTimeout(() => {
        window.location = "account";
      });
      btn_resp("userbutton", "Successfully registered");
    } else {
      swal({
        title: "Failed",
        text: res.resp,
        icon: "error",
      });
      btn_resp("userbutton", "Try again");
    }
  };
  ajax.onprogress = () => btn_resp("userbutton", "Loading...");

  ajax.open("POST", url, true);

  ajax.send(userdata);
};

const sendContactMail = () => {
  event.preventDefault();
  const name = __id("exampleInputName");
  const email = __id("exampleInputEmail1");
  const message = __id("exampleFormControlTextarea");

  const roidatas = new FormData();

  roidatas.append("nameuser", name.value);
  roidatas.append("emailuser", email.value);
  roidatas.append("messageuser", message.value);

  const url = "inc/php/sendcontactmail";
  const ajax = new XMLHttpRequest();
  ajax.onload = () => {
    console.log(ajax.responseText);
    alert(ajax.responseText);
  };

  ajax.onprogress = () => btn_resp("userbuttonsendContact", "Loading...");

  ajax.open("POST", url);
  ajax.send(roidatas);
};
