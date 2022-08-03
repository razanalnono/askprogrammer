@props([
  'name','option' ,'checked'=>false
])

@foreach ($option as $value=>$text )
  <input class="form-check-input" type="radio" name="{{ $name }}"
  value="{{ $value }}"
  @checked(old($name,$checked)==$value)

@class([
  'form-control',
  'is-invlaid' => $errors->has($name)
]) 
 />

  <label  class="form-check-label">
    {{ $text }}
  </label>
@endforeach