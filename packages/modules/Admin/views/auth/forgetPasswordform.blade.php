 
                      

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
                        

                          <div class="form-group{{ $errors->first('email', ' has-error') }} has-feedback">
                          <label>Enter your e-mail address below to reset your password.</label>
                              {!! Form::email('email',null, ['class'=>'form-control', 'placeholder'=>Lang::get('admin-lang.email')]) !!}
                              <span class="glyphicon glyphicon-envelope form-control-feedback input-img"></span>
                               
                          </div>

                          

                          <div class="form-group alert alert-danger error-loc " style="display:none"></div>
                            <p>
                                  @if(Session::has('flash_alert_notice'))
                                  <div class="alert alert-danger danger">
                                       {{ Session::get('flash_alert_notice') }} 
                                  </div>
                                @endif
                              </p>

                          <div class="row">
                          <div class="col-xs-6"></div><!-- /.col -->
                          <div class="col-xs-6">
                          <!--   <button type="submit" class="btn btn-primary btn-block btn-flat">{{ Lang::get('admin-lang.sign_in') }}</button> -->
                              {!! Form::submit('Reset Password', ['class'=>'btn btn-primary btn-block btn-flat', 'id'=>'login', 'value'=> 'Reset Password' ]) !!}
                          </div><!-- /.col -->
                          </div>
                    </form> 