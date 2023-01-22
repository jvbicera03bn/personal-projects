<!DOCTYPE html>
<?php 
$records = $vdata['records'];
?>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script>
            window.onload = function () {
            //Better to construct options first and then pass it as a parameter
            var options = {
                title: {
                    text: "Client Billing"              
                },
                axisY:{
                    title: "Estimate Cost",
                },
                axisX:{
                    title: "Months",
                },
                data: [              
                {
                    type: "column",
                    dataPoints: [
<?php           foreach ($records as $record){ ?> 
                        { label: "<?=$record['month']?>",  y: <?=intval($record['total'])?>  },
<?php } ?>           
                    ]
                }
                ]
            };

            $("#chartContainer").CanvasJSChart(options);
            }
        </script>
        <script type="text/javascript" src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
        <script type="text/javascript" src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
        <style>
            body {
                border: 1px solid;
                border-radius: 5px;
                width: 1000px;
                margin: 0px auto;
                font-family: "Helvetica Neue",Helvetica,Arial;
            }
            div#tableContainer {
                width: fit-content;
                margin: 30px auto;
            }
            table{
                border: 1px solid #ddd;
            }
            th, td {
                border-bottom: 1px solid #ddd;
                text-align: center;
                width: 110px;
                padding: 2px 10px;
                font-size: 20px;
            }
            div#chartContainer{
                width: 890px;
                border: 2px solid;
                border-radius: 10px;
                margin: 20px auto;
            }
        </style>
        <title>Client Billing</title>
    </head>
    <body>
        <div id="tableContainer">
            <table>
                <tr>
                    <th>Month</th>
                    <th>Year</th>
                    <th>Total Cost</th>
                </tr>
<?php           foreach ($records as $record){ ?>
                    <tr>
                        <td><?=$record['month']?></td>
                        <td><?=$record['year']?></td>
                        <td><?=$record['total']?></td>
                    </tr>
<?php           }   ?>
            </table>
        </div>
        <div id="chartContainer" style="height: 370px;"></div>
    </body>
</html>