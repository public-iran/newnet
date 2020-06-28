

<!DOCTYPE html>

<html>
<head>
    <meta name="viewport" content="width=device-width" />
    <title>Number Of Children - OrgChart JS | BALKANGraph</title>
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

    </style>

</head>
<body>

<script src="{{asset('js/OrgChart.js')}}"></script>


<div id="tree"></div>
<script>

    window.onload = function () {
        var nodes = [
                @foreach($users as $user)
            { id: '{{$user->refral_code}}',  pid: '{{$user->upline_code}}',name: 'upline code: '+'{{$user->upline_code}}', title: 'refral code: '+'{{$user->refral_code}}', lefthand: '{{$user->left_count}}', righthand: '{{$user->right_count}}', leftprice: '{{$user->left_price}}', rightprice: '{{$user->right_price}}', img: "https://cdn.balkan.app/shared/5.jpg" },
            @endforeach
        ];

        OrgChart.templates.rony.field_number_children = '<circle cx="60" cy="110" r="15" fill="#F57C00"></circle><text fill="#ffffff" x="60" y="115" text-anchor="middle">{val}</text>';

        var chart = new OrgChart(document.getElementById("tree"), {
            template: "polina",
            scaleInitial: 0.1,
            /*  collapse: {
                  level: 3
              },*/
            nodeBinding: {
                field_0: "name",
                field_1: "title",
                img_0: "img",
                // field_number_children: function(sender, node){
                //     return OrgChart.childrenCount(sender, node);
                // }
            }
        });

        chart.load(nodes);
    };
</script>
</body>
</html>
