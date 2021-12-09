<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Livewire</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

{{--    @livewireStyles--}}
    <livewire:styles />
    <livewire:scripts />

</head>
<body>

{{--    @livewire('counter')--}}
{{--    @livewire('comment')--}}
{{--    <livewire:comment :initialComments="$comments" />--}}

    <div class="container my-4">
        <div class="row">
            <div class="col-5">
                <livewire:tickets/>
            </div>
            <div class="col-7">
                <livewire:comment/>
            </div>
        </div>
    </div>

{{--    @livewireScripts--}}
</body>
</html>
