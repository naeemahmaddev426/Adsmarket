            <form method="POST" action="/post_ad">
            @csrf
                <div class="input-container">
                    <label for="title" class="label-text mt-2">
                      <span class="label-span">Construction State</span>
                    </label>
                    <div class="input-check d-flex">
                    <div class="wrapper">
                      <input type="radio" name="state_con" id="option-15" data-label="Grey Structure">
                      <input type="radio" name="state_con" id="option-16" data-label="Finished">
                    </div>
                  </div>
                </div>
            </form>
