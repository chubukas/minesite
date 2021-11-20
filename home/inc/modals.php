
                
<div class="container mt-3" style="z-index: 100px">

  <!-- Button to Open the Modal -->
 

  <!-- SIGNIN FORM -->

  <div class="modal fade mt-5" id="myModal">
  	<br><br><br><br>
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        
        <div id="signinform">

            <div class="modal-header">
              <h3 class="modal-title text-success"> <i class="fa fa-user"> </i> Login </h3>
              <button type="button" class=" close" data-dismiss="modal">×</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">
              <form onsubmit="alllogin()">
              
                <div class="form-group">
                  <div class="label">
                    <strong class="text-primary">Email</strong>
                  </div>
                  <input type="email" id="loginemail" name="" placeholder="Email" class="form-control">
                </div>


                <div class="form-group">
                  <div class="label">
                    <strong class="text-primary">Password</strong>
                  </div>
                  <input type="password" id="loginpassword" name="" placeholder="Password" class="form-control">
                </div>

                <div class="form-group">
                  <button id="loginbtn" name="loginbtn" class="btn btn-sm btn-success"><i class="fa fa-sign-in"></i> Login</button>

                  <p>Not yet Registered 

                <button type="button" class="text-success btn btn-link btn-sm" onclick="toggledis('signinform', 'signupform')">
                    <!-- <span class="spinner-border text-sm spinner-border-sm" ></span>  -->
                    <i class="fa fa-sign-in"></i> Signup here
                </button>
              </p>

                </div>
              </form>
            </div>
        </div>


        <!-- SIGNUP FORM MODAL HERE -->






         <div id="signupform" class="d-none">
           <div class="modal-header">
              <h3 class="modal-title text-primary"> <i class="fa fa-user"> </i> Registration Form</h3>
              <button type="button" class="text-danger close" data-dismiss="modal">×</button>
            </div>
        
        <!-- Modal body -->
        <div class="modal-body">
         <!--  <small class="text-center">All fills with ( <span class="text-danger"> * </span> ) are important inputs and must be filled before submitting the form</small> <br><br><br> -->

          <p>
            We are specializes on Sophisticated, Global Investments, Trade Strategies, for institutional investors and private Client.
          </p>
          <form onsubmit="reg_user()">
          
            <div class="form-group">
              <div class="label">
                <strong class="text-primary">Fullname</strong> <strong class="text-danger">*</strong>
              </div>
              <input  type="text" id="username" name="username" placeholder="Fullname" class="form-control">
            </div>


            <div class="form-group">
              <div class="label mt-4">
                <strong class="text-primary">Email</strong><strong class="text-danger">*</strong>
              </div>
              <input  type="email" id="useremail" name="useremail" placeholder="Email" class="form-control">
            </div>


            <div class="form-group">
              <div class="label">
                <strong class="text-primary">Phone number</strong><strong class="text-danger">*</strong>
              </div>
              <input  type="number" id="userphone" name="userphone" placeholder="Phone number" class="form-control">
            </div>


            <div class="form-group">
              <div class="label">
                <strong class="text-primary">BTC Address</strong><strong class="text-danger">*</strong>
              </div>
              <input  type="text" id="btcaddress" name="btcaddress" placeholder="BTC Address" class="form-control">
            </div>


            <div class="form-group">
              <div class="label">
                <strong class="text-primary">Password</strong><strong class="text-danger">*</strong>
              </div>
              <input  type="password" name="onepassword" id="onepassword" placeholder="Password" class="form-control">
              <small id="resone"></small>
            </div>

            <div class="form-group">
              <div class="label">
                <strong class="text-primary">Confirm password</strong><strong class="text-danger">*</strong>
              </div>
              <input  type="password" oninput="checkpassword()" name="twopassword" id="twopassword" placeholder="Confirm password" class="form-control">
              <small id="restwo"></small>
            </div>


            <div class="form-group">
              <button id="userbutton"  name="userbutton" class="w-50 btn btn-sm btn-primary"><i class="fa fa-sign-in"></i> Signup </button>  
              <p>Already Registered 

                <button type="button"  class=" btn btn-link btn-sm" onclick="toggledis('signupform', 'signinform')">
                    <!-- <span class="spinner-border text-sm spinner-border-sm" ></span>  -->
                    <i class="fa fa-sign-in"></i> Signin
                </button>
              </p>
            </div>
          </form>
        </div>
         </div> 

        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>





  
</div>


