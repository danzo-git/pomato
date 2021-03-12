<form action="{{route('products.search')}}">
    <input type="text" name="q" value="{{request()->q ?? ''}}">
    <button><img src="https://img.icons8.com/ios/30/000000/google-web-search.png"/></button>
</form>
