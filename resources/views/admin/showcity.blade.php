@extends('layouts.app') @extends('layouts.admin')
<html>
    <head>

    </head>
    <body>
        @foreach($city as $citys)
            <ul>
                <li>{{ $citys->city }} </li>
            </ul>
        @endforeach
    </body>
</html>
