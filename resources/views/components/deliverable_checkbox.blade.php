<style>
/* General form-group styling */
.form-group {
  display: block;
  margin-bottom: 15px;
}

/* Hide the original checkbox input */
.form-group input {
  height:15px;
  width:15px;
  display:none;
}

/* Style the label as a custom checkbox */
.form-group label {
  position: relative;
  cursor: pointer;
  font-size: 14px;
  color: #585454;
}

/* Hover effect on label */
.form-group label:hover {
  color: black;
}

/* Custom checkbox box (default state) */
.form-group label:before {
  content: '';
  display: inline-block;
  width: 18px;
  height: 18px;
  background-color: transparent;
  border: 1px solid #ddd; /* Default border color */
  border-radius: 4px;
  vertical-align: middle;
  margin-right: 8px;
  cursor: pointer;
  position: relative;
}

/* Show the checkmark when checkbox is checked */
.form-group input:checked + label:after {
  content: '';
  display: block;
  position: absolute;
  top: 4px;
  left: 7px;
  width: 6px;
  height: 12px;
  border: solid #545F8B;
  border-width: 0 2px 2px 0;
  transform: rotate(45deg);
}

/* Change the border color when checkbox is checked */
.form-group input:checked + label:before {
  border-color: #545F8B; /* Border color when checked */
}
</style>


<div class="form-group">
    <input type="checkbox" id="{{ strtolower($value) }}" name="{{ $name }}[]" value="{{ $value }}" {{ $checked ? 'checked' : '' }}>
    <label for="{{ strtolower($value) }}">{{ ucfirst($value) }}</label>
</div>
