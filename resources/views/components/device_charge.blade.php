<form method="POST" action="/post_ad">
    @csrf
                  <div class="input-container">
                    <label for="title" class="label-text mt-2">
                      <span class="label-span">Device</span>
                    </label>
                    <div class="input-check d-flex">
                     
                      <div class="wrapper">
                        <input type="radio" name="select_device" id="option-17" data-label="Tablet">
                        <input type="radio" name="select_device" id="option-18" data-label="Mobile">
                        <input type="radio" name="select_device" id="option-19" data-label="Smart Watch">
                      </div>
                    </div>
                  </div>
</form>