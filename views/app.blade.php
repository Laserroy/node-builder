<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet"
          href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
          crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous">
    </script>
    <title>Node-builder</title>
</head>
<body>
    <button type="button" id="createRoot" class="btn btn-primary mb-3">
        create root
    </button>
    <div class="content">
        {!! $nodes !!}
    </div>
</body>
<script type="text/javascript">

    function makeNode(name) {
        return `<li>
                    <span class="h4">${name}</span>
                    <button type="button" class="btn btn-success btn-sm py-0 addNode">+</button>
                    <button type="button" class="btn btn-danger btn-sm py-0 removeNode">-</button>
                </li>`;
    };

    function makeAncestry(name) {
        return `<ul style="list-style: none;">
                    ${makeNode(name)}
                </ul>`;
    };

    function synchronize() {
        $.post('/index.php', {html: $('.content').html()});
    }

    $('#createRoot').on("click", function () {
        $('.content').append(makeAncestry('root'));
        synchronize();
    });



    $(document).on("click", ".addNode", function () {
        let name = prompt('type node name:', 'node');
        if (name === null) {
            return false;
        }
        if ($(this).parent().find("ul").length > 0) {
            $(this).parent().find("ul:first").append(makeNode(name));
        } else {
            $(this).parent().append(makeAncestry(name));
        }
        synchronize();
    });

    $(document).on("click", ".removeNode", function () {
        if (confirm('Are You sure?')) {
            $(this).parent().remove();
            synchronize();
        }
    });
</script>
</html>