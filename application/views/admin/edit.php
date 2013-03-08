  <div class="container top">
    
    <ul class="breadcrumb">
      <li>
        <a href="dashboard.html">Home</a> <span class="divider">/</span>
      </li>
      <li>
        <a href="list.html">Users</a> <span class="divider">/</span>
      </li>
      <li class="active">
        <a href="#">New user</a>
      </li>
    </ul>
    
    <div class="page-header">
      <h2>
        New user
      </h2>
    </div>
    
    <div class="alert alert-error">
      <a class="close" data-dismiss="alert">×</a>
      <strong>Oh snap!</strong> Change a few things up and try submitting again.
    </div>

    <div class="alert alert-success">
      <a class="close" data-dismiss="alert">×</a>
      <strong>Well done!</strong> You successfully read this important alert message.
    </div>

    <div class="alert alert-info">
      <a class="close" data-dismiss="alert">×</a>
      <strong>Heads up!</strong> This alert needs your attention, but it's not super important.
    </div>
      
    <form class="form-horizontal">

      <fieldset>
        <div class="control-group">
          <label for="focusedInput" class="control-label">Focused input</label>
          <div class="controls">
            <input type="text" value="This is focused…" id="focusedInput" class="input-xlarge focused">
          </div>
        </div>
        
        <div class="control-group">
          <label for="fileInput" class="control-label">Focused input</label>
          <div class="controls">
            <input type="file" id="fileInput" class="input-xlarge">
            <div class="progress progress-info progress-striped active progress-form-file">
              <div class="bar" style="width: 40%;"></div>
            </div>
          </div>
        </div>
        
        <div class="control-group">
          <label class="control-label">Uneditable input</label>
          <div class="controls">
            <span class="input-xlarge uneditable-input">Some value here</span>
          </div>
        </div>
        <div class="control-group">
          <label for="disabledInput" class="control-label">Disabled input</label>
          <div class="controls">
            <input type="text" disabled="" placeholder="Disabled input here…" id="disabledInput" class="input-xlarge disabled">
          </div>
        </div>
        <div class="control-group">
          <label for="optionsCheckbox2" class="control-label">Disabled checkbox</label>
          <div class="controls">
            <label class="checkbox">
              <input type="checkbox" disabled="" value="option1" id="optionsCheckbox2">
              This is a disabled checkbox
            </label>
          </div>
        </div>
        <div class="control-group warning">
          <label for="inputError" class="control-label">Input with warning</label>
          <div class="controls">
            <input type="text" id="inputError">
            <span class="help-inline">Something may have gone wrong</span>
          </div>
        </div>
        <div class="control-group error">
          <label for="inputError" class="control-label">Input with error</label>
          <div class="controls">
            <input type="text" id="inputError">
            <span class="help-inline">Please correct the error</span>
          </div>
        </div>
        <div class="control-group success">
          <label for="inputError" class="control-label">Input with success</label>
          <div class="controls">
            <input type="text" id="inputError">
            <span class="help-inline">Woohoo!</span>
          </div>
        </div>
        <div class="control-group success">
          <label for="selectError" class="control-label">Select with success</label>
          <div class="controls">
            <select id="selectError">
              <option>1</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
              <option>5</option>
            </select>
            <span class="help-inline">Woohoo!</span>
          </div>
        </div>
        <div class="form-actions">
          <button class="btn btn-primary" type="submit">Save changes</button>
          <button class="btn" type="reset">Cancel</button>
        </div>
      </fieldset>
    </form>

  </div>
   