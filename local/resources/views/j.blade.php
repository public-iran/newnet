
<div id="tree" style="background: rgb(43, 43, 43)"></div>

<script src="{{asset('js/OrgChart.js')}}"></script>

<script>

    window.onload = function () {
        var chart = new OrgChart(document.getElementById("tree"), {
            enableDragDrop: true,
            tags: {
                "assistant": {
                    template: "ula"
                }
            },
            nodeBinding: {
                field_0: "name",
                field_1: "title",
                img_0: "img"
            },
            nodes: [
                    {{--{ id: '{{Auth::user()->reference_code}}', name: "{{Auth::user()->name}}", title: "admin", img: "https://cdn.balkan.app/shared/2.jpg" },--}}
                    <?php
                    foreach ($users as $val){

                        ?>
                { id:"{{$val->reference_code}}", pid: '{{$val->reference}}',  img: "@if($val->avatar){{asset('images/user_profile/'.$val->avatar)}}@else{{asset('images/user.png')}}@endif"},
                <?php }
                ?>

            ]
        });
    };


</script>



<!DOCTYPE html>

<html>
<head>
    <meta name="viewport" content="width=device-width" />
    <title>ساختار درختی</title>
    <style>
        html, body {
            margin: 0px;
            padding: 0px;
            width: 100%;
            height: 100%;
            overflow: hidden;
            font-family: Helvetica;
        }

        #tree {
            width: 100%;
            height: 100%;
        }

        @font-face {
            font-family: Vazir;
            src: url('../fonts/Vazir.eot');
            src: url('../fonts/Vazir.eot?#iefix') format('embedded-opentype'),
            url('../fonts/Vazir.woff') format('woff'),
            url('../fonts/Vazir.ttf') format('truetype');
            font-weight: normal;
        }
        /*partial*/
        .node,.edit-fields,.edit-fields input{
            font-family: Vazir, sans-serif;
        }
        .edit-fields{
            padding-right: 10px;
        }
        .node.Beginner rect {
            fill: #fff;
        }
        .node.Beginner .field_1,.node.Beginner .field_0{
            fill: #000;
        }

        .node.Presentor rect {
            fill: #FFCA28;
        }

        .node.Trainer rect {
            fill: green;
        }
        .node.Adviser rect {
            fill: blue;
        }
        .node.Leader rect {
            fill: red;
        }
        .node.Leader rect {
            fill: purple;
        }
        .node.Master rect {
            fill: #000000;
        }
        .edit-fields div{
            text-align: right!important;
            direction: rtl;
        }
        .edit-photo img{
            height: 100px;
        }

    </style>

</head>
<body>


<script src="{{asset('js/OrgChart.js')}}"></script>
<div id="tree"></div>
<script>

    window.onload = function () {
        var nodes = [
                <?php
                foreach ($users as $user){

                    ?>
            { id: "{{$user->reference_code}}", pid: "{{$user->reference}}",نام: "کد :{{$user->reference_code}}",سطح:  "کد بالاسری{{$user->reference}}",  آواتار: "@if($user->avatar){{asset('images/user_profile/'.$user->avatar)}}@else{{asset('images/user.png')}}@endif" },
            <?php }
            ?>
        ];

        for (var i = 0; i < nodes.length; i++) {
            var node = nodes[i];
            switch (node.سطح) {
                case "Beginner":
                    node.tags = ["Beginner"];
                    break;
                case "Presentor":
                    node.tags = ["Presentor"];
                    break;
                case "Trainer":
                    node.tags = ["Trainer"];
                    break;
                case "Adviser":
                    node.tags = ["Adviser"];
                    break;
                case "Leader":
                    node.tags = ["Leader"];
                    break;
                case "Top Leader":
                    node.tags = ["Top Leader"];
                    break;
                case "Master":
                    node.tags = ["Master"];
                    break;
            }
        }

        var chart = new OrgChart(document.getElementById("tree"), {
            layout: OrgChart.mixed,
            nodeBinding: {
                field_0: "نام",
                field_1: "سطح",
                field_2: "استان",
                field_3: "شهر",
                img_0: "آواتار"
            },
            nodes: nodes
        });
    };

</script>
</body>
</html>
