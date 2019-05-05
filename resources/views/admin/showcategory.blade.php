@extends('layouts.app') @extends('layouts.admin')
<html>
    <head>

    </head>
    <body>
        @foreach($category as $categorys)
            <ul>
                <li>{{$categorys->category}}
                    @foreach($category1 as $categorys1)
                    @if($categorys->category_id == $categorys1->parent_id)
                        <ul>
                            <li>{{ $categorys1 ->category }}</li>

                    @foreach($category1 as $categorys2)
                    @if($categorys2->parent_id == $categorys1->category_id)
                        <ul>
                            <li>{{$categorys2->category}}</li>
                    @endif
                    @endforeach
                    @endif
                    @endforeach

            </ul>
        @endforeach
    </body>
</html>
