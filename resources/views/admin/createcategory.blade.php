@extends('layouts.app') @extends('layouts.admin')
<html>
    <head>

    </head>
    <body>
        <form action="{{ route('CreateCategoryPost') }}" method="post">
            {!! csrf_field() !!}
            
            <input type="text" name="namecategory" id="namecategory">
            <select name="parentcategory" id="parentcategory">
                <option value="0"></option>
                @foreach($category as $categorys)
                <option value="{{$categorys -> category_id}}">{{ $categorys->category }}</option>
                @endforeach
            </select>

            <input type="submit" value="submit">
        </form>
    </body>
</html>
