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

<details>
    <summary>
        HTML input element
    </summary>

```php
<div class="mb-3">
    <label for="" class=" form-label">
        Coffee
    </label>
    <input
    type="text"
    name="coffee"
    value="{{ old('coffee') }}"
    class=" form-control @error("coffee") is-invalid @enderror"
    autofocus>

    @error('coffee')
        <div class=" invalid-feedback">{{ $message }}</div>
    @enderror
</div>
```
</details>

-----------------------------------------------------------------------------------------------------

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

-----------------------------------------------------------------------------------------------------

### Eloquent Relationships
*i don't have much knowledge of the stuff, and it's kinda advanced but from what i understand:*

#### One to one (*hasOne()*)
*model's primary key is the foreign key model_id in method table*
\
**users.id = phones.user_id**

```php
class User extends Model
{
    /**
     * Get the phone associated with the user.
     */

    public function phone(): HasOne
    {
        return $this->hasOne(Phone::class);
        return $this->hasOne(Phone::class, 'foreign_key', 'local_key');
        return $this->hasOne(Phone::class, $model_name . "_id", $model->primaryKey);
    }
}
```

#### One to one inverse (*belongsTo()*)
*model's foreign key is the primary key of the method table*
\
**phones.user_id = user.id**

```php
class Phone extends Model
{
    /**
     * Get the user that owns the phone.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
        return $this->belongsTo(User::class, 'foreign_key', 'owner_key');
        return $this->belongsTo(User::class, $method_name . "_id", "id");
    }
}
```

#### One to many (*hasMany()*)
*model's primary key is the foreign key model_id in method table, and has many records*
\
**posts.id = comments.post_id**

```php
class Post extends Model
{
    /**
     * Get the comments for the blog post.
     */
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
}
```

*Do I have a clear idea? no. I am trying to make sense to them*

-----------------------------------------------------------------------------------------------------

<!-- copy me for templates!
<!--
<details>
    <summary>

    </summary>
    ```

    ```
</details>
-----------------------------------------------------------------------------------------------------
-->