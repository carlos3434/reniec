<!-- /.modal -->
<div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-hidden="true">
  <!--<div class="modal-dialog modal-lg">-->
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
              ×
          </button>
        <h4 class="modal-title">New message</h4>
      </div>
      <div class="modal-body">
        <form id="wizard-1" novalidate="novalidate">
          <div id="bootstrap-wizard-1" class="col-sm-12">
            <div class="form-bootstrapWizard">
              <ul class="bootstrapWizard form-wizard">
                <li class="active" data-target="#step1">
                  <a href="#tab1" data-toggle="tab"> <span class="step">1</span> <span class="title">Basic information</span> </a>
                </li>
                <li data-target="#step2">
                  <a href="#tab2" data-toggle="tab"> <span class="step">2</span> <span class="title">Billing information</span> </a>
                </li>
                <li data-target="#step3">
                  <a href="#tab3" data-toggle="tab"> <span class="step">3</span> <span class="title">Domain Setup</span> </a>
                </li>
                <li data-target="#step4">
                  <a href="#tab4" data-toggle="tab"> <span class="step">4</span> <span class="title">Save Form</span> </a>
                </li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="tab-content">
              <div class="tab-pane active" id="tab1">
                <br>
                <h3><strong>Step 1 </strong> - Basic Information</h3>

                <div class="row">

                  <div class="col-sm-12">
                    <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope fa-lg fa-fw"></i></span>
                        <input class="form-control input-lg" placeholder="email@address.com" type="text" name="email" id="email">

                      </div>
                    </div>

                  </div>

                </div>

                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user fa-lg fa-fw"></i></span>
                        <input class="form-control input-lg" placeholder="First Name" type="text" name="fname" id="fname">

                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user fa-lg fa-fw"></i></span>
                        <input class="form-control input-lg" placeholder="Last Name" type="text" name="lname" id="lname">

                      </div>
                    </div>
                  </div>
                </div>

              </div>
              <div class="tab-pane" id="tab2">
                <br>
                <h3><strong>Step 2</strong> - Billing Information</h3>

                <div class="row">
                  <div class="col-sm-4">
                    <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-flag fa-lg fa-fw"></i></span>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-map-marker fa-lg fa-fw"></i></span>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope-o fa-lg fa-fw"></i></span>
                        <input class="form-control input-lg" placeholder="Postal Code" type="text" name="postal" id="postal">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-phone fa-lg fa-fw"></i></span>
                        <input class="form-control input-lg" data-mask="+99 (999) 999-9999" data-mask-placeholder= "X" placeholder="+1" type="text" name="wphone" id="wphone">
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-mobile fa-lg fa-fw"></i></span>
                        <input class="form-control input-lg" data-mask="+99 (999) 999-9999" data-mask-placeholder= "X" placeholder="+01" type="text" name="hphone" id="hphone">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab3">
                <br>
                <h3><strong>Step 3</strong> - Domain Setup</h3>
                <div class="alert alert-info fade in">
                  <button class="close" data-dismiss="alert">
                    ×
                  </button>
                  <i class="fa-fw fa fa-info"></i>
                  <strong>Info!</strong> Place an info message box if you wish.
                </div>
                <div class="form-group">
                  <label>This is a label</label>
                  <input class="form-control input-lg" placeholder="Another input box here..." type="text" name="etc" id="etc">
                </div>
              </div>
              <div class="tab-pane" id="tab4">
                <br>
                <h3><strong>Step 4</strong> - Save Form</h3>
                <br>
                <h1 class="text-center text-success"><strong><i class="fa fa-check fa-lg"></i> Complete</strong></h1>
                <h4 class="text-center">Click next to finish</h4>
                <br>
                <br>
              </div>

              <div class="form-actions">
                <div class="row">
                  <div class="col-sm-12">
                    <ul class="pager wizard no-margin">
                      <!--<li class="previous first disabled">
                      <a href="javascript:void(0);" class="btn btn-lg btn-default"> First </a>
                      </li>-->
                      <li class="previous disabled">
                        <a href="javascript:void(0);" class="btn btn-lg btn-default"> Previous </a>
                      </li>
                      <!--<li class="next last">
                      <a href="javascript:void(0);" class="btn btn-lg btn-primary"> Last </a>
                      </li>-->
                      <li class="next">
                        <a href="javascript:void(0);" class="btn btn-lg txt-color-darken"> Next </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" @click.prevent="guardarUser" class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </div>
</div>
<!-- /.modal -->
