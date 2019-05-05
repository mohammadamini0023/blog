<html>
    <head>

    </head>
    <body>
        <form action="{{ route('createcitypost') }}" method="Post">
                {!! csrf_field() !!}
            <input type="text" name="city" id="city">
            <input type="submit" value="submit">
        </form>
    </body>
</html>
