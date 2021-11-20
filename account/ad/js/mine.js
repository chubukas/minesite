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

const deposit = () => {
  event.preventDefault();
  const fileCoin = __id("amounts");
  const transact = __id("transid");
  const userid = __id("userid");
  const btn = __id("depbtn");

  if (!parseInt(amount.value)) {
    amount.style.border = "1px solid red";
    alert("Amount must be a number only");
    return false;
  }

  if (parseInt(amount.value) < 200) {
    amount.style.border = "1px solid red";
    alert("Deposit amount must be atleast $200 ");
    return false;
  } else {
    amount.style.border = "1px solid green";
  }

  if (transact.value.length < 10) {
    transact.style.border = "1px solid red";
    alert("Insert the right transaction ID ");
    return false;
  } else {
    transact.style.border = "1px solid green";
  }

  const transdata = new FormData();
  transdata.append("depbtn", depbtn);
  transdata.append("amounts", amount.value);
  transdata.append("transid", transid.value);
  transdata.append("userid", userid.value);
  // transdata.append("amounts", amount.value);
  // transdata.append("amounts", amount.value);
  // transdata.append("amounts", amount.value);

  const ajax = new XMLHttpRequest();
  const url = "inc/php/deposit";
  ajax.onload = (res) => {
    res = JSON.parse(ajax.responseText);
    if (res.resp == "success") {
      setTimeout(() => {
        u_innerHTML("depbtn", "Submited");
        u_innerHTML(
          "responses",
          '<p class="alert alert-success" >Your transaction ID was submitted success, kindly wait for approval</p>'
        );
      }, 1500);
    } else {
      setTimeout(() => {
        u_innerHTML(
          "responses",
          '<p class="alert alert-danger" >' + res.resp + "</p>"
        );
        u_innerHTML("depbtn", "Try again");
        transact.style.border = "1px solid red";
        transact.focus();
        // alert(res.resp);
      }, 1500);
    }
  };

  ajax.onprogress = () => {
    u_innerHTML(
      "depbtn",
      '<p class="spinner-border text-sm spinner-border-sm text-dark" ></p> Loading...'
    );
    // u_innerHTML("responses", '<p class="alert alert-success spinner-border text-sm spinner-border-sm text-light" ></p> Loading...');
  };
  ajax.open("POST", url, true);

  ajax.send(transdata);
};

const withdraw = () => {
  event.preventDefault();
  const amount = __id("amounts");
  const reason = __id("reason");
  const userid = __id("userid");
  const withfrom = __id("withfrom");
  const withto = __id("withto");
  const btn = __id("withbtn");

  if (!parseInt(amount.value)) {
    amount.style.border = "1px solid red";
    alert("Amount must be a number only");
    return false;
  }

  if (parseInt(amount.value) < 200) {
    amount.style.border = "1px solid red";
    alert("Deposit amount must be atleast $200 ");
    return false;
  } else {
    amount.style.border = "1px solid green";
  }

  if (reason.value.length < 10) {
    reason.style.border = "1px solid red";
    alert("Insert the right transaction ID ");
    return false;
  } else {
    reason.style.border = "1px solid green";
  }

  if (
    withfrom.value == "Withdraw from" ||
    withto.value == "Withdraw to" ||
    withto.value == withfrom.value
  ) {
    withfrom.style.border = "1px solid red";
    withto.style.border = "1px solid red";
    alert("kindly select all fields respectively");
    return false;
  } else {
    withfrom.style.border = "2px solid green";
    withto.style.border = "2px solid green";
  }

  const transdata = new FormData();
  transdata.append("withbtn", btn);
  transdata.append("amounts", amount.value);
  transdata.append("reason", reason.value);
  transdata.append("userid", userid.value);
  transdata.append("withfrom", withfrom.value);
  transdata.append("withto", withto.value);
  // transdata.append("amounts", amount.value);
  // transdata.append("amounts", amount.value);
  // transdata.append("amounts", amount.value);

  const ajax = new XMLHttpRequest();
  const url = "inc/php/withdrawal";
  ajax.onload = (res) => {
    console.log(ajax.responseText);
    res = JSON.parse(ajax.responseText);
    if (res.resp == "success") {
      setTimeout(() => {
        u_innerHTML("withbtn", "Submited");
        u_innerHTML(
          "responses",
          '<p class="alert alert-success" >Your withdrawal request is  been proccessed and will take about  72 hours</p>'
        );
      }, 1500);
    } else {
      setTimeout(() => {
        u_innerHTML(
          "responses",
          '<p class="alert alert-danger" >' + res.resp + "</p>"
        );
        u_innerHTML("withbtn", "Try again");
        transact.style.border = "1px solid red";
        transact.focus();
        // alert(res.resp);
      }, 1500);
    }
  };

  ajax.onprogress = () => {
    u_innerHTML(
      "withbtn",
      '<p class="spinner-border text-sm spinner-border-sm" ></p> Loading...'
    );
    // u_innerHTML("responses", '<p class="alert alert-success spinner-border text-sm spinner-border-sm text-light" ></p> Loading...');
  };
  ajax.open("POST", url, true);

  ajax.send(transdata);
};

const updatewallet = () => {
  event.preventDefault();

  const btcaddress = __id("btcaddress");
  const btcupdatebtn = __id("btcupdatebtn");

  if (btcaddress.value.length < 25) {
    btcaddress.style.border = "2px solid red";
    alert("Invalid BTC address");
    btcaddress.focus();
    return false;
  } else {
    btcaddress.style.border = "2px solid green";
  }
  const url = "inc/php/updatewallet";

  const btcdata = new FormData();
  btcdata.append("btcaddress", btcaddress.value);
  btcdata.append("btcupdatebtn", btcupdatebtn.value);

  const ajax = new XMLHttpRequest();
  ajax.onload = function (res) {
    res = ajax.responseText;
    resp = JSON.parse(ajax.responseText);
    if (resp.result == "updated") {
      alert("Update successful");
    } else {
      alert("Failed to update. Please try again");
    }
    console.log(res);
  };

  ajax.open("POST", url, true);
  ajax.send(btcdata);
};

const profile = () => {
  event.preventDefault();

  const fullname = __id("fullname");
  const phone = __id("phone");
  const email = __id("email");
  const profilebtn = __id("profilebtn");

  const dd = [fullname, phone, email];

  for (let i = 0; i < dd.length; i++) {
    if (dd[i].value.length < 5) {
      dd[i].style.border = "1px solid red";
      return false;
    } else {
      dd[i].style.border = "1px solid green";
    }
    // console.log(i);
  }

  const url = "inc/php/profile";

  const profiledata = new FormData();
  profiledata.append("fullname", fullname.value);
  profiledata.append("phone", phone.value);
  profiledata.append("email", email.value);
  profiledata.append("profilebtn", profilebtn.value);

  const ajax = new XMLHttpRequest();
  ajax.onload = function (res) {
    res = ajax.responseText;
    resp = JSON.parse(ajax.responseText);
    if (resp) {
      resp = JSON.parse(ajax.responseText);

      if (resp.result == "updated") {
        alert("Update successful");
      } else {
        alert("Failed to update. Please try again");
      }
    }
    console.log(ajax.response);
  };

  ajax.open("POST", url, true);
  ajax.send(profiledata);
};

const changepassword = () => {
  event.preventDefault();
  const pass1 = __id("password1");
  const pass2 = __id("password2");
  const passwordbtn = __id("passwordbtn");
  if (pass1.value.length < 6) {
    pass1.style.border = "1px solid red";
    alert("Password must be atleast 6 characters");
    pass1.focus();
    return false;
  } else if (pass1.value != pass2.value) {
    pass1.style.border = "1px solid red";
    pass2.style.border = "1px solid red";
    alert("Passwords didn't match");
    pass2.focus();
    return false;
  } else {
    pass1.style.border = "0px solid green";
    pass2.style.border = "0px solid green";
  }

  const url = "inc/php/profile";
  const profiledata = new FormData();
  profiledata.append("password1", password1.value);
  profiledata.append("password2", password2.value);
  profiledata.append("passwordbtn", passwordbtn);
  const ajax = new XMLHttpRequest();
  ajax.onload = function (res) {
    res = ajax.responseText;
    resp = JSON.parse(ajax.responseText);
    // if (resp) {
    // 	resp = JSON.parse(ajax.responseText);

    if (resp.result == "success") {
      alert("Password updated successful");
    } else {
      alert("Failed to update. Please try again");
    }
    // }
    console.log(ajax.response);
  };
  ajax.open("POST", url, true);
  ajax.send(profiledata);
};

const payroi = (transid, creditAmount) => {
  const roidata = new FormData();

  roidata.append("roiamount", creditAmount);
  roidata.append("transid", transid);

  const url = "inc/php/component_payroi";
  const ajax = new XMLHttpRequest();
  ajax.onload = () => {
    console.log(ajax.responseText);
    alert(ajax.responseText);
  };

  ajax.open("POST", url);
  ajax.send(roidata);
};

// const abbb = new Promise(()=>{

// }, ()=>{

// });

// console.log(abbb);

const acceptpayment = (transid) => {
  const url = "inc/php/verify?approval=" + transid;
  const ajax = new XMLHttpRequest();
  ajax.onload = () => {
    alert(ajax.responseText);
  };
  ajax.open("GET", url, true);
  // ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  ajax.send();
};

const declinepayment = (transid) => {
  const url = "inc/php/verify?decline=" + transid;
  const ajax = new XMLHttpRequest();
  ajax.onload = () => {
    alert(ajax.responseText);
    console.log(ajax.responseText);
  };
  ajax.open("GET", url, true);
  // ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  ajax.send();
};

const updateAmount = (id, deposit) => {
  event.preventDefault();
  const amount = __id(`useramount${id}`).value;

  const roidata = new FormData();

  const total = parseInt(amount) + parseInt(deposit);

  roidata.append("amount", total);
  roidata.append("userid", id);

  const url = "inc/php/changeUserAmount?changeWalletAmount";
  const ajax = new XMLHttpRequest();
  ajax.onload = () => {
    alert(ajax.responseText);
    setTimeout(() => {
      window.location.reload(true);
    }, 1500);
  };

  ajax.open("POST", url);
  ajax.send(roidata);
};

const updateRoi = (id) => {
  event.preventDefault();
  const amount = __id(`roiamount${id}`).value;

  const roidata = new FormData();

  roidata.append("amount", amount);
  roidata.append("userid", id);

  const url = "inc/php/changeUserAmount?changeRoiAmount";
  const ajax = new XMLHttpRequest();
  ajax.onload = () => {
    alert(ajax.responseText);
    setTimeout(() => {
      window.location.reload(true);
    }, 1500);
  };

  ajax.open("POST", url);
  ajax.send(roidata);
};

const changeCoin = () => {
  event.preventDefault();

  const fileCoin = __id("fileCoin").files[0];
  const coinName = __id("coinName").value;
  const coinAddress = __id("coinAddress").value;

  const roidata = new FormData();

  // roidata.append("fileCoin", fileCoin);
  roidata.append("coinName", coinName);
  roidata.append("coinAddress", coinAddress);
  roidata.append("fileCoin", fileCoin, fileCoin.name);

  const url = "inc/php/uploadFile";
  const ajax = new XMLHttpRequest();
  ajax.onload = () => {
    alert(ajax.responseText);
    setTimeout(() => {
      window.location.reload(true);
    }, 1000);
  };

  ajax.open("POST", url);
  ajax.send(roidata);
};
