@props(['type' => 'text', 'value' => '' ,'name'=>'question','label'=>false])

@if ($label)
  <label for ="">{{ $label }}</label>
@endif

<input  type={{ $type }} 
name="{{ $name }}"
@class([
  'form-control',
  'is-invlaid' => $errors->has($name)
])
 value="{{ old($name,$value)}} ">

 @error($name)
   <div class="invalid-feedback">{{ $message }}</div>
 @enderror