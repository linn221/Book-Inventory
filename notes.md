### Route Model Binding
:warning: the **variable name** in controller must equal to the **placeholder** name in `Route::method`, for the binding to work.
```php
Route::get("item/{coffee}", [Controller::class, 'show']);
```
```php
function show(Model $coffee) {
    // no need for $coffee = findOrFail($id);

}
```
<br>

---

### Align Button right
```html
<div class=" d-flex justify-content-end">
    <button class=" btn btn-primary float-right">
        Update
    </button>
</div>
```
<br>

---

### Session variables
*setting Session variables*
```php
redirect()->route("coffee.index")->with("status", "this is coffee");
```
*retrieving Session variables*
```php
@if (session('status'))
    {{ session('status') }}
@endif
```

### Showing Validation errors
```php
@if ($errors->any())
    <h4>Fill the forms correctly</h4>
@endif
```

```php
@error('name')
    {{ $message }} // $message is available only within this block
@enderror
```
---

### Repopulating forms
```php
old('name')
// with default value
{{ old('name', $user->name) }}
 
// Is equivalent to...
 
{{ old('name', $user) }}
```
---
```