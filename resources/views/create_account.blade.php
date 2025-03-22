@include('adminheader')
  <div class="content-wrapper">
    
    <section class="content">

  <div class="card">
        @if ($errors->has('emailPassword'))
                                <span class="text-danger">{{ $errors->first('emailPassword') }}</span>
                                @endif
    <div class="card-body login-card-body">
                          @if(Session::has('success'))
                            <div class="alert alert-success">
                                {{Session::get('success')}}
                            </div>
                        @endif
      <p class="login-box-msg">Create Account</p>

      <form action="{{route('signup') }}" method="post" >
            {{ csrf_field() }}
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="First name" name="fname">
     
          
        
        </div> 
        @if ($errors->has('fname'))
                                <span class="text-danger">{{ $errors->first('fname') }}</span>
                                @endif
                <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="father name" name="mname">
   
      
        </div> 
        @if ($errors->has('mname'))
                                <span class="text-danger">{{ $errors->first('mname') }}</span>
                                @endif
                <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Phone Number" name="phonenumber">
        
        </div>   @if ($errors->has('phonenumber'))
                                <span class="text-danger">{{ $errors->first('phonenumber') }}</span>
                                @endif
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Email" id="email" name="email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Enter Password" name="password">
     
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>     
          
        </div>
        @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Enter Password again" name="password2">
     
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>     
          
        </div>
        @if ($errors->has('password2'))
                                <span class="text-danger">{{ $errors->first('password2') }}</span>
                                @endif
           <div class="input-group mb-3">
          <select class="form-control" id="role" name="role">
              
              <option>Select Role</option>
               <option value="sales">Sales</option>
                <option value="purchaser">StoreKeeper</option>
                 <option value="admin">Admin</option>
          </select>
    
        
        </div> 
        @if ($errors->has('role'))
                                <span class="text-danger">{{ $errors->first('role') }}</span>
                                @endif
        
        <div class="row">
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block" name="submit">Sign Up</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>


    </section>
   </div> 
   
@include('dashboardfooter')    
<!-- /.login-box -->

