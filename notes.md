## Route Model Binding
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

-----------------------------------------------------------------------------------------------------

#### *Align Button right*
```html
<div class=" d-flex justify-content-end">
    <button class=" btn btn-primary float-right">
        Update
    </button>
</div>
```
<br>

-----------------------------------------------------------------------------------------------------

## Session variables
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
<br>

-----------------------------------------------------------------------------------------------------

## Showing Validation errors
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

-----------------------------------------------------------------------------------------------------

### Repopulating forms
```php
old('name')
// with default value
{{ old('name', $user->name) }}
 
// Is equivalent to...
 
{{ old('name', $user) }}
```
<br>

-----------------------------------------------------------------------------------------------------

## Delete form
```php
<form action="{{ route('model.destroy', $courses->id) }}" method="post">
    @csrf
    @method('delete')
</form>
```

-----------------------------------------------------------------------------------------------------

### Destroy action
```php
public function destroy(Book $book) { $book->delete(); }
```
*remember the **delete()** method*
<br>

-----------------------------------------------------------------------------------------------------

**`shift+j` => merge 2 lines into 1 (vim trick)**
<br>

-----------------------------------------------------------------------------------------------------

#### :warning: *Don't leave space between `<textarea>`not to end up with default white spaces*

```html
<textarea class=" form-control"></textarea>
```
<br>

-----------------------------------------------------------------------------------------------------

## Update action
*(without using `Route::resource()`)*

`Route::put('/model/{coffee}', [ModelController::class, 'update'])`

```php
    public function update(Model $coffee, Request $request) { }
    // is equivalent to
    public function update(Request $request, Model $coffee) { }
```
*valid as long as the **variable names are matched** according to model binding rule, that is, **coffee***

-----------------------------------------------------------------------------------------------------

:warning: use `<thead>` + `<tbody>`, not `<th><tr>` (for some reasons, i was convinced th for thead)

-----------------------------------------------------------------------------------------------------

### Eloquent when: *conditional query*

```php
$query = Model::query();
$query->when($conditional, function ($q) {
    // run me if true
);
```
*provide third argument for false case*

-----------------------------------------------------------------------------------------------------

### Session variables
*using `Request $request`*
```php
$request->session()->get('coffee', 'default');
$request->session()->put('coffee', 'gone');
```

*using helper `request()`*
```php
session('coffee', 'default');
session(['coffee' => 'gone']);
```

-----------------------------------------------------------------------------------------------------

### Give data to closure function
```php
Book::when($request->has('param'), function($q) use ($request) { $q-> }
```

-----------------------------------------------------------------------------------------------------

<details>
<summary>This App</summary>

```php
$query  = Model::query();
$query->when($request->has('order'), function($q) use ($request) {

// using session for toggling ascend and descend
$sort = $request->session()->get('sort', 'asc');
$sort_toggled = $sort === 'asc' ? 'desc' : 'asc';
$request->session()->put('sort', $sort_toggled);
$order_column = request()->input('order');

$q->orderBy($order_column, $sort);
})

```

</details>

-----------------------------------------------------------------------------------------------------

*can use `present` rule for optional field that has to present in form but can be empty*

-----------------------------------------------------------------------------------------------------

### Display validation errors (bootstrap)

```php
@error("name") is-invalid @enderror">

@error('name')
    <div class=" invalid-feedback">{{ $message }}</div>
@enderror
```

-----------------------------------------------------------------------------------------------------

#### Snippets (from laravel docs)
<details>
    <summary>Display all errors</summary>

```php
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
```
</details>
<!--
copy me for templates!
```
<details>
    <summary>
    </summary>
</details>
-----------------------------------------------------------------------------------------------------