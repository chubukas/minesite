function copyText() {
  /* Get the text field */
  var copyText = document.getElementById("myInput");

  /* Select the text field */
  copyText.select();
  copyText.setSelectionRange(0, 99999); /* For mobile devices */

  /* Copy the text inside the text field */

  navigator.clipboard.writeText(copyText.value);
  alert("copied");
}

function copyEth() {
  /* Get the text field */
  var copyText = document.getElementById("myInputeht");

  /* Select the text field */
  copyText.select();
  copyText.setSelectionRange(0, 99999); /* For mobile devices */

  /* Copy the text inside the text field */
  navigator.clipboard.writeText(copyText.value);
  alert("copied");
}

function exchangeCoin() {
  var x = document.getElementById("amounts").value;
  var bitcoin = document.getElementById("bitcoin");
  if (x === "") {
    bitcoin.value = "bitCoin";
  }

  fetch(`https://blockchain.info/tobtc?currency=USD&value=${x}`)
    .then((response) => response.json())
    .then((data) => {
      bitcoin.value = data;
    });
}

// Ethrume calculate
function exchangeCoinEth() {
  var x = document.getElementById("amountsEth").value;
  var ethcoin = document.getElementById("ethcoin");
  if (x === "") {
    ethcoin.value = "Etherum";
  }

  fetch(`https://min-api.cryptocompare.com/data/price?fsym=ETH&tsyms=USD`, {
    mode: "cors",
  })
    .then((response) => response.json())
    .then((data) => {
      const price = (1 / data.USD) * x;
      ethcoin.value = price.toFixed(8);
    });
}

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
  const amount = __id("amounts");
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
    console.log(ajax.responseText);
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

// Etherum
const depositEth = () => {
  event.preventDefault();
  const amount = __id("amountsEth");
  const transact = __id("transidEth");
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
  transdata.append("transid", transact.value);
  transdata.append("userid", userid.value);
  // transdata.append("amounts", amount.value);
  // transdata.append("amounts", amount.value);
  // transdata.append("amounts", amount.value);

  const ajax = new XMLHttpRequest();
  const url = "inc/php/deposit";
  ajax.onload = (res) => {
    console.log(ajax.responseText);
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
  // const reason = __id("reason");
  const userid = __id("userid");
  // const withfrom = __id("withfrom");
  // const withto = __id("withto");
  const btn = __id("withbtn");
  const wallet = __id("wallet");

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

  // if (reason.value.length < 10) {
  // 	reason.style.border = "1px solid red";
  // 	alert("Insert the right transaction ID ");
  // 	return false
  // }else{
  // 	reason.style.border = "1px solid green";
  // }

  // if (
  //   withfrom.value == "Withdraw from" ||
  //   withto.value == "Withdraw to" ||
  //   withto.value == withfrom.value
  // ) {
  //   withfrom.style.border = "1px solid red";
  //   withto.style.border = "1px solid red";
  //   alert("kindly select all fields respectively");
  //   return false;
  // } else {
  //   withfrom.style.border = "2px solid green";
  //   withto.style.border = "2px solid green";
  // }

  const transdata = new FormData();
  transdata.append("withbtn", btn);
  transdata.append("amounts", amount.value);
  // transdata.append("reason", reason.value);
  transdata.append("userid", userid.value);
  transdata.append("wallet", wallet.value);
  // transdata.append("withfrom", withfrom.value);
  // transdata.append("withto", withto.value);

  const ajax = new XMLHttpRequest();
  // const url = "inc/php/withdrawal";
  const url = "inc/php/withdrawCrypto";
  ajax.onload = (res) => {
    console.log(ajax.responseText);
    res = JSON.parse(ajax.responseText);
    if (res.resp == "success") {
      setTimeout(() => {
        u_innerHTML("withbtn", "Submited");
        u_innerHTML(
          "responseswith",
          '<p class="alert alert-success" >Your withdrawal request is  been proccessed and will take about  24 hours</p>'
        );
      }, 1500);
    } else {
      setTimeout(() => {
        u_innerHTML(
          "responseswith",
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

const transfer = () => {
  event.preventDefault();
  const amount = __id("amounts");
  const userid = __id("userid");
  const btn = __id("transferbtn");
  const email = __id("email");

  if (!parseInt(amount.value)) {
    amount.style.border = "1px solid red";
    alert("Amount must be a number only");
    return false;
  }

  const transdata = new FormData();
  transdata.append("transferbtn", btn);
  transdata.append("amounts", amount.value);
  transdata.append("userid", userid.value);
  transdata.append("email", email.value);

  const ajax = new XMLHttpRequest();
  // const url = "inc/php/withdrawal";
  const url = "inc/php/transfer";
  ajax.onload = (res) => {
    res = JSON.parse(ajax.responseText);
    console.log(ajax.responseText);
    console.log(res);
    if (res.resp == "success") {
      setTimeout(() => {
        u_innerHTML("transferbtn", "Submited");
        u_innerHTML(
          "transferwith",
          '<p class="alert alert-success" >Your withdrawal request is  been proccessed and will take about  24 hours</p>'
        );
      }, 1500);
    } else {
      setTimeout(() => {
        u_innerHTML(
          "transferwith",
          '<p class="alert alert-danger" >' + res.resp + "</p>"
        );
        u_innerHTML("transferbtn", "Try again");
        email.style.border = "1px solid red";
        email.focus();
        // alert(res.resp);
      }, 1500);
    }
  };

  ajax.onprogress = () => {
    u_innerHTML(
      "transferbtn",
      '<p class="spinner-border text-sm spinner-border-sm" ></p> Loading...'
    );
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

// const abbb = new Promise(()=>{

// }, ()=>{

// });

// console.log(abbb);

const investments = (type, btntype, days, percent) => {
  event.preventDefault();
  const amount = __id(type);
  const userid = __id("userid").value;

  if (!parseInt(amount.value)) {
    amount.style.border = "1px solid red";
    alert("Amount must be a number only");
    return false;
  }

  const transdata = new FormData();
  transdata.append("userid", userid);
  transdata.append("amounts", amount.value);
  transdata.append("investbtn", btntype);
  transdata.append("days", days);
  transdata.append("percent", percent);

  const ajax = new XMLHttpRequest();
  const url = "inc/php/investment";

  ajax.onload = (res) => {
    console.log(ajax.responseText);
    res = JSON.parse(ajax.responseText);
    if (res.resp == "success") {
      setTimeout(() => {
        u_innerHTML(btntype, "Submited");
        u_innerHTML(
          "responseInvest",
          '<p class="alert alert-success" >You have invested succesfully</p>'
        );
      }, 1500);
    } else {
      setTimeout(() => {
        u_innerHTML(
          "responseInvest",
          '<p class="alert alert-danger" >' + res.resp + "</p>"
        );
        u_innerHTML(btntype, "Try again");
        amount.style.border = "1px solid red";
        amount.focus();
        // alert(res.resp);
      }, 1500);
    }
  };

  ajax.onprogress = () => {
    u_innerHTML(
      btntype,
      '<p class="spinner-border text-sm spinner-border-sm text-dark" ></p> Loading...'
    );
    // u_innerHTML("responses", '<p class="alert alert-success spinner-border text-sm spinner-border-sm text-light" ></p> Loading...');
  };
  ajax.open("POST", url, true);

  ajax.send(transdata);
};
